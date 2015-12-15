<?php

class FEMessagesController extends ResourceBaseController{
    private $conversations = array();
    public function __construct() {
        parent::__construct();
        $current_user_id = Session::get('user')['id'];
        if(FEUsersHelper::isLogged()){
            $user = Input::get('user');
            if(!empty($user)){
                $users = User::where('fullname', 'LIKE', "%$user%")->where('id','!=',$current_user_id)->get(['id'])->toArray();
                array_walk($users, function(&$value, &$key){
                    $id = $value['id'];
                    $value = $id;
                });
                
                $conversations = Conversation::where(function($query) use($current_user_id,$users){
                    $query->whereIn('user1_id',$users)
                            ->where('user2_id',$current_user_id);
                })->orWhere( function($query) use($current_user_id, $users) {
                    $query->orWhereIn('user2_id',$users)
                            ->where('user1_id',$current_user_id);
                })->orderBy('updated_at','DESC')->get();
                
                 
            }else{
                $conversations = Conversation::where('user1_id',$current_user_id)
                    ->orWhere('user2_id',$current_user_id)
                    ->orderBy('updated_at','DESC')->get();
            }
        }else{
            $conversations = array();
        }
        $this->conversations = $conversations;
    }


    public function create() {
        if(FEUsersHelper::isLogged()){
            return View::make('frontend/messages/create')->with('user', User::find(Session::get('user')['id']))
                            ->with('conversations', $this->conversations);
        }else{
            return Redirect::to('/');
        }
                
    }

    public function destroy($id) {
        if (FEUsersHelper::isLogged()) {
            $conversation = Conversation::find($id);
            if(FEUsersHelper::isCurrentUser($conversation->user1_id) || FEUsersHelper::isCurrentUser($conversation->user2_id)){
                foreach($conversation->messages as $message){
                    $message->delete();
                }
                $conversation->delete();
                return Redirect::back();
            }else{
                return Redirect::to('message');
            }
        } else {
            return Redirect::to('/');
        }
    }

    public function edit($id) {
        
    }

    public function index() {
        if(FEUsersHelper::isLogged()){
            return View::make('frontend/messages/index')->with('user',User::find(Session::get('user')['id']))
                ->with('conversations',$this->conversations);
            
        }else{
            return Redirect::to('/');
        }
        
        
    }

    public function show($id) {
        if (FEUsersHelper::isLogged()) {
            $conversation = Conversation::find($id);
            if($conversation){
                if(FEUsersHelper::isCurrentUser($conversation->user1_id) || FEUsersHelper::isCurrentUser($conversation->user2_id)){
                    return View::make('frontend/messages/show')->with('user', User::find(Session::get('user')['id']))
                                ->with('conversations', $this->conversations)
                                ->with('conversation', $conversation);
                }else{
                    return Redirect::to('message');
                }
            }else{
                return Redirect::to('message');
            }
        } else {
            return Redirect::to('/');
        }
    }

    public function store() {
        if(FEUsersHelper::isLogged()){
            $current_user_id = Session::get('user')['id'];
            $r_user_id = Input::get('r_user_id');
            $conversations = Conversation::where(function ($query) use ($current_user_id, $r_user_id) {
                                        $query->where('user1_id', '=', $current_user_id)
                                        ->where('user2_id', '=', $r_user_id);
                                    })->orWhere(function ($query) use ($current_user_id, $r_user_id) {
                                        $query->where('user1_id', '=', $r_user_id)
                                        ->where('user2_id', '=', $current_user_id);
                                    })
                                ->orderBy('updated_at','DESC')
                    ->get();
            $message = new Message;
            if($conversations->count() > 0){
                $conversation = $conversations->first();
                $message->content = Input::get('content');
                $message->s_user_id = $current_user_id;
                $message->conversation_id = $conversation->id;
                $message->save();
                $conversation->updated_at = date('Y-m-d H:m:s');
                $conversation->save();
                return Redirect::to('message/'.$conversation->id);
            }else{
                $conversation = new Conversation;
                $conversation->user1_id = $current_user_id;
                $conversation->user2_id = Input::get('r_user_id');
                $conversation->save();
                $message->content = Input::get('content');
                $message->s_user_id = $current_user_id;
                $message->conversation_id = $conversation->id;
                $message->save();
                return Redirect::to('message/'.$conversation->id);
            }
            
        }
        return Redirect::to('/');
    }

    public function update($id) {
        
    }

}
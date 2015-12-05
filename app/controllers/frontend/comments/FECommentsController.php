<?php

class FECommentsController extends ResourceBaseController{

    public function create() {
        
    }

    public function destroy($id) {
        
    }

    public function edit($id) {
        
    }

    public function index() {
        
    }

    public function show($id) {
        
    }

    public function store() {
        $data = Input::all();
        $comment = new Comment;
        $comment['user_id'] = Session::get('user')['id'];
        $comment['content'] = $data['content'];
        $comment['entry_id'] = $data['entry_id'];
        $comment->save();
        if ($comment) {
            $user = $comment->user;
            $result = $comment->toArray();
            $result['status'] = 'success';
            $result['c_user_avatar'] = url($user->avatar);
            $result['c_user_fullname'] = $user->fullname;
            $result['c_user_path'] = url($user->account.'/profile');
        }else{
            $result['status'] = 'fail';
        }
        echo json_encode($result);
    }

    public function update($id) {
        
    }

}
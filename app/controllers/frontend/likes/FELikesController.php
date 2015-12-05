<?php

class FELikesController extends ResourceBaseController{
    public function create() {
        
    }

    public function destroy($id) {
        $like = Like::find($id);
        if(FEUsersHelper::isCurrentUser($like['user_id'])){
            $like->is_deleted = 1;
            $like->save();
            echo 'success';
        }else{
            echo 'fail';
        }
    }

    public function edit($id) {
        
    }

    public function index() {
        
    }

    public function show($id) {
        
    }

    public function store() {
        $entry_id = Input::get('entry_id');
        $user_id = Session::get('user')['id'];
        $like_id = FELikesHelper::getId($entry_id, $user_id, false);
        if($like_id){
            $like = Like::find($like_id);
            $like->is_deleted = 0;
            $like->save();
            $result = $like->toArray();
            $result['status'] = 'success';
            echo json_encode($result);
        }else{
            $like = new Like;
            $like->entry_id = $entry_id;
            $like['user_id'] = $user_id;
            $like->is_deleted = 0;
            $like->save();
            $result = $like->toArray();
            $result['status'] = 'success';
            echo json_encode($result);
        }
    }

    public function update($id) {
        
    }

}

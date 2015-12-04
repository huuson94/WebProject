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
        $comment = new Comments;
        $comment['user_comment'] = Session::get('user')['id'];
        $comment['content'] = $data['comment'];
        $comment['status_id'] = $data['status_id'];
        $comment->save();
        if ($comment) {
            echo "success";
        }else{
            echo "fail";
        }
    }

    public function update($id) {
        
    }

}
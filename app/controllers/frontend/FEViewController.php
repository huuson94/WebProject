<?php

class FEViewController extends BaseController {

	public function getIndex(){
		if (Session::has('user')) {
            $datas = $this->getViewDatas();
            
			return View::make('frontend/index')->with('datas',$datas);
		}
		return Redirect::to('login');
	}
    
    private function getViewDatas(){
        $datas['posts'] = $this->getPosts('Công khai');
        return $datas;
    }
    private function getPosts($name = "Công khai"){
        $privacy = Privacy::where('name',$name)->get()->first();
        if($privacy){
            return Post::orderBy('updated_at','DESC')->where('privacy','=',$privacy->id)->get();
        }else{
            return null;
        }
    }
}

<?php

class AlbumController extends BaseController {

	public function postDoUpload(){
		$data=Input::all();
		$album=new Album;
		$album['title']=$data['title'];
		$album['user_id']=Session::get('user')['id'];
		$album['public']=$data['public'];

		$file=Input::file('img');
		$folder_user=Session::get('user')['account'];
		$x=1;
		foreach ($file as $key => $f) {
			$name=uniqid().'.jpg';
			$f->move('upload/'.$folder_user,$name);
			if ($x==1) {
				$album['album_img']=$name;
				$x=0;
				$album->save();
			}

			list($width, $height) = getimagesize('upload/'.$folder_user.'/'.$name);

			$image=new Images;
			$image['path']=$name;
			$image['user_id']=Session::get('user')['id'];
			$image['album_id']=$album['id'];
			$image['width']=$width;
			$image['height']=$height;
			$image->save();
			

		}
		$data=Input::all();
		echo json_encode($file);
	}

	public function Photo($user){
		$this_user=Users::where('account',$user)->first();
		$album=Album::where('user_id',$this_user['id'])->orderBy('created_at','desc')->get();
		if ($this_user) {
			return View::make('frontend/photo/photo')
						->with('user',$this_user)
						->with('albums',$album);
		}else{
			return 'ko có user '.$user;
		}
	}

	public function Album($user){
		$this_user=Users::where('account',$user)->first();
		$album=Album::where('user_id',$this_user['id'])->orderBy('created_at','desc')->get();
		if ($this_user) {
			return View::make('frontend/photo/album')
						->with('user',$this_user)
						->with('albums',$album);
		}else{
			return 'ko có user '.$user;
		}
	}

	public function Album_detail($user,$album_id){
		$this_user=Users::where('account',$user)->first();
		$this_album=Album::where('id',$album_id)->first();
		$image=Images::where('album_id',$album_id)->orderBy('created_at','desc')->get();
		if ($this_user) {
			return View::make('frontend/photo/album-detail')
						->with('user',$this_user)
						->with('images',$image)->with('album',$this_album);
		}else{
			return 'ko có user '.$user;
		}
	}
}

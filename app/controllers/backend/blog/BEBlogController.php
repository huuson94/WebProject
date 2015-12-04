<?php
class BEBlogController extends BaseController{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        //
        $keyword = Input::get('keyword');
        $option = Input::get('search_opt');
       
        if($keyword && $option == "fullname"){
            $users = User::where('fullname','LIKE',"%$keyword%")->get();
            $users_id = array();
            foreach ($users as $key => $user) {
                $users_id[] = $user->id;
            }
             $blogs = Blog::whereIn('user_id',$users_id)->paginate(3);
        }
        if($keyword && $option == "content"){
            $blogs = Blog::select('*')->where($option,'LIKE',"%$keyword%")->paginate(3);
        }
        else{
        $blogs = Blog::select('*')->paginate(3);
        }
        return View::make('backend.blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //

        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        DB::table('blogs')->where('id', '=', $id)->delete();
        Session::flash('status',true);
        Session::flash('messages',array('Đã xóa blog'));
        return Redirect::route('admin.blog.index');
        
    }


}
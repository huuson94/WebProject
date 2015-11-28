<?php
class BEUsersController extends BaseController{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        //
        $sortby = Input::get('sortby');
        $order  = Input::get('order');
        if($sortby && $order){
            $users = User::select('*')->orderBy($sortby, $order)->paginate(8);
        }else{
        $users = User::select('*')->paginate(8);
    }
            return View::make('backend.users.index',compact('users', 'sortby', 'order'));

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
        $user = User::find($id);
        if (is_null($user)) {
            return Redirect::route('admin.user.index');
        }
        return View::make('backend.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //

        if(BEUsersHelper::validateUser()){
            $user = User::find($id);

            $name = Input::get('fullname');
            $phone = Input::get('phone');
            $is_admin = Input::get('is_admin');

            $user->fullname = $name;
            $user->phone = $phone;
            $user->is_admin = $is_admin;

            $user->save();
            Session::flash('status',true);
            return Redirect::route('admin.user.index');
        }
        else{
            Session::flash('status',false);
            return Redirect::route('admin.user.edit', $id)
                            ->withInput();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
        $user = User::find($id);
        // foreach($user->products as $product){
        //     $product->delete();
        // }
        if(BEUsersHelper::isCurrentUser($id)){
            Session::flush('current_user');
        }
        $user->delete();
        Session::flash('status',true);
        Session::flash('messages',array('Đã xóa user'));
        return Redirect::route('admin.user.index');
    }

    public function search(){
        $option = Input::get('search_opt');
        $keyword = Input::get('keyword');
        $users = User::select('*')->where($option,'LIKE','%'.$keyword.'%')->paginate(8);
            return View::make('backend.users.index')->with('users', $users);
    }

}
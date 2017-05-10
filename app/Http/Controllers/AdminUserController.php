<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminUser;
use Flash;
use Auth;
use App\Http\Requests\AdminUserRequest;
use App\Helper\AdminUserHelper;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->is_admin == 1) {

            $users = AdminUser::orderBy('id', 'DESC')->paginate(5);
            return view('admin.adminuser.index', ['users' => $users]);

        } else {
            return redirect('/');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->is_admin == 1) {

            return view('admin.adminuser.create');

        } else {
            return redirect('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUserRequest $request, AdminUserHelper $adminuserhelper)
    {


        $is_admin = $adminuserhelper->checkisadmin($request);

        AdminUser::create([
            'name' => $request['name'],
            'is_admin' => $is_admin,
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'activated' => "non",
        ]);

        if ($is_admin == 0) {

            $adminuserhelper->sendmail($request->email);

        }

        Flash::success('User saved successfully');

        return redirect(route('adminuser.index'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->is_admin == 1) {

            $user = AdminUser::find($id);

            if (empty($user)) {

                Flash::error('User not found');

                return redirect(route('adminuser.index'));

            }

            return view('admin.adminuser.edit', ['user' => $user]);

        } else {
            return redirect('/');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, AdminUserHelper $adminuserhelper)
    {
        $this->validate($request, [
            'credits' => 'required|numeric',
           ]);


        $is_admin = $adminuserhelper->checkisadmin($request);

        AdminUser::find($id)->update([
            'is_admin' => $is_admin,
            'credits' => $request['credits'],
        ]);

        Flash::success('User updated successfully');

        return redirect(route('adminuser.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AdminUser::find($id)->delete();

        Flash::success('User deleted successfully');

        return redirect(route('adminuser.index'));
    }
}

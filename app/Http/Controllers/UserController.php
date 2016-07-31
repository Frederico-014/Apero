<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::orderBy('id')->paginate(5);

        return view('admin.list', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'username'  =>'required',
            'email' =>'required|email',
            'password' =>'required|min:8'
        ]);

        $username=$request->username;
        $email=$request->email;
        $password=Hash::make($request->password);
        $role=$request->role;

        $new_user=[
            'username'=>$username,
            'email'=>$email,
            'password'=>$password,
            'role'=>$role,
        ];

        User::create($new_user);

        return redirect('admin/user')->with(['message'=>'Succes creation']);
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
        $user=User::find($id);
        $visitor='';
        $admin='';


        ($user->role == 'visitor')? $visitor = 'checked' :
            $admin = 'checked';

        return view('admin.editUser',compact('user','visitor','admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user=User::find($id);
        $user->update($request->all());

        return redirect('admin/user')->with(['message'=>'User updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return back()->with(['message'=>'User destroy']);
    }
}

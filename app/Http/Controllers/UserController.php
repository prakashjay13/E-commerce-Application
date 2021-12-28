<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        
        return view('users.index', compact('users'));
    }



    public function roles(){
        $data = Role::all();

        return view('users.create',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $validateReg = $req->validate([
            'firstname' => 'required|regex:/^[a-zA-Z ]{2,100}$/',
            'lastname' => 'required|regex:/^[a-zA-Z ]{2,100}$/',
            'email' => 'required|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/',
            'password' => 'required',
            'status' => 'required',
            'role' => 'required'
        ], [
            'firstname.required' => "Enter firstname",
            'firstname.regex' => "Alphabets only | 2-100 characters",

            'lastname.required' => "Enter lastname",
            'lastname.regex' => "Alphabets only | 2-100 characters",


            'email.required' => "Enter email",
            'email.regex' => "Enter valid format (example: abc@pqr.xyz)",

            'password.required' => "Enter password",

            'status.required' => "Select status",

            'role.required' => "Select role",

        ]);
        if ($validateReg) {

            $user = new User();
            $user->firstname = $req->firstname;
            $user->lastname = $req->lastname;
            $user->email = $req->email;
            $user->password = Hash::make($req->password);
            $user->status = $req->status;
            $user->role = $req->role;
            if ($user->save()) {

                return redirect('/users')->with('success', 'User added!');
            } 
            else {

                return back()->with('msg', 'Error registering user');
            }
        }
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
        //
        $user = User::find($id);

        return view('users.edit', compact('user')); 
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
        //
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'status'=>'required',
            'role'=>'required'
        ]);
        $user = User::find($id);
        $user->firstname =  $request->get('firstname');
        $user->lastname = $request->get('lastname');
        $user->email = $request->get('email');
        $user->password = $request->get('password');
        $user->status = $request->get('status');
        $user->role = $request->get('role');
        $user->save();

        return redirect('/users')->with('success', 'User updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->delete();

        return redirect('/users')->with('success', 'User deleted!');
    }
}

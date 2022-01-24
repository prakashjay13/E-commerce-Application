<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use App\Models\Role;
use App\Models\Order;

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
        $users = User::paginate(4);

        return view('users.index', compact('users'));
    }

    /**
     * for displaying the contact us messages
     *
     * @return void
     */
    public function contact()
    {
        $contacts = Contact::all();

        return view('users.contact', compact('contacts'));
    }


    /**
     * To fetch roles in user table
     *
     * @return void
     */
    public function roles()
    {
        $data = Role::all();

        return view('users.create', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = Role::all();

        return view('users.create', compact('data'));
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
            'password' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/',
            'cpass' => 'required_with:password|same:password',
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
            'password.regex' => "Minimum 8 characters | at least one uppercase letter, one lowercase letter and one number",

            'cpass.required_with' => "Re-enter password",
            'cpass.same' => "Password doesn't match",

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

                return redirect('/users')->with('msg', 'User added!');
            } else {

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
    public function show()
    {
        $contacts = Contact::paginate(4);

        return view('users.show', compact('contacts'));
    }

    /**
     * For showing checkout data
     *
     * @return void
     */
    public function checkout()
    {
        $checkout = Checkout::paginate(6);

        return view('orders.address', compact('checkout'));
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
        $data = Role::all();
        $user = User::findOrFail($id);

        return view('users.edit', compact('user', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        User::where('id', $req->id)->update([
            'firstname' => $req->firstname,
            'lastname' => $req->lastname,
            'email' => $req->email,
            'status' => $req->status,
            'role' => $req->role,

        ]);
        return redirect('/users')->with('msg', 'User updated!');
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
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/users')->with('msg', 'User deleted!');
    }
}

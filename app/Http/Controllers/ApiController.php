<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\EcommResource;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    public function register(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {

            return response()->json($validator->errors());
        } else {
            $user = new User();
            $user->firstname = $req->firstname;
            $user->lastname = $req->lastname;
            $user->email = $req->email;
            $user->password = Hash::make($req->password);
            $user->status = 1;
            $user->role = 'Customer';
            if ($user->save()) {

                return response(['user' => new EcommResource($user), 'msg' => 'Registered Successfully', "err" => 0]);
            } else {
                return response()->json(['msg' => 'Registration Failed']);
            }
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string|min:6'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        } else {
            if (!$token = auth()->guard('api')->attempt($validator->validated())) {
                return response()->json(['err' => 'email and password does not match to our records'], 401);
            }
            $users = User::where('email', $request->email)->first();
            return response()->json(['err' => 0, 'token' => $token, 'email' => $request->email, 'users' => $users], 200);
        }
    }
    public function respondWithToken($token)
    {
        return response()->json([
            'err' => 0,
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->guard('api')->factory()->getTTL() * 60
        ]);
    }

    public function profile()
    {
        return auth()->user();
    }


    public function contact(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'message' => 'required',
        ]);
        if ($validator->fails()) {

            return response()->json($validator->errors());
        } else {
            $contact = new Contact();
            $contact->name = $req->name;
            $contact->email = $req->email;
            $contact->mobile = $req->mobile;
            $contact->message = $req->message;
            if ($contact->save()) {

                return response(['contact' => new EcommResource($contact), 'msg' => 'We will get back to you shortly!', "err" => 1]);
            } else {
                return response()->json(['msg' => 'Message sending Failed']);
            }
        }
    }
}

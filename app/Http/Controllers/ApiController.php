<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\EcommResource;
use App\Models\User;
use App\Models\Contact;
use App\Models\Coupon;
use App\Models\Cms;
use App\Models\Configuration;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Checkout;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterUser;
use App\Mail\UserDetailstoAdmin;
use App\Mail\OrderDetails;
use App\Models\Wishlist;

class ApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'checkout', 'contact', 'coupon', 'cms', 'wishlist']]);
    }
    public function register(Request $req)
    {
        $admin = Configuration::where('email_type', '=', 'Admin')->first();
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

                Mail::to($req->email)->send(new RegisterUser($req->all()));
                Mail::to($admin->email)->send(new UserDetailstoAdmin($req->all()));


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
                return response()->json(['err' => 'email and password does not match to our records']);
            }
            $users = User::where('email', $request->email)->first();
            return response()->json(['err' => 0, 'msg' => 'You are logged in', 'token' => $token, 'email' => $request->email, 'users' => $users], 200);
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
        $profile = auth('api')->user();
        return response()->json(['profile' => $profile]);
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
            $contact->created_at = $req->created_at;
            if ($contact->save()) {

                return response(['contact' => new EcommResource($contact), 'msg' => 'We will get back to you shortly!', "err" => 1]);
            } else {
                return response()->json(['msg' => 'Message sending Failed']);
            }
        }
    }

    public function coupon()
    {
        $coupon = Coupon::all();

        return response()->json(['coupon' => $coupon]);
    }

    public function cms()
    {
        $cms = Cms::all();

        return response(['cms' => EcommResource::collection($cms), 'err' => 0]);
    }

    public function changepassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|min:6|max:12',
            'new_password' => 'required|min:6|max:12',
            'confirm_password' => 'required|min:6|max:12|same:new_password',

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        } else {
            $user = $request->user();
            if (Hash::check($request->old_password, $user->password)) {
                $user->update([
                    'password' => Hash::make($request->new_password)
                ]);
                return response()->json([
                    'message' => "password successfully updated",
                    'status' => 1
                ], 200);
            } else {

                return response()->json([
                    'message' => "old password does not match",
                ], 400);
            }
        }
        return response()->json([
            'message' => "password successfully updated",
            'status' => 1
        ]);
    }


    public function checkout(Request $req)
    {

        $users = User::where('email', $req->id)->first();
        $checkout = new Checkout();
        $checkout->name = $req->name;
        $checkout->email = $req->email;
        $checkout->address = $req->address;
        $checkout->mobile = $req->mobile;
        $checkout->bname = $req->bname;
        $checkout->bemail = $req->bemail;
        $checkout->baddress = $req->baddress;
        $checkout->bmobile = $req->bmobile;
        $checkout->checkoutamount = $req->camount;
        $checkout->user_id = $users->id;
        $u = $req->cart;

        foreach ($u as $c) {
            $order = new Order();
            $order->name = $c['name'];
            $order->price = $c['price'];
            $order->quantity = $c['quantity'];
            $order->status = "Processing";
            $order->tracking_id = rand();
            $order->user_id = $users->id;
            $order->save();
        }

        if ($checkout->save()) {
            // $orderdetails = Checkout::with(['Order'])->get();
            // $orderdetails = Checkout::join('orders', 'orders.user_id', '=', 'checkouts.user_id')->get(
            //     [
            //         'orders.name as oname',
            //         'orders.price as price',
            //         'orders.quantity as quantity',
            //         'orders.id as oid',
            //         'checkouts.email as email',
            //         'orders.tracking_id as trackid',
            //         'checkouts.address as address'
            //     ]
            // );

            // Mail::to($req->email)->send(new OrderDetails($orderdetails));

            return response(['checkout' => new EcommResource($checkout), 'msg' => 'SUBMITTED SUCESSFULLY', 'err' => 0]);
        } else {

            return response()->json(['msg' => 'failed regsitertaion']);
        }
    }

    public function wishlist(Request $req)
    {
        return $req;
        $user = User::where('email', $req->email)->first();
        $wishlist = new Wishlist();
        $wishlist->user_id = $user->id;
        $wishlist->product_id = $req->product_id;
        if ($wishlist->save()) {
            return response()->json(['msg' => 'Product added to wishlist']);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

class AdminController extends Controller
{
    //

    public function index()
    {
        $cards = \DB::table('cards')->get()->toArray();
        $admin = \DB::table('admins')->get()->toArray();

        return view('home', ['admin' => $admin, 'cards' => $cards]);
    }
    public function create()
    {
        return view('/admin');
    }


    public function login(Request $request)
    {


        $validateData = $request->validate(
            [
                     "email" => "required|email",
                     "password" => "required",
             ]);

        $admin = new Admin();
        $email = $request->input('email');
        $password = $request->input('password');

        $request->session()->put("email", $email);
        $request->session()->put("password", $password);
        $email = $request->session()->get("email");
        $email = $request->session()->get("password");

        $data = [
            'email'=>$email . '@admin',
            'password'=>$password,
        ];

        $admin = Admin::where('email','admin@admin')->get()->toArray();
        $admin = Admin::where('password','admin')->get()->toArray();
        foreach($admin as $a)
        {

            $email = $a['email'];
            $password = $a['password'];

        }

        if($data['email'] == $a['email'] && $data['password'] == $a['password'])
        {
           $cards = \DB::table('cards')->get()->toArray();
           return view('cards',['cards'=>$cards],$validateData);
        }else {
           echo "You don't have access. Try again.";
        }
    }
}

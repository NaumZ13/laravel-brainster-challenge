<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Newsletter;

class CompanyController extends Controller
{
    //

    public function index()
    {
        $cards = \DB::table('cards')->get();
        return view('home', ['cards' => $cards]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate(
            [
                     "number" => "required|numeric",
                     "company" => "required|max:30|alpha",
                     "email" => "email"
             ]);
        
         $company = new Company();
         $company->email = $request->email;
         if(!Newsletter::isSubscribed($request->email)){
            Newsletter::subscribePending($request->email);
           }
         $company->number = $request->number;
         $company->company = $request->company;
         $company->save();

         return view('/companies', ['company' =>$company], $validateData);

    }
}

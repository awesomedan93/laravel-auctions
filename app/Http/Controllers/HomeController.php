<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['show','sendEmail']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('dashboard.pages.home');
        return redirect('/dashboard/auctioneers');
    }

    public function sendEmail(Request $request)
    {
        $inputData = $request->all();

        $to = "musteata.daniel@yahoo.com";
        $headers = "From: info@auctionsinatlanta.com";
        $msg = '<span style="font-weight: bold">Message:</span> '.$inputData['comment']. "\n".'<span style="font-weight: bold">Phone:</span> '.$inputData['phone'];
        $success = mail($to,$inputData['name'],$msg,$headers);

        if($success){
            $request->session()->flash('alert-success', 'Email has been sent!');
        }else{
            $request->session()->flash('alert-danger', 'Something wrong!');
        }
        return Redirect::to('/contact#message');
    }

    public function saveBusiness(Request $request)
    {
        dd($request->all());
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

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
        $headers = "From: ".$inputData['email'];
        $msg = $inputData['comment']. "\n"."Phone: ".$inputData['phone'];
        $sended = mail($to,$inputData['name'],$msg,$headers);
        dd($sended);
    }
}

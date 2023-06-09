<?php

namespace App\Http\Controllers;

use App\Models\Auctioneer;
use App\Models\AuctionHouse;
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
        $this->middleware('auth', ['except'=>['show','sendEmail','saveBusiness']]);
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
        $msg = 'Message: '.$inputData['comment']. "\n".'Phone: '.$inputData['phone'];
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

        $this->validate($request, [
            'business_type' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'city' => 'required'
        ]);

        $inputData = $request->all();
        $inputData['type'] = 'submitted';

        if($inputData['business_type'] == 'auctioneer'){
            $business = new Auctioneer();
        }else{
            $business = new AuctionHouse();
        }

        $business->fill($inputData);
        $saved = $business->save();

        if($saved){
            return response()->json(['status' => 'success']);
        }else{
            return response()->json(['status' => 'failed']);
        }

    }
}

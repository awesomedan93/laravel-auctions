<?php

namespace App\Http\Controllers;

use App\Models\Auctioneer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuctioneersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except'=>['show','showAll']]);
    }

    /**
     * Show all auctioneers on frontend
     */
    public function showAll()
    {
        $auctioneers = Auctioneer::all()->where('type','=','regular');

        return view('frontend.pages.auctioneers')->with('auctioneers', $auctioneers);
    }

    public function index()
    {
        $auctioneers = Auctioneer::orderByRaw("FIELD(type, \"submitted\", \"regular\")")->get();

        return view('dashboard.pages.auctioneers.list')->with('auctioneers', $auctioneers);
    }

    public function create()
    {
        return view('dashboard.pages.auctioneers.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'slug' => "required|unique:auctioneers,slug"
        ]);

        $inputData = $request->all();
        $inputData['user_id'] = Auth::user()->id;

        $client = new Auctioneer();
        $client->fill($inputData);
        $saved = $client->save();

        if($saved){
            return redirect()->route('auctioneers.index');
        }
    }

    public function show($slug)
    {
        $auctioneer = Auctioneer::where([['type','=','regular'], ['slug','=',$slug]])->firstOrFail();

        return view('frontend.pages.auctioneer')->with('auctioneer',$auctioneer);
    }

    public function edit($id)
    {
        $auctioneer = Auctioneer::findOrFail($id);

        return view('dashboard.pages.auctioneers.edit')->with('auctioneer',$auctioneer);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'slug' => "required|unique:auctioneers,slug,{$id}"
        ]);

        $inputData = $request->all();
        $inputData['user_id'] = Auth::user()->id;

        $updated = Auctioneer::find($id)->update($inputData);

        if($updated){
            return redirect()->route('auctioneers.index');
        }
    }

    public function destroy($id)
    {
        try {
            Auctioneer::find($id)->delete();

            return response()->json('',200);
        }
        catch (\Exception $e) {

            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 403 );
        }
    }

    public function approve($id)
    {

        $inputData['user_id'] = Auth::user()->id;
        $inputData['type'] = 'regular';

        $updated = Auctioneer::findOrFail($id)->update($inputData);

        if($updated){
            return redirect()->route('auctioneers.index');
        }
    }
}

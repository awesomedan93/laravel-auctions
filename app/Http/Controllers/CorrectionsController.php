<?php

namespace App\Http\Controllers;

use App\Models\Correction;
use Illuminate\Http\Request;

class CorrectionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except'=>['show']]);
    }


    public function index()
    {
        $corrections = Correction::all();

        return view('dashboard.pages.corrections.list')->with('corrections', $corrections);
    }

    public function store(Request $request)
    {

        $inputData = $request->all();

        $correction = new Correction();
        $correction->fill($inputData);
        $saved = $correction->save();

        if($saved){
            return redirect()->route('auctioneers.index');
        }
    }

    public function destroy($id)
    {
        try {
            Correction::find($id)->delete();

            return response()->json('',200);
        }
        catch (\Exception $e) {

            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 403 );
        }
    }

}

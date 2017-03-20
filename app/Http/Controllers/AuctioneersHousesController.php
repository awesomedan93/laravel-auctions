<?php


namespace App\Http\Controllers;

use App\Models\AuctioneersHouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class AuctioneersHousesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show all auctioneers on frontend
     */
    public function showAll()
    {

        $auctioneerHouses = AuctioneersHouse::all();

        return view('frontend.pages.auctioneers-houses')->with('auctioneerHouses', $auctioneerHouses);
    }

    public function index()
    {
        $auctioneerHouses = AuctioneersHouse::all();

        return view('dashboard.pages.auctionhouses.list')->with('auctioneerHouses', $auctioneerHouses);
    }

    public function create()
    {
        return view('dashboard.pages.auctionhouses.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email'
        ]);

        $inputData = $request->all();
        $inputData['user_id'] = Auth::user()->id;

        $client = new AuctioneersHouse();
        $client->fill($inputData);
        $saved = $client->save();

        if($saved){
            return redirect()->route('auctioneer-houses.index');
        }
    }

    public function show($id)
    {
        $auctioneerHouse = AuctioneersHouse::findOrFail($id);

        return view('frontend.pages.auctioneer-house')->with('auctioneerHouse',$auctioneerHouse);
    }

    public function edit($id)
    {
        $auctioneerHouse = AuctioneersHouse::find($id);

        return view('dashboard.pages.auctionhouses.edit')->with('auctioneerHouse',$auctioneerHouse);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email'
        ]);

        $inputData = $request->all();
        $inputData['user_id'] = Auth::user()->id;

        $updated = AuctioneersHouse::find($id)->update($inputData);

        if($updated){
            return redirect()->route('auctioneer-houses.index');
        }
    }

    public function destroy($id)
    {
        $deleted = AuctioneersHouse::find($id)->delete();

        if($deleted){
            return redirect()->route('auctioneer-houses.index');
        }
    }
}
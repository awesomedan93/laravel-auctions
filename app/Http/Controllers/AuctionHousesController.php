<?php


namespace App\Http\Controllers;

use App\Models\AuctionHouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class AuctionHousesController extends Controller
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
        $auctionHouses = AuctionHouse::all()->where('type','=','regular');

        return view('frontend.pages.auction-houses')->with('auctionHouses', $auctionHouses);
    }

    public function index()
    {
        $auctionHouses = AuctionHouse::orderByRaw("FIELD(type, \"submitted\", \"regular\")")->get();

        return view('dashboard.pages.auctionhouses.list')->with('auctionHouses', $auctionHouses);
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
            'email' => 'required|email',
            'slug' => "required|unique:auctioneers,slug"
        ]);

        $inputData = $request->all();
        $inputData['user_id'] = Auth::user()->id;

        $client = new AuctionHouse();
        $client->fill($inputData);
        $saved = $client->save();

        if($saved){
            return redirect()->route('auction-houses.index');
        }
    }

    public function show($slug)
    {
        $auctionHouse = AuctionHouse::where([['type','=','regular'], ['slug','=',$slug]])->firstOrFail();

        return view('frontend.pages.auctioneer-house')->with('auctionHouse',$auctionHouse);
    }

    public function edit($id)
    {
        $auctionHouse = AuctionHouse::findOrFail($id);

        return view('dashboard.pages.auctionhouses.edit')->with('auctionHouse',$auctionHouse);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'slug' => "required|unique:auctioneers,slug"
        ]);

        $inputData = $request->all();

        $inputData['user_id'] = Auth::user()->id;

        $updated = AuctionHouse::find($id)->update($inputData);

        if($updated){
            return redirect()->route('auction-houses.index');
        }
    }

    public function destroy($id)
    {
        try {
            AuctionHouse::find($id)->delete();

            return response()->json('',200);
        }
        catch (\Exception $e) {

            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 403 );
        }
    }

    public function approve($id)
    {

        $inputData['user_id'] = Auth::user()->id;
        $inputData['type'] = AuctionHouse::REGULAR_AUCTION_HOUSE;

        $updated = AuctionHouse::findOrFail($id)->update($inputData);

        if($updated){
            return redirect()->route('auctioneers.index');
        }
    }
}
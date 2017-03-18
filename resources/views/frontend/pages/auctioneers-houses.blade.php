@extends('frontend.layouts.default')
@section('content')
    <div class="wrapper row3">
        <main class="hoc container clear">
            <!-- main body -->

            <div class="content">
                <h1>Auctions & Auction Houses in the Atlanta Georgia Area</h1>
                <ul>
                    @foreach($auctioneerHouses as $auctioneerHouse)
                        <li><a href="{{ URL("/auctioneers-houses/$auctioneerHouse->id") }}">{{ $auctioneerHouse->name }}</a></li>
                    @endforeach
                </ul>
            </div>

        <!-- / main body -->
            <div class="clear"></div>
        </main>
    </div>


@endsection
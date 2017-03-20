@extends('frontend.layouts.default')
@section('content')
    <div class="wrapper row3">
        <main class="hoc container clear">
            <!-- main body -->

            <div class="content">

                <h1>Auctioneers & Auction Companies in Atlanta, GA</h1>
                <ul>
                    @foreach($auctioneers as $auctioneer)
                        <li><a href="{{ url("/auctioneers/$auctioneer->id") }}">{{ $auctioneer->name }}</a></li>
                    @endforeach
                </ul>

            </div>

        <!-- / main body -->
            <div class="clear"></div>
        </main>
    </div>


@endsection
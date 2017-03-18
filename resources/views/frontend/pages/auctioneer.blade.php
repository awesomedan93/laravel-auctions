@extends('frontend.layouts.default')
@section('content')
    <div class="wrapper row2">
        <div id="breadcrumb" class="hoc clear">
            <!-- ################################################################################################ -->
            <ul>
                <li><a href="{{ url('/auctioneers') }}">Auctioneers</a></li>
                <li><a href="#">{{ $auctioneer->name }}</a></li>
            </ul>
            <!-- ################################################################################################ -->
        </div>
    </div>

    <div class="wrapper row3">
        <main class="hoc container clear">
            <!-- main body -->

            <div class="content">

                <h1>Auctioneers & Auction Companies in Atlanta, GA</h1>
                <ul>
                    {{ var_dump($auctioneer) }}
                </ul>

            </div>

        <!-- / main body -->
            <div class="clear"></div>
        </main>
    </div>


@endsection
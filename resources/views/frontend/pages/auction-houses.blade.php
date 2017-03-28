@extends('frontend.layouts.default')

@section('page_title','Auction Houses')
@section('page_meta_description','Auctions & Auction Houses in the Atlanta Georgia Area')

@section('content')
    <div class="wrapper row3">
        <main class="hoc container clear">
            <!-- main body -->

            <div class="content">

                @include('frontend.partials.adsbygoogle')

                <h1>Auctions & Auction Houses in the Atlanta Georgia Area</h1>
                <ul class="no-padding">
                    <table>
                        <thead>
                        <tr>
                            <th class="column-name">Name</th>
                            <th class="responsive-column column-address">Address</th>
                            <th class="responsive-column column-phone">Phone</th>
                            <th class="responsive-column column-email">Email</th>
                            <th class="responsive-column-mid column-info">More Info</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($auctionHouses as $auctionHouse)

                            <tr>
                                <td class="column-name"><a href="{{ url("/auction-houses/$auctionHouse->id") }}">{{ $auctionHouse->name }}</a></td>
                                <td class="responsive-column column-address">{{ $auctionHouse->address }}</td>
                                <td class="responsive-column column-phone">{{ $auctionHouse->phone }}</td>
                                <td class="responsive-column column-email">{{ $auctionHouse->email }}</td>
                                <td class="responsive-column-mid column-info"><a href="{{ url("/auction-houses/$auctionHouse->id") }}">More Info</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </ul>
            </div>

        <!-- / main body -->
            <div class="clear"></div>
        </main>
    </div>


@endsection
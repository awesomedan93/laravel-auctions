@extends('frontend.layouts.default')
@section('content')
    <div class="wrapper row3">
        <main class="hoc container clear">
            <!-- main body -->

            <div class="content">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- Auctions in Atlanta responsive -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-1471799681191680"
                     data-ad-slot="4230987934"
                     data-ad-format="auto"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
                <h1>Auctions & Auction Houses in the Atlanta Georgia Area</h1>
                <ul class="no-padding">
                    <table>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th class="responsive-column column-address">Address</th>
                            <th class="responsive-column">Phone</th>
                            <th class="responsive-column">Email</th>
                            <th class="responsive-column-mid">More Info</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($auctionHouses as $auctionHouse)

                            <tr>
                                <td><a href="{{ url("/auction-houses/$auctionHouse->id") }}">{{ $auctionHouse->name }}</a></td>
                                <td class="responsive-column column-address">{{ $auctionHouse->address }}</td>
                                <td class="responsive-column">{{ $auctionHouse->phone }}</td>
                                <td class="responsive-column">{{ $auctionHouse->email }}</td>
                                <td class="responsive-column-mid"><a href="{{ url("/auction-houses/$auctionHouse->id") }}">More Info</a></td>
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
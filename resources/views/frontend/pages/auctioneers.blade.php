@extends('frontend.layouts.default')
@section('content')
    <div class="wrapper row3">
        <main class="hoc container clear">
            <!-- main body -->

            <div class="content">

                @include('frontend.partials.adsbygoogle')

                <h1>Auctioneers & Auction Companies in Atlanta, GA</h1>
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
                        @foreach($auctioneers as $auctioneer)

                            <tr>
                                <td><a href="{{ url("/auctioneers/$auctioneer->id") }}">{{ $auctioneer->name }}</a></td>
                                <td class="responsive-column">{{ $auctioneer->address }}</td>
                                <td class="responsive-column"><a class="inherit-color" href="tel:{{ $auctioneer->phone }}">{{ $auctioneer->phone }}</a></td>
                                <td class="responsive-column"><a class="inherit-color" href="mailto:{{ $auctioneer->email }}">{{ $auctioneer->email }}</a></td>
                                <td class="responsive-column-mid"><a href="{{ url("/auctioneers/$auctioneer->id") }}">More Info</a></td>
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
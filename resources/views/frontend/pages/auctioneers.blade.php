@extends('frontend.layouts.default')

@section('page_title')
    <title>Auctioneers</title>
@endsection

@section('page_meta_description')
    <meta name="Description" Content="Auctioneers & Auction Companies in Atlanta, GA">
@endsection

@section('content')
    <div class="wrapper row3">
        <main class="hoc container clear">
            <!-- main body -->

            <div class="content">

                @include('frontend.partials.adsbygoogle')

                <h1 class="title-business">Auctioneers & Auction Companies in Atlanta, GA</h1>
                <span class="info-text">Contact us <a href="{{ url('/contact') }}">here</a> to report a correction or click here to add your business for free</span>
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
                        @foreach($auctioneers as $auctioneer)

                            <tr>
                                <td class="column-name"><a href="{{ url("/auctioneers/$auctioneer->id") }}">{{ $auctioneer->name }}</a></td>
                                <td class="responsive-column column-address">{{ $auctioneer->address }}</td>
                                <td class="responsive-column column-phone"><a class="inherit-color" href="tel:{{ $auctioneer->phone }}">{{ $auctioneer->phone }}</a></td>
                                <td class="responsive-column column-email"><a class="inherit-color" href="mailto:{{ $auctioneer->email }}">{{ $auctioneer->email }}</a></td>
                                <td class="responsive-column-mid column-info"><a href="{{ url("/auctioneers/$auctioneer->id") }}">More Info</a></td>
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
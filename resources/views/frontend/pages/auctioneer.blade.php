@extends('frontend.layouts.default')

@section('page_title')
{{ $auctioneer->name }} in {{ $auctioneer->city }}, Georgia GA
@endsection

@section('page_meta_description')
    {{ $auctioneer->address }}
@endsection

@section('content')
    <div class="wrapper row2">
        <div id="breadcrumb" class="hoc clear">

            <ul>
                <li><a href="{{ url('/auctioneers') }}">Auctioneers</a></li>
                <li><a href="#">{{ $auctioneer->name }}</a></li>
            </ul>

        </div>
    </div>

    <div class="wrapper row3">
        <main class="hoc container clear no-top-padding">
            <!-- main body -->

            <div class="content">

                @include('frontend.partials.adsbygoogle')

                <h1>{{ $auctioneer->name }}</h1>

                <div class="left-block">
                    <p>
                        <strong>Address:</strong>
                        {{ $auctioneer->address }}
                    </p>
                    <p>
                        <strong>Phone number</strong>
                        {{ $auctioneer->phone }}
                    </p>
                    <p>
                        <strong>Email address</strong>
                        {{ $auctioneer->email }}
                    </p>

                    @if(!empty($auctioneer->website))
                        <p>
                            <a href="{{ addhttp($auctioneer->website) }}" target="_blank">Visit their website</a>
                        </p>
                    @endif

                    @include('frontend.partials.adsbygoogle')

                </div>

                <div class="right-block">
                    <div id="map"></div>
                </div>

            </div>

        <!-- / main body -->
            <div class="clear"></div>
        </main>
    </div>


@endsection

@section('custom-footer-js')
    <script>
        var geocoder;
        var map;
        function initialize() {
            geocoder = new google.maps.Geocoder();

            var mapOptions = {
                zoom: 14,
                center: new google.maps.LatLng(33.79398504493932, -84.39353942871094)
            }
            map = new google.maps.Map(document.getElementById('map'), mapOptions);

            var address = '2381 John Glenn Drive Chamblee, GA 30341';
            geocoder.geocode( { 'address': address}, function(results, status) {
                if (status == 'OK') {
                    map.setCenter(results[0].geometry.location);
                    var marker = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location
                    });
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }

    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXlBaKMHpXArLGHk4MrTs6TuTFEN1OA1A&callback=initialize">
    </script>
@endsection
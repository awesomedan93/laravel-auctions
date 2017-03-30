@extends('frontend.layouts.default')

@section('page_title')
<title>{{ $auctionHouse->name }} in {{ $auctionHouse->city }}, GA</title>
@endsection

@section('page_meta_description')
<meta name="Description" Content="{{ $auctionHouse->name }} is an auction house in {{ $auctionHouse->city }} at {{ $auctionHouse->address }}">
@endsection

@section('content')
    <div class="wrapper row2">
        <div id="breadcrumb" class="hoc clear">

            <ul>
                <li><a href="{{ url('/auction-houses') }}">Auction Houses</a></li>
                <li><a href="#">{{ $auctionHouse->name }}</a></li>
            </ul>

        </div>
    </div>

    <div class="wrapper row3">
        <main class="hoc container clear no-top-padding">
            <!-- main body -->

            <div class="content">

                @include('frontend.partials.adsbygoogle')

                <h1 class="float-left">{{ $auctionHouse->name }}</h1>
                <span class="bootstrap-styles">
                        <button type="button" class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#correction-modal">Report Corrections</button>
                </span>
                <div class="clear-both"></div>
                <div class="left-block">
                    <p>
                        <strong>Address:</strong>
                        {{ $auctionHouse->address }}
                    </p>
                    <p>
                        <strong>Phone number:</strong>
                        {{ $auctionHouse->phone }}
                    </p>
                    <p>
                        <strong>Email address:</strong>
                        {{ $auctionHouse->email }}
                    </p>
                    <p>
                        <strong>Website:</strong>
                        <a href="{{ addhttp($auctionHouse->website) }}" target="_blank">{{ $auctionHouse->website }}</a>
                    </p>

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
    <div class="bootstrap-styles">
        <!-- Modal Success -->
        <div class="modal fade" id="submit-business-success" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title pull-left">Success..</h3>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <div class="modal-body">

                        <label>One of the members of our team will review your post in the shortest possible time</label><br><br>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Submit Corrections -->
        <div class="modal fade"  id="correction-modal" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h3 class="modal-title">Report Corrections</h3>
                        <form id="correction-form">

                            <div class="form-group">
                                <textarea class="form-control" name="text" placeholder="Write corrections and updates here..." rows="8" required=""></textarea>
                            </div>
                            <input type="submit" class="btn btn-primary pull-right" value="Submit">
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @include('frontend.partials.correction')
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
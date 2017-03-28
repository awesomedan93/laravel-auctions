@extends('frontend.layouts.default')

@section('page_title')
<title>{{ $auctioneer->name }} in {{ $auctioneer->city }}, Georgia GA</title>
@endsection

@section('page_meta_description')
    <meta name="Description" Content="{{ $auctioneer->name }} is an auctioneer in {{ $auctioneer->city }} at {{ $auctioneer->address }}">
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

                <h1 class="float-left">{{ $auctioneer->name }}</h1>
                <span class="bootstrap-styles">
                        <button type="button" class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#report-modal">Report Corrections</button>
                </span>
                <div class="clear-both"></div>
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
                            <strong>Website: </strong>
                            <a href="{{ addhttp($auctioneer->website) }}" target="_blank">{{ $auctioneer->website }}</a>
                        </p>
                    @endif
                    <p>

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

    <!-- Large modal -->
    <div class="bootstrap-styles">
        <!-- Modal -->
        <div class="modal fade"  id="report-modal" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h3 class="modal-title">Report Corrections</h3>
                        <form method="POST" action="/" accept-charset="UTF-8">
                            <input name="_token" type="hidden" value="MB5EA5hsQAoxBMhsYCwf9CR9UA4byeVe7ejOepkT">
                            <input type="hidden" name="casa_id" value="2369">
                            <div class="form-group">
                                <textarea class="form-control" name="report" placeholder="Write corrections and updates here..." rows="8" required=""></textarea>
                            </div>
                            <input type="submit" class="btn btn-primary pull-right" value="Submit">
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
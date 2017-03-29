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
            <span class="info-text">
                Contact us <a href="#" data-toggle="modal" data-target="#report-modal">here</a> to report a correction or click <a href="#" data-toggle="modal" data-target="#add-business-modal">here</a> to add your business for free
            </span>
            <span class="bootstrap-styles">
                <button type="button" id="#add-business-modal" class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#add-business-modal">Add your business</button>
            </span>
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
<!-- Modal Submit Corrections -->
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
    <!-- Modal Submit Business Success -->
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

    <!-- Modal Add Business -->
    <div class="modal fade"  id="add-business-modal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3 class="modal-title">Add your business</h3>
                    <form id="new-business-form" method="POST" action="/" accept-charset="UTF-8">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Business type</label>
                                    <select class="form-control" name="business-type">
                                        <option value="auctioneer">Auctioneer</option>
                                        <option value="auction-house">Auction House</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">* Name</label>
                                    <input type="text" class="form-control" name="name" required="">
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control" name="city">
                                </div>

                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="tel" class="form-control" name="phone">
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email">
                                </div>

                                <div class="form-group">
                                    <label>Website</label>
                                    <input type="url" class="form-control" name="website">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="address">Address</label>

                                    <div class="input-group">
                                        <input type="text" name="address" id="address" placeholder="Address" class="form-control">
                                        <input type="hidden" name="lat" id="lat" value="">
                                        <input type="hidden" name="lng" id="lng" value="">

                                        <span class="input-group-btn">
                                          <button type="button" class="btn btn-success btn-flat" onclick="codeAddress()">Add marker!</button>
                                        </span>
                                    </div>

                                </div>

                                <div id="map-front">

                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    $('#add-business-modal').on('show.bs.modal', function (event) {
        initialize();
    });

    $('#new-business-form').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });

    $("#address").keyup(function(event){
        if(event.keyCode == 13){
            codeAddress();
        }
    });
</script>
<script>

    function initialize() {

        window.map = null;
        window.marker = null;

        var latlng = new google.maps.LatLng(33.7489954, -84.3879824);
        var mapOptions = {
            zoom: 10,
            center: latlng
        }
        window.map = new google.maps.Map(document.getElementById("map-front"), mapOptions);

        google.maps.event.addListener(window.map, 'click', function(event) {
            //If marker is already added change position on click

            if(window.marker && window.marker.setPosition){
                window.marker.setPosition(event.latLng);
                //Else place marker
            } else {
                window.marker = placeMarker(event.latLng);
            }
            document.getElementById("lng").value = event.latLng.lng();
            document.getElementById("lat").value = event.latLng.lat();
        });

        setTimeout(function () {
            google.maps.event.trigger(window.map, 'resize');
            map.setCenter(latlng);
        }, 300)

        function placeMarker(location) {

            window.marker = new google.maps.Marker({
                position: location,
                map: window.map,
                draggable:true
            });
            google.maps.event.addListener(window.marker, 'dragend', function (event) {

                document.getElementById("lng").value = this.getPosition().lng();
                document.getElementById("lat").value = this.getPosition().lat();
            });
            return window.marker;
        }
    }

    function codeAddress() {
        var geocoder = null;
        geocoder = new google.maps.Geocoder();
        var address = document.getElementById('address').value;
        var loc=[];

        geocoder.geocode( { 'address': address}, function(results, status) {
            if (status == 'OK') {
                window.map.setCenter(results[0].geometry.location);

                if(window.marker && window.marker.setPosition){
                    window.marker.setPosition(results[0].geometry.location);

                }else{
                    window.marker = new google.maps.Marker({
                        map: window.map,
                        position: results[0].geometry.location,
                        draggable:true
                    });
                }

                document.getElementById("lng").value = results[0].geometry.location.lng();
                document.getElementById("lat").value = results[0].geometry.location.lat();
                google.maps.event.addListener(window.marker, 'dragend', function (event) {

                    document.getElementById("lng").value = this.getPosition().lng();
                    document.getElementById("lat").value = this.getPosition().lat();
                });

            } else {

                var errorMessage = 'Geocode was not successful for the following reason: ' + status;
                sweetAlert("Oops...", errorMessage, "error");
            }
        });
    }

</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#new-business-form :submit").click(function(e){

        e.preventDefault();

        var formData = {
            business_type: $("select[name='business-type'] option:selected").val(),
            name: $("input[name='name']").val(),
            city: $("input[name='city']").val(),
            phone: $("input[name='phone']").val(),
            email: $("input[name='email']").val(),
            website: $("input[name='website']").val(),
            address: $("input[name='address']").val(),
            lat: $("input[name='lat']").val(),
            lng: $("input[name='lng']").val(),
        }

        var url = "{{ route('submitBusiness') }}";

        $.ajax({
            method: "POST",
            url: url,
            data: formData,
            success: function(data){
                if(data.status == 'success'){
                    $('#add-business-modal').modal('hide');
                    $('#submit-business-success').modal('show');
                }else if(data.status == 'failed'){
                    alert("Error on query!");
                }
            },
            error: function(data){
                var errors = data;
                console.log(errors);
            }
        });
    });
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXlBaKMHpXArLGHk4MrTs6TuTFEN1OA1A">
</script>
@endsection
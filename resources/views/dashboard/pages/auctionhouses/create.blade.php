@extends('dashboard.default')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add auctioneers house
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Auctioneers Houses</a></li>
                <li class="active">Add new</li>
            </ol>
            <br>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- form start -->
                <form action="{{ route('auction-houses.store') }}" method="POST" role="form" id="auctioneers-form">
                    <!-- left column -->
                    <div class="col-md-6">

                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Auctioneers house details</h3>
                            </div>
                            <!-- /.box-header -->

                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" name="city" id="city" placeholder="City">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="text" class="form-control" name="website" id="website" placeholder="Website">
                                </div>

                            </div>
                            <!-- /.box-body -->

                        </div>
                        <!-- /.box -->
                        <button type="submit" class="btn btn-primary">Save</button>

                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Location</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
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

                                <div id="dashboard-map">

                                </div>
                            </div>
                            <!-- /.box-body -->

                        </div>
                        <!-- /.box -->

                    </div>
                    <!--/.col (right) -->
                </form>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
@section('custom-footer-js')
    <script>
        var geocoder;
        var map;
        var marker = null;

        function initialize() {
            geocoder = new google.maps.Geocoder();
            var latlng = new google.maps.LatLng(33.7489954, -84.3879824);
            var mapOptions = {
                zoom: 8,
                center: latlng
            }
            map = new google.maps.Map(document.getElementById('dashboard-map'), mapOptions);

            google.maps.event.addListener(map, 'click', function(event) {
                //If marker is already added change position on click
                if(marker && marker.setPosition){
                    window.marker.setPosition(event.latLng);
                    //Else place marker
                } else {
                    marker = placeMarker(event.latLng);
                }
                document.getElementById("lng").value = event.latLng.lng();
                document.getElementById("lat").value = event.latLng.lat();
            });

            function placeMarker(location) {
                marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    draggable:true
                });
                google.maps.event.addListener(marker, 'dragend', function (event) {

                    document.getElementById("lng").value = this.getPosition().lng();
                    document.getElementById("lat").value = this.getPosition().lat();
                });
                return marker;
            }
        }

        function codeAddress() {
            var address = document.getElementById('address').value;
            var loc=[];

            geocoder.geocode( { 'address': address}, function(results, status) {
                if (status == 'OK') {
                    map.setCenter(results[0].geometry.location);

                    if(marker && marker.setPosition){
                        window.marker.setPosition(results[0].geometry.location);

                    }else{
                        marker = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location,
                            draggable:true
                        });
                    }

                    document.getElementById("lng").value = results[0].geometry.location.lng();
                    document.getElementById("lat").value = results[0].geometry.location.lat();
                    google.maps.event.addListener(marker, 'dragend', function (event) {

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
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXlBaKMHpXArLGHk4MrTs6TuTFEN1OA1A&callback=initialize">
    </script>
@endsection()
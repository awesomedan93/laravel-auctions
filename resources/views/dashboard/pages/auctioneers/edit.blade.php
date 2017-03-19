@extends('dashboard.default')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit auctioneer
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Auctioneers</a></li>
                <li class="active">Edit Auctioneer</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- form start -->
                {{ Form::model($auctioneer, ['method'=>'PATCH', 'route' => ['auctioneers.update', $auctioneer->id], 'id'=>'auctioneers-form']) }}
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Auctioneer Information</h3>
                        </div>
                        <!-- /.box-header -->


                            {{ csrf_field() }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $auctioneer->name }}" id="name" placeholder="Enter name">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" name="phone" value="{{ $auctioneer->phone }}" id="phone" placeholder="Phone">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ $auctioneer->email }}" id="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="text" class="form-control" name="website" value="{{ $auctioneer->website }}" id="website" placeholder="Website">
                                </div>

                            </div>
                            <!-- /.box-body -->


                    </div>
                    <!-- /.box -->
                    <button type="submit" class="btn btn-primary">Submit</button>
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
                                    <input type="hidden" name="lat" id="lat" value="0">
                                    <input type="hidden" name="lng" id="lng" value="0">

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
                {{ Form::close() }}
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
@section('custom-footer-js')
    <script>
        $('#auctioneers-form').on('keyup keypress', function(e) {
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
        var geocoder;
        var map;
        var marker = null;

        function initialize() {
            geocoder = new google.maps.Geocoder();
            var latlng = new google.maps.LatLng(-34.397, 150.644);
            var mapOptions = {
                zoom: 8,
                center: latlng
            }
            map = new google.maps.Map(document.getElementById('dashboard-map'), mapOptions);
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
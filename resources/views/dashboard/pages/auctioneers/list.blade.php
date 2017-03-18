@extends('dashboard.default')

@section('custom-css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Page Header
                <small>Optional description</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Auctioneers</a></li>
                <li class="active">Show all auctioneers</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Auctioneers list</h3>
                            <a href="{{ route('auctioneers.create') }}" role="button" class="btn btn-success btn-md pull-right">Create</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($auctioneers as $auctioneer)
                                    <tr>
                                        <td>{{ $auctioneer->id }}</td>
                                        <td>{{ $auctioneer->name }}</td>
                                        <td>{{ $auctioneer->address }}</td>
                                        <td>{{ $auctioneer->phone }}</td>
                                        <td>{{ $auctioneer->email }}</td>
                                        <td>{{ $auctioneer->created_at }}</td>
                                        <td>
                                            <a href="#" role="button" class="btn btn-link btn-xs">View</a>
                                            <a href="{{ URL::action('AuctioneersController@edit', [$auctioneer->id]) }}" role="button" class="btn btn-primary btn-xs">Edit</a>

                                            {{ Form::open(['route' => ['auctioneers.destroy', $auctioneer->id], 'method' => 'delete', 'id'=>'auctioneer-form-delete', 'style'=>'display:inline;']) }}
                                                <button type="submit" id="button-delete-auctioneer" class="btn btn-danger btn-xs">Delete</button>
                                            {{ Form::close() }}

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

@section('custom-footer-js')
    <!-- DataTables -->
    <script src="{{ asset('assets/dashboard/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <!-- page script -->
    <script>
        $(function () {
            $('#example1').DataTable();
        });
    </script>
    <script>

        $("#button-delete-auctioneer").click(function(e){
            e.preventDefault();
            swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this auctioneer!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel plx!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm){
                    if (isConfirm) {
                        swal("Deleted!", "The auctioneer has been deleted.", "success");
                        setTimeout(function() {
                            $('#auctioneer-form-delete').submit();
                        }, 2000);
                    } else {
                        swal("Cancelled", "", "error");
                    }
                });
        });
    </script>
@endsection
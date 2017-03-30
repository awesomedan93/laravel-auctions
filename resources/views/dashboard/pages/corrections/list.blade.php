@extends('dashboard.default')

@section('page_title','Corrections list')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Corrections
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                @foreach($corrections as $correction)
                    <div class="col-sm-5 col-md-3">
                        <input type="hidden" name="id" value="{{ $correction->id }}">
                        <div class="box">
                            <div class="box-header">
                                {{ $correction->created_at }}
                                <a href="#" class="btn btn-danger btn-xs pull-right button-delete-correction" data-id="{{ $correction->id }}">Remove</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <strong style="word-wrap: break-word">{{ $correction->text }}</strong>
                                <br>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                @endforeach
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

@section('custom-footer-js')
    <!-- page script -->

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".button-delete-correction").click(function(e){
            var id = $(this).data('id');



            e.preventDefault();
            swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this correction!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel plx!",
                    closeOnConfirm: false,
                    closeOnCancel: true
                },
                function(isConfirm){
                    if (isConfirm) {

                        var url = "{{ asset('dashboard/corrections') }}/" + id;

                        $.ajax({
                            method: "DELETE",
                            url: url,
                            success: function(data){
                                swal("Deleted!", "The correction has been deleted.", "success");
                                $("input[name=id][value=" + id + "]").parent().remove();
                            },
                            error: function(data){
                                var errors = data;
                                console.log(errors);
                                swal("Error", errors, "error");
                            }
                        });
                    } else {
                        swal("Cancelled", "", "error");
                    }
                });
        });
    </script>
@endsection
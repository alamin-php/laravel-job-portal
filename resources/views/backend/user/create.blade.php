@extends('layouts.app')
@section('title', 'Profile')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>User</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add New User</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form id="add_form" class="form-horizontal" action="{{ route('user.store') }}" method="POST">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Enter name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="Enter email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="Enter password" required>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary pull-right btn-sm"><i
                                        class="fa fa-plus-circle"></i> Save</button>
                            </div>
                            <!-- /.box-footer -->
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('body').on('submit', function () {
        $('.loader').removeClass('d-none');
        $('.submit-btn').addClass('d-none');
        });
            $('#add_form').submit(function(e) {
                e.preventDefault();
                var url = $(this).attr('action');
                var request = $(this).serialize();
                $.ajax({
                    url: url,
                    cache: false,
                    type: 'post',
                    async: false,
                    data: request,
                    success: function(data) {
                        toastr.success("User created successfully");
                        $('#add_form')[0].reset();
                    }
                });
            });
        });
    </script>
@endpush

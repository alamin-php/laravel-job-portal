@extends('layouts.app')
@section('title', 'Profile')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>User</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> User</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update User</h3>
                            <a href="{{route('user')}}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-undo"></i> Back</a>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form id="update_form" class="form-horizontal" action="{{route('user.update')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="profileName" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" id="profileName"
                                            value="{{ $user->name }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="profileEmail" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control" id="profileEmail"
                                            value="{{ $user->email }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="profilePhone" class="col-sm-2 control-label">Phone</label>
                                    <div class="col-sm-10">
                                        <select name="type" id="type" class="form-control">
                                            <option value="">Select One</option>
                                            <option value="super" @if('super' == $user->type) selected @endif>Super Admin</option>
                                            <option value="admin" @if('admin' == $user->type) selected @endif>Admin</option>
                                            <option value="author" @if('author' == $user->type) selected @endif>Author</option>
                                            <option value="user" @if('user' == $user->type) selected @endif>User</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary pull-right btn-sm"><i
                                        class="fa fa-plus-circle"></i> Update</button>
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
        $('#update_form').submit(function(e) {
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
                    toastr.success(data);
                    // $('#update_form')[0].reset();
                }
            });
        });
    });
</script>
@endpush

@extends('layouts.app')
@section('title', 'Job Edit')
@push('css')
<link rel="stylesheet" href="{{ asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Job</h1>
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
                            <h3 class="box-title">Edit Job</h3>
                            <a href="{{route('job')}}" class="btn btn-primary btn-sm pull-right"><i class="fa fa-undo"> Back</i></a>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form id="update_form" class="form-horizontal" action="{{ route('job.update', $job->id) }}" method="POST">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Job Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="title" class="form-control" id="title"
                                            value="{{$job->title}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="company" class="col-sm-2 control-label">Company</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="company" class="form-control" id="company"
                                        value="{{$job->company}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="location" class="col-sm-2 control-label">Location</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="location" class="form-control" id="location"
                                        value="{{$job->location}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="education" class="col-sm-2 control-label">Education</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="education" class="form-control" id="education"
                                        value="{{$job->education}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="experience" class="col-sm-2 control-label">Experience</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="experience" class="form-control" id="experience"
                                        value="{{$job->experience}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="requirment" class="col-sm-2 control-label">Requirment</label>
                                    <div class="col-sm-10">
                                        <textarea name="requirment" id="requirment" class="textarea"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $job->requirment }}</textarea>
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
<script src="{{ asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('body').on('submit', function () {
        $('.loader').removeClass('d-none');
        $('.submit-btn').addClass('d-none');
        });
        $('.textarea').wysihtml5()
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
                        $('#update_form')[0].reset();
                    }
                });
            });
        });
    </script>
@endpush

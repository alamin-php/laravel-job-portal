@extends('layouts.frontend.app')
@section('title', 'All Job')
@section('content')
<section class="mt-3">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title text-center">Welcome to Job Portal</h5>
        </div>
        <div class="card-body">
            <div class="row">

                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5>{{ $job->title }}</h5>
                            <strong>{{$job->company}}</strong>
                            <p class="p-0 m-0"> <i class="fa-solid fa-location-dot"></i> {{$job->location}}</p>
                            <p class="p-0 m-0"><i class="fa-solid fa-graduation-cap"></i> {{$job->education}}</p>
                            <p class="p-0 m-0"><i class="fa fa-briefcase" aria-hidden="true"></i>
                                At least {{$job->experience}} Year(s)</p>
                            <p><b>Requirments:</b> {!! $job->requirment !!}</p>
                            <a href="{{route('job.apply', $job->id)}}" class="btn btn-success btn-sm float-end">Click to apply</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

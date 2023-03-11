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
                @foreach ($jobs as $job)
                <div class="col-md-6 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5>{{ $job->title }}</h5>
                            <strong>{{$job->company}}</strong>
                            <p class="p-0 m-0"> <i class="fa-solid fa-location-dot"></i> {{$job->location}}</p>
                            <p class="p-0 m-0"><i class="fa-solid fa-graduation-cap"></i> {{$job->education}}</p>
                            <p class="p-0 m-0"><i class="fa fa-briefcase" aria-hidden="true"></i>
                                At least {{$job->experience}} Year(s)</p>
                            {{-- <a href="{{route('job.apply', $job->id)}}" class="btn btn-success btn-sm float-end">Click to apply</a> --}}
                        </div>
                        <div class="card-footer bg-white">
                            @php
                            $job_id = $job->id;
                            $user_id = Auth::id();
                                $check_apply = DB::table('applies')->where('job_id', $job_id)->where('user_id', $user_id)->first();
                            @endphp
                            @if($check_apply)
                            <span class="text-warning fst-italic"><i class="fa fa-check"></i> Already applied</span>
                            @else
                            <a href="{{route('job.details', $job->id)}}" class="btn btn-success btn-sm float-end">View Details</a>
                            @endif

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="card-footer float-end bg-white">
            {{$jobs->links()}}
        </div>
    </div>
</section>
@endsection

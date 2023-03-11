@extends('layouts.frontend.app')
@section('title', 'Job Apply')
@section('content')
    <section class="mt-3">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title text-center">Job Apply</h5>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-6 mt-3">
                        <div class="card">
                            <div class="card-header text-left">
                                <h4><i class="fa fa-file"></i> Online Apply</h4>
                                <h5 class="mx-3">{{ $job->company }}</h5>
                                <h6 class="mx-3">{{ $job->title }}</h6>
                            </div>
                            <div class="card-body">
                                <form id="apply_form" action="{{route('job.post')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="job_id" id="job_id" value="{{ $job->id }}">
                                    <input type="hidden" name="user_id" id="user_id" value="{{ Auth::id() }}">
                                    <div class="form-group">
                                        <input type="number" class="form-control from-control-sm" name="salary" id="salary" placeholder="Enter your salary" required>
                                    </div>
                                    <div class="form-check mt-3">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required>
                                        <label class="form-check-label" for="defaultCheck1">
                                            I have read the above warning
                                        </label>
                                    </div>
                                    <div class="form-group mt-3">
                                        @php
                                        $job_id = $job->id;
                                        $user_id = Auth::id();
                                            $checkApply = DB::table('applies')->where('job_id', '=', $job_id)->where('user_id', '=', $user_id)->first();
                                        @endphp
                                        @if ($checkApply)
                                        <button type="submit" class="btn btn-success btn-sm float-end" disabled >Already Applyed</button>
                                        @else
                                        <button type="submit" class="btn btn-success btn-sm float-end">Apply</button>
                                        @endif

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
@push('scripts')
    <script>
            $('#apply_form').submit(function(e) {
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
                        toastr.success('Apply Successfylly');
                        $('#apply_form')[0].reset();
                    }
                });
            });
    </script>
@endpush

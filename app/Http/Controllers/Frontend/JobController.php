<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    public function index()
    {
        $jobs = DB::table('jobs')->where('status','=', 'active')->latest()->paginate(20);
        return view('frontend.job.all_job',compact('jobs'));
    }
    public function jobDetails($id)
    {
        $job = DB::table('jobs')->where('id','=', $id)->first();
        // dd($jobs);
        return view('frontend.job.job_details',compact('job'));
    }

}

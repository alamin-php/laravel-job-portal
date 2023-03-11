<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ApplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function jobApply($id)
    {
        $job = DB::table('jobs')->where('id', $id)->first();
        return view('frontend.job.apply', compact('job'));
    }

    public function jobPost(Request $request)
    {
        $job_id  = $request->job_id;
        $user_id = $request->user_id;
        $checkApply = DB::table('applies')->where('job_id', '=', $job_id)->where('user_id', '=', $user_id)->first();
        if($checkApply){
            return redirect()->back();
        }else{
            date_default_timezone_set('Asia/Dhaka');
            $data=array();
            $data['job_id']    = $job_id;
            $data['user_id']   = $user_id;
            $data['salary']    = $request->salary;
            $data['apply_at']  = date('Y-m-d');
            DB::table('applies')->insert($data);
        }
        return redirect()->back();
        toastr.success('Apply Successfylly');
    }
}

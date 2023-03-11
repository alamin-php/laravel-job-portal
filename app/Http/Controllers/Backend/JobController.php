<?php

namespace App\Http\Controllers\Backend;

use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        if($request->ajax()){
            $job = DB::table('jobs')->latest()->get();
            return DataTables::of($job)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                return '
                <a href="'.route('job.edit', [$row->id]).'" class="btn btn-xs btn-primary edit"><i
                                                    class="fa fa-edit"></i></a>
                <a href="'.route('job.destroy', [$row->id]).'" class="btn btn-circle btn-xs btn-danger" id="delete_job"><i class="fa fa-trash"></i></a>
                ';
            })
            ->editColumn('created_at', function($row){
                if($row->created_at){
                    $post_date = strtotime($row->created_at);
                    return date('d-F-Y', $post_date);
                }
            })
            ->editColumn('status', function($row){
                if($row->status == 'active'){
                    return 'Published';
                }elseif($row->status == 'inactive'){
                    return 'Unpublish';
                }
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('backend.job.index');
    }
    public function myJob(Request $request){
        if($request->ajax()){
            $id = Auth::id();
            $myJob = DB::table('applies')
            ->join('jobs', 'applies.job_id', '=', 'jobs.id')
            ->join('users', 'applies.user_id', '=', 'users.id')
            ->select('applies.*', 'jobs.title', 'jobs.company', 'jobs.location', 'jobs.education', 'jobs.requirment')
            ->where('applies.user_id', $id)->latest()->get();
            return DataTables::of($myJob)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                return '
                <a href="'.route('job.edit', [$row->id]).'" class="btn btn-xs btn-primary edit"><i
                                                    class="fa fa-edit"></i></a>
                <a href="'.route('job.destroy', [$row->id]).'" class="btn btn-circle btn-xs btn-danger" id="delete_job"><i class="fa fa-trash"></i></a>
                ';
            })
            ->editColumn('created_at', function($row){
                if($row->created_at){
                    $post_date = strtotime($row->created_at);
                    return date('d-F-Y', $post_date);
                }
            })
            ->editColumn('status', function($row){
                if($row->status == 'pending'){
                    return 'Pending';
                }else{
                    return 'Approved';
                }
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('backend.job.my_job');
    }
    // create
    public function create()
    {
        return view('backend.job.create');
    }
    // store
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Dhaka');
        $data               = array();
        $data['title']      = $request->title;
        $data['company']    = $request->company;
        $data['location']   = $request->location;
        $data['education']  = $request->education;
        $data['experience'] = $request->experience;
        $data['requirment'] = $request->requirment;
        $data['created_at'] = date('Y-m-d');
        DB::table('jobs')->insert($data);
        return response()->json('Job Created Successfully');
    }
    // edit
    public function edit($id)
    {
        $job = DB::table('jobs')->where('id', $id)->first();
        return view('backend.job.edit',compact('job'));
    }
    // edit
    public function update(Request $request, $id)
    {
        date_default_timezone_set('Asia/Dhaka');
        $data               = array();
        $data['title']      = $request->title;
        $data['company']    = $request->company;
        $data['location']   = $request->location;
        $data['education']  = $request->education;
        $data['experience'] = $request->experience;
        $data['requirment'] = $request->requirment;
        $data['updated_at'] = date('Y-m-d');
        DB::table('jobs')->where('id', $id)->update($data);
        return response()->json('Job Updated Successfully');
    }
    // destroy
    public function destroy($id)
    {
        DB::table('jobs')->delete($id);
        return response()->json('Job Deleted Successfully');
    }

}

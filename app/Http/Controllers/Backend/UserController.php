<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DataTables;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request){
        // $users = DB::table('users')->get();
        // dd($users);
        if($request->ajax()){
            $user = DB::table('users')->latest()->get();
            return DataTables::of($user)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                return '
                <a href="'.route('user.edit', [$row->id]).'" class="btn btn-xs btn-primary edit"><i
                                                    class="fa fa-edit"></i></a>
                <a href="'.route('user.destroy', [$row->id]).'" class="btn btn-circle btn-xs btn-danger" id="delete_user"><i class="fa fa-trash"></i></a>
                ';
            })
            ->editColumn('type', function($row){
                if($row->type == 'super'){
                    return 'Super Admin';
                }elseif($row->type == 'admin'){
                    return 'Admin';
                }elseif($row->type == 'author'){
                    return 'Author';
                }elseif($row->type == 'user'){
                    return 'User';
                }
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        return view('backend.user.index');
    }

    public function profile()
    {
        $id = Auth::id();
        $profile = DB::table('users')->where('id', $id)->first();
        return view('backend.user.profile', compact('profile'));
    }

    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return view('backend.user.edit', compact('user'));
    }

    public function create()
    {
        return view('backend.user.create');
    }

    public function store(Request $request)
    {
        $data              = array();
        $data['name']      = $request->name;
        $data['email']     = $request->email;
        $data['password']  = Hash::make($request->password);
        DB::table('users')->insert($data);
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $data           = array();
        $id             = $request->id;
        $data['name']   = $request->name;
        $data['email']  = $request->email;
        $data['phone']  = $request->phone;
        $data['bio']    = $request->bio;
        if($request->type){
            $data['type']   = $request->type;
        }
        DB::table('users')->where('id', $id)->update($data);
        return response()->json('User Updated Successfully');
    }
    public function destroy($id)
    {
        DB::table('users')->delete($id);
        return response()->json('User Deleted Successfully');
    }
}

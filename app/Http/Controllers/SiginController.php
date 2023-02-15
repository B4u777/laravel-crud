<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Signin;
use Illuminate\Support\Facades\Hash;
use DataTables;

class SiginController extends Controller
{

    public function index()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        if(isset($request) && !empty($request)){
            $id = $request->id;
            $user_name = $request->user_name;
            $user_email = $request->user_email;
            $user_password = Hash::make($request->user_password);

            $book   =   Signin::updateOrCreate(
                [
                    'id' => $id
                ],
                [
                    'user_name' => $user_name , 
                    'user_email' => $user_email,
                    'user_password' => $user_password,
                ]
            );
            if($book){
                return response()->json(['success' => true]);
            }else{
                return response()->json(['success' => false]);
            }
        }
        return response()->json(['success' => false]);
    }
    public function list(Request $request)
    {
        return view('list');
    }
    public function getdata(Request $request)
    {
        if ($request->ajax()) {
            $data = Signin::latest()->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){

            $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editPost">Edit</a>';

            $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deletePost">Delete</a>';

            return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
    }
    public function edit(Request $request)
    {   
        $where = array('id' => $request->id);
        $book  = Signin::where($where)->first();
        return response()->json($book);
    }
    public function destroy(Request $request)
    {
        Signin::find($request->id)->delete();
        return response()->json(['success'=>'Post deleted successfully.']);
        
    }

}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UserData;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use DataTables;

class UserDataController extends Controller
{
    public function index()
    {
        return view('user-form');
    }

    
    public function upload_file($image){
        
        if(isset($image)){
            $filename = time() . '.' . $image->extension();
            $image->move(public_path('frontend/uploads'), $filename);
            return $filename;
        }
    }


    public function StoreUser(Request $request)
    {
        if(isset($request) && !empty($request)){
            $user_id = $request->user_id;
            $user_name = $request->name;
            $user_email = $request->email;
            $user_password = $request->pwd;
            if(isset($request->image)){
              $user_image=$this->upload_file($request->image);
            }elseif(isset($request->new_image)){
                $user_image=$this->upload_file($request->new_image);

            }else{
                $user_image=$request->user_avatar;

            }
            $user_language = $request->language;
            $result=UserData::updateOrCreate(
                [     
                    'user_id' => $user_id,
				],
                [
                    'user_name' => $user_name , 
                    'user_email' => $user_email,
                    'user_pwd' => $user_password,
                    'user_language' => $user_language,
                    'user_image' => $user_image,
                ]
            );
            if($result){
                return response()->json(['status' => 'success']);
            }else{
                return response()->json(['status' => false]);
            }
        }
        return response()->json(['status' => false]);
    }


    public function UserList(Request $request)
    {
        return view('user-list');
    }


    public function getUserData(Request $request)
    {
        if ($request->ajax()) {
            $data = UserData::latest()->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('image', function ($row) {
                $url= asset('frontend/uploads/'.$row->user_image);
                return ' '.$url.' ';
            })
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->user_id.'" data-original-title="Edit" class="btn btn-info btn-sm editbtn">Edit</a>';
                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->user_id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteBtn">Delete</a>';
                return $btn;
            })->rawColumns(['action'])
            ->make(true);
        }
    }

    // get user data by id function

    public function getUserDataById(Request $request)
    {   
        if(isset($request->editId)){
            $where = array('user_id' => $request->editId);
            $result = UserData::where($where)->first();
            return response()->json($result);
        }
        
    }

    // Delete user by id function

    public function DeleteUser(Request $request)
    {
        UserData::find($request->deleteId)->delete();
        return response()->json(['status'=>'success']);
        
    }







}

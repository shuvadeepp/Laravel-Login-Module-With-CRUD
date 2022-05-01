<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 

class crudController extends Controller
{
    //insert Querty:
    public function insert_data(Request $request)
    {
        $request->validate([
            'user_id' => 'required|max:30',
            'user_name' => 'required|max:30',
            // 'password' => 'required|gt:3|lt:9'
            'password' => 'required|max:30',
        ]);

        $input  = $request->all();

        if($input['_hidden'] == null)
        {
            // insertQuery:
            $status = 1;
            $input = $request->all();
            $res = DB::table('user_details')->insert(['user_id'=>$input['user_id'],'password'=>$input['password'],'user_name'=>$input['user_name'],'user_role_id'=>$input['user_role_id']]);
            return redirect('dashboard')->with('user added',"Succesfully Registered"); 

        }elseif($input['_hidden'] != null && $input['_hidden'] > 0){
            // UpdateQuery:
            $_hidden = $request->input('_hidden');
            $user_id = $request->input('user_id');
            $password = $request->input('password');
            $user_name = $request->input('user_name');
            $user_role_id = $request->input('user_role_id');
            $editQuery = DB::update('UPDATE user_details SET user_id = ?,password=?,user_name=?,user_role_id=? WHERE id = ?',[$user_id,$password,$user_name,$user_role_id, $_hidden]);
            // return view('dashboard', ['editQuery'=>$editQuery]);
            return redirect('dashboard')->with('user updated',"Succesfully"); 

        }
        else{
            return redirect('dashboard')->with('alregister',"Duplicate Found");
        }
    }

    //View Query:
    public function view_data()
    {
        $viewQeury = DB::select('SELECT * FROM user_details'); #This is bind for table view all data.
        $dropQuery=DB::select('SELECT * FROM user_role'); #This is bind for dropdown. 
        return view('dashboard',['viewQeury'=>$viewQeury, 'dropQuery'=>$dropQuery]);
    }
     
    //Delete Query:
    public function destroy($id) 
    {
        DB::table('user_details')->where('id', $id)->delete();
        return redirect('/dashboard');
    }
}
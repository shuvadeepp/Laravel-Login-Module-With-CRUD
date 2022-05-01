<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;

class loginController extends Controller
{

    public function index()
    {
        return view('login');
    }
    public function loginChk(Request $request)
    {
        // $status = 1;
        // dd($request);
        // exit;
        $input = $request->all();
        $request->validate([
            'user_name' => 'required|max:30',
            'password' => 'required'
        ]);

        $loginVar = DB::table('user_details')
                    ->where('user_name',$request->user_name)
                    ->where('password',$request->password)
                    ->first();
        $count    = count((array)$loginVar);
        // dd($loginVar);
        if($count != null && $loginVar->user_role_id == 1 )
        {
            // dd("hello");
            $request->session()->put('id',$loginVar->id);
            $request->session()->put('user_name',$loginVar->user_name);
            $request->session()->put('user_role_id',$loginVar->user_role_id);
            $loginQuery = DB::table('user_details AS UD')
                    ->selectRaw('UD.*,UR.user_role')
                    ->leftJoin('user_role as UR','UD.user_role_id','UR.user_role')
                    ->where('UD.user_role_id','<>',1)->get();
            return redirect("/dashboard")->with(['success',"Succesfully Logged in"]);  
        }
        else{
            return redirect("/login")->with('failed',"Not Authorised Person");
        }
        // dd($loginVar);
    }

    public function logoutChk(Request $request)
    {
        // dd($request);
        $request = session()->forget(['id','user_name','user_role_id']);
        $request = session::flush();
        return redirect('/login');
    }
}

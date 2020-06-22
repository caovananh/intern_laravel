<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DB;

//load model and rename
use App\User as Item_model;
use App\UserModel;

class UserController extends Controller
{
    
    public function login(Request $request) {
        $data ='';
        if(isset($_POST['submit'])) {
            DB::enableQueryLog();
            $username = $request->input('username');
            $password = md5($request->input('password'));
    
            $checkLogin = DB::table('user')->where(['password' => $password ])
                                            ->where(function($query) 
                                            {
                                                $query->where(['username' => $username ])
                                                      ->orwhere(['email' => $username ]);
                                            })->count();
            echo ($checkLogin);
            
            dd(DB::getQueryLog());
            if(count($checkLogin) > 0 ) {
                return redirect('http://localhost/blog/public/dashboard.html');
            } else {
                $data = "Thông tin đăng nhập sai";
            }
        }
         return view('admin.login',['msg' => $data]);
    }

    

    public function register(Request $request) {
        if(isset($_POST['submit'])) {
           
            $data = [
                'email'      =>$request->input('email'),
                'username'   =>$request->input('username'),
                'password'   =>md5($request->input('password')),
                'phone'      =>$request->input('phone'),
                'address'    =>$request->input('address'),
                'level'      =>0,
            ];

            DB::table('user')->insert($data);
        }
        return view('admin.register');
    }

    public function logout() {

    }

    public function dashboard() {
        return view('admin.dashboard');
    }

}


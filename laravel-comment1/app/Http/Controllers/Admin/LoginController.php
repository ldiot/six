<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

class LoginController extends CommonController
{
    public function login()
    {
        //echo 11111111111111;
        if ($input = Input::all()) {
             //dd($input);
            $user = User::first();
            if ($user->username != $input['username'] || Crypt::decrypt($user->password) != $input['password']) {
                return back()->with('message','账号或密码错误');
            }
            session(['user'=>$user]);
            //dd(session('user'));
            return view('admin.comment');
        } else {
            //session(['user'=>null]);
            return view('admin.login');
        }
    }

    public function quit()
    {
        //echo 1111111111;
        session(['user'=>null]);
        return redirect('admin/login');
    }
}

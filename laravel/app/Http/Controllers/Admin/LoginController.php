<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    //
    function  login(Request $request)
    {
        if ($input = Input::all()) {
            if (!empty($user=DB::table('user')->where('email', $input['email'])->get())) {
                return back()->with('message', '该邮箱已经注册过')->withInput();
            } else {
                if (!empty($user=DB::table('user')->where('username', $input['username'])->get())) {
                    return back()->with('message', '该用户名已被使用，请另输入用户名')->withInput();
                } else {
                    DB::table('user')->insert([
                        'email' => $input['email'],
                        'username'=> $input['username'],
                        'password' => $input['password']
                    ]);
                    return view('admin/login')->with('message','注册成功，请登录');
                }
            }
        }else {
            return view('admin.login');
        }
    }

    function home()
    {
        if ($input = Input::all()) {
            //dd($request->all());
            if (!empty($user=DB::table('user')->where('username', $input['username'])->get()))
            {
                //dd($user[0]->username);
                if ($user[0]->password!=$input['password']) {
                    return redirect('admin/login')->with('message', '密码错误');
                } else {
                    $user = DB::table('user')->where('username', $input['username'])->get();
                    //dd($user);
                    //dd($user[0]->id);
//                    if ($user[0]->id == 4) {
//                        echo 1111111111111;
//                    }
                    session(['id'=>$user[0]->id]);
                    //$i = session('id');
                    //dd($i);
                    if ($user[0]->id <= 4) {
                        //$monolog = Log::getMonolog();
                        //var_dump($monolog);
                        return view ('admin.home', compact('monolog'))->with('message', '管理员用户名为'.$user[0]->username.'，你已登陆成功');
                    } elseif ($user[0]->id <= 10) {
                        //echo 11111111111111;
                        return redirect('admin/teacher')->with('message', '老师用户名为'.$user[0]->username.'，你已登陆成功');
                        //return redirect('admin/teacher', ['message', '老师用户名为'.$user[0]->username.'，你已登陆成功']);
                    } else {
                        return redirect('admin/student')->with('message', '同学用户名为'.$user[0]->username.'，你已登陆成功');
                    }
                    //return view('admin/home')->with('message', '登陆成功')->with('id', $user[0]->id);
                }
            } else {
                //session('message', 'hhhhhhhhhhhhhhhh');
                //dd(session('message'));
                //return redirect('admin/login')
                return redirect('admin/login')->with('message', '该用户不存在');
                //$message = '登陆成功';
                //return redirect('admin/login', ['message' => '登陆成功']);
                //$message = '该用户不存在';
                //return redirect('admin/login', compact('message'));
                //return redirect()->action('LoginController@login', ['message' => '该用户不存在']);
            }
        } else {
            //return view('admin.login');
            return redirect('admin/login');
        }
    }

    function register()
    {
        return view('admin.register');
    }

    function main()
    {
        $datas = DB::table('announcement')->get();
        return view('admin.main', compact('datas'));
    }

    function student()
    {
        return view('admin.student');
    }

    function teacher()
    {
        //echo 11111111111111;
        return view('admin.teacher');
    }
}























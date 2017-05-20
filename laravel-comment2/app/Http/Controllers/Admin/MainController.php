<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class MainController extends Controller
{
    //

    public function homepage()
    {
        error_reporting(E_ALL^E_NOTICE);
        //$pdo = DB::connection()->getPdo();
//        dd($pdo);
        $datas = DB::table('comment')->get();
        foreach ($datas as $data) {
            if (!empty($data->title)) {
                $questions[] = $data;
            }
        }
        foreach ($questions as $question) {
            $userasks[] = DB::table('user')->where('id', '=', $question->pidu)->get();
            $titles[] = $question->title;
            $ids[] = $question->id;
        }
        foreach ($userasks as $ones) {
            foreach ($ones as $one) {
                $usernames[] = $one->username;
            }
        }
        for ($i=0; $i<3; $i++) {
            $arrs[$i]['title'] = $titles[$i];
            $arrs[$i]['username'] = $usernames[$i];
            $arrs[$i]['id'] = $ids[$i];
        }
//        dd($ids);
        return view('admin.homepage',compact('arrs'));
    }

    public function content(Request $request)
    {
        $id = $request->input('id');
        $questions = DB::table('comment')->where('id', '=', $id)->get();
        $answers = DB::table('comment')->where('pidc', '=', $id)->get();
        foreach ($questions as $question) {
            $useraskids = $question->pidu;
            $userasks = DB::table('user')->where('id', '=', $useraskids)->get();
        }
        foreach ($answers as $answer) {
            $useranswerids[] = $answer->pidu;
        }
        foreach ($useranswerids as $useranswerid) {
            $useranswers[] = DB::table('user')->where('id', '=', $useranswerid)->get();
        }
        foreach ($useranswers as $useranswer) {
            foreach ($useranswer as $one) {
                $arrs[] = $one->username;
            }
        }
        foreach ($answers as $answer) {
            $arrs2[] = $answer->content;
        }
        for ($i=0; $i<count($arrs); $i++) {
            $arrays[$i]['answer'] = $arrs2[$i];
            $arrays[$i]['useranswer'] = $arrs[$i];
        }
        //dd();

        return view('admin.content', compact('questions','answers', 'userasks', 'arrays', 'id'));
    }

    public function comment()
    {
        $input = Input::except('_token');
        DB::table('comment')->insert([]})
        //dd($input);
    }

    public function register()
    {
        //dd($request);
        if (!empty($input=Input::except('_token'))) {
            if ($input['password'] == $input['confirmpass']) {
                if (DB::table('user')->where('username','=', $input['username'])->get()) {
                    return back()->with('message', '用户已存在，请重起用户名');
                } else {
                    $insert = DB::table('user')->insert(
                        ['username' => $input['username'], 'password' => $input['password']]
                        );
                    if ($insert) {
                        $message = '注册成功，请登录';
//                        dd($message);
                        return view('admin.login', compact('message',$message));

                    }
                }
            } else {
                return back()->with('message', '请仔细核对密码');
            }
        } else {
            return view('admin.register');
        }
    }

    public function  login()
    {
        if (!empty($input=Input::except('_token'))) {
            if (!empty($input['username']) && !empty($input['password'])) {
            $users = DB::table('user')->where('username', '=', $input['username'])->get();
            //dd($users);
            foreach ($users as $user) {
                $username = $user->username;
            }

            session(['username'=>$username]);
            error_reporting(E_ALL^E_NOTICE);
            //$pdo = DB::connection()->getPdo();
//        dd($pdo);
            $datas = DB::table('comment')->get();
            foreach ($datas as $data) {
                if (!empty($data->title)) {
                    $questions[] = $data;
                }
            }
            foreach ($questions as $question) {
                $userasks[] = DB::table('user')->where('id', '=', $question->pidu)->get();
                $titles[] = $question->title;
                $ids[] = $question->id;
            }
            foreach ($userasks as $ones) {
                foreach ($ones as $one) {
                    $usernames[] = $one->username;
                }
            }
            for ($i=0; $i<3; $i++) {
                $arrs[$i]['title'] = $titles[$i];
                $arrs[$i]['username'] = $usernames[$i];
                $arrs[$i]['id'] = $ids[$i];
            }
            return view('admin.loginin',compact('arrs','username'));
            } else {
                $message = '请先登录,再评论';
                return view('admin.login', compact('message', $message));
            }
        } else {
            return view('admin.login');
        }
    }

    public function logincontent(Request $request)
    {
        $id = $request->input('id');
        $questions = DB::table('comment')->where('id', '=', $id)->get();
        $answers = DB::table('comment')->where('pidc', '=', $id)->get();
        foreach ($questions as $question) {
            $useraskids = $question->pidu;
            $userasks = DB::table('user')->where('id', '=', $useraskids)->get();
        }
        foreach ($answers as $answer) {
            $useranswerids[] = $answer->pidu;
        }
        foreach ($useranswerids as $useranswerid) {
            $useranswers[] = DB::table('user')->where('id', '=', $useranswerid)->get();
        }
        foreach ($useranswers as $useranswer) {
            foreach ($useranswer as $one) {
                $arrs[] = $one->username;
            }
        }
        foreach ($answers as $answer) {
            $arrs2[] = $answer->content;
        }
        for ($i=0; $i<count($arrs); $i++) {
            $arrays[$i]['answer'] = $arrs2[$i];
            $arrays[$i]['useranswer'] = $arrs[$i];
        }
        //dd();
        return view('admin.logincontent', compact('questions','answers', 'userasks', 'arrays', 'id'));
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class CommentController extends CommonController
{
    public function comment()
    {
        //echo 1111111111111;
        return view('admin.comment');
    }

    public function doComment()
    {
        //echo 11111111111111;
        $input = Input::except('_token');
        //if (!empty($input['title'])||!empty($input['comment'])) {
            //dd($input);
            $input['pid'] = session('user')['id'];
            //dd($input);
            if (DB::table('comment')->insert($input)) {
                //echo '提交成功';
                //$data = '提交成功';
                //return view('admin.comment');
                return view('admin.comment')->with('message', '提交成功');
                //return redirect('admin.comment')->with('message','提交成功');
            }
    }
}






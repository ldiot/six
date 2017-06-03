<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use Excel;

class TeacherController extends Controller
{
    //
    public function Information()
    {
       // $id = session('id');
        //$data = DB::table('user')->where('id', $id)->get();
        //$id = session('id');
        $datas2 = DB::table('announcement')->get();

//        $datas2 = DB::table('announcement')->where('username', $data[]->username)->get();
        $datas = DB::table('info')->get();
        //dd($datas);
        return view('teacher.information', compact('datas', 'datas2'));
    }

    public function changeInformation($id)
    {
        $data = DB::table('info')->where('id', $id)->get();
        //dd($data);
        return view('teacher.changeinformation', compact('data'));
        //return view('teacher.changeinformation');
        //return view('admin.login');
    }

    public function dochangeInformation()
    {
        $input = Input::all();
        //dd($input);
        DB::table('info')->where('id', $input['id'])->update([
            'name'=>$input['name'], 'nation'=>$input['nation'], 'age'=>$input['age'], 'sex'=>$input['sex']
        ]);
//        return redirect('teacher/information')->with('message', '修改成功');
        return self::Information();
    }

    public function deleteInformation($id)
    {
        $input = Input::all();
        DB::table('info')->where('id', $id)->delete();
        return self::Information();
    }

    public function letoutInformation($id)
    {
        //        $cellData = [
//            ['学号','姓名','成绩'],
//            ['10001','AAAAA','99'],
//            ['10002','BBBBB','92'],
//            ['10003','CCCCC','95'],
//            ['10004','DDDDD','89'],
//            ['10005','EEEEE','96'],
//        ];
        $cellData = DB::table('info')->where('id', $id)->get();

        //dd($cellData);
        Excel::create('学生信息',function($excel) use ($cellData){
            $excel->sheet('info', function($sheet) use ($cellData){
                $sheet->rows($cellData);
            });
        })->export('xls');
    }


    public function announce()
    {
        return view('teacher.announce');
    }

    public function doAnnounce()
    {
        $input = Input::all();
        $id = session('id');
        $data = DB::table('user')->where('id', $id)->get();
        //dd($data);
        DB::table('announcement')->insert([
            'username'=>$data[0]->username,
            'title'=>$input['title'],
            'content'=>$input['content'],
        ]);
        return self::Information();
    }
}

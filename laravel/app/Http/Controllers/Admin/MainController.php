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
    public function changeMyInformation()
    {
            //echo session('id');
            $user_id = session('id');
            $data = DB::table('info')->where('pid', $user_id)->get();
            //dd($data);
            //echo $data[0]->name;
            return view('main.changemyinformation', compact('data'));
    }

    public function lookStudentInformation()
    {
        return view('main.lookstudentinformation');
    }

    public function lookOthersTable()
    {
        return view('main.lookotherstable');
    }

    public function timetable()
    {
        $input = Input::all();
        //dd($input['number1']);
        if (preg_match('/http:\/\/jwzx.host.congm.in:88\/jwzxtmp\/kebiao\/kb_stu.php\?xh=\d{10}/', "http://jwzx.host.congm.in:88/jwzxtmp/kebiao/kb_stu.php?xh=".$input['number1'])) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, "Location");
            curl_setopt($ch, CURLOPT_URL, "http://jwzx.host.congm.in:88/jwzxtmp/kebiao/kb_stu.php?xh=".$input['number1']);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.2; SV1; .NET CLR 1.1.4322)');//设置user-agent
            $timetable = curl_exec($ch);
            dd($timetable);
        } else {
              return back()->with('message', "There is no a student in chongyou.");
        }
    }

        public function info()
        {
            $input = Input::all();
            if (preg_match('/http:\/\/jwzx.host.congm.in:88\/jwzxtmp\/showBjStu.php\?bj=\d{7,8}/', "http://jwzx.host.congm.in:88/jwzxtmp/showBjStu.php?bj=".$input['number2'])) {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($ch, CURLOPT_URL, "http://jwzx.host.congm.in:88/jwzxtmp/showBjStu.php?bj=".$input['number2']);
                curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.2; SV1; .NET CLR 1.1.4322)');//设置user-agent
                $info = curl_exec($ch);
                dd($info);
            } else {
                return back()->with('message', "There is no a student in chongyou.");
            }



//            if (isset($input = Input::all())) {
//                if (preg_match('/http:\/\/jwzx.host.congm.in:88\/jwzxtmp\/showBjStu.php\?bj=\d{7,8}/', "http://jwzx.host.congm.in:88/jwzxtmp/showBjStu.php?bj=".$input['number2'])) {
//                    $ch = curl_init();
//                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
//                    curl_setopt($ch, CURLOPT_URL, "http://jwzx.host.congm.in:88/jwzxtmp/showBjStu.php?bj=".$input['number2']);
//                    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.2; SV1; .NET CLR 1.1.4322)');//设置user-agent
//                    $info = curl_exec($ch);
//                    dd($info);
//                } else {
//                    return back()->with('message', "There is no a student in chongyou.");
//                }
//            }
        }

    public function cgmyinfo()
    {
        $input = Input::all();
        //dd($input);
        DB::table('info')->where('id', session('id'))->update([
           'name'=>$input['name'], 'nation'=>$input['nation'], 'age'=>$input['age'], 'sex'=>$input['sex']
        ]);
        return redirect('admin/student')->with('message', '修改成功');
    }
}

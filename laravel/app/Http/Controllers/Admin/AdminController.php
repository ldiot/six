<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    //
    public function look()
    {
        $monolog = Log::getMonolog();
        dd($monolog);
    }

    public function ueditor()
    {
        return view('admin.ueditor');
    }
}

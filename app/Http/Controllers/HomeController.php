<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Sessions;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        return view('create',[
            'departments' => Departments::all(),
            'sessions' => Sessions::all()
        ]);
    }
}

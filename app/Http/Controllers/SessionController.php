<?php

namespace App\Http\Controllers;

use App\Models\Sessions;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public static $session;
    public function index(){
        return view('session.index',[
            'sessions' =>Sessions::all()
        ]);
    }
    public  function create(){
        return view('session.create');
    }
    public function store(Request $request){
        Sessions::saveInfo($request);
        return redirect(route('sessions.index'));
    }
    public function edit($id){
        return view('session.edit',[
            'sessions' =>Sessions::find($id)
        ]);
    }

    public function update(Request $request, String $id)
    {
        Sessions::saveInfo($request,$id);
        return redirect(route('sessions.index'));
    }
    public function show($id){
        Sessions::statusCheck($id);
        return back();
    }
    public function destroy( $id){
       self::$session= Sessions::find($id);
        self::$session->delete();
        return back();
    }

    public function sessionWiseStudent($id){
        return view('session.session-wise-student',[
            'allsessions' => Sessions::all()
        ]);
    }

}

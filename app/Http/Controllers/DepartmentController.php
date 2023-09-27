<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public static $department;

    public function index(){
        return view('department.index',[
            'departments' =>Departments::all()
        ]);
    }
    public function create(){
        return view('department.create');
    }
    public function store(Request $request){
        Departments::saveInfo($request);
        return redirect(route('departments.index'));
    }

    public function edit($id){
        return view('department.edit',[
           'departments' => Departments::find($id)
        ]);
    }
    public function update(Request $request, String $id){
        Departments::saveInfo($request,$id);
        return redirect(route('departments.index'));
    }

    public function show(String $id){
        Departments::statusCheck($id);
        return back();
    }

    public function destroy(String $id)
    {
        self::$department = Departments::find($id);
        self::$department->delete();
        return back();
    }

    public function deptWiseStudent($id){
        return view('department.dept-wise-student',[
            'alldepartment' => Departments::find($id)
        ]);
    }
}

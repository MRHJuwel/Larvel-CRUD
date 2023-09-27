<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Students;
use App\Models\Departments;
use App\Models\Sessions;

class StudentController extends Controller
{
    public $Student;
    public function AddStudent(){
        return view('create',[
            'departments' => Departments::all(),
            'sessions' => Sessions::all()
        ]);
    }
    public function store(Request $request){

        Students::saveInfo($request);
        return redirect(route('manage-student'));
    }
    public function manageStudent(){
        return view('manage',[
            'Students' =>Students::all()
        ]);
    }
    public function edit($id){
        return view('edit',[
            'Students' =>Students::find($id),
            'departments' => Departments::where('status',1)->get(),
            'sessions' => Sessions::where('status',1)->get()
        ]);
    }

    public function updateStudent(Request $request){
        Students::updateInfo($request);
        return redirect(route('manage-student'));
    }
    public function remove(Request $request)
    {
        $this->Student = Students::find($request->id);
        if ($this->Student->image){
            if (file_exists($this->Student->image))
            {
                unlink($this->Student->image);
            }
        }
        $this->Student->delete();
        return redirect(route('manage-student'));

    }
}

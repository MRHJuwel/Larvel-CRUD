<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Students extends Model
{
    use HasFactory;
    public static $student,$image,$dir,$imageName,$imageURL;
    public static function saveInfo($request){
        self::$student = new Students();

        self::$student->name = $request->name;
        self::$student->email = $request->email;
        self::$student->phone = $request->phone;
        self::$student->address = $request->address;
        self::$student->department_id = $request->department_id;
        self::$student->session_id = $request->session_id;
        if (isset($reqest->image)){
            self::$student->image =  self::saveImage($request);

        }
        self::$student->save();

    }
    // update data
    public static function updateInfo($request){
       self::$student = Students::find($request->id);
       self::$student->name =$request->name;
       self::$student->email =$request->email;
       self::$student->phone =$request->phone;
       self::$student->address =$request->address;
        self::$student->department_id = $request->department_id;
        self::$student->session_id = $request->session_id;
           if ($request->file('image'))
           {
                if (self::$student->image)
                {
                    if (file_exists(self::$student->image))
                    {
                        unlink(self::$student->image);
                    }
                }
               self::$student->image = self::saveImage($request);
           }

        self::$student->save();
     }

    // Image processing
    public static function saveImage($request){
        self::$image = $request->file('image');
        self::$imageName = $request->name.'_'.rand().'.'.self::$image->extension();
        self::$dir = 'assets/img/';
        self::$imageURL = self::$dir.self::$imageName;
        self::$image->move(self::$dir, self::$imageName);
        return self::$imageURL;


    }
//    department name get relationship
    public function department(){
        return $this->belongsTo(Departments::class);
    }
    public function session(){
        return $this->belongsTo(Sessions::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Students;

class Departments extends Model
{
    use HasFactory;
    public static $departments;

    public static function saveInfo($reqest,$id=null)
    {

        if ($id !=null){
            self::$departments = Departments::find($id);
        }
        else
        {
            self::$departments = new Departments();
        }
        self::$departments->name = $reqest->name;
        self::$departments->code = $reqest->code;
        self::$departments->save();
    }
    public static function statusCheck($id){
        self::$departments = Departments::find($id);
        if (self::$departments->status == 1){
            self::$departments->status = 0;
        }
        else {
            self::$departments->status = 1;
        }
        self::$departments->save();


    }

    public function student()
    {
        return $this->hasMany(Students::class,'department_id');
    }

}

<?php

namespace App\Models;

use App\Models\School;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dairas extends Model
{
    use HasFactory;

    protected $table = "dairas";
    
    protected $guarded = [];

    public function school(){
        return $this->hasOne(School::class);
    }


    public function students(){
        return $this->hasMany(Student::class);
    }

    public function teachers(){
        return $this->hasMany(Teacher::class);
    }

    public $timestamps = false;
}

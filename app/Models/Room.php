<?php

namespace App\Models;

use App\Models\Level;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Specialization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';

    protected $guarded = [];

    public function level(){
        return $this->belongsTo(Level::class);
    }


    public function specialization(){
        return $this->belongsTo(Specialization::class);
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}

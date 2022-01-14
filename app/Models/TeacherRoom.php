<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherRoom extends Model
{
    use HasFactory;

    protected $table = 'teacher_room';

    protected $fillable = ['teacher_id', 'room_id'];

    public $timestamps = false;
}

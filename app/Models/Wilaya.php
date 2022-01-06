<?php

namespace App\Models;

use App\Models\School;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wilaya extends Model
{
    use HasFactory;

    protected $table = "wilayas";
    
    protected $guarded = [];


    public function school(){
        return $this->hasOne(School::class);
    }

    public $timestamps = false;
}

<?php

namespace App\Models;

use App\Models\Dairas;
use App\Models\Wilaya;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class School extends Model
{
    use HasFactory;

    protected $table = 'schools';

    protected $guarded = [];

    public function wilaya(){
        return $this->belongsto(Wilaya::class);
    }

    public function dairas(){
        return $this->belongsto(Dairas::class);
    }
}

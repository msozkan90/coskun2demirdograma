<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function video()
    {

        return $this->hasMany(Video::class,'id');
    }
    public function images_data()
    {

        return $this->hasMany(Images::class);
    }
}

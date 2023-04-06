<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diseases extends Model
{
    use HasFactory;
    protected $table= 'diseases';
    protected $fillable =['id','diseases_name_ar','diseases_name_en','diseases_description_ar','diseases_description_en','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];
    protected $casts = [
        'created_at'=> 'datetime',
        'updated_at'=> 'datetime',
    ];
    
}

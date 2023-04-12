<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory;
    protected $table= 'cities';
    protected $fillable =[
        'id',
        'city_name_ar',
        'city_name_en',
        'data_value_en',
        'data_value_ar',
        'created_at',
        'updated_at'
    ];
    protected $hidden=['created_at','updated_at'];
    protected $casts = [
        'created_at'=> 'datetime',
        'updated_at'=> 'datetime',
    ];
}

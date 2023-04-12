<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Areas extends Model
{
    use HasFactory;
    protected $table= 'areas';
    protected $fillable =[
        'id',
        'city_id',
        'area_name_ar',
        'area_name_en',
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

    public function city(){
        return $this->hasOne(Cities::class);
    }
}

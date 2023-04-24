<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FQA extends Model
{
    use HasFactory;
    protected $table= 'fqa';
    protected $fillable =[
        'id',
        'quest_ar',
        'quest_en',
        'answer_ar',
        'answer_en',
        'created_at',
        'updated_at'
    ];
    protected $hidden=['created_at','updated_at'];
    protected $casts = [
        'created_at'=> 'datetime',
        'updated_at'=> 'datetime',
    ];
}

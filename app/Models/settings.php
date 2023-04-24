<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class settings extends Model
{
    use HasFactory;
    protected $table= 'settings';
    protected $fillable =[
        'id',
        'facebook_url',
        'twiiter_url',
        'linkedin_url',
        'google_url',
        'location',
        'email',
        'phone',
        'website_description_ar',
        'website_description_en',
        'about_us_ar',
        'about_us_en',
        'created_at',
        'updated_at'
    ];
    protected $hidden=['created_at','updated_at'];
    protected $casts = [
        'created_at'=> 'datetime',
        'updated_at'=> 'datetime',
    ];
}

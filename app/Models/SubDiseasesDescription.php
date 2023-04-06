<?php

namespace App\Models;

use App\Models\Diseases;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubDiseasesDescription extends Model
{
    use HasFactory;
    protected $table= 'sub_disease_description';
    protected $fillable =['id','disease_id','sub_disease_ar','sub_disease_en','description_ar','description_en','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];
    protected $casts = [
        'created_at'=> 'datetime',
        'updated_at'=> 'datetime',
    ];
    
    public function diseases()
    {
        return $this->hasOne(Diseases::class);
    }
}

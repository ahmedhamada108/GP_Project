<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    use HasFactory;
    protected $table= 'history';
    protected $fillable =['id','patient_id','image','disease_id','sub_disease_id','created_at','updated_at'];
    protected $hidden=['updated_at'];
    protected $casts = [
        'created_at'=> 'datetime',
        'updated_at'=> 'datetime',
    ];
    public function patient()
    {
        return $this->hasOne(patient::class);
    }
    public function diseases()
    {
        return $this->hasOne(Diseases::class);
    }
    public function sub_disease()
    {
        return $this->hasOne(SubDiseasesDescription::class);
    }
}

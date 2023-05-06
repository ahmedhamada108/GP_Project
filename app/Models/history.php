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
    public function disease()
    {
        return $this->hasOne(Diseases::class,'id','disease_id');
    }
    public function sub_disease()
    {
        return $this->hasOne(SubDiseasesDescription::class,'id','sub_disease_id');
    }
    public function GetPatientHistory($patient_id){
       $history = history::with(
            [
                'disease','disease:id,diseases_name_'.app()->getLocale().' as disease_name',
                'sub_disease','sub_disease:id,sub_disease_'.app()->getLocale().' as Sub_disease_name,description_en'
            ])->where('patient_id',$patient_id)->get();
            return $history;
    }
}

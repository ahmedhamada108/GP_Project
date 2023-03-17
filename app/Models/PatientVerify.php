<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientVerify extends Model
{
    use HasFactory;
    protected $table= 'patient_verify';
    protected $fillable =['id','patient_id','Token','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    protected $casts = [
        'created_at'=> 'datetime',
        'updated_at'=> 'datetime',
    ];
}

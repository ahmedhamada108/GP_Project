<?php

namespace App\Models;

use App\Models\Diseases;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
        return $this->hasOne(Diseases::class,'id','disease_id');
    }
    public static function GetSubDiseases($disease_id)  {
        $sub = SubDiseasesDescription::select(
            'id',
            'disease_id',
            'sub_disease_'.LaravelLocalization::getCurrentLocale().' as sub_disease',
            'description_'.LaravelLocalization::getCurrentLocale(). ' as description',
        )->with([
            'diseases','diseases:id,diseases_description_'.LaravelLocalization::getCurrentLocale().' as disease_description,diseases_name_'.LaravelLocalization::getCurrentLocale().' as disease_name',
        ])->where('disease_id',$disease_id)->get();

        $sub = $sub->map(function ($item) {
            $item->disease_description = $item->diseases->disease_description;
            $item->disease_name = $item->diseases->disease_name;

            unset($item->diseases);
            unset($item->disease_id);
            return collect($item)->only([
                'id',
                'sub_disease',
                'description',
                'disease_description',
                'disease_name'
            ]);
        });
        // Extract the disease_description from each item in the collection
        $disease_descriptions = $sub->pluck('disease_description')->unique()->implode(', ');
        $disease_name = $sub->pluck('disease_name')->unique()->implode(', ');

        // Remove the disease_description from each item in the collection
        $sub = $sub->map(function ($item) {
            unset($item['disease_description']);
            unset($item['disease_name']);
            return $item;
        });

        return [
            'disease_name' => $disease_name,
            'disease_descriptions' => $disease_descriptions,
            'sub_diseases' => $sub,
        ];
    }
}

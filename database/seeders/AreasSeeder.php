<?php

namespace Database\Seeders;

use App\Models\Cities;
use App\Models\Diseases;
use Illuminate\Database\Seeder;

class AreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'city_id' => 1,
                'area_name_ar'=> 'مصر الجديدة',
                'area_name_en' => 'Heliopolis',
                'data_value_en' => 'heliopolis',
                'data_value_ar' => 'مصر-الجديدة'
            ],
            [
                'city_id' => 1,
                'area_name_ar'=> 'مدينة نصر',
                'area_name_en' => 'Nasr City',
                'data_value_en' => 'nasr-city',
                'data_value_ar' => 'مدينة-نصر'
            ],
            [
                'city_id' => 1,
                'area_name_ar'=> 'المعادي',
                'area_name_en' => 'El-Maadi',
                'data_value_en' => 'el-maadi',
                'data_value_ar' => 'المعادي'
            ],
            [
                'city_id' => 1,
                'area_name_ar'=> 'التجمع',
                'area_name_en' => 'New Cairo',
                'data_value_en' => 'new-cairo',
                'data_value_ar' => 'التجمع'
            ],
            [
                'city_id' => 1,
                'area_name_ar'=> 'حدائق القبة',
                'area_name_en' => 'Hadayek El-Kobba',
                'data_value_en' => 'hadayek-el-kobba',
                'data_value_ar' => 'حدائق-القبة'
            ],
            [
                'city_id' => 1,
                'area_name_ar'=> 'مدينة العبور',
                'area_name_en' => 'El-Obour City',
                'data_value_en' => 'el-obour-city',
                'data_value_ar' => 'مدينة-العبور'
            ],
            [
                'city_id' => 1,
                'area_name_ar'=> 'المنيل',
                'area_name_en' => 'El-Manyal',
                'data_value_en' => 'el-manyal',
                'data_value_ar' => 'المنيل'
            ],
            [
                'city_id' => 1,
                'area_name_ar'=> 'شبرا',
                'area_name_en' => 'Shoubra',
                'data_value_en' => 'shoubra',
                'data_value_ar' => 'شبرا'
            ],
            [
                'city_id' => 1,
                'area_name_ar'=> 'وسط البلد',
                'area_name_en' => 'Shoubra',
                'data_value_en' => 'shoubra',
                'data_value_ar' => 'وسط-البلد'
            ],
            [
                'city_id' => 1,
                'area_name_ar'=> 'كل المناطق',
                'area_name_en' => 'Shoubra',
                'data_value_en' => 'shoubra',
                'data_value_ar' => 'كل-المناطق'
            ],
            [
                'city_id' => 1,
                'area_name_ar'=> ' مدينة السلام',
                'area_name_en' => 'Shoubra',
                'data_value_en' => 'shoubra',
                'data_value_ar' => 'مدينة-السلام'
            ],
            [
                'city_id' => 1,
                'area_name_ar'=> 'الزمالك',
                'area_name_en' => 'Shoubra',
                'data_value_en' => 'shoubra',
                'data_value_ar' => 'الزمالك'
            ],
            [
                'city_id' => 1,
                'area_name_ar'=> 'الزيتون',
                'area_name_en' => 'Shoubra',
                'data_value_en' => 'shoubra',
                'data_value_ar' => 'الزيتون'
            ],
            [
                'city_id' => 1,
                'area_name_ar'=> 'السيدة زينب',
                'area_name_en' => 'Shoubra',
                'data_value_en' => 'shoubra',
                'data_value_ar' => 'السيدة-زينب'
            ],
            [
                'city_id' => 1,
                'area_name_ar'=> 'الشروق',
                'area_name_en' => 'Shoubra',
                'data_value_en' => 'shoubra',
                'data_value_ar' => 'الشروق'
            ],
            [
                'city_id' => 1,
                'area_name_ar'=> 'العاشر من رمضان',
                'area_name_en' => 'Shoubra',
                'data_value_en' => 'shoubra',
                'data_value_ar' => 'العاشر-من-رمضان'
            ],
            [
                'city_id' => 1,
                'area_name_ar'=> 'العباسية',
                'area_name_en' => 'Shoubra',
                'data_value_en' => 'shoubra',
                'data_value_ar' => 'العباسية'
            ],
            [
                'city_id' => 1,
                'area_name_ar'=> 'القطامية',
                'area_name_en' => 'Shoubra',
                'data_value_en' => 'shoubra',
                'data_value_ar' => 'القطامية'
            ],
            [
                'city_id' => 1,
                'area_name_ar'=> 'المرج',
                'area_name_en' => 'Shoubra',
                'data_value_en' => 'shoubra',
                'data_value_ar' => 'المرج'
            ],
            [
                'city_id' => 1,
                'area_name_ar'=> 'المطرية',
                'area_name_en' => 'Shoubra',
                'data_value_en' => 'shoubra',
                'data_value_ar' => 'المطرية'
            ],
            [
                'city_id' => 1,
                'area_name_ar'=> 'المقطم',
                'area_name_en' => 'Shoubra',
                'data_value_en' => 'shoubra',
                'data_value_ar' => 'المقطم'
            ],
            [
                'city_id' => 1,
                'area_name_ar'=> 'بولاق',
                'area_name_en' => 'Shoubra',
                'data_value_en' => 'shoubra',
                'data_value_ar' => 'بولاق'
            ],
            [
                'city_id' => 1,
                'area_name_ar'=> 'حدائق المعادي',
                'area_name_en' => 'Shoubra',
                'data_value_en' => 'shoubra',
                'data_value_ar' => 'حدائق-المعادي'
            ],
            [
                'city_id' => 1,
                'area_name_ar'=> 'حدائق حلوان',
                'area_name_en' => 'Shoubra',
                'data_value_en' => 'shoubra',
                'data_value_ar' => 'حدائق-حلوان'
            ],
            [
                'city_id' => 1,
                'area_name_ar'=> 'حلوان',
                'area_name_en' => 'Shoubra',
                'data_value_en' => 'shoubra',
                'data_value_ar' => 'حلوان'
            ],
            [
                'city_id' => 1,
                'area_name_ar'=> 'دار السلام',
                'area_name_en' => 'Shoubra',
                'data_value_en' => 'shoubra',
                'data_value_ar' => 'دار-السلام'
            ],
            [
                'city_id' => 1,
                'area_name_ar'=> 'شبرا',
                'area_name_en' => 'Shoubra',
                'data_value_en' => 'shoubra',
                'data_value_ar' => 'شبرا'
            ],
            [
                'city_id' => 1,
                'area_name_ar'=> 'شبرا',
                'area_name_en' => 'Shoubra',
                'data_value_en' => 'shoubra',
                'data_value_ar' => 'شبرا'
            ],            
            [
                'city_id' => 1,
                'area_name_ar'=> 'شبرا',
                'area_name_en' => 'Shoubra',
                'data_value_en' => 'shoubra',
                'data_value_ar' => 'شبرا'
            ],            
            [
                'city_id' => 1,
                'area_name_ar'=> 'شبرا',
                'area_name_en' => 'Shoubra',
                'data_value_en' => 'shoubra',
                'data_value_ar' => 'شبرا'
            ],            
            [
                'city_id' => 1,
                'area_name_ar'=> 'شبرا',
                'area_name_en' => 'Shoubra',
                'data_value_en' => 'shoubra',
                'data_value_ar' => 'شبرا'
            ],
            [
                'city_id' => 1,
                'area_name_ar'=> 'شبرا',
                'area_name_en' => 'Shoubra',
                'data_value_en' => 'shoubra',
                'data_value_ar' => 'شبرا'
            ],
            [
                'city_id' => 1,
                'area_name_ar'=> 'شبرا',
                'area_name_en' => 'Shoubra',
                'data_value_en' => 'shoubra',
                'data_value_ar' => 'شبرا'
            ],
            [
                'city_id' => 1,
                'area_name_ar'=> 'شبرا',
                'area_name_en' => 'Shoubra',
                'data_value_en' => 'shoubra',
                'data_value_ar' => 'شبرا'
            ],
            [
                'city_id' => 1,
                'area_name_ar'=> 'شبرا',
                'area_name_en' => 'Shoubra',
                'data_value_en' => 'shoubra',
                'data_value_ar' => 'شبرا'
            ],
            [
                'city_id' => 1,
                'area_name_ar'=> 'شبرا',
                'area_name_en' => 'Shoubra',
                'data_value_en' => 'shoubra',
                'data_value_ar' => 'شبرا'
            ],
        ];
        Cities::insert($data);
        error_log('Cities Seeder has been run successfully.');
    }
}

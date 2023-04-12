<?php

namespace Database\Seeders;

use App\Models\Cities;
use App\Models\Diseases;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
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
                'city_name_ar'=> 'القاهرة',
                'city_name_en' => 'Cairo',
                'data_value_en' => 'cairo',
                'data_value_ar' => 'القاهرة'
            ],
            [
                'city_name_ar'=> 'الجيزة',
                'city_name_en' => 'Giza',
                'data_value_en' => 'giza',
                'data_value_ar' => 'الجيزة'
            ],
            [
                'city_name_ar'=> 'الاسكندرية',
                'city_name_en' => 'Alexandria',
                'data_value_en' => 'alexandria',
                'data_value_ar' => 'الاسكندرية'
            ],
            [
                'city_name_ar'=> 'الساحل الشمالي',
                'city_name_en' => 'North Coast',
                'data_value_en' => 'north-coast',
                'data_value_ar' => 'الساحل-الشمالي'
            ],
            [
                'city_name_ar'=> 'القليوبية',
                'city_name_en' => 'Qalyubia',
                'data_value_en' => 'qalyubia',
                'data_value_ar' => 'القليوبية'
            ],
            [
                'city_name_ar'=> 'الغربية',
                'city_name_en' => 'Gharbia',
                'data_value_en' => 'sds',
                'data_value_ar' => 'الغربية'
            ],
            [
                'city_name_ar'=> 'المنوفية',
                'city_name_en' => 'Menoufia',
                'data_value_en' => 'menoufia',
                'data_value_ar' => 'المنوفية'
            ],
            [
                'city_name_ar'=> 'الفيوم',
                'city_name_en' => 'Fayoum',
                'data_value_en' => 'fayoum',
                'data_value_ar' => 'الفيوم'
            ],
            [
                'city_name_ar'=> 'الدقهلية',
                'city_name_en' => 'El-Dakahlia',
                'data_value_en' => 'el-dakahlia',
                'data_value_ar' => 'الدقهلية'
            ],
            [
                'city_name_ar'=> 'الشرقية',
                'city_name_en' => 'El-Sharqia',
                'data_value_en' => 'el-sharqia',
                'data_value_ar' => 'الشرقية'
            ],
            [
                'city_name_ar'=> 'البحيرة',
                'city_name_en' => 'El-Beheira',
                'data_value_en' => 'el-beheira',
                'data_value_ar' => 'البحيرة'
            ],
            [
                'city_name_ar'=> 'دمياط',
                'city_name_en' => 'Damietta',
                'data_value_en' => 'damietta',
                'data_value_ar' => 'دمياط'
            ],
            [
                'city_name_ar'=> 'مطروح',
                'city_name_en' => 'Matrouh',
                'data_value_en' => 'matrouh',
                'data_value_ar' => 'مطروح'
            ],
            [
                'city_name_ar'=> 'أسيوط',
                'city_name_en' => 'Assiut',
                'data_value_en' => 'assiut',
                'data_value_ar' => 'أسيوط'
            ],
            [
                'city_name_ar'=> 'الإسماعيلية',
                'city_name_en' => 'El-Ismailia',
                'data_value_en' => 'el-ismailia',
                'data_value_ar' => 'الإسماعيلية'
            ],
            [
                'city_name_ar'=> 'الغردقة',
                'city_name_en' => 'Hurghada',
                'data_value_en' => 'hurghada',
                'data_value_ar' => 'الغردقة'
            ],
            [
                'city_name_ar'=> 'شرم الشيخ',
                'city_name_en' => 'Sharm El Sheikh',
                'data_value_en' => 'sharm-el-sheikh',
                'data_value_ar' => 'شرم-الشيخ'
            ],
            [
                'city_name_ar'=> 'بورسعيد',
                'city_name_en' => 'Portsaid',
                'data_value_en' => 'portsaid',
                'data_value_ar' => 'بورسعيد'
            ],
            [
                'city_name_ar'=> 'السويس',
                'city_name_en' => 'Suez',
                'data_value_en' => 'suez',
                'data_value_ar' => 'السويس'
            ],
            [
                'city_name_ar'=> 'سوهاج',
                'city_name_en' => 'Sohag',
                'data_value_en' => 'sohag',
                'data_value_ar' => 'سوهاج'
            ],
            [
                'city_name_ar'=> 'المنيا',
                'city_name_en' => 'El-Minia',
                'data_value_en' => 'el-minia',
                'data_value_ar' => 'المنيا'
            ],
            [
                'city_name_ar'=> 'كفر الشيخ',
                'city_name_en' => 'Kafr El sheikh',
                'data_value_en' => 'kafr-el-sheikh',
                'data_value_ar' => 'كفر-الشيخ'
            ],
            [
                'city_name_ar'=> 'الاقصر',
                'city_name_en' => 'Luxor',
                'data_value_en' => 'luxor',
                'data_value_ar' => 'الاقصر'
            ],
            [
                'city_name_ar'=> 'قنا',
                'city_name_en' => 'Qena',
                'data_value_en' => 'qena',
                'data_value_ar' => 'قنا'
            ],
            [
                'city_name_ar'=> 'أسوان',
                'city_name_en' => 'Aswan',
                'data_value_en' => 'aswan',
                'data_value_ar' => 'أسوان'
            ],
            [
                'city_name_ar'=> 'بني سويف',
                'city_name_en' => 'Beni Suef',
                'data_value_en' => 'beni-suef',
                'data_value_ar' => 'بني-سويف'
            ],
        ];
        Cities::insert($data);
        error_log('Cities Seeder has been run successfully.');
    }
}

<?php

namespace Database\Seeders;

use App\Models\Diseases;
use Illuminate\Database\Seeder;

class DiseasesSeeder extends Seeder
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
                'id'=> 1,
                'diseases_name_ar' => "امراض شبكيه العين",
                'diseases_name_en' => "Retinal OCT Diseases",
                'diseases_description_ar' => "يقوم بفحص صور شبكيه العين لفحص عده امراض منها: اتساع الاوعيه الدومية المشيميه والوذمة البقعية السكرية و مرض التنكس البقعي ",
                'diseases_description_en' => "check images of the retina to check a several diseases, including choroidal neovascularization, diabetic macular edema and Drusen"
            ],
            [
                'id'=> 2,
                'diseases_name_ar' => "الزهايمر",
                'diseases_name_en' => "Alzheimer",
                'diseases_description_ar' => "يساعد فى تشخيص الزهايمر ودرجته من حيث تطور المرض مع الشخص وكل هذا من خلال التصوير بالرنين المغناطيسي ",
                'diseases_description_en' => "It helps in diagnosing Alzheimer's disease and its degree in terms of the development of the disease with the person, and all this through magnetic resonance imaging MRI"
            ],
            [
                'id'=> 3,
                'diseases_name_ar' => "السكتة الدماغية",
                'diseases_name_en' => "Brain Stroke",
                'diseases_description_ar' => "يساعد في تشخيص السكته الدماغيه ، وكل هذا من خلال التصوير المقطعي وتكون النتيجة المتوقعه ذا كان مصاب بالسكته الدماغيه ام لا ",
                'diseases_description_en' => "It helps in diagnosing a stroke, and all of this is done through a tomography scan CT, and the expected result is whether or not he had a stroke."
            ],
            [
                'id'=> 4,
                'diseases_name_ar' => "الاشعه المقطعيه للصدر",
                'diseases_name_en' => "Chest X-Ray",
                'diseases_description_ar' => "يساعد فى التمييز بين عده امراض فى الصدر من خلال الاشعه المقطعيه للصدر مثل: الالتهاب الرئوي و مرض كوفيد ١٩ ومرض السل والتشخيص بين هذه الامراض يكون قريب جدا من بعضه ولكن هذا يساعد فى التمييز بينهم ",
                'diseases_description_en' => "It helps in distinguishing between several diseases in the chest through a chest CT scan, such as: pneumonia, Covid 19 disease, and tuberculosis, and the diagnosis between these diseases is very close to each other, but this helps in distinguishing between them",
            ]
        ];
        Diseases::insert($data);
        error_log('Disease Seeder has been run successfully.');
    }
}

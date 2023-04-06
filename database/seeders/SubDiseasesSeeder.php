<?php

namespace Database\Seeders;

use App\Models\SubDiseasesDescription;
use Illuminate\Database\Seeder;

class SubDiseasesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'id' => 1,
                'disease_id' => 1 ,
                'sub_disease_ar' => "اتساع فى الاوعيه الدموية المشيميه",
                'sub_disease_en' => "Choroidal neovascularization (CNV)",
                'description_ar' => "عبارة عن زيادة عدم نمو الوعاء الدَّموي من الضفيرة الوعائية الحوفية إلى القرنية، وسببها يكون نقص في الأوكسجين الذي لا يستقبل من مجرى الدم ولكن من الهواء 
                توسع الأوعية الدموية في القرنية هو حالة تهدد البصر ويمكن أن يكون سببها الالتهاب المرتبط بالعدوى، والإصابة الكيميائية، وأمراض المناعة الذاتية، وفرط الحساسية المناعية، وزرع ما بعد القرنية، والحالات المؤلمة من بين أمراض العين الأخرى.",
                
                'description_en' => "It is an increase in the lack of growth of the blood vessel from the limbic vascular plexus to the cornea, and its cause is a lack of oxygen that is not received from the bloodstream but from the air
                Corneal neovascularization is a sight-threatening condition that can be caused by inflammation associated with infection, chemical injury, autoimmune diseases, immune hypersensitivity, post-corneal transplantation, and traumatic conditions among other eye diseases.",
            ],
            [
                'id' => 2,
                'disease_id' => 1 ,
                'sub_disease_ar' => "الوذمة البقعية السكرية",
                'sub_disease_en' => "Diabetic macular edema (DME)",
                'description_ar' => " يحدث بسبب مرض السّكّري نتيجة ارتفاع السّكّر في الدّم والّذي من الممكن أن يؤدّي إلى فقدان نظرك إذا لم تتم المتابعة.
                تحدث وذمة البقعة الصّفراء عندما تتراكم السّوائل في البقعة. البقعة: هي منطقة في وسط الشّبكيّة مسؤولة عن الرّؤية الحادّة والمباشرة. تراكم هذه السّوائل في البقعة يؤدّي إلى تضخّمها وزيادة سمكها ممّا يؤدّي لمشاكل في الرّؤية.",
                
                'description_en' => "It is caused by diabetes as a result of high blood sugar, which can lead to loss of vision if not monitored.
                Macular edema occurs when fluid builds up in the macula. The macula: It is an area in the center of the retina that is responsible for direct and sharp vision. The accumulation of these fluids in the macula causes it to swell and increase its thickness, which leads to vision problems."
            ],
            [
                'id' => 3,
                'disease_id' => 1 ,
                'sub_disease_ar' => "التنكس البقعي",
                'sub_disease_en' => "Drusen",
                'description_ar' => "هي رواسب صفراء من الحطام الخلوي والحطام الموجود في العين والتي لم يتمكن الجسم من القضاء عليها من خلال مجرى الدم",
                
                'description_en' => "They are yellow deposits of cellular debris and debris in the eye that the body has not been able to eliminate through the bloodstream"
            ],
            [
                'id' => 4,
                'disease_id' => 1 ,
                'sub_disease_ar' => "طبيعي",
                'sub_disease_en' => "Normal",
                'description_ar' => null,
                'description_en' => null
            ],
            [
                'id' => 5,
                'disease_id' => 2 ,
                'sub_disease_ar' => "خفيف",
                'sub_disease_en' => "Mild Demented",
                'description_ar' => "هو المرحلة الفاصلة بين الانحدار المتوقع في الذاكرة والتفكير مع تقدم العمر والانحدار الأكثر خطورة الذي يسببه الخرف. ومن أعراض الاختلال المعرفي المعتدل ظهور مشكلات في الذاكرة أو اللغة أو إصدار الأحكام.",
                'description_en' => "It is the stage between the expected decline in memory and thinking with age and the more serious decline caused by dementia. Symptoms of MCI include problems with memory, language or judgment."
            ],
            [
                'id' => 6,
                'disease_id' => 2 ,
                'sub_disease_ar' => "معتدل",
                'sub_disease_en' => "Moderate Demented",
                'description_ar' => "يسبب الخرف المعتدل تدهورًا إدراكيًا أكثر وضوحًا يؤثر على قدرة الشخص على أداء المهام اليومية." ,
                'description_en' => "moderate dementia causes more pronounced cognitive decline that impacts a person's ability to carry out daily tasks."
            ],
            [
                'id' => 7,
                'disease_id' => 2 ,
                'sub_disease_ar' => "طبيعي",
                'sub_disease_en' => "Normal",
                'description_ar' => null,
                'description_en' => null
            ],
            [
                'id' => 8,
                'disease_id' => 2 ,
                'sub_disease_ar' => "خفيف جدا",
                'sub_disease_en' => "Very Mild Demented",
                'description_ar' => "تدهور الوظيفة الإدراكية التي تؤثر على قدرة الشخص على أداء الأنشطة اليومية. إنه مرض تدريجي يزداد سوءًا بمرور الوقت",
                'description_en' => "Very Mild Demented is decline in cognitive function that affects a person's ability to perform daily activities. It is a progressive disease that gets worse over time"
            ],
            [
                'id' => 9,
                'disease_id' => 3 ,
                'sub_disease_ar' => "سكته دماغية",
                'sub_disease_en' => "Brain Stroke",
                "description_ar" => "السكتة الدماغيه هي عند نقص تدفّق الدم وتغذيته إلى أحد أجزاء الدماغ والذي يؤدي إلى موت الخلايا. ",
                "description_en" => "A stroke is a medical condition in which poor blood flow to the brain causes cell death"
            ],
            [
                'id' => 10,
                'disease_id' => 3 ,
                'sub_disease_ar' => "طبيعي",
                'sub_disease_en' => "Normal",
                'description_ar' => null,
                'description_en' => null
            ],
            [
                'id' => 11,
                'disease_id' => 4 ,
                'sub_disease_ar' => "طبيعي",
                'sub_disease_en' => "Normal",
                'description_ar' => null,
                'description_en' => null
            ],
            [
                'id' => 12,
                'disease_id' => 4 ,
                'sub_disease_ar' => "التهاب رئوي",
                'sub_disease_en' => "Pneumonia",
                "description_ar" => "يُعد الالتهاب الرئوي عدوى تؤدي إلى التهاب الحويصلات الهوائية في إحدى الرئتين أو كلتيهما. قد تُملأ الحويصلات الهوائية بالسوائل أو بالصديد (مادة قيحية)، الأمر الذي يسبب السعال المصحوب بالبلغم أو الصديد، والحمى أو القشعريرة، وصعوبة في التنفس. يمكن لمجموعة متنوعة من الكائنات الحية، بما في ذلك البكتيريا، والفيروسات والفطريات، أن تسبب الالتهاب الرئوي.",
                'description_en' => "Pneumonia is an infection that causes inflammation of the alveoli in one or both lungs. The alveoli may fill with fluid or pus (purulent material), causing a cough with phlegm or pus, fever or chills, and difficulty breathing. A variety of organisms, including bacteria, viruses and fungi, can cause pneumonia."
            ],
            [
                'id' => 13,
                'disease_id' => 4 ,
                'sub_disease_ar' => "كورونا",
                'sub_disease_en' => "Covid-19",
                'description_ar' => " مرضٌ تنفسي إنتاني حيواني المنشأ، يُسببه فيروس كورونا المرتبط بالمتلازمة التنفسية الحادة الشديدة النوع 2 (سارس كوف 2). هذا الفيروس قريبٌ جدًا من فيروس سارس. ",
                "description_en" => " is a contagious disease caused by a virus, the severe acute respiratory syndrome coronavirus 2 (SARS-CoV-2)"
            ],
            [
                'id' => 14,
                'disease_id' => 4 ,
                'sub_disease_ar' => "السل",
                'sub_disease_en' => "Tuberculosis",
                'description_ar' => "هو مرض معد شائع وقاتل في كثير من الحالات تُسببه سُلالات مُختلفة من المتفطّرات (جنس جراثيم) وعادة المتفطّرة السلية يُهاجم السل عادة الرئة، ولكنه يُمكن أن يؤثر أيضًا على أجزاء أخرى من الجسم.",
                'description_en' => " infectious disease usually caused by Mycobacterium tuberculosis (MTB) bacteria. Tuberculosis generally affects the lungs, but it can also affect other parts of the body."
            ],
        ];

        SubDiseasesDescription::insert($data);
        error_log('Sub Disease Seeder has been run successfully.');

    }
}

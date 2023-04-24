<?php

namespace Database\Seeders;

use App\Models\settings;
use Illuminate\Database\Seeder;

class SettingsWebsiteSeeder extends Seeder
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
                    'facebook_url' => 'https://www.facebook.com/',
                    'twiiter_url' => 'https://twitter.com/',
                    'linkedin_url'=> 'https://www.linkedin.com/',
                    'google_url' => 'https://www.google.com/',
                    'location' => 'https://goo.gl/maps/ygnhYvv8QZnf42FQ9',
                    'email' => 'CheckUp@Gmail.com',
                    'phone' => '+201155683472',
                    'about_us_ar'=> "تطبيق الهاتف هو أداة قوية مصممة لمساعدة المستخدمين على التعرف على الأمراض وفهمها عن طريق تحميل صور لأمراضهم. سواء كنت تعاني من مشاكل في صدرك أو عقلك والعديد من الأمراض الأخرى ، يمكن أن يساعدك هذا التطبيق في تحديد سببها.
                        يستخدم التطبيق نماذج متقدمة للتعلم الآلي لتحليل الصور التي تم تحميلها من قبل المستخدمين ، ومقارنتها بقاعدة بيانات واسعة من الصور الطبية وتقديم تشخيص محتمل بناءً على النتائج. تتيح هذه التقنية للمستخدمين تحديد المشكلات الصحية المحتملة بسرعة وبدقة وتوفر معلومات قيمة يمكن استخدامها لاتخاذ قرارات مستنيرة بشأن الرعاية الصحية الخاصة بهم.
                        بالإضافة إلى توفير التشخيص ، يقترح التطبيق أيضًا الأطباء ومقدمي الرعاية الصحية في منطقة المستخدم والمتخصصين في علاج الحالة التي تم تشخيصها. يمكن أن يكون هذا موردًا لا يقدر بثمن للمستخدمين الذين قد لا يعرفون إلى أين يتجهون للعلاج أو المشورة.
                        يلتزم التطبيق بالخصوصية والأمان ويهتم كثيرًا بحماية بيانات المستخدم. يتم تشفير جميع الصور التي تم تحميلها على التطبيق وتخزينها بشكل آمن ، وقد نفذ مطورو التطبيق تدابير أمنية متوافقة مع معايير الصناعة لضمان الحفاظ على أمان المعلومات الشخصية والطبية للمستخدمين.
                        يتحسن التطبيق باستمرار لتقديم أفضل تجربة مستخدم ممكنة. يقوم المطورون بتحديث التطبيق باستمرار بميزات جديدة وتحسينات وإصلاحات للأخطاء ، لضمان وصول المستخدمين إلى أحدث الأدوات والتقنيات وأكثرها تقدمًا.            
                        باختصار ، يعد هذا التطبيق أداة قوية يمكن أن تساعد المستخدمين على تحديد وفهم المشكلات الصحية المحتملة ، والتواصل مع مقدمي الرعاية الصحية في منطقتهم ، واتخاذ قرارات مستنيرة بشأن الرعاية الصحية الخاصة بهم. بفضل تقنية التعلم الآلي المتقدمة ، والالتزام بالخصوصية والأمان ، والتحسينات والتحديثات المستمرة ، يعد هذا التطبيق موردًا قيمًا لأي شخص مهتم بالتحكم في صحته ورفاهيته.",
                    
                    'about_us_en' => "A mobile app is a powerful tool designed to help users identify and understand diseases by uploading images of their diseases. Whether you're experiencing issues with your chest or your brain and a lot of other diseases, this app can help you determine what might be causing them. The app uses advanced machine learning models to analyze the images uploaded by users, comparing them to a vast database of medical images and providing a likely diagnosis based on the results. This technology enables users to quickly and accurately identify potential health issues and provides valuable information that can be used to make informed decisions about their healthcare. In addition to providing a diagnosis, the app also suggests doctors and healthcare providers in the user's area who specialize in treating the diagnosed condition. This can be an invaluable resource for users who may not know where to turn for treatment or advice. The app is committed to privacy and security and takes great care to protect user data. All images uploaded to the app are encrypted and stored securely, and the app's developers have implemented industry-standard security measures to ensure that users' personal and medical information is kept safe. The app is constantly improving to provide the best possible user experience. Developers are constantly updating the app with new features, improvements, and bug fixes, to ensure that users have access to the latest and most advanced tools and technologies. In summary, this app is a powerful tool that can help users identify and understand potential health issues, connect with healthcare providers in their area, and make informed decisions about their healthcare. With its advanced machine learning technology, commitment to privacy and security, and constant improvements and updates, this app is a valuable resource for anyone interested in taking control of their health and well-being.",                    ,
                    'website_description_ar' =>"يستخدم تطبيق الهاتف المحمول الخاص بنا التعلم الآلي المتقدم لتشخيص الأمراض من الصور التي تم تحميلها للأعراض ، ويقترح مقدمي الرعاية الصحية في منطقة المستخدم ، ويلتزم بالخصوصية والأمان وتوفير أفضل تجربة للمستخدم.",
                    'website_description_en' =>"Our mobile app uses advanced machine learning to diagnose diseases from uploaded images of symptoms, suggests healthcare providers in the user's area, and is committed to privacy, security, and providing the best user experience.",
                ]
            ];

        settings::insert($data);   
        error_log('Settings Seeder has been run successfully.');

    }
}

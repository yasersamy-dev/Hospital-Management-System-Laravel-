<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;
use App\Models\Specialty;

class DoctorSeeder extends Seeder
{
    public function run()
    {
        Doctor::query()->delete();

        // الصورة اللي انت هتحطها لكل دكتور
        $defaultImage = 'PUT-YOUR-IMAGE-LINK-HERE';

        // أسماء دكاترة جاهزة
        $doctorNames = [
            'د. أحمد السعيد',
            'د. محمد منصور',
            'د. محمود سامي',
            'د. خالد الطيب',
            'د. إبراهيم عادل',
            'د. كريم الجوهري',
            'د. يوسف سامح',
            'د. مصطفى ناصر',
            'د. عمر عبد المجيد',
            'د. حسام الدين',
            'د. علي محمود',
            'د. طارق السمان',
            'د. شريف مراد',
            'د. ياسر عبد الله',
            'د. هاني شكري',
        ];

        // Bios جاهزة
        $bios = [
            'خبرة أكثر من 10 سنوات في تقديم الرعاية الطبية.',
            'متخصص في الحالات الحرجة ومتابعة المرضى باحترافية.',
            'حاصل على عدة دورات دولية في مجاله.',
            'يتميز بالاهتمام بالتفاصيل والدقة في التشخيص.',
            'يملك خبرة واسعة في المستشفيات الجامعية.',
        ];

        // Titles جاهزة
        $titles = [
            'استشاري أول',
            'أخصائي متميز',
            'استشاري مساعد',
            'أستاذ مساعد بكلية الطب',
            'خبير علاجي وتشخيصي',
        ];

        $specialties = Specialty::all();

        foreach ($specialties as $specialty) {

            // اختيار 3 أسماء عشوائية
            $randomNames = collect($doctorNames)->shuffle()->take(3);

            foreach ($randomNames as $name) {
                Doctor::create([
                    'specialty_id' => $specialty->id,
                    'name'        => $name,
                    'title'       => $titles[array_rand($titles)] . ' في ' . $specialty->name,
                    'image'       => $defaultImage,
                    'phone'       => '01' . rand(0, 9) . rand(100000000, 999999999),
                    'bio'         => $bios[array_rand($bios)],
                    'address'     => 'شبين الكوم - شبراباص',
                ]);
            }
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Specialty;

class SpecialtySeeder extends Seeder
{
    
    public function run(): void
    {
           $specialties = [
            'الباطنة',
            'الجراحة',
            'الأطفال',
            'الجلدية',
            'الأسنان',
            'النساء والتوليد',
            'العظام',
            'القلب',
            'المخ والأعصاب',
            'التحاليل',
            'الأشعة',
            'الرمد',
        ];

        foreach ($specialties as $name) {
            Specialty::create([
                'name' => $name,
                'description' => "وصف مختصر لقسم $name.",
                'image' => 'uploads/specialties/default.png',
            ]);
        }
    
    }
}

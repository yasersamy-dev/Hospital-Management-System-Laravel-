<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;
use App\Models\Schedule;

class ScheduleSeeder extends Seeder
{
    public function run(): void
    {
       
        Schedule::query()->delete();

        $days = ['السبت','الأحد','الاثنين','الثلاثاء','الأربعاء','الخميس','الجمعة'];

        Doctor::all()->each(function ($doctor) use ($days) {

           
            $randomDays = collect($days)->shuffle()->take(2);

            foreach ($randomDays as $day) {
                Schedule::create([
                    'doctor_id' => $doctor->id,
                    'day'       => $day,
                    'from'      => '08:00', // صيغة 24 ساعة
                    'to'        => '16:00', // صيغة 24 ساعة
                ]);
            }

        });
    }
}


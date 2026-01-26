<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Appointment;

class Doctor extends Model
{
       protected $fillable = [
        'specialty_id',
        'name',
        'title',
        'image',
        'phone',
        'bio',
    ];

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }
    public function schedules()
{
    return $this->hasMany(Schedule::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}


public function appointments()
{
    return $this->hasMany(Appointment::class);
}


}

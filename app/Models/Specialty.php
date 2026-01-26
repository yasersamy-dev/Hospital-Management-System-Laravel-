<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    protected $fillable = [
    'name',
    'image',
    'description'
    ];

    public function doctors()
{
    return $this->hasMany(Doctor::class);
}
    public function appointments(){
        return $this->hasManyThrough(Appointment::class,
        Doctor::class
    );
    }
        
    


}

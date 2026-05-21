<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;
    const PENDING   = 'pending';
    const CONFIRMED = 'confirmed';
    const CANCELLED = 'cancelled';
    const COMPLETED = 'completed';

    protected $fillable = [
        'doctor_id',
        'day',
        'patient_name',
        'patient_phone',
        // 'appointment_date',
        'appointment_time',
        'notes',
        'status',
        'user_id',
    ];

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}

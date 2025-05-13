<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobAppointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'job_title',
        'appointment_date',
        'status',
        'notes',
    ];
}

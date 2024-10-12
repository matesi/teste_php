<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Patients extends Model
{
    use HasFactory, Notifiable;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = [
        'name',
        'code',
        'guide',
        'birth',
        'entrance',
        'departure',
    ];

    protected $casts = [
        'birth' => 'datetime',
        'entrance' => 'datetime',
        'departure' => 'datetime',
    ];
}

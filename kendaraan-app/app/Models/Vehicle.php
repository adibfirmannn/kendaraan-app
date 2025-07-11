<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ownership',
        'license_plate',
        'status',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}

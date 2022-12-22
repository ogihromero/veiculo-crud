<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'model',
        'brand',
        'version',
        'year',
    ];
        
        

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function maintenances() {
        return $this->belongsTomany(Maintenance::class, 'maintenances', 'vehicle_id', 'user_id');
    }
}

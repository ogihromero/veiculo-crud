<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;
    protected $fillable = [
        'modelo',
        'marca',
        'versao',
        'year',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

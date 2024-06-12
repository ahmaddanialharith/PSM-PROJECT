<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'color',
    ];

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}

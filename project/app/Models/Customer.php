<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'full_name',
        'contact_number',
        'email',
        'address',
        'area',
        'state',
        'postal_code',
    ];

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repairform extends Model
{
    use HasFactory;

    protected $fillable = [
        'smartphone_model',
        'first_name',
        'last_name',
        'email',
        'contact_number',
        'country',
        'street_address',
        'city',
        'state',
        'postal_code',
        'issue_description',
    ];
}

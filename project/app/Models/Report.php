<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'device_id',
        'problem_description',
        'previous_repairs',
        'pictures',
        'service_type',
        'urgency_level',
        'under_warranty',
        'warranty_provider',
        'data_backup_required',
        'data_wipe_consent',
        'sensitive_data',
        'status',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
    
}

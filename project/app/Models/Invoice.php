<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_id',
        'invoice_no',
        'total_amount',
    ];

    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}

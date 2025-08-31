<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentFactory> */
    use HasFactory, HasUuids;

    protected $fillable = [
        'invoice_id',
        'amount',
        'payment_method',
        'payment_date',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

}

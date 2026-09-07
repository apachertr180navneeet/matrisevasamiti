<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'tracking_id',
        'bank_ref_no',
        'amount',
        'currency',
        'billing_name',
        'billing_email',
        'billing_tel',
        'pan_number',
        'cause',
        'order_status',
        'payment_mode',
        'raw_response',
    ];
}

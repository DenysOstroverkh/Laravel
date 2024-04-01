<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'type', 'initial_amount', 'amount', 'description', 'meta',
        'payment_date', 'payment_date_string', 'payment_date_day', 'payment_date_month', 'payment_date_year',
        'payment_gateway', 'payment_id', 'payment_status',
        'refund_id', 'refund_date', 'refunded_amount', 'refunding',
    ];

    protected $dates = ['payment_date', 'refund_date'];

    protected $casts = ['meta' => 'array'];

    /* RELATIONS */

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

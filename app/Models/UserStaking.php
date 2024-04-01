<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserStaking extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'token_id', 'amount', 
                           'staking_days', 'status', 'transaction_id', 'meta'];

    protected $casts = ['meta' => 'array'];

    /* RELATIONS */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function token()
    {
        return $this->belongsTo(Token::class);
    }
}

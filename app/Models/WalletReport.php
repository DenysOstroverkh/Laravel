<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WalletReport extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'wallet_id', 'token_id', 'complaints', 'description', 'meta'];

    protected $casts = ['complaints' => 'array', 'meta' => 'array'];

    /* RELATIONS */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }

    public function token()
    {
        return $this->belongsTo(Token::class);
    }
}

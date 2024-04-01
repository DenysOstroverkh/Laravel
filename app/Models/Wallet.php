<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wallet extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'address', 'firstreport', 'lastreport', 'meta'];

    protected $appends = ['types', 'avatar'];

    protected $casts = ['meta' => 'array'];

    /* RELATIONS */

    public function reports()
    {
        return $this->hasMany(WalletReport::class);
    }

    public function comments()
    {
        return $this->reports()->whereNotNull('description');
    }

    /* ATTRIBUTES */

    public function getTypesAttribute()
    {
        return $this->reports()->pluck('complaints')->flatten()->unique()->values();
    }

    public function getAvatarAttribute()
    {
       return 'https://avatars.dicebear.com/api/identicon/'.$this->address.'.svg?colorLevel=300';
    }

    public function getCommentsAttribute()
    {
        return $this->comments()->pluck('description');
    }
}

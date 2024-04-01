<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Token extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'symbol', 'decimals', 'network', 'address', 'checksum', 'logo', 'meta', 'firstreport', 'lastreport'];

    protected $appends = ['comments'];

    protected $casts = ['meta' => 'array'];

    /* RELATIONS */

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function comments()
    {
        return $this->reports()->whereNotNull('description');
    }

    public function walletReports()
    {
        return $this->hasMany(WalletReport::class)->with('wallet');
    }

    public function stakings() 
    {
        return $this->hasMany(UserStaking::class, 'token_id');
    }

    /* ATTRIBUTES */

    public function getCommentsAttribute()
    {
        return $this->reports()->whereNotNull('description')->pluck('description');
    }

    public function getLogoAttribute()
    {
        if(isset($this->attributes['logo'])) return $this->attributes['logo'];
        elseif(isset($this->attributes['checksum'])) 'https://raw.githubusercontent.com/trustwallet/assets/master/blockchains/smartchain/assets/' . $this->attributes['checksum'] . '/logo.png';
        return null;
    }

    public function getDecimalsAttribute()
    {
        return $this->attributes['decimals'] ? $this->attributes['decimals'] : 18;
    }

    public function getReportedWalletsAttribute()
    {
        return $this->walletReports->map(function($wreport){
            return $wreport->wallet->address;
        })->unique();
    }

    /* HELPERS */
    
    public static function swappables()
    {
        return (new static)::where('swappable', 1)->get();
    }
}
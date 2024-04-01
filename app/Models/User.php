<?php

namespace App\Models;

use Jcc\LaravelVote\Traits\Voter;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, Voter;

    protected $fillable = ['wallet', 'referrer_id', 'valid_referrer', 'name', 'email', 'password', 'last_login', 'logged_in', 'ip', 'meta'];

    protected $hidden = ['password', 'remember_token'];

    protected $appends = ['referrer_link', 'avatar'];

    protected $casts = ['email_verified_at' => 'datetime', 'last_login' => 'datetime', 'meta' => 'array', 'amount' => 'integer'];

    /* RELALTIONS */
    
    public function referrer()
    {
        return $this->belongsTo(User::class, 'referrer_id', 'id');
    }
    
    public function referrals()
    {
        return $this->hasMany(User::class, 'referrer_id');
    }
    
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function stakings()
    {
        return $this->hasMany(UserStaking::class);
    }
    
    public function enrolls()
    {
        return $this->belongsToMany(Course::class, 'subscriptions', 'user_id')->wherePivot('deleted_at', null)->wherePivot('status', 'success');
    }

    /* ATTRIBUTES */

    public function getIpsAttribute()
    {
        return collect($this->meta['ips']);
    }

    public function getReferrerLinkAttribute()
    {
       return url('?referrer='.$this->wallet);
    }

    public function getAvatarAttribute()
    {
       return 'https://avatars.dicebear.com/api/identicon/'.$this->wallet.'.svg?colorLevel=300';
    }

    /* HELPERS */

    public function storeIp($ip = null)
    {
        $ip = $ip ? $ip : request()->ip();
        $meta = $this->meta ?? collect(['ips' => []]);
        $ips = collect($meta['ips'])->push($ip)->unique();
        $meta['ips'] = $ips;
        $this->update(['ip' => $ip, 'meta' => $meta]);
        return true;
    }
    
    public function setReferrer($wallet = null)
    {
        $referrer_id = null;
        $valid_referrer = null;

        if($wallet):
          $referrer = User::whereWallet($wallet)->first();

          if($referrer && $this->id !== $referrer->id):
            $referrer_id = $referrer->id;

            if(!$referrer->ips->contains($this->ip) && $this->wallet !== $referrer->wallet):
              $valid_referrer = true;
            else:
              $valid_referrer = false;
            endif;
          endif;
        endif;

        $this->update(['referrer_id' => $referrer_id, 'valid_referrer' => $valid_referrer]);
    }
}

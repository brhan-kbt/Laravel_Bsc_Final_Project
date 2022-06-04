<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class UserAccount extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table='user_accounts';
    protected $guarded=[];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     /**
      * Get the user that owns the UserAccount
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function member()
     {
         return $this->belongsTo(Member::class);
     }

      public function admin()
     {
         return $this->belongsTo(Admin::class);
     }

   
}
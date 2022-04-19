<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'username',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'name', 'user_avatar'
    ];

    protected $with = ['languages'];

    public function getUserAvatarAttribute()
    {
        if(!$this->profile_photo_path) {
            return "https://www.kindpng.com/picc/m/421-4212275_transparent-default-avatar-png-avatar-img-png-download.png";
        }

        if (substr($this->profile_photo_path, 0, 5) == "https") {
            return $this->profile_photo_path;
        }

        return asset('storage/' . $this->profile_photo_path);
    }

    public function getNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }

    public function host()
    {
        return $this->hasMany(Meeting::class, ‘host_id’, ‘id’);
    }

    public function patron()
    {
        return $this->hasMany(Meeting::class, ‘patron_id’, ‘id’);
    }

    public function chats()
    {
        return $this->hasMany(Chat::class);
    }
}

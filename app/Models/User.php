<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'nip',
        'no_hp',
        'opd',
        'picture',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'nip' => 'string',
        'password' => 'hashed',
    ];

    public function getPictureAttribute($value)
    {
        return $value ? asset('/profile/' . $value) : asset('/profile/default-avatar.png');
    }

    public function rents()
    {
        return $this->hasMany(Rent::class, 'user_id', 'id');
    }
    public function getHomeRoute()
    {
        switch ($this->role) {
            case 'superadmin':
                return route('superadmin.home');
            case 'kabag':
                return route('kabag.home');
            case 'kabiro':
                return route('kabiro.home');
            case 'admin':
                return route('admin.home');
            case 'kasubag kdh':
                return route('kasubagkdh.home');
            case 'kasubag wkdh':
                return route('kasubagwkdh.home');
            case 'kasubag dalam':
                return route('kasubagdalam.home');
            default:
                return route('');
        }
    }
    public function getDisposisiRoute()
    {
        switch ($this->role) {
            case 'superadmin':
                return route('superadmin.disposisi.index');
            case 'kabag':
                return route('kabag.disposisi.index');
            case 'kabiro':
                return route('kabiro.disposisi.index');
            case 'admin':
                return route('admin.disposisi.index');
            case 'kasubag kdh':
                return route('kasubagkdh.disposisi.index');
            case 'kasubag wkdh':
                return route('kasubagwkdh.disposisi.index');
            case 'kasubag dalam':
                return route('kasubagdalam.disposisi.index');
            default:
                return route('');
        }
    }
    public function profileRoute()
    {
        switch ($this->role) {
            case 'admin':
                return route('admin.profile');
            case 'superadmin':
                return route('superadmin.profile');
            case 'kabag':
                return route('kabag.profile');
            case 'kabiro':
                return route('kabiro.profile');
            case 'kasubag kdh':
                return route('kasubagkdh.profile');
            case 'kasubag wkdh':
                return route('kasubagwkdh.profile');
            case 'kasubag dalam':
                return route('kasubagdalam.profile');
            default:
                return route('');
        }
    }
}

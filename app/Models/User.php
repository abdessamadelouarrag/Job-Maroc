<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'image_url',
        'banner_url',
        'bio',
        'specialite',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    
    public function getImageAttribute()
    {
        return $this->image_url 
            ? asset('storage/' . $this->image_url) 
            : asset('profiles/avatars/userprofil.jpg');
    }

    public function getBannerAttribute()
    {
        return $this->banner_url 
            ? asset('storage/' . $this->banner_url) 
            : asset('profiles/avatars/userprofil.jpg');
    }

    public function scopeSearchUser($query, $usersearch)
    {
        return $query->where('name', 'like', "%{$usersearch}%")
                    ->where('id', '!=', Auth::id());
    }
}
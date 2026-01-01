<?php

namespace App\Models;

use App\Enums\UserStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'last_name',
        'first_name',
        'email',
        'password',
        'avatar_path',
        'address',
        'postal_code',
        'notifications',
        'availability',
        'status',
        'role'
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
            'availability' => 'array',
            'notifications' => 'array'
        ];
    }

    public function isAdmin(): bool
    {
        return $this->role === UserStatus::Admin->value;
    }

    public function isVolunteer(): bool
    {
        return $this->role === UserStatus::Volunteer->value;
    }

    public function animalSheets(): HasMany
    {
        return $this->hasMany(AnimalSheet::class);
    }

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->last_name . ' ' . $this->first_name
        );
    }
}

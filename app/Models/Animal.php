<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'breed', 'coat', 'description', 'sex', 'birth_date', 'state', 'img_path'];

    protected function casts(): array
    {
        return [
            'birth_date' => 'date',
        ];
    }

    public function animalNotes(): HasMany
    {
        return $this->hasMany(AnimalNote::class);
    }

    public function adoptionRequests(): HasMany
    {
        return $this->hasMany(AdoptionRequest::class);
    }

    public function animalSheet(): HasOne
    {
        return $this->hasOne(AnimalSheet::class);
    }

    protected function age(): Attribute
    {
        return Attribute::make(
            get: fn() => Carbon::parse($this->birth_date)->age
        );
    }

    protected function translatedFormatDate(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->birth_date->translatedFormat('d F Y')
        );
    }
}

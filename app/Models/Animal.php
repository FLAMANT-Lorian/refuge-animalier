<?php

namespace App\Models;

use App\Enums\AnimalStatus;
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

    protected $fillable = ['breed_id', 'name', 'coat', 'character', 'vaccines', 'sex', 'birth_date', 'state', 'pictures'];

    protected function casts(): array
    {
        return [
            'birth_date' => 'date',
            'pictures' => 'array'
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

    public function animalSheets(): HasMany
    {
        return $this->hasMany(AnimalSheet::class);
    }

    public function breed(): BelongsTo
    {
        return $this->belongsTo(Breed::class);
    }

    protected function age(): Attribute
    {
        return Attribute::make(
            get: fn() => Carbon::parse($this->birth_date)->age
        );
    }

    public function isVisible(): bool
    {
        return $this->state === AnimalStatus::AwaitingAdoption->value ||
        $this->state === AnimalStatus::ProcessOfAdoption->value;
    }

    protected function translatedFormatDate(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->birth_date->translatedFormat('d F Y')
        );
    }
}

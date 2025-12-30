<?php

namespace App\Models;

use App\Observers\AnimalSheetObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy(AnimalSheetObserver::class)]
class AnimalSheet extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'status',
        'message',
        'user_id'
    ];

    public function animal(): BelongsTo
    {
        return $this->belongsTo(Animal::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function casts(): array
    {
        return [
            'date' => 'date',
        ];
    }

    protected function translatedFormatDate(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->date->translatedFormat('d F Y')
        );
    }
}

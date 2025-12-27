<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdoptionRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'address',
        'postal_code',
        'housing',
        'outdoor_area',
        'children_at_home',
        'children_count',
        'animals_at_home',
        'animals_type',
        'status',
        'message',
        'rejection_message',
    ];

    protected function casts(): array
    {
        return [
            'children_at_home' => 'boolean',
            'animals_at_home' => 'boolean',
            'outdoor_area' => 'boolean',
        ];
    }

    public function animal(): BelongsTo
    {
        return $this->belongsTo(Animal::class);
    }
}

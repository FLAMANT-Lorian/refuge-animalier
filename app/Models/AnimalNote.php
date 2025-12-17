<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AnimalNote extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'visit_date',
        'note',
        'animal_id',
    ];

    protected function casts(): array
    {
        return [
            'visit_date' => 'timestamp',
        ];
    }

    public function animal(): BelongsTo
    {
        return $this->belongsTo(Animal::class);
    }
}

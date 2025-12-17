<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'breed', 'coat', 'description', 'sex', 'birth_date', 'state', 'img_path'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

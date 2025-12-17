<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'submit_date',
        'message',
    ];

    protected function casts(): array
    {
        return [
            'submit_date' => 'timestamp',
        ];
    }
}

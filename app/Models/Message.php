<?php

namespace App\Models;

use App\Observers\MessageObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy(MessageObserver::class)]
class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'submit_date',
        'message',
        'object',
        'status'
    ];

    protected function casts(): array
    {
        return [
            'submit_date' => 'date',
        ];
    }

    protected function translatedFormatDate(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->submit_date->translatedFormat('d F Y')
        );
    }
}

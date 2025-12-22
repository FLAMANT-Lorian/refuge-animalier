<?php

namespace App\Traits;

use App\Enums\AnimalStatus;
use App\Enums\Sex;
use Illuminate\Validation\Rule;

trait AnimalsExtraValidationRules
{
    protected function rules(): array
    {
        return [
            'sex' => [
                Rule::enum(Sex::class)
            ],
            'state' => [
                Rule::enum(AnimalStatus::class)
            ]
        ];
    }
}

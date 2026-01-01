<?php

namespace App\Traits;

use App\Enums\AnimalStatus;
use App\Enums\Sex;
use Illuminate\Validation\Rule;

trait AnimalsRules
{
    protected function rules(): array
    {
        return [
            'name' => 'required',
            'birth_date' => 'required|date_format:Y-m-d',
            'sex' => ['required', Rule::enum(Sex::class)],
            'breed' => 'required|exists:breeds,id',
            'coat' => 'required',
            'vaccines' => 'nullable',
            'state' => ['required', Rule::enum(AnimalStatus::class)],
            'character' => 'required',
            'pictures' => 'nullable|array|max:4',
            'pictures.*' => 'mimes:jpeg,png,gif,webp|max:2048',
        ];
    }
}

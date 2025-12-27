<?php

namespace App\Traits;

use App\Enums\AdoptionRequestsStatus;
use App\Enums\YesOrNo;
use Illuminate\Validation\Rule;

trait CreateAdoptionRequestRules
{
    protected function rules(): array
    {
        return [
            'full_name' => 'required',
            'email' => 'required|email',
            'phone' => '',
            'address' => '',
            'postal_code' => 'nullable|int',
            'message' => 'required',
            'status' => ['required', Rule::enum(AdoptionRequestsStatus::class)],
            'animal' => 'required|exists:animals,id',
            'housing' => '',
            'outside_area' => '',
            'children_at_home' => Rule::enum(YesOrNo::class),
            'children_count' => 'nullable|int',
            'animals_at_home' => Rule::enum(YesOrNo::class),
            'animals_type' => ''
        ];
    }
}

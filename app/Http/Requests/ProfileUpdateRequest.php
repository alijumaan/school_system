<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => ['string', 'max:32'],
            'second_name' => ['string', 'max:32'],
            'third_name' => ['string', 'max:32'],
            'last_name' => ['string', 'max:32'],
            'email' => ['email', 'max:128', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Rules\PhoneNumber;
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
            'full_name' => ['string', 'max:255'],
            'email' => ['email', 'max:128', Rule::unique(User::class)->ignore($this->user()->id)],
//            'phone' => [new PhoneNumber(), 'numeric', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }
}

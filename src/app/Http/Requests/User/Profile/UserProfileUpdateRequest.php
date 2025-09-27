<?php

namespace App\Http\Requests\User\Profile;

use Illuminate\Foundation\Http\FormRequest;

final class UserProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'          => ['required', 'string', 'max:255'],
            'email'         => ['required', 'email'],
            'postal_code'   => ['required', 'regex:/^\d{3}-\d{4}$/'],
            'address1'      => ['required', 'string', 'max:255'],
            'address2'      => ['nullable', 'string', 'max:255'],
            'image'         => ['nullable', 'mimes:jpeg,png,jpg', 'max:800']
        ];
    }
}

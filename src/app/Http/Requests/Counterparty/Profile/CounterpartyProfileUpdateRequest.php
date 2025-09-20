<?php

namespace App\Http\Requests\Counterparty\Profile;

use Illuminate\Foundation\Http\FormRequest;

final class CounterpartyProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email'         => ['required', 'email'],
            'subdomain'     => ['required', 'max:50'],
        ];
    }

    /**
     * バリデーションメッセージで使う属性名を定義
     */
    public function attributes(): array
    {
        return [
            'email'         => 'メールアドレス',
            'subdomain'     => 'サブドメイン',
        ];
    }
}

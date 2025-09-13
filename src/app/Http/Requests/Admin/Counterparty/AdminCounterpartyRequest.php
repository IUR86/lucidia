<?php

namespace App\Http\Requests\Admin\Counterparty;

use Illuminate\Foundation\Http\FormRequest;

final class AdminCounterpartyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'      => ['required', 'max:50'],
            'email'     => ['required', 'email'],
            'password'  => ['required', 'min:8', 'max:68'],
            'subdomain' => ['required', 'max:6'],
            'price'     => ['required', 'min:1'],
        ];
    }

    /**
     * バリデーションメッセージで使う属性名を定義
     */
    public function attributes(): array
    {
        return [
            'name'      => '契約相手',
            'email'     => 'メールアドレス',
            'password'  => 'パスワード',
            'subdomain' => 'サブドメイン',
            'price'     => '料金',
        ];
    }
}

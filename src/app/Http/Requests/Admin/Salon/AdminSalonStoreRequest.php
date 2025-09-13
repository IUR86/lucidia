<?php

namespace App\Http\Requests\Admin\Salon;

use Illuminate\Foundation\Http\FormRequest;

final class AdminSalonStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'              => ['required', 'string', 'max:255'],
            'description'       => ['required', 'string', 'max:1000'],
            'prefecture'        => ['required', 'integer'],
            'postal_code'       => ['required', 'string', 'max:10'],
            'address1'          => ['required', 'string', 'max:255'],
            'address2'          => ['nullable', 'string', 'max:255'],
            'latitude'          => ['nullable', 'numeric'],
            'longitude'         => ['nullable', 'numeric'],
            'tel'               => ['required', 'string', 'max:15'],
            'email'             => ['required', 'email', 'unique:salons,email'],
            'opening_time'      => ['required', 'date_format:H:i'],
            'closing_time'      => ['required', 'date_format:H:i'],
            'regular_holiday'   => ['nullable', 'string', 'max:50'],
            'website_url'       => ['nullable', 'url'],
            'capacity'          => ['required', 'integer', 'min:1'],
        ];
    }

    /**
     * バリデーションメッセージで使う属性名を定義
     */
    public function attributes(): array
    {
        return [
            'name'            => '店舗名',
            'description'     => '説明',
            'prefecture'      => '都道府県',
            'postal_code'     => '郵便番号',
            'address1'        => '市区町村',
            'address2'        => '番地・建物名など',
            'latitude'        => '緯度',
            'longitude'       => '経度',
            'tel'             => '電話番号',
            'email'           => 'メールアドレス',
            'opening_time'    => '開店時間',
            'closing_time'    => '閉店時間',
            'regular_holiday' => '定休日',
            'website_url'     => 'ウェブサイトURL',
            'capacity'        => '最大同時予約人数',
        ];
    }
}

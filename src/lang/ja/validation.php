<?php

return [

    /*
    |--------------------------------------------------------------------------
    | バリデーション言語行
    |--------------------------------------------------------------------------
    |
    | 以下の言語行はバリデタークラスによって使用されるデフォルトのエラーメッセージです。
    | サイズルールのようにいくつかのルールには複数のバージョンがあります。
    | ここで各メッセージを自由に調整してください。
    |
    */

    'accepted' => ':attribute を承認してください。',
    'accepted_if' => ':other が :value の場合、:attribute を承認してください。',
    'active_url' => ':attribute は有効なURLではありません。',
    'after' => ':attribute は :date より後の日付でなければなりません。',
    'after_or_equal' => ':attribute は :date 以降の日付でなければなりません。',
    'alpha' => ':attribute は文字のみで構成してください。',
    'alpha_dash' => ':attribute は英数字、ダッシュ、アンダースコアのみ使用できます。',
    'alpha_num' => ':attribute は英数字のみ使用できます。',
    'any_of' => ':attribute の値が不正です。',
    'array' => ':attribute は配列でなければなりません。',
    'ascii' => ':attribute は半角英数字と記号のみ使用できます。',
    'before' => ':attribute は :date より前の日付でなければなりません。',
    'before_or_equal' => ':attribute は :date 以前の日付でなければなりません。',
    'between' => [
        'array' => ':attribute の項目数は :min から :max の間でなければなりません。',
        'file' => ':attribute のファイルサイズは :min ～ :max KBの間でなければなりません。',
        'numeric' => ':attribute は :min ～ :max の間でなければなりません。',
        'string' => ':attribute は :min ～ :max 文字でなければなりません。',
    ],
    'boolean' => ':attribute は true または false でなければなりません。',
    'can' => ':attribute に不正な値が含まれています。',
    'confirmed' => ':attribute の確認が一致しません。',
    'contains' => ':attribute に必要な値が含まれていません。',
    'current_password' => 'パスワードが正しくありません。',
    'date' => ':attribute は有効な日付ではありません。',
    'date_equals' => ':attribute は :date と同じ日付でなければなりません。',
    'date_format' => ':attribute は :format 形式と一致しません。',
    'decimal' => ':attribute は小数点以下 :decimal 桁でなければなりません。',
    'declined' => ':attribute は拒否してください。',
    'declined_if' => ':other が :value の場合、:attribute は拒否してください。',
    'different' => ':attribute と :other は異なる必要があります。',
    'digits' => ':attribute は :digits 桁でなければなりません。',
    'digits_between' => ':attribute は :min ～ :max 桁でなければなりません。',
    'dimensions' => ':attribute の画像サイズが無効です。',
    'distinct' => ':attribute に重複した値があります。',
    'doesnt_end_with' => ':attribute は次のいずれかで終了してはいけません: :values。',
    'doesnt_start_with' => ':attribute は次のいずれかで開始してはいけません: :values。',
    'email' => ':attribute は有効なメールアドレス形式でなければなりません。',
    'ends_with' => ':attribute は次のいずれかで終了する必要があります: :values。',
    'enum' => '選択された :attribute は無効です。',
    'exists' => '選択された :attribute は無効です。',
    'extensions' => ':attribute の拡張子は次のいずれかでなければなりません: :values。',
    'file' => ':attribute はファイルでなければなりません。',
    'filled' => ':attribute は必須です。',
    'gt' => [
        'array' => ':attribute の項目数は :value より多くなければなりません。',
        'file' => ':attribute は :value KBより大きくなければなりません。',
        'numeric' => ':attribute は :value より大きくなければなりません。',
        'string' => ':attribute は :value 文字より多くなければなりません。',
    ],
    'gte' => [
        'array' => ':attribute の項目数は :value 以上でなければなりません。',
        'file' => ':attribute は :value KB以上でなければなりません。',
        'numeric' => ':attribute は :value 以上でなければなりません。',
        'string' => ':attribute は :value 文字以上でなければなりません。',
    ],
    'hex_color' => ':attribute は有効な16進カラーコードでなければなりません。',
    'image' => ':attribute は画像でなければなりません。',
    'in' => '選択された :attribute は無効です。',
    'in_array' => ':attribute は :other に存在する必要があります。',
    'in_array_keys' => ':attribute には次のキーのいずれかが含まれている必要があります: :values。',
    'integer' => ':attribute は整数でなければなりません。',
    'ip' => ':attribute は有効なIPアドレスでなければなりません。',
    'ipv4' => ':attribute は有効なIPv4アドレスでなければなりません。',
    'ipv6' => ':attribute は有効なIPv6アドレスでなければなりません。',
    'json' => ':attribute は有効なJSON文字列でなければなりません。',
    'list' => ':attribute はリストでなければなりません。',
    'lowercase' => ':attribute は小文字でなければなりません。',
    'lt' => [
        'array' => ':attribute の項目数は :value 未満でなければなりません。',
        'file' => ':attribute は :value KB未満でなければなりません。',
        'numeric' => ':attribute は :value 未満でなければなりません。',
        'string' => ':attribute は :value 文字未満でなければなりません。',
    ],
    'lte' => [
        'array' => ':attribute の項目数は :value 以下でなければなりません。',
        'file' => ':attribute は :value KB以下でなければなりません。',
        'numeric' => ':attribute は :value 以下でなければなりません。',
        'string' => ':attribute は :value 文字以下でなければなりません。',
    ],
    'mac_address' => ':attribute は有効なMACアドレスでなければなりません。',
    'max' => [
        'array' => ':attribute の項目数は :max を超えてはいけません。',
        'file' => ':attribute は :max KBを超えてはいけません。',
        'numeric' => ':attribute は :max を超えてはいけません。',
        'string' => ':attribute は :max 文字を超えてはいけません。',
    ],
    'max_digits' => ':attribute は :max 桁以下でなければなりません。',
    'mimes' => ':attribute は次のタイプのファイルでなければなりません: :values。',
    'mimetypes' => ':attribute は次のタイプのファイルでなければなりません: :values。',
    'min' => [
        'array' => ':attribute の項目数は :min 以上でなければなりません。',
        'file' => ':attribute は :min KB以上でなければなりません。',
        'numeric' => ':attribute は :min 以上でなければなりません。',
        'string' => ':attribute は :min 文字以上でなければなりません。',
    ],
    'min_digits' => ':attribute は :min 桁以上でなければなりません。',
    'missing' => ':attribute は存在してはいけません。',
    'missing_if' => ':other が :value の場合、:attribute は存在してはいけません。',
    'missing_unless' => ':other が :value でない限り、:attribute は存在してはいけません。',
    'missing_with' => ':values が存在する場合、:attribute は存在してはいけません。',
    'missing_with_all' => ':values がすべて存在する場合、:attribute は存在してはいけません。',
    'multiple_of' => ':attribute は :value の倍数でなければなりません。',
    'not_in' => '選択された :attribute は無効です。',
    'not_regex' => ':attribute の形式が無効です。',
    'numeric' => ':attribute は数値でなければなりません。',
    'password' => [
        'letters' => ':attribute には少なくとも1つの文字を含めてください。',
        'mixed' => ':attribute には大文字と小文字をそれぞれ少なくとも1つ含めてください。',
        'numbers' => ':attribute には少なくとも1つの数字を含めてください。',
        'symbols' => ':attribute には少なくとも1つの記号を含めてください。',
        'uncompromised' => '指定された :attribute は情報漏えいで確認されました。別のものを使用してください。',
    ],
    'present' => ':attribute が存在している必要があります。',
    'present_if' => ':other が :value の場合、:attribute が存在している必要があります。',
    'present_unless' => ':other が :value でない限り、:attribute が存在している必要があります。',
    'present_with' => ':values が存在する場合、:attribute が存在している必要があります。',
    'present_with_all' => ':values がすべて存在する場合、:attribute が存在している必要があります。',
    'prohibited' => ':attribute は入力禁止です。',
    'prohibited_if' => ':other が :value の場合、:attribute は入力禁止です。',
    'prohibited_if_accepted' => ':other が承認されている場合、:attribute は入力禁止です。',
    'prohibited_if_declined' => ':other が拒否されている場合、:attribute は入力禁止です。',
    'prohibited_unless' => ':other が :values に含まれない限り、:attribute は入力禁止です。',
    'prohibits' => ':attribute が存在すると :other を入力できません。',
    'regex' => ':attribute の形式が無効です。',
    'required' => ':attribute は必須です。',
    'required_array_keys' => ':attribute には次のキーを含める必要があります: :values。',
    'required_if' => ':other が :value の場合、:attribute は必須です。',
    'required_if_accepted' => ':other が承認されている場合、:attribute は必須です。',
    'required_if_declined' => ':other が拒否されている場合、:attribute は必須です。',
    'required_unless' => ':other が :values に含まれていない限り、:attribute は必須です。',
    'required_with' => ':values が存在する場合、:attribute は必須です。',
    'required_with_all' => ':values がすべて存在する場合、:attribute は必須です。',
    'required_without' => ':values が存在しない場合、:attribute は必須です。',
    'required_without_all' => ':values のいずれも存在しない場合、:attribute は必須です。',
    'same' => ':attribute と :other が一致している必要があります。',
    'size' => [
        'array' => ':attribute は :size 個の項目を含める必要があります。',
        'file' => ':attribute は :size KBでなければなりません。',
        'numeric' => ':attribute は :size でなければなりません。',
        'string' => ':attribute は :size 文字でなければなりません。',
    ],
    'starts_with' => ':attribute は次のいずれかで始まる必要があります: :values。',
    'string' => ':attribute は文字列でなければなりません。',
    'timezone' => ':attribute は有効なタイムゾーンでなければなりません。',
    'unique' => ':attribute は既に使用されています。',
    'uploaded' => ':attribute のアップロードに失敗しました。',
    'uppercase' => ':attribute は大文字でなければなりません。',
    'url' => ':attribute は有効なURLでなければなりません。',
    'ulid' => ':attribute は有効なULIDでなければなりません。',
    'uuid' => ':attribute は有効なUUIDでなければなりません。',

    /*
    |--------------------------------------------------------------------------
    | カスタムバリデーション言語行
    |--------------------------------------------------------------------------
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'カスタムメッセージ',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | カスタムバリデーション属性
    |--------------------------------------------------------------------------
    |
    | この部分はプレースホルダー ":attribute" を
    | より読みやすい表現に置き換えるために使用します。
    |
    */

    'attributes' => [
        'name'          => '名前',
        'email'         => 'メールアドレス',
        'postal_code'   => '郵便番号',
        'address1'      => '都道府県、市区町村、町名、番地',
        'address2'      => '建物名、部屋番号、フロア',
    ],

];

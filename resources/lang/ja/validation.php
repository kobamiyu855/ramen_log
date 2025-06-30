<?php

return [
    'required' => ':attribute は必須です。',
    'email' => ':attribute には有効なメールアドレスを指定してください。',
    'unique' => ':attribute は既に使用されています。',
    'max' => [
        'string' => ':attribute は :max 文字以内で入力してください。',
    ],
     'max' => [
        'file' => ':attribute は :max バイト以内でアップロードしてください。',
    ],

    'attributes' => [
        'name' => '名前',
        'email' => 'メールアドレス',
        'password' => 'パスワード',
        'password_confirmation' => 'パスワード確認',
        'ate_on' => '食べた日',  
        'shop_name' => '店名',
        'review' => 'レビュー',
        'prefecture_name' => '都道府県',
        'image' => 'ラーメン画像',
    ],
];


<?php

return [
    'required' => ':attribute は必須です。',
    'email' => ':attribute には有効なメールアドレスを指定してください。',
    'unique' => ':attribute は既に使用されています。',
    'confirmed' => ':attribute の確認が一致しません。',
    'min' => [
        'string' => ':attribute は :min 文字以上で入力してください。',
    ],

    'attributes' => [
        'name' => '名前',
        'email' => 'メールアドレス',
        'password' => 'パスワード',
        'password_confirmation' => 'パスワード確認',
    ],
];


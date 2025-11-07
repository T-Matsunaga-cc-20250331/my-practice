<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users', 'email')->whereNull('deleted_at'),
            ],
            'password_hash' => ['required','max:255'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '氏名は必須です。',
            'name' => '氏名は255文字以内で入力してください。',

            'email.required' => 'メールアドレスは必須です。',
            'email.email' => 'メールアドレスの形式が正しくありません。',
            'email.unique' => 'このメールアドレスはすでに使用されています。',

            'password_hash.required' => 'パスワードは必須です。',
            'password_hash.max' => 'パスワード255文字以内で入力してください。',
        ];
    }
}
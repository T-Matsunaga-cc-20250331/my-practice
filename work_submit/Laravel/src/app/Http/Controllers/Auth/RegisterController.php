<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

// ユーザー登録用のFormRequestをインポート
use App\Http\Requests\UserStoreRequest;

class RegisterController extends Controller
{
    // 登録フォームを表示
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * 入力内容の確認画面を表示
     *
     * @param UserStoreRequest $request 
     */
    public function confirm(UserStoreRequest $request)
    {
        $request->flash();
        $validated = $request->validated();

        Session::put('register_data', Arr::except($validated, ['password_hash'])); // 画面表示用
        Session::put('register_password', $validated['password_hash']); // 登録用に保存


        return view('auth.confirm', [
            'data' => Session::get('register_data')
        ]);
    }

    /**
     * 登録を完了し、データベースに保存
     *
     * @param UserStoreRequest $request 
     */
public function complete(Request $request) 
{
    $data = Session::get('register_data');
    if (!$data) {
        return redirect()->route('register');
    }

    $password = Session::get('register_password'); 

    User::create([
    
        'email' => $data['email'],
        'password_hash' => Hash::make($password),
        'name' => $data['name'],
        'role' => User::ROLE_GENERAL, // 一般ユーザー
    ]);

    Session::forget('register_data');
    Session::forget('register_password');

    return redirect()->route('register.completeSuccess')
                     ->with('success', '登録が完了しました！');
}
    public function completeSuccess()
    {
        return view('auth.complete');
    }
}

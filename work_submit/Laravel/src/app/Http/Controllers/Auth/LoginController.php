<?php

namespace App\Http\Controllers\Auth;

// app/Http/Controllers/Auth/LoginController.php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    // ログイン画面を表示
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // ログイン処理を実行
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        // Auth::attempt() で認証
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === User::ROLE_ADMIN) {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('home');
            }
        }

        return back()->withErrors([
            'email' => 'メールアドレスまたはパスワードが正しくありません。',
        ])->onlyInput('email');
    }

    // ログアウト処理を実行
    public function logout(Request $request)
    {
        Auth::guard()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
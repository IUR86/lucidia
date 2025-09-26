<?php

namespace App\Http\Controllers\User;

use App\Enum\SessionKey;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\UserPasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;

final class PasswordResetController extends Controller
{
    /**
     * パスワードリセット画面を表示
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        return view('user.password_reset.index');
    }

    /**
     * パスワードリセットリンクを送信
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function send(Request $request): \Illuminate\Http\RedirectResponse
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        $email = $request->email;

        if ($email === null) {
            session()->flash(SessionKey::ALERT_FLASH_MESSAGE->value, 'メールアドレスを入力してください');
            return back();
        }

        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            session()->flash(SessionKey::ALERT_FLASH_MESSAGE->value, '正しいメールアドレスを入力してください');
            return back();
        }

        $user = User::where('email', $email)->first();

        if ($user === null) {
            session()->flash(SessionKey::ALERT_FLASH_MESSAGE->value, 'ユーザが見つかりませんでした');
            return back();
        }

        $password_reset_url = Password::sendResetLink(
            $request->only('email'),
            function ($user, $token) {
                Log::info("メール:{$user->email}、トークン:{$token}のURLを発行します");
                return url("/password_reset/$token?email=" . urlencode($user->email));
            }
        );

        Log::info("{$password_reset_url}のURL送信します");
        $user->notify(new UserPasswordReset($password_reset_url));

        session()->flash(SessionKey::ALERT_FLASH_MESSAGE->value, 'パスワードリセットリンクを送信しました');

        return back();
    }

    /**
     * パスワードリセット画面を表示します
     *
     * @param Request $request
     * @param string $token
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function reset(Request $request, string $token): \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        $email = $request->email;
        $user = User::where('email', $email)->first();

        if ($user === null) {
            Log::info("メール:{$email}のユーザが見つかりません。");
            session()->flash(SessionKey::ALERT_FLASH_MESSAGE->value, '無効または期限切れのURLです。リセットメールを再送してください。');
            return redirect()->route('user.password_reset.index');
        }

        $exists_token = Password::tokenExists($user, $token);

        if (!$exists_token) {
            Log::info("トークン:{$token}が見つかりません。", [$user->toArray()]);
            session()->flash(SessionKey::ALERT_FLASH_MESSAGE->value, '無効または期限切れのURLです。リセットメールを再送してください。');
            return redirect()->route('user.password_reset.index');
        }

        return view('user.password_reset.reset', ['token' => $token, 'email' => $email]);
    }

    /**
     * パスワードリセットを行います
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        $request->validate([
            'token' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $token = $request->token;
        $email = $request->email;
        $user = User::where('email', $email)->first();

        if ($user === null) {
            session()->flash(SessionKey::ALERT_FLASH_MESSAGE->value, '無効なメールアドレスです。再度パスワードリセットしてください。');
            return redirect()->route('user.login.index');
        }

        $exists_token = Password::tokenExists($user, $token);

        if (!$exists_token) {
            session()->flash(SessionKey::ALERT_FLASH_MESSAGE->value, '無効なリセットです。再度パスワードリセットしてください。');
            return redirect()->route('user.login.index');
        }

        Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();
            }
        );

        session()->flash('success_flash_message', 'パスワードの再設定が完了しました');

        return redirect()->route('user.login.index');
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Actions\User\Profile\UserProfileUpdateAction;
use App\Enum\SessionKey;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Profile\UserProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

final class ProfileController extends Controller
{
    /**
     * プロフィール画面を表示
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        $user = Auth::guard('user')->user();

        return view('user.profile.index', ['user' => $user]);
    }

    /**
     * プロフィール更新
     *
     * @param UserProfileUpdateRequest $request
     * @param UserProfileUpdateAction $action
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserProfileUpdateRequest $request, UserProfileUpdateAction $action): \Illuminate\Http\RedirectResponse
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');
        
        $action($request);

        session()->flash(SessionKey::SUCCESS_FLASH_MESSAGE->value, 'プロフィールが変更されました');

        return redirect()->route('user.profile.index');
    }
}

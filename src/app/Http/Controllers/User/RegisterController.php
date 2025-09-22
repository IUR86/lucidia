<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\StripeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

final class RegisterController extends Controller
{
    /**
     * 新規作成画面を表示
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        return view('user.register.index');
    }

    /**
     * 新規登録処理
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        $user = new User();
        $stripe = new StripeService();

        if ($user->whereEmail($request->get('email'))->exists()) {
            session()->flash('flash_message', 'メールアドレスは既に使用されています。');
            return back();
        }

        DB::transaction(function () use ($request, $user, $stripe) {
            $user->fill($request->all());
            $user->save();
            $created_user_data = $user->toArray();

            Log::info("ユーザ:{$user->id}が新規登録されました。", $created_user_data);

            $stripe_user = $stripe->createUser($this->createStripeUserData($created_user_data));

            $user->stripe_id = $stripe_user->id;
            $user->save();

            Log::info("ユーザ:{$user->id}にstripe_id:{$user->stripe_id}をセット", $created_user_data);
        });

        return redirect()->intended(route('user.home.index'));
    }

    /**
     * stripe用のユーザデータを作成します
     *
     * @param array $created_user_data
     * @return array
     */
    private function createStripeUserData(array $created_user_data): array
    {
        $result = [];
        $result['name']     = $created_user_data['name'];
        $result['email']    = $created_user_data['email'];
        $result['metadata'] = $created_user_data;
        return $result;
    }
}

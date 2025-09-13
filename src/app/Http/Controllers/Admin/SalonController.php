<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\Salon\AdminSalonIndexAction;
use App\Actions\Admin\Salon\AdminSalonStoreAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Salon\AdminSalonStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

final class SalonController extends Controller
{
    /**
     * 店舗一覧画面表示
     *
     * @param AdminSalonIndexAction $action
     * @return \Illuminate\Contracts\View\View
     */
    public function index(AdminSalonIndexAction $action): \Illuminate\Contracts\View\View
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        return view('admin.salon.index', $action());
    }

    /**
     * 店舗作成画面表示
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create(): \Illuminate\Contracts\View\View
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        return view('admin.salon.create');
    }

    /**
     * 店舗を登録します
     *
     * @param AdminSalonStoreRequest $request
     * @param AdminSalonStoreAction $action
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AdminSalonStoreRequest $request, AdminSalonStoreAction $action): \Illuminate\Http\RedirectResponse
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        $action($request);

        return redirect()->route('admin.salon.index');
    }
}

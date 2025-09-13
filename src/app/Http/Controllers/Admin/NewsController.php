<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\News\AdminNewsIndexAction;
use App\Actions\Admin\News\AdminNewsStoreAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsStoreRequest;
use Illuminate\Support\Facades\Log;

final class NewsController extends Controller
{
    /**
     * お知らせ一覧表示
     *
     * @param AdminNewsIndexAction $action
     * @return \Illuminate\Contracts\View\View
     */
    public function index(AdminNewsIndexAction $action): \Illuminate\Contracts\View\View
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        return view('admin.news.index', $action());
    }

    /**
     * お知らせ作成表示
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create(): \Illuminate\Contracts\View\View
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        return view('admin.news.create');
    }

    /**
     * お知らせを登録
     *
     * @param NewsStoreRequest $request
     * @param AdminNewsStoreAction $action
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(NewsStoreRequest $request, AdminNewsStoreAction $action): \Illuminate\Http\RedirectResponse
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        $action($request);

        return redirect()->route('admin.news.index');
    }
}

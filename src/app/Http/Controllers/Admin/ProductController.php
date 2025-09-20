<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\Product\AdminProductIndexAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

final class ProductController extends Controller
{
    /**
     * 商品一覧表示
     *
     * @param AdminProductIndexAction $action
     * @return \Illuminate\Contracts\View\View
     */
    public function index(AdminProductIndexAction $action): \Illuminate\Contracts\View\View
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        return view('admin.product.index', $action());
    }

    /**
     * 商品作成表示
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create(): \Illuminate\Contracts\View\View
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        return view('admin.product.create');
    }

    /**
     * 商品を登録
     *
     * @param NewsStoreRequest $request
     * @param AdminNewsStoreAction $action
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(NewsStoreRequest $request, AdminNewsStoreAction $action): \Illuminate\Http\RedirectResponse
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        $action($request);

        return redirect()->route('admin.product.index');
    }
}

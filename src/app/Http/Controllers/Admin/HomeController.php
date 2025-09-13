<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\Home\AdminHomeIndexAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

final class HomeController extends Controller
{
    /**
     * ホーム画面を表示
     *
     * @param AdminHomeIndexAction $action
     * @return \Illuminate\Contracts\View\View
     */
    public function index(AdminHomeIndexAction $action): \Illuminate\Contracts\View\View
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        return view('admin.home.index', $action());
    }
}
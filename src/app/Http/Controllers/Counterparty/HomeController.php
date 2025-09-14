<?php

namespace App\Http\Controllers\Counterparty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

final class HomeController extends Controller
{
    /**
     * ホーム画面を表示
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        return view('counterparty.home.index');
    }
}

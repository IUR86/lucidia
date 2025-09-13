<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\Role\AdminRoleIndexAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

final class RoleController extends Controller
{
    /**
     * 権限一覧を表示
     *
     * @param AdminRoleIndexAction $action
     * @return \Illuminate\Contracts\View\View
     */
    public function index(AdminRoleIndexAction $action): \Illuminate\Contracts\View\View
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        return view('admin.role.index', $action());
    }

    public function create()
    {

    }

    public function store()
    {

    }
}

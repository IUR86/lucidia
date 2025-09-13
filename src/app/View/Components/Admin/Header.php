<?php

namespace App\View\Components\Admin;

use App\Models\AdminUser;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Header extends Component
{
    /**
     * 管理者ユーザモデル
     *
     * @var AdminUser|null
     */
    public AdminUser|null $admin_user;

    /**
     * 未読通知数
     *
     * @var integer
     */
    public int $notificationCount;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->setAdminUser();
        $this->setNotificationCount();
    }

    /**
     * 管理者ユーザをセット
     *
     * @return void
     */
    private function setAdminUser(): void
    {
        $this->admin_user = Auth::guard('admin')?->user();
    }

    /**
     * 未読通知数をセット
     *
     * @return void
     */
    private function setNotificationCount(): void
    {
        $this->notificationCount = 3;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.header');
    }
}

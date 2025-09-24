<?php

namespace App\View\Components\User;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Header extends Component
{
    /**
     * @var User|null
     */
    public readonly User|null $auth_user;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        /** @var User|null $auth_user */
        $auth_user = Auth::guard('user')?->user();
        $this->auth_user = $auth_user?->loginUser();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user.header');
    }
}

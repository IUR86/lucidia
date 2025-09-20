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
        $this->auth_user = Auth::guard('user')?->user();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user.header');
    }
}

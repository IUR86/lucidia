<?php

namespace App\View\Components\User\Cart;

use App\Models\Cart;
use App\Models\CartItem;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CartItemTable extends Component
{
    /**
     * @var Cart|null
     */
    public readonly Cart|null $using_cart;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->setUsingCart();
    }

    /**
     * カートセット
     *
     * @return void
     */
    private function setUsingCart(): void
    {
        $cart = new Cart();
        $this->using_cart = $cart->getUsingCart();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user.cart.cart-item-table');
    }
}

<?php

namespace App\View\Components\User;

use App\Services\MetaService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Meta extends Component
{
    /**
     * @var string
     */
    public readonly string $title;

    /**
     * @var string
     */
    public readonly string $description;


    /**
     * Create a new component instance.
     */
    public function __construct(MetaService $meta_service)
    {
        $this->title = $meta_service->title;
        $this->description = $meta_service->description;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user.meta');
    }
}

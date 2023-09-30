<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavPaginate extends Component
{

    public  $number1;
    public $number2;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($number1,$number2)
    {
        $this->number1=$number1;
        $this->number2=$number2;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.nav-paginate');
    }
}

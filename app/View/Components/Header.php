<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    public $links ;
    public  $isAdmin ;
    /**
     * Creation du composant header
     * il prend en paramètre un tableau contenant les liens de navigation
     * il prend en paramètre le booleen isAdmin qui indique si l'on ce trouve sur l'interface admin
     * 
     */
    public function __construct($links = array() ,$isAdmin = true)
    {
        $this->links = $links;
        $this->isAdmin = $isAdmin;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header');
    }
}

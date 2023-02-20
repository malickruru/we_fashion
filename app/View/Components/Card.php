<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    /**
     * Créer le composant card
     */

    //  le lien pour afficher un produit
    public $link;
    //   l'image du produit
    public $image;
    //   le nom du produit
    public $name;
    //   le prix du produit
    public $price;

    public function __construct($link, $image, $name, $price)
    {
        $this->link = $link;
        $this->image = $image;
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}

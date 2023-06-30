<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;

use Illuminate\Support\Collection;
use Illuminate\View\Component;


class ModalInscricaoVaga extends Component
{
    /**
     * Create a new component instance.
     */


    public function __construct(public $vaga, public $local)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal-inscricao-vaga');
    }
}

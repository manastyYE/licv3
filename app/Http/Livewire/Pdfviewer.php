<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Pdfviewer extends Component
{
    public $pdfpath;
    public function render()
    {
        return view('livewire.pdfviewer');
    }
}

<?php

namespace App\Livewire\Components\Faq;

use Livewire\Component;
use App\Models\Faq as ModelFaq;

class Faq extends Component
{
    public function placeholder()
    {
        return view('components.faq.skeleton');
    }

    public function render()
    {
        $faqs = ModelFaq::get();
        return view('components.faq.faq', compact('faqs'));
    }
}

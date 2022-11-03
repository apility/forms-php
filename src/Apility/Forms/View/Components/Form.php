<?php

namespace Apility\Forms\View\Components;

use Apility\Forms\Contracts\Form as FormContract;

use Illuminate\View\Component;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;

class Form extends Component
{
    public ?FormContract $form;
    public bool $csrf;

    public function __construct(FormContract $form, bool $csrf = false)
    {
        $this->form = $form;
        $this->csrf = $csrf;
    }

    public function render()
    {
        $prefix = Config::get('forms.prefix', 'forms');
        return View::make($prefix . '::components.form');
    }
}

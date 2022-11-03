<?php

namespace Apility\Forms\View\Components\Fields;

use Apility\Forms\View\Components\Field;

use Apility\Forms\Concerns\Attributes\Name;
use Apility\Forms\Concerns\Attributes\Value;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;

abstract class Input extends Field
{
    use Name;
    use Value;

    public function render()
    {
        $prefix = Config::get('forms.prefix', 'forms');

        return View::make($prefix . '::components.fields.input');
    }

    public function type(): string
    {
        return $this->component();
    }
}

<?php

namespace Apility\Forms\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;

use Apility\Forms\Contracts\FormField as FormFieldContract;

abstract class Field extends Component
{
    public FormFieldContract $field;

    public function __construct(FormFieldContract $field)
    {
        $this->field = $field;
    }

    public function visible()
    {
        return true;
    }

    public function name()
    {
        return $this->field->getFormFieldName();
    }

    public function value()
    {
        return $this->field->getFormFieldValue();
    }

    public function placeholder()
    {
        return $this->field->getFormFieldName();
    }

    public function component()
    {
        return once(fn () => Str::slug(basename(Str::replace('\\', '/', static::class))));
    }

    public function render()
    {
        $prefix = Config::get('forms.prefix', 'forms');
        return View::make($prefix . '::components.fields.' . $this->component());
    }

    public function shouldRender()
    {
        return $this->field->getFormFieldType() === $this->component();
    }
}

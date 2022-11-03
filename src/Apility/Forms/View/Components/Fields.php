<?php

namespace Apility\Forms\View\Components;

use Apility\Forms\Contracts\FormField;

use Illuminate\View\Component;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;

class Fields extends Component
{
    /** @var FormField[] */
    public array $fields = [];

    /**
     * @param FormField[] $fields
     */
    public function __construct(array $fields)
    {
        $this->fields = $fields;
    }

    public function render()
    {
        $prefix = Config::get('forms.prefix', 'forms');
        return View::make($prefix . '::components.form-fields');
    }

    public function shouldRender()
    {
        return count($this->fields) > 0;
    }
}

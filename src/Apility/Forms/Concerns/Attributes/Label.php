<?php

namespace Apility\Forms\Concerns\Attributes;

use Apility\Forms\View\Components\Field;

trait Label
{
    public function label()
    {
        /** @var Field $this */

        return once(fn () => $this->field->getFormFieldLabel());
    }
}

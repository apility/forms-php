<?php

namespace Apility\Forms\Concerns\Attributes;

use Apility\Forms\View\Components\Field;

trait Name
{
    public function name()
    {
        /** @var Field $this */

        return once(fn () => $this->field->getFormFieldName());
    }
}

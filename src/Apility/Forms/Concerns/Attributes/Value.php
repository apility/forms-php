<?php

namespace Apility\Forms\Concerns\Attributes;

use Apility\Forms\View\Components\Field;

trait Value
{
    public function value()
    {
        /** @var Field $this */

        return once(fn () => $this->field->getFormFieldValue());
    }
}

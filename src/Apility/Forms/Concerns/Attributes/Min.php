<?php

namespace Apility\Forms\Concerns\Attributes;

use Apility\Forms\View\Components\Field;

trait Min
{
    public function min()
    {
        /** @var Field $this */

        return once(fn () => $this->field->getFormFieldOptions()['min'] ?? null);
    }
}

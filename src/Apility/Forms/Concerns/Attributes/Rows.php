<?php

namespace Apility\Forms\Concerns\Attributes;

use Apility\Forms\View\Components\Field;

trait Rows
{
    public function rows()
    {
        /** @var Field $this */

        return once(fn () => $this->field->getFormFieldOptions()['rows'] ?? null);
    }
}

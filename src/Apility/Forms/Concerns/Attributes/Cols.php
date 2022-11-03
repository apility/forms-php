<?php

namespace Apility\Forms\Concerns\Attributes;

use Apility\Forms\View\Components\Field;

trait Cols
{
    public function cols()
    {
        /** @var Field $this */

        return once(fn () => $this->field->getFormFieldOptions()['cols'] ?? null);
    }
}

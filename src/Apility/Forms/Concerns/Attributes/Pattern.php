<?php

namespace Apility\Forms\Concerns\Attributes;

use Apility\Forms\View\Components\Field;

trait Pattern
{
    public function pattern()
    {
        /** @var Field $this */

        return once(fn () => $this->field->getFormFieldOptions()['pattern'] ?? null);
    }
}

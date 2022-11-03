<?php

namespace Apility\Forms\Concerns\Attributes;

use Apility\Forms\View\Components\Field;

trait Max
{
    public function max()
    {
        /** @var Field $this */

        return once(fn () => $this->field->getFormFieldOptions()['max'] ?? null);
    }
}

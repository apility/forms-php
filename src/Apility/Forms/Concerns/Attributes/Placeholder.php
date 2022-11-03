<?php

namespace Apility\Forms\Concerns\Attributes;

use Apility\Forms\View\Components\Field;

trait Placeholder
{
    public function placeholder()
    {
        /** @var Field $this */

        return once(fn () => $this->field->getFormFieldPlaceholder());
    }
}

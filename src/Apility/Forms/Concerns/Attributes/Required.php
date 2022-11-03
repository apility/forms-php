<?php

namespace Apility\Forms\Concerns\Attributes;

use Apility\Forms\View\Components\Field;

trait Required
{
    public function required()
    {
        /** @var Field $this */

        return once(fn () => $this->field->getFormFieldRequired());
    }
}

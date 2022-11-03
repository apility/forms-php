<?php

namespace Apility\Forms\Concerns\Attributes;

use Apility\Forms\View\Components\Field;

trait Autocomplete
{
    public function autocomplete()
    {
        /** @var Field $this */

        return once(fn () => $this->field->getFormFieldOptions()['autocomplete'] ?? null);
    }
}

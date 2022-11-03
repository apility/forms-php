<?php

namespace Apility\Forms\Concerns\Attributes;

use Apility\Forms\View\Components\Field;

trait Title
{
    public function title()
    {
        /** @var Field $this */

        return once(fn () => $this->field->getFormFieldOptions()['title'] ?? null);
    }
}

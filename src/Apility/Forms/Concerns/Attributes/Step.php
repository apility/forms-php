<?php

namespace Apility\Forms\Concerns\Attributes;

use Apility\Forms\View\Components\Field;

trait Step
{
    public function step()
    {
        /** @var Field $this */

        return once(fn () => $this->field->getFormFieldOptions()['step'] ?? null);
    }
}

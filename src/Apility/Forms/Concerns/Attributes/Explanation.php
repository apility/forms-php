<?php

namespace Apility\Forms\Concerns\Attributes;

use Apility\Forms\View\Components\Field;

trait Explanation
{
    public function explanation()
    {
        /** @var Field $this */

        return once(fn () => $this->field->getFormFieldOptions()['explanation'] ?? null);
    }

    public function explanationId()
    {
        /** @var Field $this */

        if ($this->explanation() !== null) {
            $id = method_exists($this, 'id') ? $this->id() : null;
            return implode('-', array_filter([$id ?? null, 'explanation']));
        }
    }
}

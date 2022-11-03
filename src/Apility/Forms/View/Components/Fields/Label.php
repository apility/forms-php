<?php

namespace Apility\Forms\View\Components\Fields;

use Apility\Forms\View\Components\Field;

use Apility\Forms\Concerns\Attributes\Label as HasLabel;

class Label extends Field
{
    use HasLabel;

    public function shouldRender()
    {
        return parent::shouldRender() && $this->label() !== null;
    }
}

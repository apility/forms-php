<?php

namespace Apility\Forms\View\Components\Fields;

use Apility\Forms\View\Components\Field;

use Apility\Forms\Concerns\Attributes\Id;
use Apility\Forms\Concerns\Attributes\Name;
use Apility\Forms\Concerns\Attributes\Value;
use Apility\Forms\Concerns\Attributes\Label;

class Checkbox extends Field
{
    use Id;
    use Name;
    use Value;
    use Label;

    public function checked()
    {
        return (bool) $this->field->getFormFieldValue();
    }
}

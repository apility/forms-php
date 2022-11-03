<?php

namespace Apility\Forms\View\Components\Fields;

use Apility\Forms\Concerns\Attributes\Id;
use Apility\Forms\Concerns\Attributes\Label;
use Apility\Forms\Concerns\Attributes\Required;
use Apility\Forms\Concerns\Attributes\Title;

use Apility\Forms\View\Components\Field;

use Illuminate\Support\Arr;

class Select extends Field
{
    use Id;
    use Label;
    use Required;
    use Title;

    public function options()
    {
        return once(fn () => $this->field->getFormFieldOptions());
    }

    public function sequential()
    {
        return !Arr::isAssoc($this->options());
    }
}

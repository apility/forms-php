<?php

namespace Apility\Forms\View\Components\Fields;

use Apility\Forms\Concerns\Attributes\Max;
use Apility\Forms\Concerns\Attributes\Min;
use Apility\Forms\Concerns\Attributes\Step;
use Apility\Forms\View\Components\Fields\Input;

class Number extends Input
{
    use Min;
    use Step;
    use Max;
}

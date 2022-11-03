<?php

namespace Apility\Forms\View\Components\Fields;

use Apility\Forms\Concerns\Attributes\Max;
use Apility\Forms\Concerns\Attributes\Min;
use Apility\Forms\Concerns\Attributes\Step;

class Date extends Text
{
    use Min;
    use Step;
    use Max;
}

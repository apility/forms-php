<?php

namespace Apility\Forms\View\Components\Fields;

use Apility\Forms\Concerns\Attributes\Id;
use Apility\Forms\Concerns\Attributes\Name;
use Apility\Forms\Concerns\Attributes\Rows;
use Apility\Forms\Concerns\Attributes\Cols;
use Apility\Forms\Concerns\Attributes\Label;

use Apility\Forms\View\Components\Field;

class Textarea extends Field
{
    use Id;
    use Name;
    use Rows;
    use Cols;
    use Label;
}

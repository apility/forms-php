<?php

namespace Apility\Forms\View\Components\Fields;

class Phone extends Text
{
    public function type(): string
    {
        return 'tel';
    }
}

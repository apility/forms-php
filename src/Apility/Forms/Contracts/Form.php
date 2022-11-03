<?php

namespace Apility\Forms\Contracts;

use JsonSerializable;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

interface Form extends Arrayable, Jsonable, JsonSerializable
{
    /** @return string|int */
    public function getFormId();

    /**
     * @return FormField[]
     */
    public function getFormFields(): array;
}

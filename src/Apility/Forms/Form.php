<?php

namespace Apility\Forms;

use Apility\Forms\Concerns\BuildsForms;
use Apility\Forms\Concerns\SerializesForm;

use Apility\Forms\Contracts\Form as FormContract;

class Form implements FormContract
{
    use BuildsForms;
    use SerializesForm;

    protected array $attributes;

    protected function __construct(array $attributes = ['id' => null, 'fields' => []])
    {
        $this->attributes = $attributes;
    }

    public function getFormId()
    {
        return $this->attributes['id'] ?? null;
    }

    public function getFormFields(): array
    {
        return $this->attributes['field'] ?? [];
    }
}

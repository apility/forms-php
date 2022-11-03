<?php

namespace Apility\Forms;

use Apility\Forms\Concerns\BuildsFormFields;
use Apility\Forms\Contracts\FormField as FormFieldContract;
use Apility\Forms\Concerns\SerializesFormField;

use Illuminate\Support\HtmlString;

final class Field implements FormFieldContract
{
    use BuildsFormFields;
    use SerializesFormField;

    protected array $attributes;

    protected function __construct(array $attributes = ['name' => '', 'type' => 'text', 'label' => '', 'value' => null, 'options' => [], 'default' => null, 'validationRules' => []])
    {
        $this->attributes = $attributes;
    }

    public function getFormFieldName(): string
    {
        return $this->attributes['name'];
    }

    public function getFormFieldType(): string
    {
        return $this->attributes['type'] ?? 'text';
    }

    public function getFormFieldLabel()
    {
        return new HtmlString($this->attributes['label'] ?? '');
    }

    public function getFormFieldPlaceholder(): ?string
    {
        return $this->attributes['placeholder'] ?? null;
    }

    public function getFormFieldOptions(): array
    {
        return $this->attributes['options'] ?? [];
    }

    public function getFormFieldValidationRules(): array
    {
        return $this->getFormFieldOptions()['validationRules'] ?? [];
    }

    public function getFormFieldValue()
    {
        return $this->attributes['value'] ?? null;
    }

    public function getFormFieldRequired(): bool
    {
        return $this->attributes['required'] ?? false;
    }
}

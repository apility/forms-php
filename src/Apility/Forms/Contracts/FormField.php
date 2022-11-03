<?php

namespace Apility\Forms\Contracts;

use Illuminate\Support\HtmlString;

interface FormField
{
    public function getFormFieldName(): string;
    public function getFormFieldType(): string;

    /** @return string|HtmlString */
    public function getFormFieldLabel();

    public function getFormFieldPlaceholder(): ?string;
    public function getFormFieldOptions(): array;
    public function getFormFieldValidationRules(): array;
    public function getFormFieldValue();
    public function getFormFieldRequired(): bool;
    public function serializeFormField(): array;
}

<?php

namespace Apility\Ticketing;

use Apility\Forms\Contracts\Form;
use Apility\Forms\Contracts\FormField;

use Apility\Forms\FormFieldRules;

class FormRules
{
    public static function make(Form $form, ?string $prefix = null): array
    {
        $rules = collect($form->getFormFields())
            ->mapWithKeys(function (FormField $field) use ($prefix) {
                $key = implode('.', array_filter([$prefix, $field->getFormFieldName()]));
                return [$key => FormFieldRules::make($field)];
            })
            ->filter(fn ($rules) => count($rules) > 0)
            ->all();

        return $rules;
    }
}

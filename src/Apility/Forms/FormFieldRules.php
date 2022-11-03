<?php

namespace Apility\Forms;

use Apility\Forms\Contracts\FormField;
use Apility\Forms\Rules\PhoneNumber;

class FormFieldRules
{
    public static function make(FormField $field): array
    {
        $rules = [];
        $options = $field->getFormFieldOptions();

        if ($field->getFormFieldRequired()) {
            $rules[] = 'required';
        } else {
            $rules[] = 'nullable';
        }

        switch ($field->getFormFieldType()) {
            case 'label':
                return [];
            case 'phone':
                $rules[] = new PhoneNumber();
                break;
            case 'email':
                $rules[] = 'email';
                break;
            case 'date':
                $rules[] = 'date';
                break;
            case 'number':
                $rules[] = 'numeric';
                break;
            case 'select':
                $rules[] = 'in:' . implode(',', $options['options']);
                break;
            case 'checkbox':
                $rules[] = 'boolean';
                if ($field->getFormFieldRequired()) {
                    $rules[] = 'accepted';
                }
                break;
            default:
                $rules[] = 'string';
                break;
        }

        if (isset($options['min'])) {
            $rules[] = 'min:' . $options['min'];
        }

        if (isset($options['max'])) {
            $rules[] = 'max:' . $options['max'];
        }

        if (isset($options['pattern'])) {
            $rules[] = 'regex:/' . trim($options['pattern'], '/') . '/';
        }

        return array_merge($rules, $field->getFormFieldValidationRules());
    }
}

<?php

namespace Apility\Forms\Concerns;

use Exception;

use Apility\Forms\Contracts\Form;
use Apility\Forms\Contracts\FormField;

trait SerializesForm
{
    public static function bootFormSerializer()
    {
        if (!in_array(Form::class, class_implements(static::class))) {
            throw new Exception(SerializesForm::class . ' trait can only be used on classes that implement ' . Form::class);
        }
    }

    public function serializeForm(): array
    {
        /** @var Form $this */

        return [
            'id' => $this->getFormId(),
            'fields' => array_map(
                fn (FormField $field) => $field->serializeFormField(),
                $this->getFormFields()
            ),
        ];
    }

    public function toArray()
    {
        return $this->serializeForm();
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function toJson($options = 0)
    {
        return json_encode($this->jsonSerialize(), $options);
    }
}

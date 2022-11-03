<?php

namespace Apility\Forms\Concerns;

use Exception;

use Apility\Forms\Contracts\FormField;
use Illuminate\Support\HtmlString;

trait SerializesFormField
{
    public static function bootFormFieldSerializer()
    {
        if (!in_array(FormField::class, class_implements(static::class))) {
            throw new Exception(SerializesFormField::class . ' trait can only be used on classes that implement ' . FormField::class);
        }
    }

    public function serializeFormField(): array
    {
        /** @var Field $this */

        $label = $this->getFormFieldLabel();

        if ($label instanceof HtmlString) {
            $label = $label->toHtml();
        }

        return [
            'name' => $this->getFormFieldName(),
            'label' => $label,
            'type' => $this->getFormFieldType(),
            'placeholder' => $this->getFormFieldPlaceholder(),
            'value' => $this->getFormFieldValue(),
            'required' => $this->getFormFieldRequired(),
            'options' => (object) $this->getFormFieldOptions(),
        ];
    }

    public function toArray()
    {
        return $this->serializeFormField();
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        $serialized = $this->toArray();
        $serialized['options'] = (object) $serialized['options'];
        return $serialized;
    }

    public function toJson($options = 0)
    {
        return json_encode($this->jsonSerialize(), $options);
    }
}

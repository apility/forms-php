<?php

namespace Apility\Forms\Concerns;

use Apility\Forms\Contracts\FormField;

trait BuildsForms
{
    /**
     * @return static
     */
    public static function make($id = null)
    {
        $form = new static;

        if ($id !== null) {
            $form->attributes['id'] = $id;
        }

        return $form;
    }

    public function withId($id)
    {
        $this->attributes['id'] = $id;
        return $this;
    }

    /**
     * @param FormField $field
     * @return static
     */
    public function withField(FormField $field)
    {
        $this->attributes['field'][] = $field;
        return $this;
    }

    /**
     * @param FormField ...$fields
     * @return static
     */
    public static function withFields(...$fields)
    {
        return with(static::make(), function ($form) use ($fields) {
            return collect($fields)
                ->flatten()
                ->reduce(fn ($form, $field) => $form->withField($field), $form);
        });
    }
}

<?php

namespace Apility\Forms\Concerns\Attributes;

use Illuminate\Support\Str;

trait Id
{
    public function id(): string
    {
        return once(function () {
            /** @var Field $this */

            if ($id = $this->field->getFormFieldOptions()['id'] ?? null) {
                return $id;
            }

            $class = static::class;
            $prefix = config('forms.prefix', 'forms');
            $unique = Str::uuid();
            $component = implode('-', [$prefix, basename(Str::replace('\\', '/', $class)), $unique]);
            return Str::lower($component);
        });
    }
}

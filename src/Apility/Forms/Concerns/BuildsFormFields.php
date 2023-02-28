<?php

namespace Apility\Forms\Concerns;

use DateTimeInterface;
use InvalidArgumentException;

use Illuminate\Support\Str;
use Illuminate\Support\HtmlString;

trait BuildsFormFields
{
    /**
     * @return static
     */
    public static function make()
    {
        return new static;
    }

    public static function file(string $name, $label = null, array $mimetypes = [])
    {
        $field = static::make()
            ->withType('file')
            ->withName($name);

        if ($label) {
            $field = $field->withLabel($label);
        }

        if ($mimetypes) {
            return $field->accept($mimetypes);
        }

        return $field;
    }

    public function accept(...$mimeTypes)
    {
        if (in_array($this->getFormFieldType(), ['file', 'image'])) {
            $mimeTypes = collect($mimeTypes)->flatten()->all();
            return $this->withOption('mimeTypes', implode(',', $mimeTypes));
        }

        throw new InvalidArgumentException('Field type [' . $this->getFormFieldType() . '] does not support the [accept] attribute.');
    }

    public static function image(string $name, $label = null, $mimetypes = ['image/jpeg', 'image/png', 'image/gif'])
    {
        return static::file($name, $label, $mimetypes)
            ->withType('image');
    }

    public function withCamera()
    {
        return $this->withOption('webcam', true);
    }

    /**
     * @param string $name
     * @return static
     */
    public function withName(string $name)
    {
        $this->attributes['name'] = $name;

        return $this;
    }

    public static function copy(string $label)
    {
        return static::make()
            ->withName((string) Str::uuid())
            ->withType('copy')
            ->withLabel($label);
    }

    /**
     * @param string $type
     * @return static
     * @throws InvalidArgumentException
     */
    public function withType(string $type)
    {
        if (in_array($type, ['checkbox', 'date', 'email', 'hidden', 'label', 'number', 'password', 'phone', 'select', 'text', 'textarea', 'file', 'image', 'separator', 'copy'])) {
            $this->attributes['type'] = $type;

            return $this;
        }

        throw new InvalidArgumentException('Invalid field type provided. [' . $type . ']');
    }

    /**
     * @param string|HtmlString $label
     * @return static
     */
    public function withLabel($label)
    {
        $this->attributes['label'] = $label;

        return $this;
    }

    /**
     * @param string $placeholder
     * @return static
     */
    public function withPlaceholder(string $placeholder)
    {
        $this->attributes['placeholder'] = $placeholder;

        return $this;
    }

    /**
     * @param array $options
     * @return static
     */
    public function withOptions(array $options)
    {
        $this->attributes['options'] = $options;

        return $this;
    }

    /**
     * @param string $name
     * @param string|int|bool|DateTimeInterface|null $value
     * @param bool $selected
     * @return static
     */
    public function withOption(string $name, $value, bool $selected = false)
    {
        $this->attributes['options'][$name] = $value;

        if ($selected) {
            return $this->defaultOption($value);
        }

        return $this;
    }

    public function withExplanation(string $explanation)
    {
        $this->attributes['options']['explanation'] = $explanation;

        return $this;
    }

    /**
     * @param string|int|bool|DateTimeInterface|null $value
     * @return static
     */
    public function defaultOption(string $value)
    {
        if (!$this->attributes['value']) {
            $this->attributes['value'] = $value;
        }

        return $this;
    }

    /**
     * @param string[] $rules
     * @return static
     */
    public function withValidationRules(array $rules)
    {
        $this->attributes['options']['validationRules'] = $rules;

        return $this;
    }

    /**
     * @param string|int|bool|DateTimeInterface|null $value
     * @return static
     */
    public function withValue($value)
    {
        if ($value instanceof DateTimeInterface) {
            $value = $value->format('Y-m-d');
        }

        $this->attributes['value'] = $value;

        return $this;
    }

    /**
     * @param string $pattern
     * @return static
     */
    public function withPattern(string $pattern)
    {
        $this->withOption('pattern', $pattern);

        return $this;
    }

    /**
     * @param string $title
     * @return static
     */
    public function withTitle(string $title)
    {
        $this->withOption('title', $title);

        return $this;
    }

    /**
     * @param string $autocomplete
     * @return static
     */
    public function withAutocompletion(string $autocompletion)
    {
        $this->withOption('autocomplete', $autocompletion);

        return $this;
    }

    /**
     * @param bool $required
     * @return static
     */
    public function isRequired(bool $required)
    {
        $this->attributes['required'] = $required;

        return $this;
    }

    /**
     * @return static
     */
    public function required()
    {
        return $this->isRequired(true);
    }

    /**
     * @return static
     */
    public function optional()
    {
        return $this->isRequired(false);
    }

    /**
     * @param int|string|DateTimeInterface|null $max
     * @return static
     */
    public function min($min)
    {
        if ($min !== null) {
            if ($min instanceof DateTimeInterface) {
                $min = $min->format('Y-m-d');
            }

            $this->withOption('min', $min);
        }

        return $this;
    }

    /**
     * @param int $step
     * @return static
     * @throws InvalidArgumentException
     */
    public function step(int $step)
    {
        if (in_array($this->getFormFieldType(), ['number', 'date'])) {
            $this->withOption('step', $step);
            return $this;
        }

        throw new InvalidArgumentException('Field type [' . $this->getFormFieldType() . '] does not support the [step] attribute.');
    }

    /**
     * @param int|string|DateTimeInterface|null $max
     * @return static
     */
    public function max($max)
    {
        if ($max !== null) {
            if ($max instanceof DateTimeInterface) {
                $max = $max->format('Y-m-d');
            }

            $this->withOption('max', $max);
        }

        return $this;
    }

    /**
     * @param string $name
     * @param mixed $label
     * @return static
     */
    public static function hidden(string $name, $value = null)
    {
        $field = static::make()
            ->withType('hidden')
            ->withName($name);

        if ($value !== null) {
            return $field->withValue($value);
        }

        return $field;
    }

    /**
     * @param string|HtmlString $label
     * @return static
     */
    public static function label($label)
    {
        return static::make()
            ->withName((string) Str::uuid())
            ->withType('label')
            ->withLabel($label);
    }

    public static function separator()
    {
        return static::make()
            ->withName((string) Str::uuid())
            ->withType('separator');
    }

    /**
     * @param string $name
     * @param string|HtmlString|null $label
     * @return static
     */
    public function textarea(string $name, $label = null)
    {
        $field = static::make()
            ->withType('textarea')
            ->withName($name);

        if ($label !== null) {
            return $field->withLabel($label);
        }

        return $field;
    }

    /**
     * @param string $name
     * @param string|HtmlString|null $label
     * @return static
     */
    public static function text(string $name, $label = null)
    {
        $field = static::make()
            ->withType('text')
            ->withName($name);

        if ($label) {
            return $field->withLabel($label);
        }

        return $field;
    }

    /**
     * Undocumented function
     *
     * @param string $name
     * @param string|HtmlString|null $label
     * @return static
     */
    public static function password(string $name, $label = null)
    {
        $field = static::make()
            ->withType('password')
            ->withName($name);

        if ($label) {
            return $field->withLabel($label);
        }

        return $field;
    }

    /**
     * @param string $name
     * @param string|HtmlString|null $label
     * @return static
     */
    public static function phone(string $name, $label = null)
    {
        $field = static::make()
            ->withType('phone')
            ->withName($name)
            ->withPattern('^([0-9()+ -]+)$')
            ->withAutocompletion('tel');

        if ($label !== null) {
            return $field->withLabel($label);
        }

        return $field;
    }

    /**
     * @param string $name
     * @param string|HtmlString|null $label
     * @param DateTimeInterface|null $min
     * @param DateTimeInterface|null $max
     * @return static
     */
    public static function date(string $name, ?string $label, ?DateTimeInterface $min = null, ?DateTimeInterface $max = null)
    {
        $field = static::make()
            ->withType('date')
            ->withName($name)
            ->withPattern('\d{4}-\d{2}-\d{2}');

        if ($min !== null) {
            $field = $field->withOption('min', $min->format('Y-m-d'));
        }

        if ($max !== null) {
            $field = $field->withOption('max', $max->format('Y-m-d'));
        }

        if ($label !== null) {
            return $field->withLabel($label);
        }

        return $field;
    }

    /**
     * @param string $name
     * @param string|HtmlString|null $label
     * @return static
     */
    public static function email(string $name, $label = null)
    {
        $field = static::make()
            ->withType('email')
            ->withName($name)
            ->withAutocompletion('email');

        if ($label !== null) {
            return $field->withLabel($label);
        }

        return $field;
    }

    /**
     * @param string $name
     * @param string|HtmlString|null $label
     * @param array $options
     * @return static
     */
    public static function select(string $name, $label = null, array $options = [])
    {
        $field = static::make()
            ->withType('select')
            ->withName($name)
            ->withOptions($options);

        if ($label !== null) {
            return $field->withLabel($label);
        }

        return $field;
    }

    /**
     * @param string $name
     * @param string|HtmlString|null $label
     * @param int|null $min
     * @param int|null $max
     * @return static
     */
    public static function number(string $name, $label = null, ?int $min = null, ?int $max = null)
    {
        $field = static::make()
            ->withType('number')
            ->withName($name);

        if ($min !== null) {
            $field = $field->withOption('min', $min);
        }

        if ($max !== null) {
            $field = $field->withOption('max', $max);
        }

        if ($label !== null) {
            return $field->withLabel($label);
        }

        return $field;
    }

    /**
     * @param string $name
     * @param string|HtmlString|null $label
     * @return static
     */
    public static function checkbox(string $name, $label = null)
    {
        $field = static::make()
            ->withType('checkbox')
            ->withName($name);

        if ($label !== null) {
            return $field->withLabel($label);
        }

        return $field;
    }
}

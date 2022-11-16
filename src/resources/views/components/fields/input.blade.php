@if($label ?? null)
    @include(config('forms.prefix') . '::partials.label', array_filter([
        'for' => $id ?? null,
        'label' => $label
    ]))
@endif

<input
    type="{{ $type }}"
    name="{{ $field->getFormFieldName() }}"
    @class([
        'form-control',
        'is-invalid' => $errors->has($field->getFormFieldName())
    ])
    @include(config('forms.prefix', 'forms') . '::partials.attributes', [
        'attributes' => array_filter([
            'autocomplete' => $autocomplete ?? null,
            'cols' => $cols ?? null,
            'id' => $id ?? null,
            'max' => $max ?? null,
            'min' => $min ?? null,
            'pattern' => $pattern ?? null,
            'placeholder' => $placeholder ?? null,
            'required' => $required ?? null,
            'rows' => $rows ?? null,
            'step' => $step ?? null,
            'title' => $title ?? null,
            'value' => $value ?? null,
        ])
    ])
>

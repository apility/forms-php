@if($label ?? null)
    @include(config('forms.prefix') . '::partials.label', array_filter([
        'for' => $id ?? null,
        'label' => $label
    ]))
@endif

<select
    @if($id ?? null)
    id="{{ $id }}"
    @endif
    name="{{ $field->getFormFieldName() }}"
    @class(['form-select'])
    @if($field->getFormFieldOptions()['multiple'] ?? false)
        multiple
    @endif
>
    @if($placeholder = $field->getFormFieldPlaceholder())
        <option
            disabled
            @if(!$field->getFormFieldValue())
                selected
            @endif
        >
            {{ $placeholder }}
        </option>
    @endif

    @foreach($options as $label => $value)
        <option
            value="{{ $value}}"
            @if($field->getFormFieldValue() == $value)
                selected
            @endif
        >
            @if($sequential())
                {{ $value }}
            @else
                {{ $label }}
            @endif
        </option>
    @endforeach
</select>
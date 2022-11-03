@if($label = $field->getFormFieldLabel())
    <label
        for="{{ $id }}"
        @class(['form-label'])
    >
        {{ $label }}
    </label>
@endif

<textarea
    id="{{ $id }}"
    name="{{ $field->getFormFieldName() }}"
    @class([
        'form-control',
        'is-invalid' => $errors->has('{{ $field->getFormFieldName() }}')
    ])
    @if($placeholder = $field->getFormFieldPlaceholder())
        placeholder="{{ $placeholder }}"
    @endif
    @if($pattern = $field->getFormFieldOptions()['pattern'] ?? null)
        pattern="{{ $pattern }}"
    @endif
    @if($title = $field->getFormFieldOptions()['title'] ?? null)
        title="{{ $title }}"
    @endif
    @if($autocomplete = $field->getFormFieldOptions()['autocomplete'] ?? null)
        autocomplete="{{ $title }}"
    @endif
    @if($rows = $field->getFormFieldOptions()['rows'] ?? null)
        rows="{{ $rows }}"
    @endif
    @if($cols = $field->getFormFieldOptions()['cols'] ?? null)
        cols="{{ $cols }}"
    @endif
    @if($field->getFormFieldRequired())
        required
    @endif
>
    @if($value = $field->getFormFieldValue())
        {{ $value }}
    @endif
</textarea>
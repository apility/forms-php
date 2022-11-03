<div {{ $attributes->merge(['class' => 'form-check']) }}>
    <input
        name="{{ $field->getFormFieldName() }}"
        class="form-check-input"
        type="checkbox"
        @if($checked ?? false)
        checked
        @endif
        @include(config('forms.prefix', 'forms') . '::partials.attributes', [
            'attributes' => array_filter([
                'id' => $id ?? null,
                'required' => $required ?? null,
                'title' => $title ?? null,
            ])
        ])
    >
    @if($label ?? null)
        @include(config('forms.prefix') . '::partials.label', array_filter([
            'for' => $id ?? null,
            'class' => ['form-check-label'],
            'label' => $label ?? null
        ]))
    @endif
</div>

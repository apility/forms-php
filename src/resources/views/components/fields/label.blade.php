@if($label ?? null)
    @include(config('forms.prefix') . '::partials.label', array_filter([
        'for' => $id ?? null,
        'label' => $label,
        'class' => ['form-text'],
    ]))
@endif
@foreach($fields as $field)
    @if($field->getFormFieldType() !== 'hidden')
    <div class="mb-3">
    @endif
    <x-dynamic-component
        :component="config('forms.prefix', 'forms') . '-fields:' . $field->getFormFieldType()"
        :field="$field"
    />
    @if($field->getFormFieldType() !== 'hidden')
    </div>
    @endif
@endforeach

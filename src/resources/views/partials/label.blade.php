@if($label() !== null)
<label
    @if(isset($for) && $for() !== null)
        for="{{ $for }}"
    @endif
    @class(isset($class) ? $class : ['form-label'])
>
    {{ $label }}
</label>
@endif
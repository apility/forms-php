<form {{ $attributes }}>
    @if($csrf) 
        @csrf
    @endif
    @if($id = $form->getFormId())
    <input
        type="hidden"
        name="_form"
        value="{{ $id }}"
    >
    @endif
    <x-dynamic-component
        :component="config('forms.prefix', 'forms') . '-fields'"
        :fields="$form->getFormFields()"
    />
    {{ $slot }}
</form>

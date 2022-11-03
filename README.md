# Forms

## Installation

```bash
composer require apility/forms
```

Example

```php
use Apility\Forms\Form;
use Apility\Forms\Field;

$form = Form::withFields(
    Field::text('name')
        ->withLabel('Your name')
        ->withPlaceholder('Your name here')
        ->withAutocompletion('full-name')
        ->required(),

    Field::email('email')
        ->withLabel('Your email here')
        ->withPlaceholder('Your email here')
        ->withAutocompletion('email')
        ->required(),

    Field::checkbox('terms')
        ->withLabel('I agree to the terms and conditions')
        ->required(),
);
```

Blade:

```html
<form
    method="POST"
    action="{{ route('form.submit') }}"
>
    @csrf
    <x-forms-fields :fields="$form->getFormFields()" />
    <button type="submit">
        Submit
    </button>
</form>
```

or 

```html
<x-forms-form
    method="POST"
    :action="route('form.submit')"
    :form="$form"
    csrf
>
    <button type="submit">
        Submit
    </button>
</x-forms-form>
```
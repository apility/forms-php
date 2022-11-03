@foreach($attributes as $key => $value)
    @include(config('forms.prefix', 'forms') . '::partials.' . $key, [
        $key => $value
    ])
@endforeach

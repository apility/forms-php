<?php

namespace Apility\Forms\Providers;

use Apility\Forms\View\Components\Field;
use Apility\Forms\View\Components\Fields;
use Apility\Forms\View\Components\Fields\Checkbox;
use Apility\Forms\View\Components\Fields\Date;
use Apility\Forms\View\Components\Fields\Email;
use Apility\Forms\View\Components\Fields\Hidden;
use Apility\Forms\View\Components\Fields\Label;
use Apility\Forms\View\Components\Fields\Number;
use Apility\Forms\View\Components\Fields\Password;
use Apility\Forms\View\Components\Fields\Phone;
use Apility\Forms\View\Components\Fields\Select;
use Apility\Forms\View\Components\Fields\Text;
use Apility\Forms\View\Components\Fields\Textarea;

use Apility\Forms\View\Components\Form;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class FormsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $basePath = __DIR__ . '/../../..';

        $this->mergeConfigFrom($basePath . '/config/forms.php', 'forms');

        $prefix = Config::get('forms.prefix', 'forms');

        $this->loadViewsFrom($basePath . '/resources/views', $prefix);

        $this->loadViewComponentsAs($prefix, [
            Form::class,
            Fields::class,
            Field::class,
            Checkbox::class,
            Date::class,
            Email::class,
            Hidden::class,
            Label::class,
            Number::class,
            Password::class,
            Phone::class,
            Select::class,
            Text::class,
            Textarea::class,
        ]);

        $this->publishes([
            $basePath . '/config/pages.php' => $this->app->configPath('pages.php')
        ], 'config');

        $this->publishes([
            $basePath . '/resources/views' => base_path('resources/views/vendor/apility/forms'),
        ], 'views');
    }

    public function register()
    {
        //
    }
}

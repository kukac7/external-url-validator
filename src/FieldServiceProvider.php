<?php

namespace Kukac7\ExternalUrlValidator;

use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class FieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->booted(function () {
            $this->routes();
        });

        Nova::serving(function (ServingNova $event) {
            Nova::script('external-url-validator', __DIR__.'/../dist/js/field.js');
			Nova::style('external-url-validator', __DIR__.'/../dist/css/field.css');

			Nova::provideToScript([
				'tool-translations' => $this->getTranslations(),
			]);
        });
    }

    /**
     * Register the tool's routes.
     *
     * @return void
     */
    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }
        Route::middleware(['nova'])
            ->prefix('nova-vendor/external-url-validator')
            ->group(__DIR__.'/../routes/api.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
	}

	private static function getTranslations()
    {
        $translationFile = __DIR__ . '/../resources/lang/' . app()->getLocale() . '.json';

        if (!is_readable($translationFile)) {
            return [];
        }

        return json_decode(file_get_contents($translationFile), true);
    }
}

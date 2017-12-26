<?php namespace Jonasva\FacebookInsights;

use Illuminate\Support\ServiceProvider;

class FacebookInsightsServiceProvider extends ServiceProvider
{

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->publishes([
			__DIR__ . '/../../config/config.php' => config_path('facebook-insights.php'),
		]);
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$config = config('facebook-insights');

		$this->app->bind(FacebookInsights::class, function () use ($config) {
            
            return new FacebookInsights($config);
        });

        $this->app->alias(FacebookInsights::class, 'facebook-insights');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('facebook-insights');
	}

}

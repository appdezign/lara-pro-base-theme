<?php

namespace Laratheme\Base;

use Illuminate\Support\ServiceProvider;

class LaraBaseServiceProvider extends ServiceProvider
{

	/**
	 * Bootstrap the module services.
	 *
	 * @return void
	 */
	public function boot()
	{

		// Publish Assets
		$this->publishes([
			__DIR__.'/../_assets/_public/fonts' => public_path('assets/themes/base/fonts'),
			__DIR__.'/../_assets/_public/images' => public_path('assets/themes/base/images'),
			__DIR__.'/../_assets/_public/vendor' => public_path('assets/themes/base/js/vendor'),
		], 'lara');

	}

	/**
	 * Register the module services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}

<?php

namespace Jbb\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Cache\Factory;
use Jbb\Setting;

class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Factory $cache, Setting $settings)
    {
        // config()->set('configuration', \Jbb\Setting::pluck('value', 'key')->all());

        $settings = $cache->remember('settings', 60, function() use ($settings)
	    {
	        return $settings->pluck('value', 'key')->all();
	    });

	    config()->set('configuration', $settings);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

/**
 * Updates the settings.
 *
 * @param int                                 $id
 * @param \Illuminate\Contracts\Cache\Factory $cache
 *
 * @return \Illuminate\Http\RedirectResponse
 */
// public function update($id, Factory $cache)
// {
    // ...

    // When the settings have been updated, clear the cache for the key 'settings':
    // $cache->forget('settings');

    // E.g., redirect back to the settings index page with a success flash message
    // return redirect()->route('admin.settings.index')->with('updated', true);
// }

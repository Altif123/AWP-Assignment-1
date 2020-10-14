<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FakerFoodServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('FoodFaker', function($app) {
            $foodfaker = \Faker\Factory::create();
            $foodfaker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($foodfaker));
            $newClass = new class($foodfaker) extends \Faker\Provider\Base {
                public function title($nbWords = 5)
                {
                    $sentence = $this->generator->sentence($nbWords);
                    return substr($sentence, 0, strlen($sentence) - 1);
                }
            };

            $foodfaker->addProvider($newClass);
            return $foodfaker;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

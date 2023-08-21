<?php

namespace Cachet\Badger;

use Cachet\Badger\Calculator\GDTextSizeCalculator;
use Cachet\Badger\Calculator\TextSizeCalculatorInterface;
use Cachet\Badger\Render\FlatSquareRender;
use Cachet\Badger\Render\PlasticFlatRender;
use Cachet\Badger\Render\PlasticRender;
use Cachet\Badger\Render\SocialRender;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;

class BadgerServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register(): void
    {
        $this->registerCalculator();
        $this->registerBadger();
    }

    /**
     * Register the calculator class.
     */
    protected function registerCalculator(): void
    {
        $this->app->singleton(TextSizeCalculatorInterface::class, function () {
            $path = __DIR__.'/../resources/fonts/DejaVuSans.ttf';

            return new GDTextSizeCalculator(realpath($path) ?: $path);
        });

        $this->app->singleton('badger.calculator', TextSizeCalculatorInterface::class);
    }

    /**
     * Register the badger class.
     */
    protected function registerBadger(): void
    {
        $this->app->singleton(Badger::class, function (Container $app) {
            $calculator = $app->make('badger.calculator');
            $path = realpath($raw = __DIR__.'/../resources/templates') ?: $raw;

            $renderers = [
                new PlasticRender($calculator, $path),
                new PlasticFlatRender($calculator, $path),
                new FlatSquareRender($calculator, $path),
                new SocialRender($calculator, $path),
            ];

            return new Badger($renderers);
        });

        $this->app->singleton('badger', Badger::class);
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [
            'badger',
            'badger.calculator',
        ];
    }
}

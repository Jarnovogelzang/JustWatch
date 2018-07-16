<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Includes\Mollie\MollieDataMover;

class AppServiceProvider extends ServiceProvider {
  /**
   * All of the container bindings that should be registered.
   *
   * @var array
   */
  public $bindings = [
    //
  ];

  /**
   * All of the container singletons that should be registered.
   *
   * @var array
   */
  public $singletons = [
    MollieDataMover::class => MollieDataMover::class,
  ];

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot() {
    //
  }

  /**
   * Register any application services.
   *
   * @return void
   */
  public function register() {

  }
}

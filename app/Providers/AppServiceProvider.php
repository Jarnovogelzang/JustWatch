<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Includes\Mollie\MollieDataMover;

class AppServiceProvider extends ServiceProvider {
  /**
   * @var array
   */
  public $arrayObservers = [
    Category::class => CategoryObserver::class,
    DiscountCode::class => DiscountCodeObserver::class,
    Order::class => OrderObserver::class,
    PriceRange::class => PriceRangeObserver::class,
    Product::class => ProductObserver::class,
    Specification::class => SpecificationObserver::class,
    Tag::class => TagObserver::class,
    User::class => UserObserver::class,
  ];

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
    ZincDataMover::class => ZincDataMover::class,
  ];

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot() {
    foreach ($this->arrayObservers as $objClass => $objObserver) {
      $objClass::observe($objObserver);
    }

    DB::listen(function ($objQuery) {
      Log::info('Executing query with SQL as: ' . $objQuery->sql . ', bindings as: ' . implode(', ', $objQuery->bindings) . 'and time as: ' . $objQuery->time);
    });
  }

  /**
   * Register any application services.
   *
   * @return void
   */
  public function register() {

  }
}

<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\DiscountCode;
use App\Models\Order;
use App\Models\PriceRange;
use App\Models\Product;
use App\Models\Specification;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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
      Log::info('Executing Query.', [
        'objQuery' => $objQuery->toArray(),
        'dateExecutedAt' => Carbon::now()->toDateTimeString(),
      ]);
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

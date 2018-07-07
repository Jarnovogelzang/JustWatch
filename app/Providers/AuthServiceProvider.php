<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider {
  /**
   * The policy mappings for the application.
   *
   * @var array
   */
  protected $policies = [
    User::class => UserPolicy::class,
    Category::class => CategoryPolicy::class,
    Order::class => OrderPolicy::class,
    PriceRange::class => PriceRangePolicy::class,
    Product::class => ProductPolicy::class,
    User::class => UserPolicy::class,
  ];

  /**
   * Register any authentication / authorization services.
   *
   * @return void
   */
  public function boot() {
    $this->registerPolicies();

    //
  }
}

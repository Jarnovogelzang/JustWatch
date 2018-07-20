<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Order;
use App\Models\PriceRange;
use App\Models\Product;
use App\Models\Specification;
use App\Models\Tag;
use App\Models\User;
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
    Tag::class => TagPolicy::class,
    Specification::class => SpecificationPolicy::class,
  ];

  /**
   * Register any authentication / authorization services.
   *
   * @return void
   */
  public function boot() {
    $this->registerPolicies();
  }
}

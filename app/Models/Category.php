<?php

namespace App\Models;

use App\Models\SystemModel;
use App\Product;
use Illuminate\Database\Eloquent\Builder;

class Category extends SystemModel {
  /**
   * @var array
   */
  protected $casts = [
    'intId' => 'integer',
    'stringTitle' => 'string',
  ];

  /**
   * @var array
   */
  protected $fillable = [
    'intId',
    'stringTitle',
  ];

  /**
   * @var array
   */
  protected $hidden = [
    //
  ];

  /**
   * @var string
   */
  protected $primaryKey = 'intId';

  /**
   * @var string
   */
  protected $table = 'Category';

  /**
   * Get the value of intId
   */
  public function getIntId() {
    return $this->intId;
  }

  /**
   * @return mixed
   */
  public function getOrders() {
    return $this->hasManyThrough(Product::class);
  }

  /**
   * @return mixed
   */
  public function getProducts() {
    return $this->belongsToMany(Product::class, 'ProductCategory', 'intCategoryId', 'intProductId');
  }

  /**
   * Get the value of stringTitle
   */
  public function getStringTitle() {
    return $this->stringTitle;
  }

  /**
   * @param Builder $objBuilder
   * @return mixed
   */
  public function scopeWhereIsFeatured(Builder $objBuilder) {
    return $objBuilder->where('boolIsFeatured', '=', true);
  }

  /**
   * Set the value of intId
   *
   * @return  self
   */
  public function setIntId($intId) {
    $this->intId = $intId;

    return $this;
  }

  /**
   * Set the value of stringTitle
   *
   * @return  self
   */
  public function setStringTitle($stringTitle) {
    $this->stringTitle = $stringTitle;

    return $this;
  }
}

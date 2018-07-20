<?php

namespace App;

use App\SystemModel;

class Tag extends SystemModel {
  /**
   * @var array
   */
  protected $casts = [
    'intId' => 'integer',
    'stringTag' => 'string',
  ];

  /**
   * @var array
   */
  protected $fillable = [
    'intId',
    'stringTag',
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
  protected $table = 'Tag';

  /**
   * Get the value of intId
   */
  public function getIntId() {
    return $this->intId;
  }

  /**
   * Get the value of stringTag
   */
  public function getStringTag() {
    return $this->stringTag;
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
   * Set the value of stringTag
   *
   * @return  self
   */
  public function setStringTag($stringTag) {
    $this->stringTag = $stringTag;

    return $this;
  }
}

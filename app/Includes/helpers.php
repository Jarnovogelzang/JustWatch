<?php

namespace Includes;

use Includes\Mollie\MollieCaller;
use Includes\Mollie\MollieDataMover;
use Includes\Zinc\ZincCaller;
use Includes\Zinc\ZincDataMover;

function getZincDataMover() {
  return ZincDataMover::getObjInstance();
}

function getZincCaller() {
  return ZincCaller::getObjInstance();
}

function getMollieCaller() {
  return MollieCaller::getObjInstance();
}

function getMollieDataMover() {
  return MollieDataMover::getObjInstance();
}
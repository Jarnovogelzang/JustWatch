<?php

namespace Includes;

function getZincDataMover() {
  return ZincDataMover::getInstance();
}

function getMollieDataMover() {
  return MollieDataMover::getInstance();
}
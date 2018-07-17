
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
$(document).ready(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    async: true,
    cache: true
  });
});
$(document).ready(function () {
  function getProductByProductId(intProductId) {
    return $.post('/AjaxController/getProductByProductId', {
      data: {
        intProductId: intProductId
      }
    });
  }

  getProductByProductId().done(function (arrayData) {
    Object.keys(arrayData).each(function (stringKey) {
      $('input[name=' + stringKey + ']').val(arrayData[stringKey]);
    })
  }).error(function (objError) {

  });
});
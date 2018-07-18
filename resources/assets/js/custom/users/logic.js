require('../../bootstrap.js');

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
    console.log(objError);
  });
});
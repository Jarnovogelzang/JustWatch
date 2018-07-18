require('../../bootstrap.js');

$(document).ready(function () {
  function getDiscountCodeByDiscountCodeId() {
    var objPromise = new Promise(function (callBackResolve, callBackReject) {
      $.post('/AjaxController/getDiscountCodeByDiscountCodeId', {
        data: {
          intDiscountCodeId: intDiscountCodeId
        },
        success: function (objDiscountCode) {
          callBackResolve(objDiscountCode);
        },
        error: function (objError) {
          callBackReject(objError);
        }
      });
    });

    return objPromise;
  }

  window.objIndexedDB.then(function (objDb) {
    return objDb.transaction('store', 'readonly').objectStore('DiscountCode').get(1).loadArrayIntoJqueryObj();
  }).then(function () {
    return getDiscountCodeByDiscountCodeId().then(function (arrayData) {
      arrayData.loadArrayIntoJqueryObj();

      return arrayData;
    });
  }).then(function (arrayData) {
    return window.objIndexedDB.then(function (objDb) {
      var objTransaction = objDB.transaction('store', 'readwrite');
      objTransaction.objectStore('DiscountCode').put(arrayData);

      return objTransaction.complete;
    });
  }).catch(function (objError) {
    console.log('Something went wrong with the Error as ' + objError);
  });
});
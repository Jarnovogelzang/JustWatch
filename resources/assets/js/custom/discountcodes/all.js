require('../../bootstrap.js');

$(document).ready(function () {
  function fetchDiscountCodes() {
    var objPromise = new Promise(function (callBackResolve, callBackReject) {
      $.post('/AjaxController/fetchDiscountCodes', {
        success: function (arrayDiscountCodes) {
          callBackResolve(arrayDiscountCodes);
        },
        error: function (objError) {
          callBackReject(objError);
        }
      });
    });

    return objPromise;
  }

  window.objIndexedDB.then(function (objDb) {
    return objDb.transaction('store', 'readonly').objectStore('DiscountCode').getAll().each(function (objDiscountCode) {
      objDiscountCode.addToTableAsRow();
    });
  }).then(function () {
    return fetchDiscountCodes().then(function (arrayDiscountCodes) {
      arrayDiscountCodes.each(function (objDiscountCode) {
        objDiscountCode.loadArrayIntoJqueryObj();
      });

      return arrayDiscountCodes;
    });
  }).then(function (arrayDiscountCodes) {
    return window.objIndexedDB.then(function (objDb) {
      var objTransaction = objDB.transaction('store', 'readwrite');
      var objStore = objTransaction.objectStore('DiscountCode');

      objStore.clear();
      objStore.put(arrayDiscountCodes);

      return objTransaction.complete;
    });
  }).catch(function (objError) {
    console.log('Something went wrong with the Error as ' + objError);
  });
});
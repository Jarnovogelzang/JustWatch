require('../../bootstrap.js');

$(document).ready(function () {
  function fetchProducts() {
    var objPromise = new Promise(function (callBackResolve, callBackReject) {
      $.post('/AjaxController/fetchProducts', {
        success: function (arrayProducts) {
          callBackResolve(arrayProducts);
        },
        error: function (objError) {
          callBackReject(objError);
        }
      });
    });

    return objPromise;
  }

  window.objIndexedDB.then(function (objDb) {
    return objDb.transaction('store', 'readonly').objectStore('Product').getAll().each(function (objProduct) {
      objProduct.addToTableAsRow();
    });
  }).then(function () {
    return fetchProducts().then(function (arrayProducts) {
      arrayProducts.each(function (objProduct) {
        objProduct.loadArrayIntoJqueryObj();
      });

      return arrayProducts;
    });
  }).then(function (arrayProducts) {
    return window.objIndexedDB.then(function (objDb) {
      var objTransaction = objDB.transaction('store', 'readwrite');
      var objStore = objTransaction.objectStore('Product');

      objStore.clear();
      objStore.put(arrayProducts);

      return objTransaction.complete;
    });
  }).catch(function (objError) {
    console.log('Something went wrong with the Error as ' + objError);
  });
});
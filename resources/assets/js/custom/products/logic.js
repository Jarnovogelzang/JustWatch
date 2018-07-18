require('../../bootstrap.js');

$(document).ready(function () {
  function getProductByProductId() {
    var objPromise = new Promise(function (callBackResolve, callBackReject) {
      $.post('/AjaxController/getProductByProductId', {
        data: {
          intProductId: intProductId
        },
        success: function (objProduct) {
          callBackResolve(objProduct);
        },
        error: function (objError) {
          callBackReject(objError);
        }
      });
    });

    return objPromise;
  }

  window.objIndexedDB.then(function (objDb) {
    return objDb.transaction('store', 'readonly').objectStore('Product').get(1).loadArrayIntoJqueryObj();
  }).then(function () {
    return getProductByProductId().then(function (arrayData) {
      arrayData.loadArrayIntoJqueryObj();

      return arrayData;
    })).then(function (arrayData) {
      return window.objIndexedDB.then(function (objDb) {
        var objTransaction = objDB.transaction('store', 'readwrite');
        objTransaction.objectStore('Product').put(arrayData);

        return objTransaction.complete;
      });
    })
}).catch(function (objError) {
  console.log('Something went wrong with the Error as ' + objError);
});
});
require('../../bootstrap.js');

$(document).ready(function () {
  function getOrderByOrderId() {
    var objPromise = new Promise(function (callBackResolve, callBackReject) {
      $.post('/AjaxController/getOrderByOrderId', {
        data: {
          intOrderId: intOrderId
        },
        success: function (objOrder) {
          callBackResolve(objOrder);
        },
        error: function (objError) {
          callBackReject(objError);
        }
      });
    });

    return objPromise;
  }

  window.objIndexedDB.then(function (objDb) {
    return objDb.transaction('store', 'readonly').objectStore('Order').get(1).loadArrayIntoJqueryObj();
  }).then(function () {
    return getOrderByOrderId().then(function (arrayData) {
      arrayData.loadArrayIntoJqueryObj();

      return arrayData;
    });
  }).then(function (arrayData) {
    return window.objIndexedDB.then(function (objDb) {
      var objTransaction = objDB.transaction('store', 'readwrite');
      objTransaction.objectStore('Order').put(arrayData);

      return objTransaction.complete;
    });
  }).catch(function (objError) {
    console.log('Something went wrong with the Error as ' + objError);
  });
});
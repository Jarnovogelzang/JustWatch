require('../../bootstrap.js');

$(document).ready(function () {
  function fetchOrders() {
    var objPromise = new Promise(function (callBackResolve, callBackReject) {
      $.post('/AjaxController/fetchOrders', {
        success: function (arrayOrders) {
          callBackResolve(arrayOrders);
        },
        error: function (objError) {
          callBackReject(objError);
        }
      });
    });

    return objPromise;
  }

  window.objIndexedDB.then(function (objDb) {
    return objDb.transaction('store', 'readonly').objectStore('Order').getAll().each(function (objOrder) {
      objOrder.addToTableAsRow();
    });
  }).then(function () {
    return fetchOrders().then(function (arrayOrders) {
      arrayOrders.each(function (objOrder) {
        objOrder.loadArrayIntoJqueryObj();
      });

      return arrayOrders;
    });
  }).then(function (arrayOrders) {
    return window.objIndexedDB.then(function (objDb) {
      var objTransaction = objDB.transaction('store', 'readwrite');
      var objStore = objTransaction.objectStore('Order');

      objStore.clear();
      objStore.put(arrayOrders);

      return objTransaction.complete;
    });
  }).catch(function (objError) {
    console.log('Something went wrong with the Error as ' + objError);
  });
});
require('../../bootstrap.js');

document.addEventListener("DOMContentLoaded", function (objEvent) {
  function fetchOrders() {
    return Axios.post('/fetchOrders')
      .then(function (objResult) {
        return objResult;
      }).catch(function (objError) {
        return objError;
      });
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
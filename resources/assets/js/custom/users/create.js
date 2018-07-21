require('../../bootstrap.js');

document.addEventListener("DOMContentLoaded", function (objEvent) {
  function getOrders() {
    return Axios.post('/fetchOrders')
      .then(function (objResult) {
        return objResult;
      }).catch(function (objError) {
        return objError;
      });
  }

  window.objIndexedDB.then(function (objDb) {
    return objDb.transaction('store', 'readonly').objectStore('Order').getAll().loadArrayIntoJqueryObj();
  }).then(function () {
    return getOrders().then(function (arrayOrders) {
      arrayOrders.loadArrayIntoJqueryObj();

      return arrayOrders;
    });
  }).then(function (arrayOrders) {
    return window.objIndexedDB.then(function (objDb) {
      var objTransaction = objDB.transaction('store', 'readwrite');
      objTransaction.objectStore('Order').put(arrayOrders);

      return objTransaction.complete;
    });
  }).catch(function (objError) {
    console.log('Something went wrong with the Error as ' + objError);
  });
});
require('../../bootstrap.js');

document.addEventListener("DOMContentLoaded", function (objEvent) {
  function getProducts() {
    return Axios.post('/fetchProducts')
      .then(function (objResult) {
        return objResult;
      }).catch(function (objError) {
        return objError;
      });
  }

  window.objIndexedDB.then(function (objDb) {
    return objDb.transaction('store', 'readonly').objectStore('Product').getAll().loadArrayIntoJqueryObj();
  }).then(function () {
    return getProducts().then(function (arrayProducts) {
      arrayProducts.loadArrayIntoJqueryObj();

      return arrayProducts;
    });
  }).then(function (arrayProducts) {
    return window.objIndexedDB.then(function (objDb) {
      var objTransaction = objDB.transaction('store', 'readwrite');
      objTransaction.objectStore('Product').put(arrayProducts);

      return objTransaction.complete;
    });
  }).catch(function (objError) {
    console.log('Something went wrong with the Error as ' + objError);
  });
});
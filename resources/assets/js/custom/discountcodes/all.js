require('../../bootstrap.js');

document.addEventListener("DOMContentLoaded", function (objEvent) {
  function fetchDiscountCodes() {
    return Axios.post('/fetchDiscountCodes')
      .then(function (objResult) {
        return objResult;
      }).catch(function (objError) {
        return objError;
      });
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
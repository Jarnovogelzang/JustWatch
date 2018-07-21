require('../../bootstrap.js');

document.addEventListener("DOMContentLoaded", function (objEvent) {
  function fetchPriceRanges() {
    return Axios.post('/fetchPriceRanges')
      .then(function (objResult) {
        return objResult;
      }).catch(function (objError) {
        return objError;
      });
  }

  window.objIndexedDB.then(function (objDb) {
    return objDb.transaction('store', 'readonly').objectStore('PriceRange').getAll().each(function (objPriceRange) {
      objPriceRange.addToTableAsRow();
    });
  }).then(function () {
    return fetchPriceRanges().then(function (arrayPriceRanges) {
      arrayPriceRanges.each(function (objPriceRange) {
        objPriceRange.loadArrayIntoJqueryObj();
      });

      return arrayPriceRanges;
    });
  }).then(function (arrayPriceRanges) {
    return window.objIndexedDB.then(function (objDb) {
      var objTransaction = objDB.transaction('store', 'readwrite');
      var objStore = objTransaction.objectStore('PriceRange');

      objStore.clear();
      objStore.put(arrayPriceRanges);

      return objTransaction.complete;
    });
  }).catch(function (objError) {
    console.log('Something went wrong with the Error as ' + objError);
  });
});
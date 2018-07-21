require('../../bootstrap.js');

document.addEventListener("DOMContentLoaded", function (objEvent) {
  function getPriceRangeByPriceRangeId() {
    return Axios.post('/getPriceRangeByPriceRangeId', {
      intPriceRangeId: window.intPriceRangeId
    }).then(function (objResult) {
      return objResult;
    }).catch(function (objError) {
      return objError;
    });
  }

  window.objIndexedDB.then(function (objDb) {
    return objDb.transaction('store', 'readonly').objectStore('PriceRange').get(1).loadArrayIntoJqueryObj();
  }).then(function () {
    return getPriceRangeByPriceRangeId().then(function (arrayData) {
      arrayData.loadArrayIntoJqueryObj();

      return arrayData;
    });
  }).then(function (arrayData) {
    return window.objIndexedDB.then(function (objDb) {
      var objTransaction = objDB.transaction('store', 'readwrite');
      objTransaction.objectStore('PriceRange').put(arrayData);

      return objTransaction.complete;
    });
  }).catch(function (objError) {
    console.log('Something went wrong with the Error as ' + objError);
  });
});
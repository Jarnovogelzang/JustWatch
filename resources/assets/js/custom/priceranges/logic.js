require('../../bootstrap.js');

$(document).ready(function () {
  function getPriceRangeByPriceRangeId() {
    var objPromise = new Promise(function (callBackResolve, callBackReject) {
      $.post('/AjaxController/getPriceRangeByPriceRangeId', {
        data: {
          intPriceRangeId: intPriceRangeId
        },
        success: function (objPriceRange) {
          callBackResolve(objPriceRange);
        },
        error: function (objError) {
          callBackReject(objError);
        }
      });
    });

    return objPromise;
  }

  window.objIndexedDB.then(function (objDb) {
    return objDb.transaction('store', 'readonly').objectStore('PriceRange').get(1).loadArrayIntoJqueryObj();
  }).then(function () {
    return getPriceRangeByPriceRangeId().then(function (arrayData) {
      arrayData.loadArrayIntoJqueryObj();

      return arrayData;
    })).then(function (arrayData) {
      return window.objIndexedDB.then(function (objDb) {
        var objTransaction = objDB.transaction('store', 'readwrite');
        objTransaction.objectStore('PriceRange').put(arrayData);

        return objTransaction.complete;
      });
    })
}).catch(function (objError) {
  console.log('Something went wrong with the Error as ' + objError);
});
});
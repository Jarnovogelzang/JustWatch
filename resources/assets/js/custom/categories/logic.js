require('../../bootstrap.js');

$(document).ready(function () {
  function getCategoryByCategoryId() {
    var objPromise = new Promise(function (callBackResolve, callBackReject) {
      $.post('/AjaxController/getCategoryByCategoryId', {
        data: {
          intCategoryId: intCategoryId
        },
        success: function (objCategory) {
          callBackResolve(objCategory);
        },
        error: function (objError) {
          callBackReject(objError);
        }
      });
    });

    return objPromise;
  }

  window.objIndexedDB.then(function (objDb) {
    return objDb.transaction('store', 'readonly').objectStore('Category').get(1).loadArrayIntoJqueryObj();
  }).then(function () {
    return getCategoryByCategoryId().then(function (arrayData) {
      arrayData.loadArrayIntoJqueryObj();

      return arrayData;
    });
  }).then(function (arrayData) {
    return window.objIndexedDB.then(function (objDb) {
      var objTransaction = objDB.transaction('store', 'readwrite');
      objTransaction.objectStore('Category').put(arrayData);

      return objTransaction.complete;
    });
  }).catch(function (objError) {
    console.log('Something went wrong with the Error as ' + objError);
  });
});
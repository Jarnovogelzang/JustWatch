require('../../bootstrap.js');

$(document).ready(function () {
  function fetchCategories() {
    var objPromise = new Promise(function (callBackResolve, callBackReject) {
      $.post('/AjaxController/fetchCategories', {
        success: function (arrayCategories) {
          callBackResolve(arrayCategories);
        },
        error: function (objError) {
          callBackReject(objError);
        }
      });
    });

    return objPromise;
  }

  window.objIndexedDB.then(function (objDb) {
    return objDb.transaction('store', 'readonly').objectStore('Category').getAll().each(function (objCategory) {
      objCategory.addToTableAsRow();
    });
  }).then(function () {
    return fetchCategories().then(function (arrayCategories) {
      arrayCategories.each(function (objCategory) {
        objCategory.loadArrayIntoJqueryObj();
      });

      return arrayCategories;
    });
  }).then(function (arrayCategories) {
    return window.objIndexedDB.then(function (objDb) {
      var objTransaction = objDB.transaction('store', 'readwrite');
      var objStore = objTransaction.objectStore('Category');

      objStore.clear();
      objStore.put(arrayCategories);

      return objTransaction.complete;
    });
  }).catch(function (objError) {
    console.log('Something went wrong with the Error as ' + objError);
  });
});
require('../bootstrap');

$(document).ready(function () {
  function getCategories() {
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
    return objDb.transaction('store', 'readonly').objectStore('Category').getAll().loadArrayIntoJqueryObj();
  }).then(function () {
    return getCategories().then(function (arrayCategories) {
      arrayCategories.loadArrayIntoJqueryObj();

      return arrayCategories;
    });
  }).then(function (arrayCategories) {
    return window.objIndexedDB.then(function (objDb) {
      var objTransaction = objDB.transaction('store', 'readwrite');
      objTransaction.objectStore('Category').put(arrayCategories);

      return objTransaction.complete;
    });
  }).catch(function (objError) {
    console.log('Something went wrong with the Error as ' + objError);
  });
});
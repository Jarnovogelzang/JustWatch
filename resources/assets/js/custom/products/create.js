require('../../bootstrap.js');

document.addEventListener("DOMContentLoaded", function (objEvent) {
  function getCategories() {
    return Axios.post('/fetchCategories')
      .then(function (objResult) {
        return objResult;
      }).catch(function (objError) {
        return objError;
      });
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
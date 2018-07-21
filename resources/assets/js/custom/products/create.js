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

  function getTags() {
    return Axios.post('/fetchTags')
      .then(function (objResult) {
        return objResult;
      }).catch(function (objError) {
        return objError;
      });
  }

  window.objIndexedDB.then(function (objDb) {
    objDb.transaction('store', 'readonly').objectStore('Category').getAll().loadArrayIntoSelect();
    objDb.transaction('store', 'readonly').objectStore('Tag').getAll().loadArrayIntoSelect();
  }).then(function () {
    return Axios.all([getCategories(), getTags()])
      .then(Axios.spread(function (arrayCategories, arrayTags) {
        return window.objIndexedDB.then(function (objDb) {
          var objTransaction = objDB.transaction('store', 'readwrite');

          objTransaction.objectStore('Category').put(arrayCategories);
          objTransaction.objectStore('Tag').put(arrayTags);

          return objTransaction.complete;
        });
      }));
  }).catch(function (objError) {
    Toastr.error('Er is een fout opgetreden! Probeer opnieuw of neem contact op met ons!', 'Foutmelding!');
  });
});
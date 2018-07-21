require('../../bootstrap.js');

document.addEventListener("DOMContentLoaded", function (objEvent) {
  function fetchSpecifications() {
    return Axios.post('/fetchSpecifications')
      .then(function (objResult) {
        return objResult;
      }).catch(function (objError) {
        return objError;
      });
  }

  window.objIndexedDB.then(function (objDb) {
    return objDb.transaction('store', 'readonly').objectStore('Specification').getAll().each(function (objSpecification) {
      objSpecification.addToTableAsRow();
    });
  }).then(function () {
    return fetchSpecifications().then(function (arraySpecifications) {
      arraySpecifications.each(function (objSpecification) {
        objSpecification.loadArrayIntoJqueryObj();
      });

      return arraySpecifications;
    });
  }).then(function (arraySpecifications) {
    return window.objIndexedDB.then(function (objDb) {
      var objTransaction = objDB.transaction('store', 'readwrite');
      var objStore = objTransaction.objectStore('Specification');

      objStore.clear();
      objStore.put(arraySpecifications);

      return objTransaction.complete;
    });
  }).catch(function (objError) {
    console.log('Something went wrong with the Error as ' + objError);
  });
});
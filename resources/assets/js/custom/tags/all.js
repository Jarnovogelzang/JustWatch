require('../../bootstrap.js');

document.addEventListener("DOMContentLoaded", function (objEvent) {
  function fetchTags() {
    return Axios.post('/fetchTags')
      .then(function (objResult) {
        return objResult;
      }).catch(function (objError) {
        return objError;
      });
  }

  window.objIndexedDB.then(function (objDb) {
    return objDb.transaction('store', 'readonly').objectStore('Tag').getAll().each(function (objTag) {
      objTag.addToTableAsRow();
    });
  }).then(function () {
    return fetchTags().then(function (arrayTags) {
      arrayTags.each(function (objTag) {
        objTag.loadArrayIntoJqueryObj();
      });

      return arrayTags;
    });
  }).then(function (arrayTags) {
    return window.objIndexedDB.then(function (objDb) {
      var objTransaction = objDB.transaction('store', 'readwrite');
      var objStore = objTransaction.objectStore('Tag');

      objStore.clear();
      objStore.put(arrayTags);

      return objTransaction.complete;
    });
  }).catch(function (objError) {
    console.log('Something went wrong with the Error as ' + objError);
  });
});
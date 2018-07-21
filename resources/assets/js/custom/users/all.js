require('../../bootstrap.js');

document.addEventListener("DOMContentLoaded", function (objEvent) {
  function fetchUsers() {
    return Axios.post('/fetchUsers')
      .then(function (objResult) {
        return objResult;
      }).catch(function (objError) {
        return objError;
      });
  }

  window.objIndexedDB.then(function (objDb) {
    return objDb.transaction('store', 'readonly').objectStore('User').getAll().each(function (objUser) {
      objUser.addToTableAsRow($('table > tbody'));
    });
  }).then(function () {
    return fetchUsers().then(function (arrayUsers) {
      arrayUsers.each(function (objUser) {
        objUser.loadArrayIntoJqueryObj();
      });

      return arrayUsers;
    });
  }).then(function (arrayUsers) {
    return window.objIndexedDB.then(function (objDb) {
      var objTransaction = objDB.transaction('store', 'readwrite');
      var objStore = objTransaction.objectStore('User');

      objStore.clear();
      objStore.put(arrayUsers);

      return objTransaction.complete;
    });
  }).catch(function (objError) {
    console.log('Something went wrong with the Error as ' + objError);
  });
});
require('../../bootstrap.js');

document.addEventListener("DOMContentLoaded", function (objEvent) {
  function getUsers() {
    return Axios.post('/fetchUsers')
      .then(function (objResult) {
        return objResult;
      }).catch(function (objError) {
        return objError;
      });
  }

  window.objIndexedDB.then(function (objDb) {
    return objDb.transaction('store', 'readonly').objectStore('User').getAll().loadArrayIntoJqueryObj();
  }).then(function () {
    return getUsers().then(function (arrayUsers) {
      arrayUsers.loadArrayIntoJqueryObj();

      return arrayUsers;
    });
  }).then(function (arrayUsers) {
    return window.objIndexedDB.then(function (objDb) {
      var objTransaction = objDB.transaction('store', 'readwrite');
      objTransaction.objectStore('User').put(arrayUsers);

      return objTransaction.complete;
    });
  }).catch(function (objError) {
    console.log('Something went wrong with the Error as ' + objError);
  });
});
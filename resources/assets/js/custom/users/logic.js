require('../../bootstrap.js');

$(document).ready(function () {
  function getUserByUserId() {
    var objPromise = new Promise(function (callBackResolve, callBackReject) {
      $.post('/AjaxController/getUserByUserId', {
        data: {
          intUserId: intUserId
        },
        success: function (objUser) {
          callBackResolve(objUser);
        },
        error: function (objError) {
          callBackReject(objError);
        }
      });
    });

    return objPromise;
  }

  window.objIndexedDB.then(function (objDb) {
    return objDb.transaction('store', 'readonly').objectStore('User').get(1).loadArrayIntoJqueryObj();
  }).then(function () {
    return getUserByUserId().then(function (arrayData) {
      arrayData.loadArrayIntoJqueryObj();

      return arrayData;
    });
  }).then(function (arrayData) {
    return window.objIndexedDB.then(function (objDb) {
      var objTransaction = objDB.transaction('store', 'readwrite');
      objTransaction.objectStore('User').put(arrayData);

      return objTransaction.complete;
    });
  }).catch(function (objError) {
    console.log('Something went wrong with the Error as ' + objError);
  });
});
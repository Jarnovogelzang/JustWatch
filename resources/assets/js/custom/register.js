import idb from 'idb';

window.addEventListener('load', function () {
  if ('serviceWorker' in navigator) {
    objServiceWorkerPromise.then(function (objRegistration) {
      console.log('ServiceWorker succesfully initalized!');
    }).catch(function (objError) {
      console.log('Something went wrong whilst trying to initialize the ServiceWorker.');
    });
  }

  if ('indexedDB' in window) {
    objIndexedDbPromise.then(function (objIndexedDb) {
      window.objIndexedDb = objIndexedDb;
      console.log('IndexedDB succesfully initialized!');
    }).catch(function () {
      console.log('Something went wrong whilst trying to initialize the IndexedDB.');
    });
  }
});

var objServiceWorkerPromise = new Promise(function (callBackResolve, callBackReject) {
  navigator.serviceWorker.register('../worker.js').then(function (objRegistration) {
    callBackResolve(objRegistration);
  }, function (objError) {
    callBackReject(objError);
  });
});

var objIndexedDbPromise = new Promise(function (callBackResolve, callBackReject) {
  return callBackResolve(idb.open('dBMilliSeconde', 1, function (objUpgradeDB) {
    if (!objUpgradeDB.objectStoreNames.contains('User')) {
      var objUserStore = objUpgradeDB.createObjectStore('User', {
        keyPath: 'intId'
      });
    }

    if (!objUpgradeDB.objectStoreNames.contains('Category')) {
      var objCategoryStore = objUpgradeDB.createObjectStore('Category', {
        keyPath: 'intId'
      });
    }

    if (!objUpgradeDB.objectStoreNames.contains('DiscountCode')) {
      var objDiscountCodeStore = objUpgradeDB.createObjectStore('DiscountCode', {
        keyPath: 'intId',
      });
    }

    if (!objUpgradeDB.objectStoreNames.contains('Order')) {
      var objDiscountCodeStore = objUpgradeDB.createObjectStore('Order', {
        keyPath: 'intId',
      });
    }

    if (!objUpgradeDB.objectStoreNames.contains('PriceRange')) {
      var objDiscountCodeStore = objUpgradeDB.createObjectStore('PriceRange', {
        keyPath: 'intId',
      });
    }

    if (!objUpgradeDB.objectStoreNames.contains('Product')) {
      var objDiscountCodeStore = objUpgradeDB.createObjectStore('Product', {
        keyPath: 'intId',
      });
    }
  }));
});

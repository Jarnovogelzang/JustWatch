(function () {
  if ('serviceWorker' in navigator) {
    window.addEventListener('load', function () {
      navigator.serviceWorker.register('../worker.js').then(function (objRegistration) {
        console.log('Service Worker created succesfully!');
      }, function (objError) {
        return;
      });
    });
  }

  return;
})();

(function () {
  if ('indexedDB' in window) {
    var objPromise = idb.open('dBMilliSeconde', 1, function (objUpgradeDB) {
      if (!objUpgradeDB.objectStoreNames.contains('people')) {
        var objPeopleStore = objUpgradeDB.createObjectStore('people', {
          keyPath: 'email'
        });

        objPeopleStore.createIndex('ssn', 'ssn', {
          unique: true
        });
      }

      if (!objUpgradeDB.objectStoreNames.contains('notes')) {
        objUpgradeDB.createObjectStore('notes', {
          autoIncrement: true
        });
      }
      if (!objUpgradeDB.objectStoreNames.contains('logs')) {
        objUpgradeDB.createObjectStore('logs', {
          keyPath: 'id',
          autoIncrement: true
        });
      }
    });
  }

  return;
})();
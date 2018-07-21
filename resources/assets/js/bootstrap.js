/**
 * Load all the required modules
 */
window.Axios = require('axios');
window.Echo = require('laravel-echo');
window.Pusher = require('pusher-js');
window.Toastr = require('toastr');

/**
 * Setup an Axios-instance for requesting the servers
 */
window.objAxiosInstance = Axios.create({
  baseURL: 'http://localhost:1234/getAjaxData/',
  timeout: 1000,
  headers: {
    'X-CSRF-TOKEN': document.head.querySelector("[name=csrf-token]").getAttribute('content')
  },
  responseType: 'json'
});

function makePostPromise(stringUrl, arrayData) {
  return objAxiosInstance.post(stringUrl, arrayData)
    .then(function (objResult) {
      return objResult;
    }).catch(function (objError) {
      return objError;
    });
}

function makeGetPromise(stringUrl, arrayData) {
  return objAxiosInstance.get(stringUrl, arrayData)
    .then(function (objResult) {
      return objResult;
    }).catch(function (objError) {
      return objError;
    });
}

function fetchProductByProductId(arrayData) {
  return makePostPromise('/fetchProductbyProductId', arrayData);
}

function fetchCategoriesByProductId(arrayData) {
  return makePostPromise('/fetchCategoriesByProductId', arrayData);
}

function fetchTagsByProductId(arrayData) {
  return makePostPromise('/fetchTagsByProductId', arrayData);
}

function fetchCategories(arrayData) {
  return makePostPromise('/fetchCategories', arrayData);
}

function fetchTags(arrayData) {
  return makePostPromise('/fetchTags', arrayData);
}

/**
 * IndexedDB-helpers
 */
Object.prototype.readStore = function (stringStore) {
  return this.transaction('store', 'readonly').objectStore(stringStore);
};

Object.prototype.writeStore = function (stringStore) {
  return this.transaction('store', 'readwrite').objectStore(stringStore);
};

Object.prototype.writeStores = function (objStores) {
  for (var stringStore in objStores) {
    this.writeStore(stringStore).put(objStores[stringStore]);
  }
};

function loadOptionArrayFromStore(stringSelectId, stringOptionsStore, stringSelectedOptionsStore) {
  document.getElementById(stringSelectId).loadOptionsArray(
    objDb.readStore(stringOptionsStore).getAll(),
    objDb.readStore(stringSelectedOptionsStore).getAll()
  );
}

/**
 * Make a global function to load data into an input field
 * @param {jQuery} objJQuery 
 */
Object.prototype.loadOptionsFromStore = function (stringOptionsStore, stringSelectedOptionsStore) {
  for (var intI = 0; intI < objDb.readStore(stringOptionsStore).getAll().length; intI++) {
    this.append('<option value="' + arrayOptions[intI].stringKey + '"' + 'selected' + '>' + arrayOptions[intI].stringValue + '</option>');
  }

  return this;
};

Object.prototype.loadOptionsFromStore = function (stringOptionsStore) {
  for (var intI = 0; intI < objDb.readStore(stringOptionsStore).getAll().length; intI++) {
    this.append('<option value="' + arrayOptions[intI].stringKey + '>' + arrayOptions[intI].stringValue + '</option>');
  }

  return this;
};

Object.prototype.loadIntoObjects = function () {
  for (var stringKey in this) {
    document.body.querySelector('[name=' + stringKey + ']').value = this[stringKey];
  }

  return this;
};

Object.prototype.loadRowsFromStore = function (stringRowsStore) {

};

Object.prototype.loadrowsFromArray = function (array) {

};
/**
 * Setup some Toastr-object with the desired configuration
 */
window.Toastr.options.closeButton = true;
window.Toastr.options.preventDuplicates = true;

window.Toastr.options.onShown = function () { };
window.Toastr.options.onHidden = function () { };
window.Toastr.options.onClick = function () { };
window.Toastr.options.onCloseClick = function () { };

/**
 * Setup some Echo-object with the desired configuration
 */
window.Echo = new Echo({
  broadcaster: 'pusher',
  key: 'your-pusher-key',
  encrypted: true
});

window.Echo.private('OrderChannel').listen('Order.Deleted', function (objEvent) {
  window.Toastr.warning('Succesfully deleted your order!', 'Order - Deleted');
}).listen('Order.Stored', function (objEvent) {
  window.Toastr.success('Succesfully stored your order!', 'Order - Stored');
}).listen('Order.Paid', function (objEvent) {
  window.Toastr.success('Succesfully paid your order!', 'Order - Paid');
});

window.Echo.channel('OrderPublicChannel').listen('Order.Paid', function (objEvent) {
  window.Toastr.success('Another order was placed by ' + objEvent.objUser.stringName + '!', 'Order - Placed');
});
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

/**
 * Make a global function to load data into an input field
 * @param {jQuery} objJQuery 
 */
Array.prototype.loadArrayIntoJqueryObj = function (objJQuery) {
  Object.keys(this).each(function (stringKey) {
    $('input[name=' + stringKey + ']').val(arrayData[stringKey]);
  });
};

/**
 * Make a global function to load data into a table row
 * @param {jQuery} objJQuery 
 */
Array.prototype.addToTableAsRow = function (objJQuery) {
  objJQuery.append('<tr></tr>').append(this.each(function (stringKey) {
    return '<td>' + this[stringKey] + '</td>';
  }));
}

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
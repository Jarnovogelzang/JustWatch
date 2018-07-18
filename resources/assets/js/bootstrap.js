/**
 * Load all the required modules
 */
window.jQuery = window.$ = jQuery = $ = require('jquery');
window.Popper = require('popper.js');
window.Echo = require('laravel-echo');
window.Bootstrap = require('bootstrap');
window.Pusher = require('pusher-js');
window.Toastr = require('toastr');

/**
 * Setup an AJAX-default requestsetup for requesting the Server
 */
$(document).ready(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    async: true,
    cache: true
  });
});

/**
 * Setup some Toastr-object with the desired configuration
 */
window.Toastr.options.closeButton = true;
window.Toastr.options.preventDuplicates = true;

window.Toastr.options.onShown = function () {
  console.log('hello');
};

window.Toastr.options.onHidden = function () {
  console.log('goodbye');
};

window.Toastr.options.onClick = function () {
  console.log('clicked');
};

window.Toastr.options.onCloseClick = function () {
  console.log('close button clicked');
};

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
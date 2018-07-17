/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
  window.$ = window.jQuery = require('jquery');

  require('bootstrap');
} catch (objException) {
  console.log(objException);
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo'

window.Pusher = require('pusher-js');

window.Echo = new Echo({
  broadcaster: 'pusher',
  key: 'your-pusher-key',
  encrypted: true
});

window.Toastr = require('toastr');
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
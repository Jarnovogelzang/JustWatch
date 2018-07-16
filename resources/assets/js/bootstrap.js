
window._ = require('lodash');
window.Popper = require('popper.js').default;

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
  window.$ = window.jQuery = require('jquery');

  require('bootstrap');
} catch (e) { }

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
  console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
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

window.Toastr = require('toastr-js');
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
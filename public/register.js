if ('serviceWorker' in navigator) {
  window.addEventListener('load', function () {
    navigator.serviceWorker.register('js/worker.js').then(function (objRegistration) {
      console.log('ServiceWorker registration successful with scope: ' + registration.scope);
    }, function (objError) {
      console.log('ServiceWorker registration failed: ' + objError);
    });
  });
}
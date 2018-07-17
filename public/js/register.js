if ('serviceWorker' in navigator) {
  window.addEventListener('load', function () {
    navigator.serviceWorker.register('../worker.js').then(function (objRegistration) {
      console.log('ServiceWorker registration successful with scope: ' + objRegistration.scope);
    }, function (objError) {
      console.log('ServiceWorker registration failed: ' + objError);
    });
  });
}
require('../../bootstrap.js');

document.addEventListener("DOMContentLoaded", function (objEvent) {
  window.objIndexedDB.then(function (objDb) {
    document.getElementById('selectProduct').loadOptionsFromStore('Product');
  }).then(function () {
    return fetchProducts();
  }).then(function (arrayProducts) {
    document.getElementById('selectProduct').loadOptionsFromArray(arrayProducts);
  }).catch(function (objError) {
    Toastr.error('Er is een fout opgetreden! Probeer opnieuw of neem contact op met ons!', 'Foutmelding!');
  });
});
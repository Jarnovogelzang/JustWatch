require('../../bootstrap.js');

document.addEventListener("DOMContentLoaded", function (objEvent) {
  window.objIndexedDB.then(function (objDb) {
    document.getElementById('selectOrders').loadOptionsFromStore('ORder');
  }).then(function () {
    return fetchOrders();
  }).then(function (arrayOrders) {
    document.getElementById('selectOrders').loadOptionsFromArray(arrayOrders);
  }).catch(function (objError) {
    Toastr.error('Er is een fout opgetreden! Probeer opnieuw of neem contact op met ons!', 'Foutmelding!');
  });
});
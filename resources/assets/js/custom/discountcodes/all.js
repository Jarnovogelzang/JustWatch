require('../../bootstrap.js');

document.addEventListener("DOMContentLoaded", function (objEvent) {
  window.objIndexedDB.then(function (objDb) {
    document.getElementById('tableDiscountCodes').loadRowsFromStore('DiscountCode');
  }).then(function () {
    return fetchDiscountCodes();
  }).then(function (arrayDiscountCodes) {
    document.getElementById('tableDiscountCodes').loadRowsFromArray(arrayDiscountCodes);
  }).catch(function (objError) {
    Toastr.error('Er is een fout opgetreden! Probeer opnieuw of neem contact op met ons!', 'Foutmelding!');
  });
});
require('../../bootstrap.js');

document.addEventListener("DOMContentLoaded", function (objEvent) {
  window.objIndexedDB.then(function (objDb) {
    document.getElementById('tablePriceRanges').loadRowsFromStore('PriceRange');
  }).then(function () {
    return fetchPriceRanges();
  }).then(function (arrayPriceRanges) {
    document.getElementById('tablePriceRanges').loadRowsFromArray(arrayPriceRanges);
  }).catch(function (objError) {
    Toastr.error('Er is een fout opgetreden! Probeer opnieuw of neem contact op met ons!', 'Foutmelding!');
  });
});
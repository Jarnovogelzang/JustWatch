require('../../bootstrap.js');

document.addEventListener("DOMContentLoaded", function (objEvent) {
  window.objIndexedDB.then(function (objDb) {
    document.getElementById('tableSpecifications').loadRowsFromStore('Specification');
  }).then(function () {
    return fetchSpecifications();
  }).then(function (arraySpecifications) {
    document.getElementById('tableSpecifications').loadRowsFromArray(arraySpecifications);
  }).catch(function (objError) {
    Toastr.error('Er is een fout opgetreden! Probeer opnieuw of neem contact op met ons!', 'Foutmelding!');
  });
});
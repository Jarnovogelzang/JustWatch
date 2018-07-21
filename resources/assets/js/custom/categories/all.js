require('../../bootstrap.js');

document.addEventListener("DOMContentLoaded", function (objEvent) {
  window.objIndexedDB.then(function (objDb) {
    document.getElementById('tableCategories').loadRowsFromStore('Category');
  }).then(function () {
    return fetchCategories();
  }).then(function (arrayCategories) {
    document.getElementById('tableCategories').loadRowsFromArray(arrayCategories);
  }).catch(function (objError) {
    Toastr.error('Er is een fout opgetreden! Probeer opnieuw of neem contact op met ons!', 'Foutmelding!');
  });
});
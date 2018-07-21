require('../../bootstrap.js');

document.addEventListener("DOMContentLoaded", function (objEvent) {
  window.objIndexedDB.then(function (objDb) {
    document.getElementById('tableTags').loadRowsFromStore('Tag');
  }).then(function () {
    return fetchTags();
  }).then(function (arrayTags) {
    document.getElementById('tableTags').loadRowsFromArray(arrayTags);
  }).catch(function (objError) {
    Toastr.error('Er is een fout opgetreden! Probeer opnieuw of neem contact op met ons!', 'Foutmelding!');
  });
});
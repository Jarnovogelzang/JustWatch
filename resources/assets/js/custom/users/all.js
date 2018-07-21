require('../../bootstrap.js');

document.addEventListener("DOMContentLoaded", function (objEvent) {
  window.objIndexedDB.then(function (objDb) {
    document.getElementById('tableUsers').loadRowsFromStore('User');
  }).then(function () {
    return fetchUsers();
  }).then(function (arrayUsers) {
    document.getElementById('tableUsers').loadRowsFromArray(arrayUsers);
  }).catch(function (objError) {
    Toastr.error('Er is een fout opgetreden! Probeer opnieuw of neem contact op met ons!', 'Foutmelding!');
  });
});
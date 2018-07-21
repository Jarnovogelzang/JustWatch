require('../../bootstrap.js');

document.addEventListener("DOMContentLoaded", function (objEvent) {
  window.objIndexedDB.then(function (objDb) {
    document.getElementById('selectProducts').loadOptionsFromStore('Product');
    document.getElementById('selectUser').loadOptionsFromStore('User');
  }).then(function () {
    return Axios.all([
      fetchProducts(),
      fetchUsers()
    ]);
  }).then(Axios.spread(function (arrayProducts, arrayUsers) {
    document.getElementById('selectProducts').loadOptionsFromArray(arrayProducts);
    document.getElementById('selectUser').loadOptionsFromArray(arrayUsers);
  })).catch(function (objError) {
    Toastr.error('Er is een fout opgetreden! Probeer opnieuw of neem contact op met ons!', 'Foutmelding!');
  });
});
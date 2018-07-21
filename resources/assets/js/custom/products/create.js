require('../../bootstrap.js');

document.addEventListener("DOMContentLoaded", function (objEvent) {
  window.objIndexedDB.then(function (objDb) {
    document.getElementById('selectTags').loadOptionsFromStore('Tag');
    document.getElementById('selectCategories').loadOptionsFromStore('Category');
    document.getElementById('selectOrders').loadOptionsFromStore('Order');
  }).then(function () {
    return Axios.all([
      fetchTags(),
      fetchCategories(),
      fetchOrders()
    ]);
  }).then(Axios.spread(function (arrayTags, arrayCategories, arrayOrders) {
    document.getElementById('selectTags').loadOptionsFromArray(arrayTags);
    document.getElementById('selectCategories').loadOptionsFromArray(arrayCategories);
    document.getElementById('selectOrders').loadOptionsFromArray(arrayOrders);
  })).catch(function (objError) {
    Toastr.error('Er is een fout opgetreden! Probeer opnieuw of neem contact op met ons!', 'Foutmelding!');
  });
});
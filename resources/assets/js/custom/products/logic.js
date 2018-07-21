require('../../bootstrap.js');

document.addEventListener("DOMContentLoaded", function (objEvent) {
  window.objIndexedDB.then(function (objDb) {
    document.getElementById('selectTags').loadOptionsFromStore('Tag', 'ProductTag');
    document.getElementById('selectCategories').loadOptionsFromStore('Category', 'ProductCategory');
    document.getElementById('selectOrders').loadOptionsFromStore('Order', 'ProductOrder');
  }).then(function () {
    return Axios.all([
      fetchTags(),
      fetchCategories(),
      fetchOrders(),
      fetchOrdersByProductId(window.intProductId),
      fetchCategoriesByProductId(window.intProductId),
      fetchTagsByProductId(window.intProductId)
    ]);
  }).then(Axios.spread(function (arrayTags, arrayCategories, arrayOrders, arraySelectedOrders, arraySelectedCategories, arraySelectedTags) {
    document.getElementById('selectTags').loadOptionsFromArray(arrayTags, arraySelectedTags);
    document.getElementById('selectCategories').loadOptionsFromArray(arrayCategories, arraySelectedCategories);
    document.getElementById('selectOrders').loadOptionsFromArray(arrayOrders, arraySelectedOrders);
  })).catch(function (objError) {
    Toastr.error('Er is een fout opgetreden! Probeer opnieuw of neem contact op met ons!', 'Foutmelding!');
  });
});
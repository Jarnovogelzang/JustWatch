require('../../bootstrap.js');

document.addEventListener("DOMContentLoaded", function (objEvent) {
  window.objIndexedDB.then(function (objDb) {
    document.getElementById('selectProducts').loadOptionsFromStore('Product', 'ProductOrder');
    document.getElementById('selectUser').loadOptionsFromStore('User', 'Order');
  }).then(function () {
    return Axios.all([
      fetchProducts(),
      fetchUsers(),
      fetchProductsByOrderId(),
      fetchUserByOrderId()
    ]);
  }).then(Axios.spread(function (arrayProducts, arrayUsers, arraySelectedProducts, objSelectedUser) {
    document.getElementById('selectProducts').loadOptionsFromArray(arrayProducts, arraySelectedProducts);
    document.getElementById('selectUser').loadOptionsFromArray(arrayUsers, objSelectedUser);
  })).catch(function (objError) {
    Toastr.error('Er is een fout opgetreden! Probeer opnieuw of neem contact op met ons!', 'Foutmelding!');
  });
});
require('../../bootstrap.js');

document.addEventListener("DOMContentLoaded", function (objEvent) {
  window.objIndexedDB.then(function (objDb) {
    document.getElementById('selectOrders').loadOptionsFromStore('Order');
  }).then(function () {
    return Axios.all([
      fetchOrders(),
      fetchUserByUserId(window.intUserId)
    ]);
  }).then(Axios.spread(function (arrayOrders, objUser) {
    document.getElementById('selectOrders').loadOptionsFromArray(arrayOrders);
    objUser.loadIntoObjects();
  })).catch(function (objError) {
    Toastr.error('Er is een fout opgetreden! Probeer opnieuw of neem contact op met ons!', 'Foutmelding!');
  });
});


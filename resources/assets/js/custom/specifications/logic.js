require('../../bootstrap.js');

document.addEventListener("DOMContentLoaded", function (objEvent) {
  window.objIndexedDB.then(function (objDb) {
    document.getElementById('selectProduct').loadOptionsFromStore('Product');
  }).then(function () {
    return Axios.all([
      fetchSpecificationBySpecificationId(window.intSpecificationId),
      fetchProducts(),
      fetchProductBySpecificationId(),
    ]);
  }).then(Axios.spread(function (objSpecification, arrayProducts, objProduct) {
    objSpecification.loadIntoObjects();
    document.getElementById('selectProduct').loadOptionsFromArray(arrayProducts, objProduct);
  })).catch(function (objError) {
    Toastr.error('Er is een fout opgetreden! Probeer opnieuw of neem contact op met ons!', 'Foutmelding!');
  });
});
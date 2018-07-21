require('../../bootstrap.js');

document.addEventListener("DOMContentLoaded", function (objEvent) {
  window.objIndexedDB.then(function (objDb) {
    document.getElementById('selectProducts').loadOptionsFromStore('Product');
  }).then(function () {
    return Axios.all([
      fetchProducts(),
      fetchTagByTagId(window.intTagId)
    ]);
  }).then(Axios.spread(function (arrayProducts, objTag) {
    document.getElementById('selectProducts').loadOptionsFromArray(arrayProducts);
    objUser.loadIntoObjects();
  })).catch(function (objError) {
    Toastr.error('Er is een fout opgetreden! Probeer opnieuw of neem contact op met ons!', 'Foutmelding!');
  });
});


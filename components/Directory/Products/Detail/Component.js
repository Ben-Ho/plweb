Kwf.onElementReady('.directoryProductsDetail', function (el) {
    el.child('.name').on('click', function () {
        var result = window.confirm(trl('Möchten Sie dieses Produkt zur Einkaufsliste hinzufügen?'));
        if (result) {
            var list = window.localStorage.getItem('groceryList');
            var productId = el.dom.getAttribute('data-product-id');
            if (!list) {
                window.localStorage.setItem('groceryList', productId);
            } else {
                window.localStorage.setItem('groceryList', list+';'+productId);
            }
        }
    });
});

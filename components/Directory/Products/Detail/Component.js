Kwf.onElementReady('.directoryProductsDetail', function (el) {
    el.child('.name').on('click', function () {
        var result = window.confirm(trl('Möchten Sie dieses Produkt zur Einkaufsliste hinzufügen?'));
        if (result) {
            var list = window.localStorage.getItem('shoppingList');
            var productId = el.dom.getAttribute('data-product-id');
            if (!list) {
                window.localStorage.setItem('shoppingList', productId);
            } else {
                window.localStorage.setItem('shoppingList', list+';'+productId);
            }
        }
    });
});

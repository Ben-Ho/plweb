Kwf.onElementReady('.shoppingList', function (el) {
    el = el.child('.listContent');
    var list = window.localStorage.getItem('shoppingList');
    if (list) {
        var params = {
            'productIds': list
        };
        Ext.Ajax.request({
            mask: false,
            url: '/admin/javascript/products/json-index',
            params: params,
            success: function (response, options, result) {
                if (response.status == 200) {
                    var listTpl = new Ext.XTemplate(
                        '<div class="list">',
                            '<tpl for="products">',
                                '<div class="product" data-product-id="{id}">',
                                    '<label>',
                                        '<input type="checkbox" class="checkbox" name="{id}" value="{id}"/>',
                                        '<div class="name">{name}</div>',
                                        '<div class="shop">{shop}</div>',
                                        '<div class="price">{price}</div>',
                                    '</label>',
                                '</div>',
                            '</tpl>',
                        '</div>',
                        '<div class="clearList">'+trl('Lösche Liste')+'</div>'
                    );
                    listTpl.overwrite(el, result);
                    el.child('.clearList').on('click', function () {
                        var result = window.confirm(trl('Die Einkaufsliste wirklich löschen?'));
                        if (result) {
                            window.localStorage.removeItem('shoppingList');
                        }
                    });
                }
            },
            scope: this
        });
    }
});

////Hide shoppingList via margin. Aber irgendwie wird dann die Seite größer als der Bidlschirm.
//Kwf.onElementReady('.shoppingList', function (el) {
//    var dragRegionWidth = 20;
//    el.setStyle('margin-right', -(el.getWidth()-dragRegionWidth)+'px');
//    var getMargin = function () {
//        var marginRight = el.getStyle('margin-right');
//        return parseInt(marginRight.substring(0, marginRight.length-2));
//    }
//    el.on('click', function (ev) {
//        var margin = getMargin();
//        if (margin < 0) {
//            el.setStyle('margin-right', '0px');
//        } else {
//            el.setStyle('margin-right', -(el.getWidth() - dragRegionWidth)+'px');
//            var listEl = el.child('.list');
//            listEl.select('.product').each(function (el) {
//                if (el.child('.checkbox').dom.checked) {
//                    var productId = el.dom.getAttribute('data-product-id');
//                    var list = window.localStorage.getItem('shoppingList').split(';');
//                    var newList = new Array();
//                    for(var i = 0; i < list.length; i++) {
//                        if (list[i] != productId) {
//                            newList.push(list[i]);
//                        }
//                    }
//                    window.localStorage.setItem('shoppingList', newList.join(';'));
//                    el.remove();
//                }
//            });
//        }
//    });
//});

// Hide shoppingList via WIDTH
Kwf.onElementReady('.shoppingList', function (el) {
    var dragRegionWidth = 20;
    var shoppingListWidth = el.getWidth();
    el.setWidth(dragRegionWidth);

    var clearCheckedShoppingItems = function () {
        var listEl = el.child('.list');
        listEl.select('.product').each(function (el) {
            if (el.child('.checkbox').dom.checked) {
                var productId = el.dom.getAttribute('data-product-id');
                var list = window.localStorage.getItem('shoppingList').split(';');
                var newList = new Array();
                for(var i = 0; i < list.length; i++) {
                    if (list[i] != productId) {
                        newList.push(list[i]);
                    }
                }
                window.localStorage.setItem('shoppingList', newList.join(';'));
                el.remove();
            }
        });
    };
    el.on('click', function (ev) {
        var width = el.getWidth()
        if (width <= dragRegionWidth) {
            el.setWidth(shoppingListWidth);
        } else {
            el.setWidth(dragRegionWidth);
            clearCheckedShoppingItems();
        }
    });
});

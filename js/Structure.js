Ext.ns('pricelist');
console.log('hier');
pricelist.Structure = Ext.extend(Ext.Panel,
{
    layout: 'border',
    initComponent : function()
    {
        var productsGrid = new Kwf.Auto.GridPanel({
            controllerUrl: '/admin/data/products',
            split: true,
            region: 'center'
        });

        var shopsGrid = new Kwf.Auto.GridPanel({
            controllerUrl: '/admin/data/shops',
            split: true,
            width: 300,
            region: 'west',
            bindings: [{
                queryParam: 'shop_id',
                item: productsGrid
            }]
        });

        this.items = [shopsGrid, productsGrid];
        pricelist.Structure.superclass.initComponent.call(this);
    }
});
Ext.reg('pricelist.structure', pricelist.Structure);

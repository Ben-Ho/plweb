Kwf.onElementReady('.menuMainWrapper', function (el) {
    var dragRegionWidth = 20;
    el.setStyle('margin-left', -(el.getWidth()-dragRegionWidth)+'px');
    var getMargin = function () {
        var marginLeft = el.getStyle('margin-left');
        return parseInt(marginLeft.substring(0, marginLeft.length-2));
    }

    var dragging = false;
    var startX = null;
    var startMargin = getMargin();

    var startFunction = function (posX) {
        dragging = true;
        startX = posX;
        startMargin = getMargin();
    };
    var moveFunction = function (posX) {
        if (dragging) {
            var margin = Math.max(el.getWidth()*-1+dragRegionWidth, startMargin + posX - startX);
            margin = Math.min(margin, 0);
            el.setStyle('margin-left', margin+'px');
        }
    };
    var endFunction = function () {
        dragging = false;
        startX = null;
    };

    el.child('.dragRegion').on('mousedown', function (ev) {
        console.log('Mouse Down Event');
        var mouseMoveFunction = function (ev) {
            moveFunction(ev.xy[0]);
        };
        var mouseEndFunction = function (ev) {
            endFunction();
            Ext.getBody().un('mouseup', mouseEndFunction);
            Ext.getBody().un('mousemove', mouseMoveFunction);
        };

        startFunction(ev.xy[0]);

        Ext.getBody().on('mouseup', mouseEndFunction);
        Ext.getBody().on('mousemove', mouseMoveFunction);
    });

    el.child('.dragRegion').on('touchstart', function (ev) {
        var touchMoveFunction = function (ev) {
            moveFunction(ev.browserEvent.touches[0].pageX);
        };
        var touchEndFunction = function (ev) {
            endFunction();
            Ext.getBody().un('touchend', touchEndFunction);
            Ext.getBody().un('touchmove', touchMoveFunction);
        };

        startFunction(ev.browserEvent.touches[0].pageX);

        Ext.getBody().on('touchend', touchEndFunction);
        Ext.getBody().on('touchmove', touchMoveFunction);
    });
});

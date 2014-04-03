Kwf.onElementReady('.menuMain', function (el) {
    var dragRegionWidth = 20;
    el.setStyle('margin-left', -(el.getWidth()-dragRegionWidth)+'px');
    var getMargin = function () {
        var marginLeft = el.getStyle('margin-left');
        return parseInt(marginLeft.substring(0, marginLeft.length-2));
    }
    el.on('click', function (ev) {
        var margin = getMargin();
        if (margin < 0) {
            el.setStyle('margin-left', '0px');
        } else {
            el.setStyle('margin-left', -(el.getWidth() - dragRegionWidth)+'px');
        }
    });



//    var dragging = false;
//    var startX = null;
//    var startMargin = getMargin();

//    var startFunction = function (posX) {
//        dragging = true;
//        startX = posX;
//        startMargin = getMargin();
//    };
//    var moveFunction = function (posX) {
//        if (dragging) {
//            var margin = Math.max(el.getWidth()*-1+dragRegionWidth, startMargin + posX - startX);
//            margin = Math.min(margin, 0);
//            el.setStyle('margin-left', margin+'px');
//        }
//    };
//    var endFunction = function () {
//        dragging = false;
//        startX = null;
//    };

//    el.child('.dragRegion').on('mousedown', function (ev) {
//        console.log('Mouse Down');
//        var mouseMoveFunction = function (ev) {
//            console.log('Mouse Move');
//            moveFunction(ev.xy[0]);
//        };
//        var mouseEndFunction = function (ev) {
//            console.log('Mouse End');
//            endFunction();
//            Ext.getBody().un('mouseup', mouseEndFunction);
//            Ext.getBody().un('mousemove', mouseMoveFunction);
//        };
//
//        startFunction(ev.xy[0]);
//
//        Ext.getBody().on('mouseup', mouseEndFunction);
//        Ext.getBody().on('mousemove', mouseMoveFunction);
//    });

//    el.child('.dragRegion').on('touchstart', function (ev) {
//        console.log('Touch Start');
//        var touchMoveFunction = function (ev) {
//            console.log('Touch Move');
//            moveFunction(ev.browserEvent.touches[0].pageX);
//        };
//        var touchEndFunction = function (ev) {
//            console.log('Touch End');
//            endFunction();
//            Ext.getBody().un('touchend', touchEndFunction);
//            Ext.getBody().un('touchmove', touchMoveFunction);
//        };
//
//        console.log(ev.browserEvent);
//        console.log(ev.browserEvent.touches[0]);
//        startFunction(ev.browserEvent.touches[0].pageX);
//
//        Ext.getBody().on('touchend', touchEndFunction);
//        Ext.getBody().on('touchmove', touchMoveFunction);
//    });
});

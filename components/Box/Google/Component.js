Kwf.onElementReady('.boxGoogle', function (el) {
    var redirectToGoogle = function () {
        window.location = 'http://www.google.com/search?q='+encodeURI(el.child('input').getValue());
    };
    el.child('input').on('keydown', function (ev) {
        if (ev.keyCode == 13) {
            redirectToGoogle();
        }
    });
    el.child('button').on('click', function () {
        redirectToGoogle();
    });
});

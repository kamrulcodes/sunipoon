(function(){
    // topbar scroll script
    // works to adjust fixed topbars top position when adminbar disapears on scroll.
    const topbar = document.querySelector('#topbar');
    let viewportWidth = document.documentElement.clientWidth;
    window.addEventListener('scroll', function () {

        if ( viewportWidth <= 600 ) {
            if (window.pageYOffset || document.documentElement.scrollTop >= 46 ) {
                topbar.style.top = 0;
            } else {
                topbar.style.top = null;
            }
        }
    })
})();
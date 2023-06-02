import LazyLoad from "vanilla-lazyload";

const rootScript = {
    myLazyLoad: new LazyLoad(),
    initScript: function() {
        rootScript.myLazyLoad.update();
    }
}

document.addEventListener('DOMContentLoaded', function() {
    rootScript.initScript();
})
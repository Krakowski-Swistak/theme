class HeaderPosition {

    static header = document.querySelector('[data-header]');
    static fixedClassname = 'ks-header__fixed';
    static lastScrollTop = 0;
    

    static showHeader() {
        HeaderPosition.header.classList.add(HeaderPosition.fixedClassname)
    }

    static hideHeader() {
        HeaderPosition.header.classList.remove(HeaderPosition.fixedClassname)
    }

    static scrollPage() {
        window.addEventListener("scroll", () => {
            const st = window.pageYOffset || document.documentElement.scrollTop;
            if(window.scrollY > HeaderPosition.header.clientHeight) {
                if (st > HeaderPosition.lastScrollTop){
                    HeaderPosition.hideHeader();
                } else {
                    HeaderPosition.showHeader();
                }
                HeaderPosition.lastScrollTop = st <= 0 ? 0 : st;
            }
            else {
                HeaderPosition.hideHeader();
            }
        }, false);
    }
}

document.addEventListener('DOMContentLoaded', function() {
    console.log(HeaderPosition)
    HeaderPosition.scrollPage();
})
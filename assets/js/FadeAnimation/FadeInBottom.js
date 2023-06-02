class FadeInBottom {
    
    static sections = document.querySelectorAll('.ks-fade');

    static loopSections() {
        FadeInBottom.sections.forEach(section => {
            section.classList.add('is-running');
        });
    }

    static initFadeEffect() {

        FadeInBottom.sections.forEach(section => {
            const fadingElement = section.querySelector(".ks-fadeInBottom");
            window.addEventListener("scroll", () => {
                if(fadingElement !== null){
                    if(section.offsetTop - window.scrollY <= 500) {
                        fadingElement.classList.add('ks-fadeInBottom--active');
                    }
                }
            }, false);
        })
    }
}

document.addEventListener('DOMContentLoaded', function() {
    console.log(FadeInBottom)
    FadeInBottom.initFadeEffect();
})
const caseStudiesSwiper = new Swiper ('[data-slider-case-studies]', {
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    pagination: {
        el: '.ks-case-studies__swiper-pagination',
        clickable: true,
    }
});

const caseStudiesSwiperIndexCounter = {
    indexSpots: Array.from(document.getElementsByClassName('ks-case-studies-swiper-slide')),
    renderIndexInSpots: function() {
        for (let i = 0; i < this.indexSpots.length; i++) {
            const element = this.indexSpots[i];
            const index = i + 1;
            
            if(index <= 9) {
                element.textContent = `0${index}.`;
            }
            else {
                element.textContent = `${index}.`;
            }
        } 
    },
    initSwiper: function() {
        return this.renderIndexInSpots();
    }
};
caseStudiesSwiperIndexCounter.initSwiper();

const contentSwiper = new Swiper('[data-slider-materials]', {
    slidesPerView: 1,
    spaceBetween: 50,
    pagination: {
        el: '.ks-content__swiper-pagination',
        clickable: true,
    },
});

const recommendationsSwiper = new Swiper('[data-slider-recommendation]', {
    slidesPerView: 1,
    spaceBetween: 95,
    pagination: {
        el: '.ks-recommendations__swiper-pagination',
        clickable: true,
    },
    breakpoints: {
        1024: {
        slidesPerView: 2,
        },
    }
});
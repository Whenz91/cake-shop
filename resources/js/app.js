import './bootstrap';

window.addEventListener('load', () => {
    let dateTimeInput = document.querySelector('.js-date-time-input');
    if(dateTimeInput != null) {
        let current = new Date().toISOString().replace('Z', '');
        //dateTimeInput.value = current.split('.')[0];
    }

    let carosuelElem = document.querySelector('.splide');
    let reviewSplide = document.querySelector('.splide.review');

    if(carosuelElem != null) {
        let splide = new Splide( '.splide', {
            type: 'loop',
            autoplay: true,
            arrows: false
        });
        
        splide.mount();
    }

    if(reviewSplide != null) {
        let splide = new Splide( '.splide.review', {
            perPage: 2,
            rewind : true,
            pagination: false,
            gap: '3em',
        });
        
        splide.mount();
    }

})
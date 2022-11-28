const swiper = new Swiper('.swiper', {
    slidesPerView: 1,
    allowTouchMove: false,
    autoHeight: true,
    centeredSlidesBounds: true,
    spaceBetween: 15,
});

const btnStep1Next = document.querySelector('#step1next');
btnStep1Next.onclick = () => swiper.slideNext();

const btnStep2Back = document.querySelector('#step2back');
btnStep2Back.onclick = () => swiper.slidePrev();

const btnStep2Next = document.querySelector('#step2Next');
btnStep2Next.onclick = () => swiper.slideNext();

const btnStep3Back = document.querySelector('#step3back');
btnStep3Back.onclick = () => swiper.slidePrev();
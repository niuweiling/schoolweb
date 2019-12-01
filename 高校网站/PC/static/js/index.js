// swiper轮播图
var mySwiper = new Swiper('#ban', {

    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    loop: true,
    autoplay: {
        delay: 1500,
        disableOnInteraction: false,
    },
})
$(function () {
    $('[data-store-guide-swiper]').each(function () {
        if (this.swiper) return;

        new Swiper(this, {
            loop: true,
            speed: 500,
            pagination: {
                el: $(this).find('.swiper-pagination')[0],
                clickable: true
            },
            autoplay: {
                delay: 4000,
                disableOnInteraction: false
            }
        });
    });
});

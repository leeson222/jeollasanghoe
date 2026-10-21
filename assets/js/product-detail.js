$(function () {
    $('[data-product-gallery]').each(function () {
        const $gallery = $(this);

        // 썸네일 슬라이드
        const thumbs = new Swiper($gallery.find('.product-detail__thumb-swiper')[0], {
            slidesPerView: 5,
            spaceBetween: 8,
            watchSlidesProgress: true,
            slideToClickedSlide: true,
            speed: 400
        });

        // 메인 이미지 슬라이드
        new Swiper($gallery.find('.product-detail__main-swiper')[0], {
            slidesPerView: 1,
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            speed: 500,
            navigation: {
                prevEl: $gallery.find('.product-detail__swiper-prev')[0],
                nextEl: $gallery.find('.product-detail__swiper-next')[0]
            },
            thumbs: {
                swiper: thumbs,
                autoScrollOffset: 1
            }
        });
    });
});


// 노량진 전라상회 영업 상태
$(function () {
    function updateStoreStatus() {
        const now = new Date();
        const currentMinutes = now.getHours() * 60 + now.getMinutes();

        const isOpen = currentMinutes >= 10 * 60 && currentMinutes < 21 * 60;

        $('[data-store-status]')
            .text(isOpen ? '영업중' : '영업 준비중')
            .toggleClass('is-open', isOpen);
    }

    updateStoreStatus();
    setInterval(updateStoreStatus, 30000);
});


// 하단 스티키 영역 (네비게이션, 우측 스티키)
$(function () {
    var $nav = $('.product-detail--page .product-detail-content__tabs-wrap');
    var $purchase = $('.product-detail--page .product-sticky-purchase');

    if (!$nav.length || !$purchase.length) return;

    // 기존 요소를 area로 감싸기
    $nav.wrap('<div class="product-detail-nav-area"></div>');
    $purchase.wrap('<div class="product-detail-purchase-area"></div>');

    var $navArea = $nav.parent();
    var $purchaseArea = $purchase.parent();

    var ticking = false;

    function getHeaderHeight() {
        return parseFloat(
            getComputedStyle(document.documentElement).getPropertyValue('--header-height')
        ) || 0;
    }

    function updateSticky() {
        var scrollTop = $(window).scrollTop();
        var headerHeight = getHeaderHeight();

        var navHeight = $nav.outerHeight();
        var purchaseHeight = $purchase.outerHeight();

        // area는 자식의 원래 공간을 유지
        $navArea.height(navHeight);
        $purchaseArea.height(purchaseHeight);

        var navTop = $navArea.offset().top;
        var purchaseTop = $purchaseArea.offset().top;

        // NAV 고정
        if (scrollTop + headerHeight >= navTop) {
            $nav.css({
                position: 'fixed',
                top: headerHeight + 'px',
                left: $navArea.offset().left + 'px',
                width: $navArea.outerWidth() + 'px',
                zIndex: 100
            });
        } else {
            $nav.css({
                position: '',
                top: '',
                left: '',
                width: '',
                zIndex: ''
            });
        }

        // 구매 영역은 NAV 바로 아래
        var purchaseFixedTop = headerHeight + navHeight;

        if (scrollTop + purchaseFixedTop >= purchaseTop) {
            $purchase.css({
                position: 'fixed',
                top: purchaseFixedTop + 'px',
                left: $purchaseArea.offset().left + 'px',
                width: $purchaseArea.outerWidth() + 'px',
                zIndex: 90
            });
        } else {
            $purchase.css({
                position: '',
                top: '',
                left: '',
                width: '',
                zIndex: ''
            });
        }
    }

    function requestUpdate() {
        if (ticking) return;

        ticking = true;

        requestAnimationFrame(function () {
            updateSticky();
            ticking = false;
        });
    }

    $(window).on('scroll resize load', requestUpdate);

    updateSticky();
});


// 상세 탭 이동 (일반 상세 페이지 / 주문 상품 모달 공통)
$(document).on('click', '[data-detail-tab]', function () {
    var $button = $(this);
    var sectionName = $button.attr('data-detail-tab');
    var $detail = $button.closest('[data-product-detail]');
    var $tabs = $detail.find('.product-detail-content__tabs-wrap').first();
    var $section = $detail.find('[data-detail-section="' + sectionName + '"]').first();

    if (!$section.length) return;

    $button
        .addClass('is-active')
        .attr('aria-current', 'true')
        .siblings('[data-detail-tab]')
        .removeClass('is-active')
        .removeAttr('aria-current');

    var tabsHeight = $tabs.outerHeight() || 0;

    if ($detail.hasClass('product-detail--order')) {
        var $scrollContainer = $detail.closest('.order-product-modal__content');
        var targetTop = $scrollContainer.scrollTop()
            + $section.offset().top
            - $scrollContainer.offset().top
            - tabsHeight;

        $scrollContainer.stop(true).animate({
            scrollTop: Math.max(0, targetTop)
        }, 400);

        return;
    }

    var headerHeight = parseFloat(
        getComputedStyle(document.documentElement).getPropertyValue('--header-height')
    ) || 0;

    $('html, body').stop(true).animate({
        scrollTop: Math.max(0, $section.offset().top - headerHeight - tabsHeight)
    }, 400);
});


// 상품상세 더보기 토글
$(document).on('click', '[data-detail-more]', function () {
    var $button = $(this);
    var $section = $button.closest('.product-detail-content__description');
    var isActive = $button.hasClass('is-active');

    // 접을 때 스크롤 위치 먼저 계산
    var scrollTop = $section.offset().top;

    var headerHeight = parseFloat(
        getComputedStyle(document.documentElement).getPropertyValue('--header-height')
    ) || 0;

    var navHeight = $('.product-detail--page .product-detail-content__tabs-wrap').outerHeight() || 0;

    // 펼치기 / 접기
    $button.toggleClass('is-active', !isActive);
    $section.toggleClass('is-active', !isActive);
    $section.find('[data-detail-image]').toggleClass('is-collapsed', isActive);

    $button.attr('aria-expanded', String(!isActive));

    $button.contents().filter(function () {
        return this.nodeType === 3;
    }).first().replaceWith(isActive ? '상품정보 더보기 ' : '상품정보 접기 ');

    // 접을 때만 상세 영역 상단으로 이동
    if (isActive) {
        $('html, body').stop(true).animate({
            scrollTop: Math.max(0, scrollTop - headerHeight - navHeight)
        }, 400);
    }
});


// 상품 좋아요 토글
$(document).on('click', '[data-product-like]', function () {
    var $button = $(this);
    var isLiked = $button.attr('aria-pressed') === 'true';
    var nextLiked = !isLiked;

    $button
        .attr('aria-pressed', String(nextLiked))
        .attr('aria-label', nextLiked ? '찜 해제' : '찜하기')
        .find('img')
        .attr('src', nextLiked
            ? '/assets/icons/prod-info-like-ico-clicked.svg'
            : '/assets/icons/prod-info-like-ico.svg');
});



// 상품문의 토글

$(function () {
    $(document).on('click', '.product-detail-qna__trigger[data-qna-toggle]', function () {
        var $button = $(this);
        var $item = $button.closest('.product-detail-qna__item');
        var $answer = $item.children('[data-qna-answer]');
        var $list = $item.closest('[data-qna-list]');
        var isOpen = $item.hasClass('is-open');

        if ($button.prop('disabled') || !$answer.length) return;

        // 기존에 열려 있는 다른 문의 닫기
        $list.find('.product-detail-qna__item.is-open').not($item).each(function () {
            var $otherItem = $(this);

            $otherItem.removeClass('is-open');
            $otherItem.find('[data-qna-toggle]').attr('aria-expanded', 'false');
            $otherItem.children('[data-qna-answer]').stop(true, true).slideUp(300);
        });

        // 현재 문의 열기 / 닫기
        $item.toggleClass('is-open', !isOpen);
        $button.attr('aria-expanded', String(!isOpen));

        if (isOpen) {
            $answer.stop(true, true).slideUp(300);
        } else {
            $answer.prop('hidden', false).hide().stop(true, true).slideDown(300);
        }
    });
});

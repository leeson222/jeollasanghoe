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

// 일반 상품상세의 구매 영역을 모바일 전용 바텀시트로 전환합니다.
$(function () {
    const $detail = $('.product-detail--page').first();
    const $purchase = $detail.find('.product-detail__right > .product-detail-purchase').first();
    if (!$purchase.length) return;

    const $placeholder = $('<span hidden data-purchase-sheet-placeholder></span>');
    const $sheet = $(`
        <div class="product-purchase-sheet" aria-hidden="true">
            <button type="button" class="product-purchase-sheet__dim" data-purchase-sheet-close aria-label="구매 옵션 닫기"></button>
            <div class="product-purchase-sheet__container">
                <button type="button" class="product-purchase-sheet__handle-wrap" data-purchase-sheet-close aria-label="구매 옵션 닫기">
                    <span class="product-purchase-sheet__handle"></span>
                </button>
                <div class="product-purchase-sheet__content"></div>
            </div>
        </div>
    `);
    const $mobileBar = $(`
        <div class="product-purchase-mobile-bar">
            <div class="product-purchase-mobile-bar__total" hidden>
                <span>결제금액</span>
                <strong data-mobile-product-total>0원</strong>
            </div>
            <div class="product-purchase-mobile-bar__actions">
                <button type="button" class="btnNormal sizeL" data-purchase-sheet-open>장바구니</button>
                <button type="button" class="btnSubmit sizeL" data-purchase-sheet-open>주문하기</button>
            </div>
        </div>
    `);

    $purchase.before($placeholder);
    $('body').append($sheet, $mobileBar);

    function syncMobilePurchaseBar() {
        const totalText = $purchase.find('[data-product-total]').first().text().trim() || '0원';
        const totalAmount = Number(totalText.replace(/[^0-9]/g, '')) || 0;

        $mobileBar.find('[data-mobile-product-total]').text(totalText);
        $mobileBar.find('.product-purchase-mobile-bar__total').prop('hidden', totalAmount <= 0);

        window.requestAnimationFrame(function () {
            document.documentElement.style.setProperty(
                '--product-purchase-mobile-bar-height',
                $mobileBar.outerHeight() + 'px'
            );
        });
    }

    function updatePagePurchaseSheet() {
        if (window.innerWidth <= 768) {
            $purchase.appendTo($sheet.find('.product-purchase-sheet__content'));
        } else {
            $purchase.insertAfter($placeholder);
            $sheet.removeClass('is-open').attr('aria-hidden', 'true');
            $('body').removeClass('product-purchase-sheet-open');
        }
        syncMobilePurchaseBar();
    }

    $mobileBar.on('click', '[data-purchase-sheet-open]', function () {
        if ($sheet.hasClass('is-open')) {
            const actionSelector = $(this).is(':last-child')
                ? '[data-purchase-action="buy"]'
                : '[data-purchase-action="cart"]';
            const actionUrl = $purchase.find(actionSelector).attr('href');
            if (actionUrl) window.location.href = actionUrl;
            return;
        }

        $sheet.attr('aria-hidden', 'false');
        window.requestAnimationFrame(function () {
            $sheet.addClass('is-open');
        });
        $('body').addClass('product-purchase-sheet-open');
    });

    $sheet.on('click', '[data-purchase-sheet-close]', function () {
        $sheet.removeClass('is-open').attr('aria-hidden', 'true');
        $('body').removeClass('product-purchase-sheet-open');
    });

    new MutationObserver(syncMobilePurchaseBar).observe($purchase.find('[data-product-total]')[0], {
        childList: true,
        characterData: true,
        subtree: true
    });

    let pagePurchaseResizeTimer;
    $(window).on('resize.pagePurchaseSheet', function () {
        window.clearTimeout(pagePurchaseResizeTimer);
        pagePurchaseResizeTimer = window.setTimeout(updatePagePurchaseSheet, 100);
    });

    updatePagePurchaseSheet();
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
    var $layout = $purchase.closest('.product-detail-content__layout');

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
            $purchase.addClass('is-sticky');
            $purchase[0].style.setProperty('--sticky-purchase-top', purchaseFixedTop + 'px');
            purchaseHeight = $purchase.outerHeight();

            if (scrollTop + purchaseFixedTop + purchaseHeight >= $layout.offset().top + $layout.outerHeight()) {
                $purchase.css({
                    position: 'absolute',
                    top: 'auto',
                    right: 0,
                    bottom: 0,
                    left: 'auto',
                    width: $purchaseArea.outerWidth() + 'px',
                    zIndex: 90
                });
            } else {
                $purchase.css({
                    position: 'fixed',
                    top: purchaseFixedTop + 'px',
                    right: 'auto',
                    bottom: 'auto',
                    left: $purchaseArea.offset().left + 'px',
                    width: $purchaseArea.outerWidth() + 'px',
                    zIndex: 90
                });
            }
        } else {
            $purchase.removeClass('is-sticky');
            $purchase[0].style.removeProperty('--sticky-purchase-top');
            $purchase.css({
                position: '',
                top: '',
                right: '',
                bottom: '',
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

// 포토리뷰 목록 및 이미지 상세 모달
$(function () {
    const $detailModal = $('#photo-review-detail-modal');
    let currentPhotoIndex = 0;

    function photoItems() {
        return $('#photo-review-list-modal [data-review-photo-open]');
    }

    function renderPhotoDetail($trigger) {
        const $image = $trigger.find('img').first();
        const $review = $trigger.closest('[data-review-id]');
        const rating = Number($trigger.attr('data-review-rating'))
            || $review.find('.product-detail-reviews__stars img[src*="color"]').length
            || 5;
        const author = $trigger.attr('data-review-author') || $review.find('.product-detail-reviews__author').text().trim();
        const date = $trigger.attr('data-review-date') || $review.find('.product-detail-reviews__date').text().trim();
        const text = $trigger.attr('data-review-text') || $review.find('.product-detail-reviews__text').text().trim();
        let stars = '';

        for (let index = 1; index <= 5; index++) {
            stars += `<img src="/assets/icons/${index <= rating ? 'prod-detail-all-review-star-color.svg' : 'prod-detail-all-review-star-gray.svg'}" alt="">`;
        }

        $detailModal.find('[data-review-detail-image]').attr('src', $image.attr('src') || '/assets/images/prod-img01.png');
        $detailModal.find('[data-review-detail-stars]').html(stars);
        $detailModal.find('[data-review-detail-author]').text(author);
        $detailModal.find('[data-review-detail-date]').text(date);
        $detailModal.find('[data-review-detail-text]').text(text);
    }

    function openPhotoDetail($trigger) {
        const $items = photoItems();
        const matchedIndex = $items.index($trigger);
        if (matchedIndex >= 0) currentPhotoIndex = matchedIndex;

        $('.common-modal.is-open').prop('hidden', true).removeClass('is-open is-closing');
        renderPhotoDetail($trigger);
        $detailModal.prop('hidden', false).addClass('is-open');
        $('body').addClass('modal-open');
    }

    $(document).on('click', '[data-review-photo-open]', function () {
        openPhotoDetail($(this));
    });

    $(document).on('click', '[data-review-photo-prev], [data-review-photo-next]', function () {
        const $items = photoItems();
        if (!$items.length) return;
        currentPhotoIndex += $(this).is('[data-review-photo-next]') ? 1 : -1;
        currentPhotoIndex = (currentPhotoIndex + $items.length) % $items.length;
        renderPhotoDetail($items.eq(currentPhotoIndex));
    });
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

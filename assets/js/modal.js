/**
 * 공통 모달 제어
 *
 * data-modal-open="모달ID" : 일반 모달 열기
 * data-modal-close         : 모달 닫기
 * data-modal-auth="pickup" : 로그인 상태에 따라 매장픽업 모달 분기
 *
 * [프론트 연동 필요]
 * window.isLoggedIn은 퍼블리싱 테스트용 임시 값입니다.
 * 추후 실제 로그인 상태로 대체해 주세요.
 */
$(function () {
    let $activeOrderProductCard = $();

    // 공통 모달 열기
    function openModal(modalId) {
        const $modal = $('#' + modalId);

        if (!$modal.length) {
            console.warn('모달을 찾을 수 없습니다:', modalId);
            return;
        }

        // 기존에 열린 모달 닫기
        $('.common-modal.is-open')
            .prop('hidden', true)
            .removeClass('is-open');

        $modal.prop('hidden', false).addClass('is-open');
        $('body').addClass('modal-open');
        $modal.trigger('modal:opened');
    }

    // 공통 모달 닫기
    function closeModal($modal) {
        $modal.prop('hidden', true).removeClass('is-open');

        if (!$('.common-modal.is-open').length) {
            $('body').removeClass('modal-open');
        }
    }

    // 일반 모달 열기
    $(document).on('click', '[data-modal-open]', function (e) {
        e.preventDefault();

        const modalId = $(this).attr('data-modal-open');

        if (modalId === 'order-product-modal') {
            const $trigger = $(this);
            const $modal = $('#' + modalId);
            $activeOrderProductCard = $trigger.closest('.order-products__list .product-card');
            const productId = $trigger.attr('data-product-id') || '';
            const productName = $trigger.attr('data-product-name') || '';
            const productDescription = $trigger.attr('data-product-description') || '';
            const productImage = $trigger.attr('data-product-image') || '';
            const productRating = $trigger.attr('data-product-rating') || '';
            const productViews = Number($trigger.attr('data-product-views') || 0);
            const productPrice = Number($trigger.attr('data-product-price') || 0);

            $modal.find('[data-product-detail]').attr('data-product-id', productId);
            $modal.find('[data-product-name]').text(productName).attr('data-product-name', productName);
            $modal.find('.product-detail-info__description').text(productDescription);
            $modal.find('[data-product-rating]').text(productRating);
            $modal.find('[data-product-views]').text(productViews.toLocaleString('ko-KR'));
            $modal.find('[data-base-price]').text(productPrice.toLocaleString('ko-KR') + '원');
            $modal.find('[data-product-total], [data-order-product-total]')
                .text(productPrice.toLocaleString('ko-KR') + '원');

            if (productImage) {
                $modal.find('[data-product-gallery] .swiper-slide img').attr({
                    src: productImage,
                    alt: productName
                });
            }
        }

        openModal(modalId);
    });

    $(document).on('modal:opened', '#order-product-modal', function () {
        $(this).find('.swiper').each(function () {
            if (this.swiper) this.swiper.update();
        });
    });

    $(document).on('click', '[data-order-add-menu]', function () {
        if (!$activeOrderProductCard.length) return;

        const $modal = $(this).closest('#order-product-modal');
        const $purchase = $modal.find('[data-purchase-context="order"]');
        const options = [];
        let unitPrice = 0;

        $purchase.find('[data-option-group]').each(function () {
            const $group = $(this);
            const $selected = $group.find('.product-detail-purchase__option.is-selected').first();

            if (!$selected.length) return;

            const groupName = $group.closest('.product-detail-purchase__group')
                .find('.product-detail-purchase__label')
                .first()
                .text()
                .trim();
            const optionName = $selected.attr('data-option-label')
                || $selected.clone().find('strong').remove().end().text().trim();
            const optionPrice = Number($selected.attr('data-option-price') || 0);

            if ($group.attr('data-option-group') === 'size') {
                unitPrice += optionPrice;
                options.push(groupName + ' : ' + optionName + ' - ' + optionPrice.toLocaleString('ko-KR') + '원');
                return;
            }

            options.push(groupName + ' : ' + optionName);
        });

        $purchase.find('.product-detail-purchase__extra.is-selected, .product-detail-purchase__extra[aria-pressed="true"]').each(function () {
            const optionName = $(this).attr('data-extra-label') || $(this).find('span').first().text().trim();
            const optionPrice = Number($(this).attr('data-extra-price') || 0);

            unitPrice += optionPrice;
            options.push('추가옵션 : ' + optionName + ' - ' + optionPrice.toLocaleString('ko-KR') + '원');
        });

        const quantity = Math.max(1, Number(
            $purchase.find('.product-detail-purchase__quantity-value').first().text()
        ) || 1);

        $(document).trigger('order:product-added', [{
            id: $activeOrderProductCard.find('[data-product-id]').attr('data-product-id') || '',
            name: $activeOrderProductCard.find('[data-product-name]').attr('data-product-name') || '',
            options: options,
            unitPrice: unitPrice,
            quantity: quantity
        }]);

        $activeOrderProductCard.addClass('is-selected');
        closeModal($(this).closest('.common-modal'));
        $activeOrderProductCard = $();
    });

    // 로그인 상태에 따른 매장픽업 모달 분기
    $(document).on('click', '[data-modal-auth="pickup"]', function (e) {
        e.preventDefault();

        /**
         * [퍼블리싱 임시 처리 / 프론트 연동 필요]
         * 현재 로그인 여부를 확인할 수 없어 로그인 상태(true)로 고정
         * 추후 실제 로그인 상태 데이터로 교체 필요
         */
        const isLoggedIn = true;

        openModal(
            isLoggedIn ? 'store-pickup-modal' : 'guest-order-modal'
        );
    });

    // 모달 닫기
    $(document).on('click', '[data-modal-close]', function () {
        closeModal($(this).closest('.common-modal'));
    });

    // ESC 닫기
    $(document).on('keydown', function (e) {
        if (e.key !== 'Escape') return;

        $('.common-modal.is-open').each(function () {
            closeModal($(this));
        });
    });
});

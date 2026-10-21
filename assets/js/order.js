
/**
 * [퍼블리싱 임시 구현 / 프론트 연동 필요]
 * - 한 달 단위 달력 렌더링
 * - 이전/다음 월 이동
 * - 오늘 이전 날짜 is-outside 및 disabled 처리
 * - 날짜 선택 시 is-selected 적용
 * - 추후 예약 가능 날짜 및 시간 API 연동 필요
 */
$(function () {
    console.log('달력 초기화 실행');

    const $calendar = $('[data-calendar="order"]');
    console.log('달력 요소 개수:', $calendar.length);

    if (!$calendar.length) return;

    const $days = $calendar.find('[data-calendar-days]');
    const $month = $calendar.find('[data-calendar-month]');
    const $prev = $calendar.find('[data-calendar-action="prev"]');
    const $next = $calendar.find('[data-calendar-action="next"]');

    // 최초 진입 시 오늘 날짜 선택
    const today = new Date();
    today.setHours(0, 0, 0, 0);

    let selectedDate = formatDate(
        today.getFullYear(),
        today.getMonth() + 1,
        today.getDate()
    );

    try {
        const storedDate = window.sessionStorage.getItem('orderDate');
        const parsedDate = storedDate ? new Date(storedDate + 'T00:00:00') : null;

        if (parsedDate && !Number.isNaN(parsedDate.getTime()) && parsedDate >= today) {
            selectedDate = storedDate;
        }
    } catch (error) {
        // 저장소를 사용할 수 없는 환경에서는 오늘 날짜를 사용합니다.
    }

    const initialSelectedDate = new Date(selectedDate + 'T00:00:00');
    let calendarView = new Date(initialSelectedDate.getFullYear(), initialSelectedDate.getMonth(), 1);

    function formatDate(year, month, day) {
        return [
            year,
            String(month).padStart(2, '0'),
            String(day).padStart(2, '0')
        ].join('-');
    }


    function renderCalendar() {
        const year = calendarView.getFullYear();
        const month = calendarView.getMonth() + 1;

        const firstDay = new Date(year, month - 1, 1).getDay();
        const lastDate = new Date(year, month, 0).getDate();
        const prevLastDate = new Date(year, month - 1, 0).getDate();

        const totalCells = Math.ceil((firstDay + lastDate) / 7) * 7;

        let html = '';

        for (let i = 0; i < totalCells; i++) {
            const day = i - firstDay + 1;

            // 이전 달 날짜
            if (day < 1) {
                html += `<span class="order-calendar__day is-outside">${prevLastDate + day}</span>`;
                continue;
            }

            // 다음 달 날짜
            if (day > lastDate) {
                html += `<span class="order-calendar__day is-outside">${day - lastDate}</span>`;
                continue;
            }

            // 현재 달 날짜
            const date = formatDate(year, month, day);
            const currentDate = new Date(year, month - 1, day);

            const isUnavailable = currentDate < today;
            const isSelected = !isUnavailable && date === selectedDate;
            const isSunday = !isUnavailable && currentDate.getDay() === 0;

            html += `
                <button type="button"
                    class="order-calendar__day${isUnavailable ? ' is-outside' : ''}${isSelected ? ' is-selected' : ''}${isSunday ? ' is-sunday' : ''}"
                    data-date="${date}"
                    aria-pressed="${isSelected}"
                    ${isUnavailable ? 'disabled' : ''}>
                    ${day}
                </button>
            `;
        }

        $month.text(`${year}년 ${month}월`);
        $days.html(html);

        const currentMonth = new Date(today.getFullYear(), today.getMonth(), 1);
        const isCurrentMonth = calendarView.getTime() === currentMonth.getTime();
        $prev.prop('disabled', isCurrentMonth);
        $next.prop('disabled', false);
    }


    // 이전 / 다음 월
    $calendar.on('click', '[data-calendar-action]', function () {
        const action = $(this).attr('data-calendar-action');

        if (action === 'prev') {
            const previousMonth = new Date(calendarView.getFullYear(), calendarView.getMonth() - 1, 1);
            const currentMonth = new Date(today.getFullYear(), today.getMonth(), 1);
            if (previousMonth >= currentMonth) calendarView = previousMonth;
        }

        if (action === 'next') {
            calendarView = new Date(calendarView.getFullYear(), calendarView.getMonth() + 1, 1);
        }

        renderCalendar();
    });

    // 날짜 선택
    $calendar.on('click', '[data-date]', function () {
        if ($(this).prop('disabled')) return;

        selectedDate = $(this).attr('data-date');
        try {
            window.sessionStorage.setItem('orderDate', selectedDate);
        } catch (error) {
            // 저장소를 사용할 수 없는 환경에서는 화면 상태만 유지합니다.
        }
        renderCalendar();
    });

    $('[data-time-picker]').on('click', '[data-time]', function () {
        const $time = $(this);

        if ($time.prop('disabled')) return;

        $time.addClass('is-selected').attr('aria-pressed', 'true')
            .siblings('[data-time]')
            .removeClass('is-selected')
            .attr('aria-pressed', 'false');

        try {
            window.sessionStorage.setItem('orderTime', $time.attr('data-time'));
        } catch (error) {
            // 저장소를 사용할 수 없는 환경에서는 화면 상태만 유지합니다.
        }
    });

    // 최초 렌더링
    console.log('렌더링 시작');
    try {
        const storedTime = window.sessionStorage.getItem('orderTime');
        const $storedTime = storedTime ? $('[data-time="' + storedTime + '"]:not(:disabled)').first() : $();

        if ($storedTime.length) {
            $storedTime.addClass('is-selected').attr('aria-pressed', 'true')
                .siblings('[data-time]')
                .removeClass('is-selected')
                .attr('aria-pressed', 'false');
        }

        const selectedTime = $('[data-time-picker] [data-time].is-selected:not(:disabled)').first().attr('data-time') || '';
        window.sessionStorage.setItem('orderDate', selectedDate);
        if (selectedTime) window.sessionStorage.setItem('orderTime', selectedTime);
    } catch (error) {
        // 저장소를 사용할 수 없는 환경에서는 현재 화면 상태만 유지합니다.
    }
    renderCalendar();
});

// 장바구니 선택, 수량 및 결제금액
$(function () {
    const $basket = $('[data-basket]');
    if (!$basket.length) return;

    const formatPrice = value => Number(value || 0).toLocaleString('ko-KR') + '원';

    function updateBasket() {
        const $items = $basket.find('[data-basket-item]');
        const $available = $items.not('.is-sold-out');
        const $selected = $available.filter(function () {
            return $(this).find('[data-basket-check]').prop('checked');
        });
        let total = 0;

        $selected.each(function () {
            total += Number($(this).attr('data-unit-price')) * Number($(this).find('[data-basket-quantity]').text() || 1);
        });

        const allSelected = $available.length > 0 && $selected.length === $available.length;
        const partlySelected = $selected.length > 0 && !allSelected;
        $basket.find('[data-basket-check-all]').prop('checked', allSelected).prop('indeterminate', partlySelected);
        $basket.find('[data-basket-subtotal], [data-basket-total]').text(formatPrice(total));
        $basket.find('[data-basket-selected-count]').text($selected.length);
        $basket.find('[data-basket-purchase]').toggleClass('is-disabled', !$selected.length).attr('aria-disabled', !$selected.length ? 'true' : 'false');
        const isEmpty = $items.length === 0;
        $basket.find('[data-basket-empty]').prop('hidden', !isEmpty);
        $basket.find('.basket-layout').toggleClass('displaynone', isEmpty);
    }

    $basket.on('change', '[data-basket-check-all]', function () {
        $basket.find('[data-basket-check]:not(:disabled)').prop('checked', $(this).prop('checked'));
        updateBasket();
    });

    $basket.on('change', '[data-basket-check]', updateBasket);

    $basket.on('click', '[data-basket-minus], [data-basket-plus]', function () {
        const $item = $(this).closest('[data-basket-item]');
        const $quantity = $item.find('[data-basket-quantity]');
        const current = Number($quantity.text()) || 1;
        const next = Math.max(1, current + ($(this).is('[data-basket-plus]') ? 1 : -1));
        $quantity.text(next);
        $item.find('[data-basket-item-price]').text(formatPrice(Number($item.attr('data-unit-price')) * next));
        updateBasket();
    });

    $basket.on('click', '[data-basket-remove]', function () {
        $(this).closest('[data-basket-item]').remove();
        updateBasket();
    });

    $basket.on('click', '[data-basket-delete-selected]', function () {
        $basket.find('[data-basket-check]:checked').closest('[data-basket-item]').remove();
        updateBasket();
    });

    $basket.on('click', '[data-basket-purchase].is-disabled', function (event) {
        event.preventDefault();
    });

    updateBasket();
});

// 마이페이지/장바구니 옵션 변경 모달
$(function () {
    const $modal = $('#option-change-modal');
    if (!$modal.length) return;

    let $target = $();
    let initialState = '';

    function getState() {
        const values = $modal.find('input[type="hidden"]').map(function () {
            return $(this).val();
        }).get();
        values.push($modal.find('[data-option-change-quantity]').text());
        return values.join('|');
    }

    function updateTotal() {
        const sizePrice = $modal.find('input[name="size"]').val() === 'medium' ? 125000 : 85000;
        const extraPrice = $modal.find('input[name="extra"]').val() === 'vegetable' ? 3000 : 0;
        const quantity = Number($modal.find('[data-option-change-quantity]').text()) || 1;
        $modal.find('[data-option-change-total]').text(((sizePrice + extraPrice) * quantity).toLocaleString('ko-KR') + '원');
    }

    function updateSubmitState() {
        $modal.find('[data-option-change-submit]').prop('disabled', getState() === initialState);
        updateTotal();
    }

    function resetSelects() {
        $modal.find('input[type="hidden"][data-initial-value]').each(function () {
            const $input = $(this);
            const value = $input.attr('data-initial-value');
            const $select = $input.closest('.custom-select');
            const $option = $select.find('[data-value="' + value + '"]').first();
            const text = $.trim($option.text());
            const priceMatch = text.match(/^(.*?)(\d{1,3}(?:,\d{3})*원)$/);
            const $display = $select.find('.custom-select__value');

            $input.val(value);
            if (priceMatch) {
                $display.empty().append(document.createTextNode(priceMatch[1])).append($('<em>').text(priceMatch[2]));
            } else {
                $display.text(text);
            }
            $select.find('[data-value]').removeClass('is-selected').attr('aria-selected', 'false');
            $option.addClass('is-selected').attr('aria-selected', 'true');
        });
    }

    $(document).on('click', '[data-option-change-trigger]', function () {
        $target = $(this).closest('[data-basket-item]');
        if (!$target.length) {
            $target = $(this).closest('[data-myshop-order]').find('[data-order-product]').first();
        }
        const name = $target.find('.basket-item__name, [data-product-name]').first().text().trim() || '줄무늬전갱이회';
        const image = $target.find('.basket-item__thumb img, [data-product-image]').first().attr('src') || '/assets/images/payment-prod-img.png';
        const quantity = Number($target.find('[data-basket-quantity], [data-product-quantity]').first().text()) || 1;

        resetSelects();
        $modal.find('[data-option-change-name]').text(name);
        $modal.find('[data-option-change-image]').attr({ src: image, alt: name });
        $modal.find('[data-option-change-quantity], [data-option-change-product-quantity]').text(quantity);
        initialState = getState();
        updateSubmitState();
    });

    $modal.on('change', 'input[type="hidden"]', updateSubmitState);

    $modal.on('click', '[data-option-change-minus], [data-option-change-plus]', function () {
        const $quantity = $modal.find('[data-option-change-quantity]');
        const current = Number($quantity.text()) || 1;
        $quantity.text(Math.max(1, current + ($(this).is('[data-option-change-plus]') ? 1 : -1)));
        updateSubmitState();
    });

    $modal.on('submit', '[data-option-change-form]', function (event) {
        event.preventDefault();
        if ($modal.find('[data-option-change-submit]').prop('disabled')) return;

        const quantity = Number($modal.find('[data-option-change-quantity]').text()) || 1;
        const sizePrice = $modal.find('input[name="size"]').val() === 'medium' ? 125000 : 85000;
        const extraPrice = $modal.find('input[name="extra"]').val() === 'vegetable' ? 3000 : 0;
        const unitPrice = sizePrice + extraPrice;

        if ($target.is('[data-basket-item]')) {
            $target.attr('data-unit-price', unitPrice);
            $target.find('[data-basket-quantity]').text(quantity);
            $target.find('[data-basket-item-price]').text((unitPrice * quantity).toLocaleString('ko-KR') + '원');
            $target.find('[data-basket-check]').trigger('change');
        } else {
            $target.find('[data-product-quantity]').text(quantity);
        }

        $modal.find('[data-modal-close]').first().trigger('click');
    });
});

// 주문 상품 카테고리 활성화
$(function () {
    $(document).on('click', '.order-products__category [data-category-id]', function () {
        const $item = $(this).closest('li');

        $item.addClass('is-active')
            .siblings('li')
            .removeClass('is-active');
    });
});


// 주문 상품 주문내역
$(function () {
    let toastTimer;

    function formatPrice(value) {
        return Number(value || 0).toLocaleString('ko-KR') + '원';
    }

    function createSummaryProduct(product) {
        const $product = $('<div>', {
            class: 'order-summary__product'
        })
            .attr('data-order-product-id', product.id)
            .attr('data-order-unit-price', product.unitPrice);

        const $info = $('<div>', { class: 'order-summary__product-info' });
        $('<h4>', {
            class: 'order-summary__product-name',
            text: product.name
        }).appendTo($info);

        const $options = $('<ul>', { class: 'order-summary__product-options' });
        product.options.forEach(function (option) {
            $('<li>', { text: option }).appendTo($options);
        });
        $options.appendTo($info);

        const $bottom = $('<div>', { class: 'order-summary__product-bottom flex-btw' });
        $('<strong>', {
            class: 'order-summary__product-price',
            text: formatPrice(product.unitPrice * product.quantity)
        }).attr('data-order-product-price', '').appendTo($bottom);

        const $quantity = $('<div>', {
            class: 'order-summary__quantity product-detail-purchase__quantity flex'
        });
        const $minus = $('<button>', {
            type: 'button',
            class: 'order-summary__quantity-minus product-detail-purchase__quantity-minus',
            'aria-label': '수량 감소'
        }).attr('data-order-quantity-minus', '');
        $('<img>', {
            src: '/assets/icons/quantity-minus.svg',
            alt: '수량 감소'
        }).appendTo($minus);
        $minus.appendTo($quantity);

        $('<span>', {
            class: 'order-summary__quantity-value product-detail-purchase__quantity-value Body-XXS3',
            text: product.quantity
        }).attr('data-order-quantity', '').appendTo($quantity);

        const $plus = $('<button>', {
            type: 'button',
            class: 'order-summary__quantity-plus product-detail-purchase__quantity-plus',
            'aria-label': '수량 증가'
        }).attr('data-order-quantity-plus', '');
        $('<img>', {
            src: '/assets/icons/quantity-plus.svg',
            alt: '수량 증가'
        }).appendTo($plus);
        $plus.appendTo($quantity);

        $quantity.appendTo($bottom);
        $info.appendTo($product);
        $bottom.appendTo($product);

        return $product;
    }

    function findProduct($container, productId) {
        return $container.find('[data-order-product-id]').filter(function () {
            return String($(this).attr('data-order-product-id')) === String(productId);
        }).first();
    }

    function updateSummaryTotal() {
        $('[data-order-summary-total]').each(function () {
            const $total = $(this);
            const $summary = $total.closest('.order-summary');
            let amount = 0;

            $summary.find('[data-order-product-id]').each(function () {
                const $product = $(this);
                const unitPrice = Number($product.attr('data-order-unit-price')) || 0;
                const quantity = Number($product.find('[data-order-quantity]').text()) || 1;

                amount += unitPrice * quantity;
            });

            $total.prop('hidden', amount === 0);
            $total.find('[data-order-grand-total]').text(formatPrice(amount));
        });
    }

    $(document).on('order:product-added', function (event, product) {
        $('[data-order-products]').each(function () {
            const $container = $(this);
            const $existing = findProduct($container, product.id);
            const $product = createSummaryProduct(product);

            $container.find('.order-summary__empty').remove();
            $container.addClass('has-products');

            if ($existing.length) {
                $existing.replaceWith($product);
            } else {
                $container.append($product);
            }
        });

        updateSummaryTotal();
    });

    $(document).on('click', '[data-order-quantity-minus], [data-order-quantity-plus]', function () {
        const $currentProduct = $(this).closest('[data-order-product-id]');
        const productId = $currentProduct.attr('data-order-product-id');
        const currentQuantity = Number($currentProduct.find('[data-order-quantity]').text()) || 1;
        const isPlus = $(this).is('[data-order-quantity-plus]');
        const nextQuantity = Math.max(1, currentQuantity + (isPlus ? 1 : -1));

        $('[data-order-product-id]').filter(function () {
            return String($(this).attr('data-order-product-id')) === String(productId);
        }).each(function () {
            const $product = $(this);
            const unitPrice = Number($product.attr('data-order-unit-price')) || 0;

            $product.find('[data-order-quantity]').text(nextQuantity);
            $product.find('[data-order-product-price]').text(formatPrice(unitPrice * nextQuantity));
        });

        updateSummaryTotal();
    });

    $(document).on('click', '[data-action="order-next"][data-requires-product]', function (event) {
        if ($('[data-order-products] [data-order-product-id]').length) return;

        event.preventDefault();

        let $toast = $('[data-order-toast]');

        if (!$toast.length) {
            $toast = $('<div>', {
                class: 'order-toast',
                role: 'status',
                'aria-live': 'polite',
                text: '상품을 담아 주세요'
            }).attr('data-order-toast', '').appendTo('body');
        }

        window.clearTimeout(toastTimer);
        $toast.addClass('is-show');
        toastTimer = window.setTimeout(function () {
            $toast.removeClass('is-show');
        }, 2000);
    });
});

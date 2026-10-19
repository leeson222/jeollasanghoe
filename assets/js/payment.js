$(function () {
    const $payment = $('[data-order-payment]');
    if (!$payment.length) return;

    const $tabs = $payment.find('[data-tabs="order-payment"]');
    const $summaryType = $payment.find('[data-payment-summary-type]');
    const $summaryMethod = $payment.find('[data-payment-summary-method]');
    const $summaryDate = $payment.find('[data-payment-summary-date]');
    const $pickupDatetime = $payment.find('[data-payment-datetime]');
    const $pickupDate = $payment.find('[data-payment-pickup-date]');
    const $pickupTime = $payment.find('[data-payment-pickup-time]');
    const $pickupDatetimeText = $payment.find('[data-payment-pickup-datetime-text]');
    const $deliverySchedule = $payment.find('[data-delivery-schedule]');
    const $deliveryDate = $payment.find('[data-delivery-date]');
    const $deliveryTime = $payment.find('[data-delivery-time]');
    const $deliveryDatetimeText = $payment.find('[data-delivery-datetime-text]');
    const $datetimeModal = $('#delivery-datetime-modal');
    const $calendarMonth = $datetimeModal.find('[data-delivery-calendar-month]');
    const $calendarDays = $datetimeModal.find('[data-delivery-calendar-days]');
    const $calendarPrev = $datetimeModal.find('[data-delivery-calendar-prev]');
    const $timeOptions = $datetimeModal.find('[data-delivery-time-option]');
    const $datetimeSave = $datetimeModal.find('[data-delivery-datetime-save]');
    const $couponModal = $('#payment-coupon-modal');
    const $couponLabel = $payment.find('[data-payment-coupon-label]');
    let pendingDate = '';
    let pendingTime = '';
    let calendarView = startOfMonth(new Date());
    let $activeDate = $deliveryDate;
    let $activeTime = $deliveryTime;
    let activeScheduleType = 'delivery';

    function readSessionValue(key) {
        try {
            return window.sessionStorage.getItem(key) || '';
        } catch (error) {
            return '';
        }
    }

    function writeSessionValue(key, value) {
        try {
            window.sessionStorage.setItem(key, value);
        } catch (error) {
            // 저장소를 사용할 수 없는 환경에서는 현재 화면 상태만 유지합니다.
        }
    }

    function parseDate(value) {
        if (!/^\d{4}-\d{2}-\d{2}$/.test(value || '')) return null;
        const parts = value.split('-').map(Number);
        const date = new Date(parts[0], parts[1] - 1, parts[2]);
        if (date.getFullYear() !== parts[0] || date.getMonth() !== parts[1] - 1 || date.getDate() !== parts[2]) return null;
        return date;
    }

    function dateValue(date) {
        return [date.getFullYear(), String(date.getMonth() + 1).padStart(2, '0'), String(date.getDate()).padStart(2, '0')].join('-');
    }

    function startOfMonth(date) {
        return new Date(date.getFullYear(), date.getMonth(), 1);
    }

    function formatDate(value) {
        const date = parseDate(value);
        if (!date) return '';
        const weekdays = ['일', '월', '화', '수', '목', '금', '토'];
        return date.getFullYear() + '.' + String(date.getMonth() + 1).padStart(2, '0') + '.' + String(date.getDate()).padStart(2, '0') + ' ' + weekdays[date.getDay()];
    }

    function todayValue() {
        return dateValue(new Date());
    }

    function normalizeTime(value) {
        return String(value || '').replace(/^(오전|오후)\s+/, '');
    }

    function setSummaryDate(date, time) {
        $summaryDate.empty();
        if (!date) {
            $summaryDate.prop('hidden', true);
            return;
        }
        $summaryDate.append(document.createTextNode(date));
        if (time) $summaryDate.append('<br>').append(document.createTextNode(time));
        $summaryDate.prop('hidden', false);
    }

    function pickupDateValue() {
        return $pickupDate.val();
    }

    function pickupTimeValue() {
        return $pickupTime.val();
    }

    function renderPickupDatetime() {
        const date = formatDate(pickupDateValue());
        const time = pickupTimeValue();
        if (!date || !time) {
            $pickupDatetimeText.text('예약 날짜와 시간을 선택해 주세요.');
            return;
        }
        $pickupDatetimeText.text(date + ' ' + time);
    }

    function renderDeliveryDatetime() {
        const date = formatDate($deliveryDate.val());
        const time = $deliveryTime.val();
        $deliveryDatetimeText.text(date && time ? date + ' ' + time : '배송받으실 날짜와 시간을 선택해 주세요.');
    }

    function updateRequestCount(element) {
        const $textarea = $(element);
        $textarea.closest('.order-payment__textarea-wrap').find('[data-request-count]').text($textarea.val().length);
    }

    function updateDeliveryAddressState() {
        const $addressBox = $payment.find('[data-delivery-address-filled]');
        const hasAddress = $.trim($addressBox.text()).length > 0;
        $addressBox.toggleClass('displaynone', !hasAddress);
        $payment.find('[data-delivery-address-empty]').toggleClass('displaynone', hasAddress);
    }

    function updateSummary() {
        const activeTab = $tabs.find('[data-tab][aria-selected="true"]').attr('data-tab') || 'pickup';
        if (activeTab === 'pickup') {
            const $pickupType = $payment.find('input[name="pickup_type"]:checked');
            const date = formatDate(pickupDateValue());
            const time = pickupTimeValue();
            $summaryType.text('매장픽업');
            $summaryMethod.text($pickupType.closest('label').find('span').text().trim());
            setSummaryDate(date && time ? date : '', date && time ? time : '');
            return;
        }

        const $deliveryType = $payment.find('input[name="delivery_type"]:checked');
        const deliveryType = $deliveryType.val();
        $summaryType.text('퀵배송');
        $summaryMethod.text($deliveryType.closest('label').find('span').text().trim());
        $deliverySchedule.prop('hidden', deliveryType !== 'scheduled');
        if (deliveryType === 'immediate') {
            setSummaryDate('', '');
            return;
        }
        const scheduledDate = formatDate($deliveryDate.val());
        const scheduledTime = $deliveryTime.val();
        setSummaryDate(scheduledDate && scheduledTime ? scheduledDate : '', scheduledDate && scheduledTime ? scheduledTime : '');
    }

    function updateDatetimeSaveState() {
        $datetimeSave.prop('disabled', !(pendingDate && pendingTime));
    }

    function renderTimeOptions() {
        $timeOptions.each(function () {
            const $option = $(this);
            const selected = normalizeTime($option.attr('data-delivery-time-option')) === normalizeTime(pendingTime);
            $option.toggleClass('is-selected', selected).attr('aria-pressed', selected ? 'true' : 'false');
        });
    }

    function renderCalendar() {
        const year = calendarView.getFullYear();
        const month = calendarView.getMonth();
        const firstDayIndex = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const cellCount = Math.ceil((firstDayIndex + daysInMonth) / 7) * 7;
        const gridStart = new Date(year, month, 1 - firstDayIndex);
        const today = parseDate(todayValue());
        const isCurrentMonth = calendarView.getTime() === startOfMonth(today).getTime();
        $calendarMonth.text(year + '년 ' + (month + 1) + '월');
        $calendarPrev.toggleClass('is-disable', isCurrentMonth).prop('disabled', isCurrentMonth).attr('aria-disabled', isCurrentMonth ? 'true' : 'false');
        $calendarDays.empty();

        for (let index = 0; index < cellCount; index += 1) {
            const cellDate = new Date(gridStart.getFullYear(), gridStart.getMonth(), gridStart.getDate() + index);
            const value = dateValue(cellDate);
            const isOutside = cellDate.getMonth() !== month;
            const isUnavailable = isOutside || cellDate < today;
            const isSelected = !isUnavailable && value === pendingDate;
            const $day = $('<button type="button"></button>')
                .addClass('order-calendar__day')
                .text(cellDate.getDate())
                .attr('data-delivery-calendar-date', value)
                .toggleClass('is-outside', isUnavailable)
                .toggleClass('is-sunday', !isUnavailable && cellDate.getDay() === 0)
                .toggleClass('is-selected', isSelected)
                .prop('disabled', isUnavailable);
            if (value === todayValue()) $day.attr('aria-current', 'date');
            if (isSelected) $day.attr('aria-pressed', 'true');
            $calendarDays.append($day);
        }
        updateDatetimeSaveState();
    }

    function resetDatetimeDraft() {
        pendingDate = $activeDate.val() || '';
        pendingTime = $activeTime.val() || '';
        const selectedMonth = startOfMonth(parseDate(pendingDate) || new Date());
        const currentMonth = startOfMonth(new Date());
        calendarView = selectedMonth < currentMonth ? currentMonth : selectedMonth;
        renderCalendar();
        renderTimeOptions();
    }

    $tabs.on('tabs:change', updateSummary);
    $payment.on('change', 'input[name="pickup_type"], input[name="delivery_type"], [data-payment-pickup-date], [data-payment-pickup-time], [data-delivery-date], [data-delivery-time]', function () {
        renderPickupDatetime();
        renderDeliveryDatetime();
        updateSummary();
    });
    $payment.on('click', '[data-payment-schedule]', function () {
        activeScheduleType = $(this).attr('data-payment-schedule');
        const isPickup = activeScheduleType === 'pickup';
        $activeDate = isPickup ? $pickupDate : $deliveryDate;
        $activeTime = isPickup ? $pickupTime : $deliveryTime;
    });
    $payment.on('input', '[data-payment-request]', function () {
        updateRequestCount(this);
    });
    $payment.on('payment:delivery-address-updated', updateDeliveryAddressState);
    $('#delivery-address-modal').on('change', 'input[name="delivery_entrance_type"]', function () {
        const useCode = $(this).val() === 'code';
        $('#delivery-address-modal').find('[data-delivery-entrance-code]').prop('disabled', !useCode);
    });
    $datetimeModal.on('modal:opened', resetDatetimeDraft);
    $datetimeModal.on('click', '[data-delivery-calendar-prev]', function () {
        const previousMonth = new Date(calendarView.getFullYear(), calendarView.getMonth() - 1, 1);
        if (previousMonth < startOfMonth(new Date())) return;
        calendarView = previousMonth;
        renderCalendar();
    });
    $datetimeModal.on('click', '[data-delivery-calendar-next]', function () {
        calendarView = new Date(calendarView.getFullYear(), calendarView.getMonth() + 1, 1);
        renderCalendar();
    });
    $datetimeModal.on('click', '[data-delivery-calendar-date]', function () {
        if (this.disabled) return;
        pendingDate = $(this).attr('data-delivery-calendar-date');
        renderCalendar();
    });
    $datetimeModal.on('click', '[data-delivery-time-option]', function () {
        if (this.disabled) return;
        pendingTime = normalizeTime($(this).attr('data-delivery-time-option'));
        renderTimeOptions();
        updateDatetimeSaveState();
    });
    $datetimeSave.on('click', function () {
        if (!pendingDate || !pendingTime) return;
        $activeDate.val(pendingDate).trigger('change');
        $activeTime.val(pendingTime).trigger('change');
        writeSessionValue(activeScheduleType + 'OrderDate', pendingDate);
        writeSessionValue(activeScheduleType + 'OrderTime', pendingTime);
        $datetimeModal.find('[data-modal-close]').first().trigger('click');
    });

    $couponModal.on('click', '[data-payment-coupon-apply]', function () {
        let discount = 0;

        $couponModal.find('[data-payment-coupon]:checked').each(function () {
            discount += Number($(this).val()) || 0;
        });

        if (discount > 0) {
            $couponLabel.empty()
                .append(document.createTextNode('쿠폰 적용 중 '))
                .append($('<em>', {
                    'class': 'order-payment__coupon-amount',
                    text: '-' + discount.toLocaleString('ko-KR') + '원'
                }));
        } else {
            $couponLabel.html('사용가능 쿠폰 <em>5장</em>');
        }

        $payment.find('[data-payment-coupon-discount]').text('-' + discount.toLocaleString('ko-KR') + '원');
        $couponModal.find('[data-modal-close]').first().trigger('click');
    });

    const activeOrderType = $tabs.find('[data-tab][aria-selected="true"]').attr('data-tab') || 'pickup';
    const initialDeliveryType = $payment.find('input[name="delivery_type"]:checked').val();
    const incomingDate = readSessionValue('orderDate');
    const incomingTime = readSessionValue('orderTime');
    const useIncomingPickup = activeOrderType === 'pickup';
    const useIncomingDelivery = activeOrderType === 'delivery' && initialDeliveryType === 'scheduled';
    $pickupDate.val((useIncomingPickup ? incomingDate : '') || readSessionValue('pickupOrderDate'));
    $pickupTime.val((useIncomingPickup ? incomingTime : '') || readSessionValue('pickupOrderTime'));
    $deliveryDate.val((useIncomingDelivery ? incomingDate : '') || readSessionValue('deliveryOrderDate'));
    $deliveryTime.val((useIncomingDelivery ? incomingTime : '') || readSessionValue('deliveryOrderTime'));

    if ($pickupDate.val()) writeSessionValue('pickupOrderDate', $pickupDate.val());
    if ($pickupTime.val()) writeSessionValue('pickupOrderTime', $pickupTime.val());
    if ($deliveryDate.val()) writeSessionValue('deliveryOrderDate', $deliveryDate.val());
    if ($deliveryTime.val()) writeSessionValue('deliveryOrderTime', $deliveryTime.val());

    renderPickupDatetime();
    renderDeliveryDatetime();
    updateDeliveryAddressState();
    $payment.find('[data-payment-request]').each(function () {
        updateRequestCount(this);
    });
    updateSummary();
});

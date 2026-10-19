$(function () {
    let inquiryFiles = [];

    $(document).on('submit', '[data-profile-password-form]', function (event) {
        event.preventDefault();
        const $form = $(this);
        const hasPassword = $.trim($form.find('#profile-current-password').val()).length > 0;

        $form.find('[data-profile-password-error]').prop('hidden', hasPassword);
        if (!hasPassword) return;

        $form.prop('hidden', true);
        $('[data-profile-page] .myshop-profile__title').addClass('is-editing');
        $('[data-myshop-profile]').prop('hidden', false).find('input:not(:disabled)').first().trigger('focus');
    });

    $(document).on('click', '[data-profile-edit-cancel]', function () {
        $('[data-myshop-profile]').prop('hidden', true);
        $('[data-profile-page] .myshop-profile__title').removeClass('is-editing');
        $('[data-profile-password-form]').prop('hidden', false).find('#profile-current-password').val('').trigger('focus');
    });

    $(document).on('modal:opened', '#withdraw-modal', function () {
        $(this).find('[data-withdraw-agree]').prop('checked', false);
        $(this).find('[data-withdraw-submit]').prop('disabled', true);
    });

    $(document).on('change', '[data-withdraw-agree]', function () {
        $(this).closest('#withdraw-modal').find('[data-withdraw-submit]').prop('disabled', !this.checked);
    });

    $(document).on('modal:opened', '#inquiry-write-modal', function () {
        $(this).find('#inquiry-title').trigger('focus');
    });

    $(document).on('click', '[data-inquiry-write], [data-qna-write]', function () {
        const $modal = $('#inquiry-write-modal');
        const form = $modal.find('[data-inquiry-form]')[0];

        if (form) form.reset();
        inquiryFiles = [];
        $modal.find('#inquiry-write-modal-title').text('문의하기');
        $modal.find('[data-inquiry-submit]').text('등록');
        $modal.find('[data-inquiry-previews]').empty();
        $modal.find('.inquiry-write-modal__select').removeClass('is-selected');
        $modal.find('.inquiry-write-modal__select .custom-select__value').text('상품을 선택해 주세요');
    });

    $(document).on('click', '[data-inquiry-edit]', function () {
        const $card = $(this).closest('[data-inquiry-item]');
        const $modal = $('#inquiry-write-modal');
        const form = $modal.find('[data-inquiry-form]')[0];
        const productName = $.trim($card.find('[data-product-name]').first().text());

        if (form) form.reset();
        inquiryFiles = [];
        $modal.find('#inquiry-write-modal-title').text('문의 수정');
        $modal.find('[data-inquiry-submit]').text('수정');
        $modal.find('#inquiry-title').val($.trim($card.find('[data-inquiry-title]').text()));
        $modal.find('#inquiry-content').val($.trim($card.find('[data-inquiry-content]').text()));
        $modal.find('input[name="inquiry_visibility"][value="private"]').prop('checked', $card.find('[data-inquiry-secret]').length > 0);
        $modal.find('input[name="inquiry_visibility"][value="public"]').prop('checked', $card.find('[data-inquiry-secret]').length === 0);
        $modal.find('[data-inquiry-photos]').val('');
        $modal.find('[data-inquiry-previews]').empty();

        if (productName) {
            $modal.find('.inquiry-write-modal__select').addClass('is-selected');
            $modal.find('.inquiry-write-modal__select .custom-select__value').text(productName);
        }
    });

    $(document).on('change', '[data-inquiry-photos]', function (event) {
        const $previews = $(this).siblings('[data-inquiry-previews]');
        inquiryFiles = Array.from(event.target.files).filter(function (file) {
            return file.type.indexOf('image/') === 0;
        });
        $previews.empty();

        inquiryFiles.forEach(function (file, index) {
            const reader = new FileReader();
            reader.onload = function (loadEvent) {
                const $preview = $('<div class="inquiry-write-modal__preview"><img alt="첨부 사진 미리보기" draggable="false"><button type="button" aria-label="첨부 사진 삭제">×</button></div>');
                $preview.attr('data-inquiry-preview-index', index);
                $preview.find('img').attr('src', loadEvent.target.result);
                $previews.append($preview);
            };
            reader.readAsDataURL(file);
        });
    });

    $(document).on('click', '[data-inquiry-preview-index] button', function () {
        const $preview = $(this).closest('[data-inquiry-preview-index]');
        inquiryFiles.splice(Number($preview.attr('data-inquiry-preview-index')), 1);
        $preview.remove();

        const transfer = new DataTransfer();
        inquiryFiles.forEach(function (file) {
            transfer.items.add(file);
        });
        $('[data-inquiry-photos]')[0].files = transfer.files;

        $('[data-inquiry-preview-index]').each(function (index) {
            $(this).attr('data-inquiry-preview-index', index);
        });
    });

    const $cancelReason = $('#order-cancel-reason');
    const $cancelReasonDetail = $('[data-cancel-reason-detail]');

    function updateCancelReasonDetail() {
        const showDetail = $cancelReason.val() === 'other';
        $cancelReasonDetail.toggleClass('displaynone', !showDetail).prop('disabled', !showDetail);
    }

    $cancelReason.on('change', updateCancelReasonDetail);
    updateCancelReasonDetail();

    $(document).on('click', '[data-address-add], [data-address-edit]', function () {
        const isEdit = $(this).is('[data-address-edit]');
        $('#delivery-address-modal-title').text(isEdit ? '배송지 수정' : '배송지 추가');
    });

    $(document).on('click', '[data-coupon-status]', function () {
        const $button = $(this);
        const status = $button.attr('data-coupon-status');

        $button.addClass('is-active').attr('aria-pressed', 'true')
            .siblings('[data-coupon-status]').removeClass('is-active').attr('aria-pressed', 'false');

        $('[data-coupon-item]').each(function () {
            const shouldShow = status === 'all' || $(this).attr('data-coupon-state') === status;
            $(this).toggleClass('displaynone', !shouldShow);
        });
    });

    $(document).on('click', '[data-review-tab]', function () {
        const $tab = $(this);
        const panelName = $tab.attr('data-review-tab');

        $tab.addClass('is-active').attr('aria-selected', 'true')
            .siblings('[data-review-tab]').removeClass('is-active').attr('aria-selected', 'false');
        $('[data-review-panel]').addClass('displaynone');
        $('[data-review-panel="' + panelName + '"]').removeClass('displaynone');
    });

    $(document).on('click', '[data-review-write], [data-review-edit]', function () {
        const isEdit = $(this).is('[data-review-edit]');
        $('#review-write-modal-title').text(isEdit ? '리뷰 수정' : '리뷰 작성');
        $('[data-review-submit]').text(isEdit ? '수정' : '등록');
    });

    $(document).on('click', '[data-review-control]', function () {
        const $button = $(this);
        const $menu = $button.siblings('[data-review-control-menu]');
        const willOpen = $menu.hasClass('displaynone');

        $('[data-review-control-menu]').addClass('displaynone');
        $('[data-review-control]').attr('aria-expanded', 'false');
        $menu.toggleClass('displaynone', !willOpen);
        $button.attr('aria-expanded', willOpen ? 'true' : 'false');
    });

    $(document).on('click', function (event) {
        if ($(event.target).closest('.myshop-review-card__control').length) return;
        $('[data-review-control-menu]').addClass('displaynone');
        $('[data-review-control]').attr('aria-expanded', 'false');
    });

    $(document).on('click', '[data-review-rating-value]', function () {
        const rating = Number($(this).attr('data-review-rating-value'));
        const $ratingControl = $(this).closest('[data-review-rating-control]');

        $ratingControl.find('[data-review-rating-value]').each(function () {
            const isSelected = Number($(this).attr('data-review-rating-value')) <= rating;
            $(this).attr('aria-checked', Number($(this).attr('data-review-rating-value')) === rating ? 'true' : 'false');
            $(this).find('img').attr('src', '/assets/icons/' + (isSelected ? 'prod-detail-all-review-star-color.svg' : 'prod-detail-all-review-star-gray.svg'));
        });
        $('[data-review-rating-input]').val(rating);
    });

    $(document).on('change', '[data-review-image-input]', function () {
        const files = Array.from(this.files || []);
        const $previews = $('[data-review-image-previews]').empty();

        files.forEach(function (file) {
            if (!file.type.startsWith('image/')) return;
            const reader = new FileReader();
            reader.onload = function (event) {
                const $preview = $('<div class="review-write-modal__preview"><img class="review-write-modal__preview-image" alt="첨부한 리뷰 사진" draggable="false"><i class="review-write-modal__preview-delete"><img src="/assets/icons/myshop-review-upload-del.svg" alt=""></i></div>');
                $preview.find('.review-write-modal__preview-image').attr('src', event.target.result);
                $preview.appendTo($previews);
            };
            reader.readAsDataURL(file);
        });
    });

    let previewDrag = null;

    $(document).on('mousedown', '[data-review-image-previews], [data-inquiry-previews]', function (event) {
        if (event.button !== 0 || $(event.target).closest('button').length || this.scrollWidth <= this.clientWidth) return;

        previewDrag = {
            element: this,
            startX: event.pageX,
            scrollLeft: this.scrollLeft
        };
        $(this).addClass('is-dragging');
        event.preventDefault();
    });

    $(document).on('mousemove', function (event) {
        if (!previewDrag) return;
        previewDrag.element.scrollLeft = previewDrag.scrollLeft - (event.pageX - previewDrag.startX);
    });

    $(document).on('mouseup', function () {
        if (!previewDrag) return;
        $(previewDrag.element).removeClass('is-dragging');
        previewDrag = null;
    });

    $(document).on('click', '[data-inquiry-control]', function () {
        const $button = $(this);
        const $menu = $button.siblings('[data-inquiry-control-menu]');
        const willOpen = $menu.hasClass('displaynone');

        $('[data-inquiry-control-menu]').addClass('displaynone');
        $('[data-inquiry-control]').attr('aria-expanded', 'false');
        $menu.toggleClass('displaynone', !willOpen);
        $button.attr('aria-expanded', willOpen ? 'true' : 'false');
    });

    $(document).on('click', function (event) {
        if ($(event.target).closest('.myshop-inquiry-card__control').length) return;
        $('[data-inquiry-control-menu]').addClass('displaynone');
        $('[data-inquiry-control]').attr('aria-expanded', 'false');
    });

    const $calendar = $('[data-myshop-calendar]');
    if (!$calendar.length) return;

    const $dateInputs = $('[data-myshop-date-input]');
    const $periodPresets = $('[data-period-months]');
    const $periodStart = $('[data-period-start]');
    const $periodEnd = $('[data-period-end]');
    const $title = $calendar.find('[data-calendar-title]');
    const $days = $calendar.find('[data-calendar-days]');
    let $activeInput = $();
    let viewDate = new Date();

    function parseDate(value) {
        if (!/^\d{4}-\d{2}-\d{2}$/.test(value || '')) return null;
        const parts = value.split('-').map(Number);
        const date = new Date(parts[0], parts[1] - 1, parts[2]);
        return Number.isNaN(date.getTime()) ? null : date;
    }

    function formatDate(date) {
        return [
            date.getFullYear(),
            String(date.getMonth() + 1).padStart(2, '0'),
            String(date.getDate()).padStart(2, '0')
        ].join('-');
    }

    function subtractMonths(date, months) {
        const result = new Date(date.getFullYear(), date.getMonth(), 1);
        const originalDay = date.getDate();
        result.setMonth(result.getMonth() - months);
        const lastDay = new Date(result.getFullYear(), result.getMonth() + 1, 0).getDate();
        result.setDate(Math.min(originalDay, lastDay));
        return result;
    }

    function renderCalendar() {
        const year = viewDate.getFullYear();
        const month = viewDate.getMonth();
        const gridStart = new Date(year, month, 1 - new Date(year, month, 1).getDay());
        const selectedValue = $activeInput.val();

        $title.text(year + '년 ' + (month + 1) + '월');
        $days.empty();

        for (let index = 0; index < 42; index += 1) {
            const date = new Date(gridStart.getFullYear(), gridStart.getMonth(), gridStart.getDate() + index);
            const value = formatDate(date);
            const isOutside = date.getMonth() !== month;
            const isSelected = value === selectedValue;

            $('<button type="button"></button>')
                .addClass('myshop-calendar__day')
                .toggleClass('is-outside', isOutside)
                .toggleClass('is-sunday', date.getDay() === 0)
                .toggleClass('is-selected', isSelected)
                .attr('data-calendar-date', value)
                .attr('aria-pressed', isSelected ? 'true' : 'false')
                .text(date.getDate())
                .appendTo($days);
        }
    }

    function openCalendar($input) {
        $activeInput = $input;
        const selectedDate = parseDate($input.val()) || new Date();
        viewDate = new Date(selectedDate.getFullYear(), selectedDate.getMonth(), 1);
        $dateInputs.attr('aria-expanded', 'false');
        $input.attr('aria-expanded', 'true');
        $calendar.prop('hidden', false);
        renderCalendar();
    }

    function closeCalendar() {
        $calendar.prop('hidden', true);
        $dateInputs.attr('aria-expanded', 'false');
        $activeInput = $();
    }

    $dateInputs.on('click', function () {
        const $input = $(this);
        if (!$calendar.prop('hidden') && $activeInput.is($input)) {
            closeCalendar();
            return;
        }
        openCalendar($input);
    });

    $periodPresets.on('click', function () {
        const $preset = $(this);
        const months = Number($preset.attr('data-period-months')) || 1;
        const endDate = parseDate($periodEnd.val()) || new Date();
        const startDate = subtractMonths(endDate, months);

        $preset.addClass('is-active').siblings('[data-period-months]').removeClass('is-active');
        $periodStart.val(formatDate(startDate));
        $periodEnd.val(formatDate(endDate));

        if (!$calendar.prop('hidden') && $activeInput.length) {
            const activeDate = parseDate($activeInput.val()) || endDate;
            viewDate = new Date(activeDate.getFullYear(), activeDate.getMonth(), 1);
            renderCalendar();
        }
    });

    $dateInputs.on('change', function () {
        $periodPresets.removeClass('is-active');
    });

    $calendar.on('click', '[data-calendar-prev], [data-calendar-next]', function () {
        const direction = $(this).is('[data-calendar-prev]') ? -1 : 1;
        viewDate = new Date(viewDate.getFullYear(), viewDate.getMonth() + direction, 1);
        renderCalendar();
    });

    $calendar.on('click', '[data-calendar-date]', function () {
        if (!$activeInput.length) return;
        $activeInput.val($(this).attr('data-calendar-date')).trigger('change');
        closeCalendar();
    });

    $(document).on('click', function (event) {
        if ($(event.target).closest('[data-myshop-calendar], [data-myshop-date-input]').length) return;
        closeCalendar();
    });

    $(document).on('keydown', function (event) {
        if (event.key === 'Escape') closeCalendar();
    });
});


$(function () {
    const selector = '.custom-select';

    function closeSelect($select) {
        $select.removeClass('is-open');
        $select.find('.custom-select__trigger').attr('aria-expanded', 'false');
        $select.find('.custom-select__options').prop('hidden', true);
    }

    function openSelect($select) {
        $(selector).not($select).each(function () {
            closeSelect($(this));
        });

        $select.addClass('is-open');
        $select.find('.custom-select__trigger').attr('aria-expanded', 'true');
        $select.find('.custom-select__options').prop('hidden', false);
    }

    // 셀렉트 열기 / 닫기
    $(document).on('click', '.custom-select__trigger', function () {
        const $select = $(this).closest(selector);

        if ($select.hasClass('is-open')) {
            closeSelect($select);
        } else {
            openSelect($select);
        }
    });

    // 옵션 선택
    $(document).on('click', '.custom-select__options button[data-value]', function () {
        const $option = $(this);
        const $select = $option.closest(selector);
        const value = $option.attr('data-value');
        const text = $.trim($option.text());

        $select.find('.custom-select__value').text(text);
        $select.find('input[type="hidden"]').val(value).trigger('change');

        // 선택 완료 클래스
        $select.toggleClass('is-selected', value !== '');

        $select.find('.custom-select__options button')
            .removeClass('is-selected')
            .attr('aria-selected', 'false');

        $option.addClass('is-selected').attr('aria-selected', 'true');

        closeSelect($select);
        $select.find('.custom-select__trigger').trigger('focus');
    });

    // 외부 클릭 시 닫기
    $(document).on('click', function (e) {
        if ($(e.target).closest(selector).length) return;

        $(selector).each(function () {
            closeSelect($(this));
        });
    });

    // 키보드 조작
    $(document).on('keydown', '.custom-select', function (e) {
        const $select = $(this);
        const $trigger = $select.find('.custom-select__trigger');
        const $options = $select.find('.custom-select__options button:not(:disabled)');
        const isOpen = $select.hasClass('is-open');

        if (e.key === 'Escape') {
            if (!isOpen) return;
            e.preventDefault();
            closeSelect($select);
            $trigger.trigger('focus');
            return;
        }

        if (e.key === 'ArrowDown' || e.key === 'ArrowUp') {
            e.preventDefault();

            if (!isOpen) {
                openSelect($select);
                const $selected = $options.filter('.is-selected');
                ($selected.length ? $selected : $options.first()).trigger('focus');
                return;
            }

            const index = $options.index(document.activeElement);
            const nextIndex = e.key === 'ArrowDown'
                ? Math.min(index + 1, $options.length - 1)
                : Math.max(index - 1, 0);

            $options.eq(nextIndex).trigger('focus');
        }
    });

    // 셀렉트 밖으로 포커스 이동 시 닫기
    $(document).on('focusout', '.custom-select', function (e) {
        const $select = $(this);

        setTimeout(function () {
            if (!$select[0].contains(document.activeElement)) {
                closeSelect($select);
            }
        }, 0);
    });
});

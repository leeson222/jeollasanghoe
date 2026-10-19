
$(function () {
    $(document).on('click', '.js-dropdown-trigger', function () {
        const $trigger = $(this);
        const targetId = $trigger.attr('data-dropdown-target');
        const $content = $('#' + targetId);

        if (!$content.length) return;

        const isOpen = $trigger.attr('aria-expanded') === 'true';
        const group = $trigger.attr('data-dropdown-group');

        // 같은 그룹 내 다른 드롭다운 닫기
        if (group && !isOpen) {
            $('.js-dropdown-trigger').filter(function () {
                return $(this).attr('data-dropdown-group') === group;
            }).not($trigger).each(function () {
                closeDropdown($(this));
            });
        }

        if (isOpen) {
            closeDropdown($trigger);
        } else {
            $trigger.attr('aria-expanded', 'true').addClass('is-active');
            $content.prop('hidden', false).addClass('is-open');
        }
    });

    function closeDropdown($trigger) {
        const targetId = $trigger.attr('data-dropdown-target');
        const $content = $('#' + targetId);

        $trigger.attr('aria-expanded', 'false').removeClass('is-active');
        $content.prop('hidden', true).removeClass('is-open');
    }
});

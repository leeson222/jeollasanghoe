$(function () {
    function activateTab($tabs, value, focusTab) {
        const $tabList = $tabs.find('[role="tablist"]').first();
        const $tab = $tabList.find('[data-tab="' + value + '"]').first();
        const $panels = $tabs.find('[data-tab-panel]');

        if (!$tab.length) return;

        $tabList.find('[data-tab]')
            .removeClass('is-active')
            .attr({ 'aria-selected': 'false', tabindex: '-1' });
        $tab.addClass('is-active').attr({ 'aria-selected': 'true', tabindex: '0' });

        $panels.each(function () {
            const $panel = $(this);
            const isActive = $panel.attr('data-tab-panel') === value;

            $panel.toggleClass('is-active', isActive).prop('hidden', !isActive);
        });

        if (focusTab) $tab.trigger('focus');

        $tabs.trigger('tabs:change', [{
            value: value,
            tab: $tab[0],
            panel: $panels.filter('[data-tab-panel="' + value + '"]')[0]
        }]);
    }

    $(document).on('click', '[data-tabs] [data-tab]', function () {
        const $tab = $(this);
        activateTab($tab.closest('[data-tabs]'), $tab.attr('data-tab'), false);
    });

    $(document).on('keydown', '[data-tabs] [role="tablist"] [data-tab]', function (event) {
        if (!['ArrowLeft', 'ArrowRight', 'Home', 'End'].includes(event.key)) return;

        event.preventDefault();

        const $tabs = $(this).closest('[data-tabs]');
        const $items = $(this).closest('[role="tablist"]').find('[data-tab]');
        const currentIndex = $items.index(this);
        let nextIndex = currentIndex;

        if (event.key === 'ArrowLeft') nextIndex = (currentIndex - 1 + $items.length) % $items.length;
        if (event.key === 'ArrowRight') nextIndex = (currentIndex + 1) % $items.length;
        if (event.key === 'Home') nextIndex = 0;
        if (event.key === 'End') nextIndex = $items.length - 1;

        const $next = $items.eq(nextIndex);
        activateTab($tabs, $next.attr('data-tab'), true);
    });
});

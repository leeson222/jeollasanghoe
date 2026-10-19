$(function () {
    const $sort = $('[data-product-sort]');
    const $list = $('[data-product-list]');

    if (!$sort.length || !$list.length) return;

    const $trigger = $sort.find('.product-sort__trigger');
    const $label = $sort.find('[data-product-sort-label]');
    const $options = $sort.find('.product-sort__option');

    $options.on('click', function () {
        const $option = $(this);
        const sortValue = String($option.data('sort-value'));
        const cards = $list.children('.product-card').get();

        cards.sort(function (a, b) {
            const $a = $(a);
            const $b = $(b);

            if (sortValue === 'popular') return Number($b.data('product-view')) - Number($a.data('product-view'));
            if (sortValue === 'low-price') return Number($a.data('product-price')) - Number($b.data('product-price'));
            if (sortValue === 'high-price') return Number($b.data('product-price')) - Number($a.data('product-price'));
            if (sortValue === 'name') return String($a.data('product-name')).localeCompare(String($b.data('product-name')), 'ko');

            return Number($a.data('product-index')) - Number($b.data('product-index'));
        });

        $list.append(cards);
        $options.removeClass('is-selected').attr('aria-selected', 'false');
        $option.addClass('is-selected').attr('aria-selected', 'true');
        $label.text($option.text());
        $trigger.attr('aria-expanded', 'false').removeClass('is-active');
        $sort.find('.product-sort__options').prop('hidden', true).removeClass('is-open');
    });

    $(document).on('click.productSort', function (event) {
        if ($(event.target).closest('[data-product-sort]').length) return;
        $trigger.attr('aria-expanded', 'false').removeClass('is-active');
        $sort.find('.product-sort__options').prop('hidden', true).removeClass('is-open');
    });
});

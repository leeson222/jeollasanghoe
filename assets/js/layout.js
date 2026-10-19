$(function () {
    const $window = $(window);
    const $header = $('#site-header');
    const $searchToggle = $('[data-search-toggle]');
    const $searchPanel = $('[data-search-panel]');
    const $searchDim = $('[data-search-dim]');
    const $menuToggle = $('[data-menu-toggle]');
    const $megaMenu = $('[data-mega-menu]');
    let resizeTimer;

    if (!$header.length) return;

    // =========================================================
    // HEADER SCROLL ACTIVE
    // =========================================================

    function updateHeaderActive() {
        const isScrolled = $window.scrollTop() >= 1;
        const isSearchOpen = $searchPanel.hasClass('is-open');

        $header.toggleClass('is-active', isScrolled || isSearchOpen);
    }

    $window.on('scroll', updateHeaderActive);
    updateHeaderActive();

    // =========================================================
    // HEADER HEIGHT
    // =========================================================

    function updateHeaderHeight() {
        const $currentHeader = $('#site-header:visible, .sub-header:visible').first();
        const $currentFooter = $('#site-footer');

        const headerHeight = $currentHeader.outerHeight() || 0;
        const footerHeight = $currentFooter.outerHeight() || 0;

        document.documentElement.style.setProperty('--header-height', `${headerHeight}px`);
        document.documentElement.style.setProperty('--footer-height', `${footerHeight}px`);
    }

    updateHeaderHeight();

    $window.on('load', updateHeaderHeight);

    $window.on('resize', function () {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(updateHeaderHeight, 100);
    });


    // =========================================================
    // SEARCH
    // =========================================================

    function openSearchPanel() {
        $header.addClass('is-active');

        $searchToggle.attr('aria-expanded', 'true');

        $searchPanel
            .addClass('is-open')
            .attr('aria-hidden', 'false')
            .prop('inert', false);

        $searchDim
            .prop('hidden', false)
            .attr('aria-hidden', 'false');

        $('#header-search-keyword').trigger('focus');
    }

    function closeSearchPanel() {
        $header.removeClass('is-active');

        $searchToggle.attr('aria-expanded', 'false');

        $searchPanel
            .removeClass('is-open')
            .attr('aria-hidden', 'true')
            .prop('inert', true);

        $searchDim
            .prop('hidden', true)
            .attr('aria-hidden', 'true');
    }


    // =========================================================
    // MEGA MENU
    // =========================================================

    if ($menuToggle.length && $megaMenu.length) {
        const $depth3Panel = $megaMenu.find('.mega-menu__panel--depth3');
        const $depth4Panel = $megaMenu.find('.mega-menu__panel--depth4');
        let megaMenuCloseTimer;

        // 첫 번째 대분류는 최초 HTML을 기본 3depth로 사용
        const initialDepth3 = $depth3Panel.html();
        const initialDepth3Id = String($depth3Panel.attr('data-parent-id') || '');


        // -----------------------------------------------------
        // OPEN
        // -----------------------------------------------------

        function openMegaMenu() {
            clearTimeout(megaMenuCloseTimer);

            // 열기 전에 현재 위치 계산
            updateMegaMenuPosition();

            $megaMenu
                .addClass('is-open')
                .attr('aria-hidden', 'false')
                .prop('inert', false);

            $menuToggle.attr({
                'aria-expanded': 'true',
                'aria-label': '전체 상품 메뉴 닫기'
            });

            $depth4Panel
                .empty()
                .removeAttr('data-parent-id');

            $depth3Panel
                .find('.mega-menu__item')
                .removeClass('is-active');
        }

        // 메가메뉴 위치 잡기
        function updateMegaMenuPosition() {
            if (!$menuToggle.length || !$megaMenu.length) return;

            const toggleRect = $menuToggle[0].getBoundingClientRect();
            const headerRect = $header[0].getBoundingClientRect();

            // 햄버거 메뉴 왼쪽 시작점
            const left = toggleRect.left;

            // 헤더 바로 아래
            const top = headerRect.bottom;

            $megaMenu.css({
                left: `${left}px`,
                top: `${top}px`
            });
        }

        // -----------------------------------------------------
        // CLOSE
        // -----------------------------------------------------

        function closeMegaMenu() {
            clearTimeout(megaMenuCloseTimer);

            $megaMenu
                .removeClass('is-open')
                .attr('aria-hidden', 'true')
                .prop('inert', true);

            $menuToggle.attr({
                'aria-expanded': 'false',
                'aria-label': '전체 상품 메뉴 열기'
            });
        }

        function scheduleMegaMenuClose() {
            clearTimeout(megaMenuCloseTimer);
            megaMenuCloseTimer = setTimeout(closeMegaMenu, 100);
        }


        // -----------------------------------------------------
        // ACTIVE
        // -----------------------------------------------------

        function setActiveItem($item) {
            $item
                .siblings('.mega-menu__item')
                .removeClass('is-active');

            $item.addClass('is-active');
        }


        // -----------------------------------------------------
        // 2DEPTH → 3DEPTH
        // -----------------------------------------------------

        function showDepth3($item) {
            const menuId = $item.data('menu-id');

            const $template = $megaMenu.find(
                `[data-mega-template="${menuId}"]`
            );

            setActiveItem($item);

            $depth3Panel.attr('data-parent-id', menuId);

            // 2depth가 바뀌면 기존 4depth는 무조건 초기화
            $depth4Panel
                .empty()
                .removeAttr('data-parent-id');

            // 첫 번째 대분류는 최초 HTML 사용
            if (String(menuId) === initialDepth3Id) {
                $depth3Panel.html(initialDepth3);
            }

            // 나머지는 template 사용
            else if ($template.length) {
                $depth3Panel.html($template.html());
            }

            else {
                $depth3Panel.empty();
            }

            // 새로 그려진 3depth의 active 초기화
            $depth3Panel
                .find('.mega-menu__item')
                .removeClass('is-active');
        }


        // -----------------------------------------------------
        // 3DEPTH → 4DEPTH
        // -----------------------------------------------------

        // function showDepth4($item) {
        //     const menuId = $item.data('menu-id');

        //     const $template = $megaMenu.find(
        //         `[data-mega-template="${menuId}"]`
        //     );

        //     setActiveItem($item);

        //     // 하위 메뉴가 있는 경우
        //     if ($template.length) {
        //         $depth4Panel
        //             .html($template.html())
        //             .attr('data-parent-id', menuId);
        //     }

        //     // 하위 메뉴가 없는 경우 기존 4depth 제거
        //     else {
        //         $depth4Panel
        //             .empty()
        //             .removeAttr('data-parent-id');
        //     }
        // }


        // -----------------------------------------------------
        // MENU OPEN EVENT
        // -----------------------------------------------------

        $menuToggle.on('mouseenter focusin', function () {
            openMegaMenu();
        });

        $megaMenu.on('mouseenter focusin', function () {
            clearTimeout(megaMenuCloseTimer);
        });

        $menuToggle.on('click', function () {
            openMegaMenu();
        });


        // -----------------------------------------------------
        // MENU CLOSE EVENT
        // -----------------------------------------------------

        $menuToggle.on('mouseleave', scheduleMegaMenuClose);
        $megaMenu.on('mouseleave', scheduleMegaMenuClose);

        $menuToggle.add($megaMenu).on('focusout', function () {
            setTimeout(function () {
                const activeElement = document.activeElement;
                const focusIsInToggle = $menuToggle.is(activeElement);
                const focusIsInMegaMenu = $megaMenu[0].contains(activeElement);

                if (!focusIsInToggle && !focusIsInMegaMenu) closeMegaMenu();
            }, 0);
        });


        // -----------------------------------------------------
        // 2DEPTH HOVER
        // -----------------------------------------------------

        $megaMenu.on(
            'mouseenter focusin',
            '.mega-menu__item.has-child[data-depth="2"]',
            function () {
                showDepth3($(this));
            }
        );


        // -----------------------------------------------------
        // 3DEPTH HOVER
        //
        // 자식 없는 메뉴도 이벤트를 받게 함.
        // 그래야 전갱이 → 전어로 이동했을 때
        // 기존 4depth가 사라짐.
        // -----------------------------------------------------

        $megaMenu.on(
            'mouseenter focusin',
            '.mega-menu__item[data-depth="3"]',
            function () {
                showDepth4($(this));
            }
        );
    }


    // =========================================================
    // SEARCH TOGGLE
    // =========================================================

    $searchToggle.on('click', function () {
        const isOpen =
            $(this).attr('aria-expanded') === 'true';

        $megaMenu
            .removeClass('is-open')
            .attr('aria-hidden', 'true')
            .prop('inert', true);

        $menuToggle.attr({
            'aria-expanded': 'false',
            'aria-label': '전체 상품 메뉴 열기'
        });

        if (isOpen) {
            closeSearchPanel();
            return;
        }

        openSearchPanel();
    });


    // =========================================================
    // SEARCH DIM
    // =========================================================

    $searchDim.on('click', function () {
        closeSearchPanel();
        $searchToggle.trigger('focus');
    });


    // =========================================================
    // RECENT SEARCH
    // =========================================================

    $('[data-recent-clear]').on('click', function () {
        $('[data-recent-list]').empty();
    });

    $('[data-recent-list]').on(
        'click',
        '[data-recent-remove]',
        function () {
            $(this)
                .closest('.search-panel__recent-item')
                .remove();
        }
    );


    // =========================================================
    // POPULAR SEARCH
    // =========================================================

    $('[data-popular-list] .search-panel__popular-item')
        .each(function (index) {
            $(this)
                .find('em')
                .text(index + 1);
        });


    // =========================================================
    // ESC
    // =========================================================

    $(document).on('keydown', function (event) {
        if (event.key !== 'Escape') return;

        if ($searchPanel.hasClass('is-open')) {
            closeSearchPanel();
            $searchToggle.trigger('focus');
        }

        if ($megaMenu.hasClass('is-open')) {
            $megaMenu
                .removeClass('is-open')
                .attr('aria-hidden', 'true')
                .prop('inert', true);

            $menuToggle
                .attr({
                    'aria-expanded': 'false',
                    'aria-label': '전체 상품 메뉴 열기'
                })
                .trigger('focus');
        }
    });
});

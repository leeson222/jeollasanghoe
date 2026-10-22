$(function () {
    const $window = $(window);
    const $header = $('#site-header');
    const $searchToggle = $('[data-search-toggle]');
    const $searchPanel = $('[data-search-panel]');
    const $searchDim = $('[data-search-dim]');
    const $menuToggle = $('[data-menu-toggle]');
    const $megaMenu = $('[data-mega-menu]');
    const $mobileProductCategoryToggle = $('[data-mobile-product-category-toggle]');
    const $mobileProductCategoryMenu = $('[data-mobile-product-category-menu]');
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
    // MOBILE SUB HEADER
    // =========================================================

    $('[data-mobile-header-back]').on('click', function (event) {
        if (window.history.length > 1 && document.referrer.indexOf(window.location.origin) === 0) {
            event.preventDefault();
            window.history.back();
        }
    });

    function closeMobileProductCategory() {
        $mobileProductCategoryToggle.attr('aria-expanded', 'false');
        $mobileProductCategoryMenu.attr('aria-hidden', 'true').prop('hidden', true);
    }

    $mobileProductCategoryToggle.on('click', function () {
        const willOpen = $(this).attr('aria-expanded') !== 'true';
        $(this).attr('aria-expanded', String(willOpen));
        $mobileProductCategoryMenu.attr('aria-hidden', String(!willOpen)).prop('hidden', !willOpen);
    });

    $(document).on('click', function (event) {
        if ($mobileProductCategoryMenu.length && !$(event.target).closest('[data-mobile-sub-header]').length) {
            closeMobileProductCategory();
        }
    });

    // =========================================================
    // MOBILE CATEGORY MENU
    // =========================================================

    const $mobileCategoryToggle = $('[data-mobile-category-toggle]');
    const $mobileCategoryMenu = $('[data-mobile-category-menu]');
    const $mobileMenuBar = $('.m-menu-bar');

    function setCurrentMobileMenuActive() {
        const pathname = window.location.pathname.replace(/\/index\.php$/, '/') || '/';
        let currentMenu = '';

        if (pathname === '/') currentMenu = 'home';
        else if (pathname.indexOf('/pages/product/') === 0) currentMenu = 'category';
        else if (pathname === '/pages/order/basket.php') currentMenu = 'cart';
        else if (pathname.indexOf('/pages/myshop/') === 0) currentMenu = 'myshop';

        $mobileMenuBar.find('[data-mobile-nav]').removeClass('is-active').removeAttr('aria-current');

        if (currentMenu) {
            $mobileMenuBar.find('[data-mobile-nav="' + currentMenu + '"]')
                .addClass('is-active')
                .attr('aria-current', 'page');
        }
    }

    setCurrentMobileMenuActive();

    const $activeMobileSubcategory = $('.mobile-product-subcategory__list .is-active');
    if ($activeMobileSubcategory.length) {
        const subcategoryList = $activeMobileSubcategory.closest('.mobile-product-subcategory__list')[0];
        const activeItem = $activeMobileSubcategory[0];
        subcategoryList.scrollLeft = activeItem.offsetLeft - (subcategoryList.clientWidth - activeItem.offsetWidth) / 2;
    }

    $mobileMenuBar.on('click', '> ul > li > a, > ul > li > button', function () {
        $mobileMenuBar.find('> ul > li > a, > ul > li > button').removeClass('is-active');
        $(this).addClass('is-active');

        if (!$(this).is($mobileCategoryToggle) && $mobileCategoryMenu.hasClass('is-open')) {
            closeMobileCategoryMenu(false);
        }
    });

    function openMobileCategoryMenu() {
        $header.addClass('is-active');
        $mobileCategoryMenu.addClass('is-open').attr('aria-hidden', 'false').prop('inert', false);
        $mobileCategoryToggle.attr('aria-expanded', 'true');
        $('body').addClass('mobile-category-open');
    }

    function closeMobileCategoryMenu(restoreCurrentMenu = true) {
        $mobileCategoryMenu.removeClass('is-open').attr('aria-hidden', 'true').prop('inert', true);
        $mobileCategoryToggle.attr('aria-expanded', 'false');
        $('body').removeClass('mobile-category-open');
        if (restoreCurrentMenu) setCurrentMobileMenuActive();
        updateHeaderActive();
    }

    $mobileCategoryToggle.on('click', function () {
        $mobileCategoryMenu.hasClass('is-open') ? closeMobileCategoryMenu() : openMobileCategoryMenu();
    });

    $mobileCategoryMenu.on('click', '[data-mobile-category-id]', function () {
        const categoryId = String($(this).attr('data-mobile-category-id'));

        $mobileCategoryMenu.find('[data-mobile-category-id]').removeClass('is-active').attr('aria-selected', 'false');
        $(this).addClass('is-active').attr('aria-selected', 'true');

        $mobileCategoryMenu.find('[data-mobile-category-panel]')
            .removeClass('is-active')
            .prop('hidden', true)
            .filter('[data-mobile-category-panel="' + categoryId + '"]')
            .addClass('is-active')
            .prop('hidden', false);
    });

    $mobileCategoryMenu.on('click', '[data-mobile-category-close]', closeMobileCategoryMenu);

    // =========================================================
    // HEADER HEIGHT
    // =========================================================

    function updateHeaderHeight() {
        const $currentHeader = $('#site-header:visible, .sub-header:visible').first();
        const $currentFooter = $('#site-footer');
        const $mobileMenuBar = $('.m-menu-bar:visible').first();

        const headerHeight = $currentHeader.outerHeight() || 0;
        const footerHeight = $currentFooter.outerHeight() || 0;
        const mobileMenuBarHeight = $mobileMenuBar.outerHeight() || 0;

        document.documentElement.style.setProperty('--header-height', `${headerHeight}px`);
        document.documentElement.style.setProperty('--footer-height', `${footerHeight}px`);
        document.documentElement.style.setProperty('--m-menu-bar-height', `${mobileMenuBarHeight}px`);
    }

    updateHeaderHeight();

    $window.on('load', updateHeaderHeight);

    $window.on('resize', function () {
        if ($window.width() > 1024 && $mobileCategoryMenu.hasClass('is-open')) {
            closeMobileCategoryMenu();
        }

        if ($window.width() > 1024) closeMobileProductCategory();

        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(updateHeaderHeight, 100);
    });


    // =========================================================
    // SEARCH
    // =========================================================

    function openSearchPanel() {
        closeMobileProductCategory();
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

            $megaMenu.css({
                left: `${left}px`
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

    $('[data-search-back]').on('click', function () {
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

        if ($mobileCategoryMenu.hasClass('is-open')) {
            closeMobileCategoryMenu();
            $mobileCategoryToggle.trigger('focus');
        }

        if ($searchPanel.hasClass('is-open')) {
            closeSearchPanel();
            $searchToggle.trigger('focus');
        }

        if ($mobileProductCategoryToggle.attr('aria-expanded') === 'true') {
            closeMobileProductCategory();
            $mobileProductCategoryToggle.trigger('focus');
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

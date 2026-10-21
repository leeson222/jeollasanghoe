<?php
/**
 * 사이트 공통 헤더 (메인 페이지)
 */
?>
<header class="site-header" id="site-header">
    <div class="site-header__inner flex">
        <div class="site-header__main flex">
            <h1 class="site-header__logo">
                <a href="/" aria-label="전라상회 홈"><img src="/assets/images/logo.svg" alt=""></a>
            </h1>

            <nav class="site-header__navigation" aria-label="주요 메뉴">
                <div class="site-header__navigation-inner inner flex">
                    <button class="site-header__menu-toggle" type="button" aria-label="전체 상품 메뉴 열기" aria-expanded="false" aria-controls="mega-menu" data-menu-toggle><img src="/assets/icons/hamburger.svg" alt=""><img src="/assets/icons/hamburger-active.svg" alt="" hidden></button>
                    <ul class="site-header__menu flex" id="primary-menu">
                        <li><a href="/pages/sub/brand-story.php">브랜드스토리</a></li>
                        <li><a href="/pages/sub/store-guide.php">매장 안내</a></li>
                        <li><a href="/pages/sub/customer-center.php">고객센터</a></li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="site-header__utility flex">
            <button class="site-header__search-toggle search-btn" type="button" aria-expanded="false" aria-controls="header-search-panel" data-search-toggle>
                <span class="site-header__search-label">검색</span>
                <span class="site-header__search-icon" aria-hidden="true"><img src="/assets/icons/h-search-ico.svg" alt=""><img src="/assets/icons/h-search-ico-active.svg" alt="" hidden></span>
            </button>
            <button class="site-header__search-toggle m-search-btn displaynone" type="button" aria-expanded="false" aria-controls="header-search-panel" data-search-toggle>
                <img src="/assets/icons/m-search-ico.svg" alt="" class="m-search-btn-ico">
                <img src="/assets/icons/m-search-ico-hover.svg" alt="" class="m-search-btn-ico-hover">
            </button>

            <div class="site-header__actions flex">
                <nav class="site-header__user-menu site-header__user-menu--guest displaynone flex" aria-label="비회원 메뉴">
                    <div class="site-header__user-menu-wrap flex">
                        <a href="/pages/member/login.php">로그인</a>
                        <a href="/pages/member/join.php">회원가입</a>
                        <a href="#">장바구니 <span class="site-header__cart-count" aria-label="담긴 상품 0개">99+</span></a>
                    </div>
                    <a href="/pages/order/guest-order.php" class="site-header__guest-order-link">비회원 주문조회</a>
                </nav>
                <nav class="site-header__user-menu site-header__user-menu--member flex" aria-label="회원 메뉴" >
                    <a href="#">로그아웃</a>
                    <a href="/pages/myshop/index.php">마이페이지</a>
                    <a href="/pages/order/basket.php">장바구니 <span class="site-header__cart-count" aria-label="담긴 상품 0개">99+</span></a>
                </nav>
            </div>
        </div>
    </div>
    <?php include __DIR__ . '/mega-menu.php'; ?>
</header>

<div class="m-menu-bar displaynone">
    <ul>
        <li>
            <button type="button" data-mobile-nav="category" data-mobile-category-toggle aria-expanded="false" aria-controls="mobile-category-menu">
                <img class="m-menu-bar__icon m-menu-bar__icon--default" src="/assets/icons/m-cate-ico.svg" alt="">
                <img class="m-menu-bar__icon m-menu-bar__icon--active" src="/assets/icons/m-cate-ico-active.svg" alt="">
                <span>카테고리</span>
            </button>
        </li>
        <li>
            <a href="#quick-delivery-fee-modal" data-mobile-nav="quick" data-modal-open="quick-delivery-fee-modal">
                <img class="m-menu-bar__icon m-menu-bar__icon--default" src="/assets/icons/m-quick-ico.svg" alt="">
                <img class="m-menu-bar__icon m-menu-bar__icon--active" src="/assets/icons/m-quick-ico-active.svg" alt="">
                <span>퀵배송조회</span>
            </a>
        </li>
        <li>
            <a href="/" class="is-active" aria-current="page" data-mobile-nav="home">
                <img class="m-menu-bar__icon m-menu-bar__icon--default" src="/assets/icons/m-home-ico.svg" alt="">
                <img class="m-menu-bar__icon m-menu-bar__icon--active" src="/assets/icons/m-home-ico-active.svg" alt="">
                <span>홈</span>
            </a>
        </li>
        <li>
            <a href="/pages/order/basket.php" data-mobile-nav="cart">
                <img class="m-menu-bar__icon m-menu-bar__icon--default" src="/assets/icons/m-cart-ico.svg" alt="">
                <img class="m-menu-bar__icon m-menu-bar__icon--active" src="/assets/icons/m-cart-ico-active.svg" alt="">
                <span>장바구니</span>
            </a>
        </li>
        <li>
            <a href="/pages/myshop/index.php" data-mobile-nav="myshop">
                <img class="m-menu-bar__icon m-menu-bar__icon--default" src="/assets/icons/m-myshop-ico.svg" alt="">
                <img class="m-menu-bar__icon m-menu-bar__icon--active" src="/assets/icons/m-myshop-ico-active.svg" alt="">
                <span>마이</span>
            </a>
        </li>
    </ul>
</div>

<div class="m-menu-cate displaynone" id="mobile-category-menu" data-mobile-category-menu aria-hidden="true" inert>
    <div class="m-menu-cate__dim" data-mobile-category-close></div>
    <nav class="m-menu-cate__inner" aria-label="모바일 상품 카테고리">
        <div class="m-menu-cate__primary">
            <ul class="m-menu-cate__primary-list">
                <?php foreach ($megaMenuCategories as $index => $category): ?>
                    <li><button type="button" class="m-menu-cate__primary-button<?= $index === 0 ? ' is-active' : '' ?>" data-mobile-category-id="<?= htmlspecialchars($category['id']) ?>" aria-selected="<?= $index === 0 ? 'true' : 'false' ?>"><?= htmlspecialchars($category['name']) ?></button></li>
                <?php endforeach; ?>
            </ul>
            <ul class="m-menu-cate__utility">
                <li><a href="#">로그아웃</a></li>
                <li><a href="/pages/sub/store-guide.php">매장안내</a></li>
                <li><a href="/pages/sub/customer-center.php">고객센터</a></li>
            </ul>
        </div>

        <div class="m-menu-cate__secondary">
            <?php foreach ($megaMenuCategories as $index => $category): ?>
                <ul class="m-menu-cate__secondary-list<?= $index === 0 ? ' is-active' : '' ?>" data-mobile-category-panel="<?= htmlspecialchars($category['id']) ?>"<?= $index === 0 ? '' : ' hidden' ?>>
                    <li><a href="/pages/product/products.php?category=<?= urlencode($category['id']) ?>">전체</a></li>
                    <?php foreach ($category['items'] as $item): ?>
                        <li><a href="/pages/product/products.php?category=<?= urlencode($category['id']) ?>&amp;item=<?= urlencode($item['id']) ?>"><?= htmlspecialchars($item['name']) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            <?php endforeach; ?>
        </div>
    </nav>
</div>

<section class="search-panel" id="header-search-panel" aria-label="상품 검색" aria-hidden="true" data-search-panel inert>
    <div class="search-panel-wrap">
        <div class="search-panel__inner">
            <button type="button" class="back-btn displaynone" aria-label="검색 닫기" data-search-back><img src="/assets/icons/search-panner-back-ico.svg" alt=""></button>
            <form class="search-panel__form" action="#" method="get" role="search">
                <label class="sr-only" for="header-search-keyword">상품 검색어</label>
                <input class="search-panel__input" id="header-search-keyword" name="keyword" type="search" placeholder="검색어를 입력해 주세요" autocomplete="off">
                <button class="search-panel__submit" type="submit" aria-label="검색"><img src="/assets/icons/search-panner-ico.svg" alt=""></button>
            </form>
        </div>
        <section class="search-panel__recent" aria-labelledby="recent-search-title">
            <div class="search-panel__heading">
                <h2 id="recent-search-title">최근 검색어</h2>
                <button class="search-panel__clear" type="button" data-recent-clear>모두 삭제</button>
            </div>
            <div class="search-panel__keywords" role="list" aria-live="polite" data-recent-list>
                <button class="search-panel__recent-item" role="listitem"><span>대방어</span><i class="search-panel__remove" type="button" aria-label="대방어 삭제" data-recent-remove><img src="/assets/icons/keyword-del.svg" alt=""></i></button>
                <button class="search-panel__recent-item" role="listitem"><span>전갱이</span><i class="search-panel__remove" type="button" aria-label="대방어 삭제" data-recent-remove><img src="/assets/icons/keyword-del.svg" alt=""></i></button>
                <button class="search-panel__recent-item" role="listitem"><span>새우</span><i class="search-panel__remove" type="button" aria-label="대방어 삭제" data-recent-remove><img src="/assets/icons/keyword-del.svg" alt=""></i></button>
                <button class="search-panel__recent-item" role="listitem"><span>모둠회</span><i class="search-panel__remove" type="button" aria-label="대방어 삭제" data-recent-remove><img src="/assets/icons/keyword-del.svg" alt=""></i></button>
                <button class="search-panel__recent-item" role="listitem"><span>광어</span><i class="search-panel__remove" type="button" aria-label="대방어 삭제" data-recent-remove><img src="/assets/icons/keyword-del.svg" alt=""></i></button>
                <button class="search-panel__recent-item" role="listitem"><span>오마카세</span><i class="search-panel__remove" type="button" aria-label="대방어 삭제" data-recent-remove><img src="/assets/icons/keyword-del.svg" alt=""></i></button>
                <button class="search-panel__recent-item" role="listitem"><span>참돔</span><i class="search-panel__remove" type="button" aria-label="대방어 삭제" data-recent-remove><img src="/assets/icons/keyword-del.svg" alt=""></i></button>
                <button class="search-panel__recent-item" role="listitem"><span>생새우</span><i class="search-panel__remove" type="button" aria-label="대방어 삭제" data-recent-remove><img src="/assets/icons/keyword-del.svg" alt=""></i></button>
                <button class="search-panel__recent-item" role="listitem"><span>대하</span><i class="search-panel__remove" type="button" aria-label="대방어 삭제" data-recent-remove><img src="/assets/icons/keyword-del.svg" alt=""></i></button>
                <button class="search-panel__recent-item" role="listitem"><span>회식</span><i class="search-panel__remove" type="button" aria-label="대방어 삭제" data-recent-remove><img src="/assets/icons/keyword-del.svg" alt=""></i></button>
                <button class="search-panel__recent-item" role="listitem"><span>단체 주문</span><i class="search-panel__remove" type="button" aria-label="대방어 삭제" data-recent-remove><img src="/assets/icons/keyword-del.svg" alt=""></i></button>
            </div>
        </section>
        <section class="search-panel__popular" aria-labelledby="popular-search-title">
            <div class="search-panel__heading">
                <h2 id="popular-search-title">인기 검색어</h2>
            </div>
            <div class="search-panel__keywords" role="list" data-popular-list>
                <button class="search-panel__popular-item" role="listitem"><em aria-hidden="true"></em>대방어</button>
                <button class="search-panel__popular-item" role="listitem"><em aria-hidden="true"></em>광어</button>
                <button class="search-panel__popular-item" role="listitem"><em aria-hidden="true"></em>오마카세</button>
                <button class="search-panel__popular-item" role="listitem"><em aria-hidden="true"></em>참돔</button>
                <button class="search-panel__popular-item" role="listitem"><em aria-hidden="true"></em>생새우</button>
                <button class="search-panel__popular-item" role="listitem"><em aria-hidden="true"></em>대하</button>
                <button class="search-panel__popular-item" role="listitem"><em aria-hidden="true"></em>회식</button>
                <button class="search-panel__popular-item" role="listitem"><em aria-hidden="true"></em>단체 주문</button>
            </div>
        </section>
    </div>
    <section class="auto-save-toggle">
        <!-- 자동저장 껐을 시 = 자동저장 켜기로 텍스트 변경 -->
        <button class="Body-XXXS2 gray-5" type="button">자동저장 끄기</button>
    </section>
</section>
<div class="dim" data-search-dim aria-hidden="true" hidden></div>

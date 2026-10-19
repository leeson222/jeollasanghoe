<?php
/**
 * 전라상회 메인 페이지
 */
?>
<?php include __DIR__ . '/include/components/layout/head.php'; ?>
    <a class="skip-link" href="#main-content">본문 바로가기</a>

    <?php include __DIR__ . '/include/components/layout/header.php'; ?>

    <main id="main-content" class="fadeIn">


        <!-- 비주얼 영역 -->
        <section class="visual">
            <div class="visual-slide">
                <div class="swiper-wrapper">
                    <div class="swiper-slide visual-item visual-item01" style="background-image: url(/assets/images/visual01.png); background-size: cover; background-position: center center;">
                        <div class="visual-txt-wrap">
                            <h1>노량진의 신선함을 <br class="pc-br">집에서 만나보세요.</h1>
                            <p>전라상회가 엄선한 오늘의 수산물</p>
                        </div>
                    </div>
                    <div class="swiper-slide visual-item visual-item01" style="background-image: url(/assets/images/visual01.png); background-size: cover; background-position: center center;">
                        <div class="visual-txt-wrap">
                            <h1>노량진의 신선함을 <br class="pc-br">집에서 만나보세요.</h1>
                            <p>전라상회가 엄선한 오늘의 수산물</p>
                        </div>
                    </div>
                    <div class="swiper-slide visual-item visual-item01" style="background-image: url(/assets/images/visual01.png); background-size: cover; background-position: center center;">
                        <div class="visual-txt-wrap">
                            <h1>노량진의 신선함을 <br class="pc-br">집에서 만나보세요.</h1>
                            <p>전라상회가 엄선한 오늘의 수산물</p>
                        </div>
                    </div>
                    <div class="swiper-slide visual-item visual-item01" style="background-image: url(/assets/images/visual01.png); background-size: cover; background-position: center center;">
                        <div class="visual-txt-wrap">
                            <h1>노량진의 신선함을 <br class="pc-br">집에서 만나보세요.</h1>
                            <p>전라상회가 엄선한 오늘의 수산물</p>
                        </div>
                    </div>
                </div>
                <!-- 컨트롤 -->
                <div class="visual-control">
                    <div class="visual-number">
                        <span class="visual-current">1</span>
                        <i></i>
                        <span class="visual-total">4</span>
                    </div>

                    <div class="visual-progress">
                        <span></span>
                    </div>
                </div>
            </div>
        </section>

        <!--
            [프론트 연동 필요 / 매장픽업, 퀵배송 모달]
            - data-modal-auth="pickup", data-modal-auth="quick-delivery-modal" 클릭 시 로그인 상태 확인
            - 비로그인 : guest-order-modal.php 노출
            - 로그인   : store-pickup-modal.php/quick-delivery-modal.php 노출
            - 현재 window.isLoggedIn으로 임시 분기 처리
            - 추후 실제 회원 로그인 상태 데이터로 교체 필요
        -->
        <!-- 바로 주문 영역 -->
        <section class="main-sec sec sec02 quick-order">
            <div class="container">

                <div class="quick-order__menu fadeInUp">
                    <div class="title">
                        <h2 class="Body-M2">바로주문</h2>
                    </div>

                    <div class="item quick-order__list">
                        <a href="#" class="quick-order__item" data-modal-auth="pickup">
                            <i class="quick-order__icon">
                                <img src="/assets/icons/sec02-ico01.svg" alt="">
                            </i>
                            <h3 class="Body-S2">매장픽업</h3>
                        </a>

                        <a href="" class="quick-order__item displaynone">
                            <i class="quick-order__icon">
                                <img src="/assets/icons/sec02-ico02.svg" alt="">
                            </i>
                            <h3 class="Body-S2">당일배송</h3>
                        </a>

                        <a href="#" class="quick-order__item" data-modal-open="quick-delivery-modal">
                            <i class="quick-order__icon">
                                <img src="/assets/icons/sec02-ico03.svg" alt="">
                            </i>
                            <h3 class="Body-S2">퀵배송</h3>
                        </a>
                    </div>
                </div>

                <div class="quick-delivery fadeInUp">
                    <a href="" class="quick-delivery__link flex-c">
                        <h2 class="Body-S3 quick-delivery__title">
                            우리집까지 배송비를 확인해보세요
                        </h2>

                        <p class="quick-delivery__info flex">
                            <span class="Body-XS4">퀵 배송비 조회</span>
                            <i class="quick-delivery__icon">
                                <img src="/assets/icons/quick-sec-ico.svg" alt="">
                            </i>
                        </p>

                        <figure class="quick-img">
                            <img src="/assets/images/quick-sec-img.svg" alt="">
                        </figure>
                    </a>
                </div>

            </div>
        </section>

        <!-- 오늘의 특가 영역 -->
        <section class="main-sec sec sec03 mb-80">
            <div class="container">

                <div class="title mb-20 fadeInUp">
                    <h2 class="Body-L2">오늘의 특가</h2>
                </div>

                <div class="time-sale-countdown flex mb-20 fadeInUp delay02" data-countdown>
                    <!-- 시간 -->
                    <div class="time-sale-countdown__group flex" data-time="hours">
                        <span class="time-sale-countdown__digit flex-c-c" data-digit>1</span>
                        <span class="time-sale-countdown__digit flex-c-c" data-digit>2</span>
                    </div>

                    <span class="time-sale-countdown__colon" aria-hidden="true">:</span>

                    <!-- 분 -->
                    <div class="time-sale-countdown__group flex" data-time="minutes">
                        <span class="time-sale-countdown__digit flex-c-c" data-digit>4</span>
                        <span class="time-sale-countdown__digit flex-c-c" data-digit>2</span>
                    </div>

                    <span class="time-sale-countdown__colon" aria-hidden="true">:</span>

                    <!-- 초 -->
                    <div class="time-sale-countdown__group flex" data-time="seconds">
                        <span class="time-sale-countdown__digit flex-c-c" data-digit>5</span>
                        <span class="time-sale-countdown__digit flex-c-c" data-digit>6</span>
                    </div>
                </div>


                <!--
                    [상품 카드 공통 컴포넌트]
                    사용하는 페이지에서 $product 데이터를 전달하여 include합니다.
                    현재 상품 데이터는 퍼블리싱용 더미 데이터이며, 실제 개발 시 CMS/API 데이터 연동이 필요합니다.
                    카드 배치는 각 상품 영역에서 별도 처리합니다.
                -->
                <!-- 상품 리스트 -->
                <?php
                $products = [
                    [
                        'link' => '/pages/product/product-detail.php',
                        'image' => '/assets/images/prod-img01.png',
                        'rating' => '5.0',
                        'name' => '돌돔 모듬회',
                        'description' => '돌돔, 대참돔, 줄무늬전갱이, 강도다리, 특대광어 뱃살',
                        'discount' => 10,
                        'price' => 79000,
                        'best' => true,
                        'new' => true,
                        'view' => 4243,
                    ],
                    [
                        'link' => '/pages/product/product-detail.php',
                        'image' => '/assets/images/prod-img02.png',
                        'rating' => '5.0',
                        'name' => '줄무늬 전갱이회',
                        'description' => '줄무늬전갱이, 사진은 대 사이즈입니다',
                        'discount' => 10,
                        'price' => 89000,
                        'best' => true,
                        'new' => true,
                        'view' => 1231,
                    ],
                    [
                        'link' => '/pages/product/product-detail.php',
                        'image' => '/assets/images/prod-img03.png',
                        'rating' => '5.0',
                        'name' => '전라오마카세',
                        'description' => '3kg 이상 특대광어, 도미, 그날 그날 가장 신선하고 좋은 생선을 넣어드립니다.',
                        'discount' => 10,
                        'price' => 110000,
                        'best' => true,
                        'new' => true,
                        'view' => 423,
                    ],
                    [
                        'link' => '/pages/product/product-detail.php',
                        'image' => '/assets/images/prod-img04.png',
                        'rating' => '5.0',
                        'name' => '특수부위스페셜',
                        'description' => '특대광어, 대방어지느러미, 연어뱃살, 대참돔',
                        'discount' => 10,
                        'price' => 120000,
                        'best' => true,
                        'new' => true,
                        'view' => 145,
                    ],
                ];
                ?>

                <div class="prod-area">
                    <div class="product-list product-list-default grid-4 fadeInUp delay04">
                        <?php foreach ($products as $product): ?>
                            <?php include __DIR__ . '/include/components/products/product-card.php'; ?>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </section>

        <!-- 인기 메뉴 영역 -->
        <section class="main-sec sec sec04 mb-80">
            <div class="container">
                <div class="title flex-btw mb-40 fadeInUp">
                    <h2 class="Body-L2">인기 메뉴</h2>
                    <a href="/pages/product/products.php?category=signature" class="flex">
                        <span class="Body-XXS3 gray-7">전체보기</span>
                        <i><img src="/assets/icons/title-arrow-ico.svg" alt="전체보기"></i>
                    </a>
                </div>
                <div class="prod-area prod-area-row fadeInUp delay02">
                    <!-- 상품 리스트 -->
                    <?php
                    $products = [
                        [
                            'link' => '#',
                            'image' => '/assets/images/prod-img01.png',
                            'rating' => '5.0',
                            'name' => '돌돔 모듬회',
                            'description' => '돌돔, 대참돔, 줄무늬전갱이, 강도다리, 특대광어 뱃살',
                            'discount' => 10,
                            'price' => 79000,
                            'best' => true,
                            'new' => true,
                            'view' => 4243,
                        ],
                        [
                            'link' => '#',
                            'image' => '/assets/images/prod-img02.png',
                            'rating' => '5.0',
                            'name' => '줄무늬 전갱이회',
                            'description' => '줄무늬전갱이, 사진은 대 사이즈입니다',
                            'discount' => 10,
                            'price' => 89000,
                            'best' => true,
                            'new' => true,
                            'view' => 1231,
                        ],
                        [
                            'link' => '#',
                            'image' => '/assets/images/prod-img03.png',
                            'rating' => '5.0',
                            'name' => '전라오마카세',
                            'description' => '3kg 이상 특대광어, 도미, 그날 그날 가장 신선하고 좋은 생선을 넣어드립니다.',
                            'discount' => 10,
                            'price' => 110000,
                            'best' => true,
                            'new' => true,
                            'view' => 423,
                        ],
                        [
                            'link' => '#',
                            'image' => '/assets/images/prod-img04.png',
                            'rating' => '5.0',
                            'name' => '특수부위스페셜',
                            'description' => '특대광어, 대방어지느러미, 연어뱃살, 대참돔',
                            'discount' => 10,
                            'price' => 120000,
                            'best' => true,
                            'new' => true,
                            'view' => 145,
                        ],
                    ];
                    ?>

                    <div class="product-list product-list-default grid-2">
                        <?php foreach ($products as $product): ?>
                            <?php include __DIR__ . '/include/components/products/product-card.php'; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- 이벤트 카드 영역 -->
        <section class="main-sec sec sec06 event-section mb-80">
            <div class="container">
                <div class="event-list flex">
                    <a href="#" class="event-card flex fadeInUp delay02">
                        <figure class="event-card__thumb flex">
                            <img src="/assets/images/event-img01.png" alt="이벤트명">
                        </figure>
                    </a>

                    <a href="#" class="event-card flex fadeInUp delay02">
                        <figure class="event-card__thumb flex">
                            <img src="/assets/images/event-img02.png" alt="이벤트명">
                        </figure>
                    </a>
                </div>
            </div>
        </section>

        <!-- 전라상회 스토리 영역 -->
        <section class="main-sec sec sec07 story-section mb-80">
            <div class="container story-section__inner">
                <div class="title story-section__title fadeInUp">
                    <h2 class="Body-L2 mb-20">전라상회 스토리</h2>
                </div>

                <div class="youtube-area flex story-section__youtube">
                    <iframe class="youtube-area__video fadeInUp delay02" width="688" height="386" src="https://www.youtube.com/embed/ZR2M9SOXUPg?si=EwcYXxFen4_fyhV7" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <div class="youtube-more flex-c youtube-area__info fadeInUp delay04">
                        <span class="youtube-title Body-M3 youtube-area__title"></span>

                        <a class="youtube-area__more" href="https://www.youtube.com/@%EC%83%9D%EC%84%A0%EC%9D%98%EB%AA%85%EC%88%98/videos" target="blank">영상 더보기</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- 브랜드 스토리 영역 -->
        <section class="main-sec sec brand-story-section mb-80">
            <div class="container">
                <a href="/pages/sub/brand-story.php" class="brand-story-banner fadeInUp">
                    <div class="brand-story-txt-area flex-c">
                        <strong class="Body-L1">믿고 먹는 전라상회</strong>
                        <p class="flex"><span class="Body-XXS4">브랜드 스토리 보기</span><i><img src="/assets/icons/brand-story-more.svg" alt=""></i></p>
                    </div>
                </a>
            </div>
        </section>


        <!-- 오시는 길 영역 -->
        <section class="main-sec sec sec08 map-section">
            <div class="container map-section__inner">
                <div class="map-area map-section__map fadeInUp">
                    <div class="map-area-info">
                        <h3 class="Body-M2">오시는 길</h3>
                        <p class="Body-S5 mb-20">노량진수산시장 남3문으로 들어오신 후 북3문 방향으로 오시면 전라상회가 있습니다</p>
                        <div class="map-btn-wrap flex">
                            <a href="https://naver.me/G9r5jSww" class="Body-XXS5" target="blank">지도 보기</a>
                            <a href="/pages/sub/store-guide.php" class="Body-XXS5">매장 안내</a>
                        </div>
                    </div>
                    <div class="map-addr-area flex">
                        <i><img src="/assets/icons/map-ico.svg" alt=""></i>
                        <span class="map-addr Body-XXS5">서울 동작구 노들로 674 노량진수산시장 1층 159호, 160호, 161호</span>
                    </div>
                </div>
                <div class="map-img-area map-section__info fadeInUp delay02">
                    <figure class="flex"><img src="/assets/images/main-map-img.png" alt=""></figure>
                </div>
            </div>
        </section>
        
    </main>

    <!-- 모달 -->
    <?php include __DIR__ . '/include/components/modal/guest-order-modal.php'; ?>
    <?php include __DIR__ . '/include/components/modal/store-pickup-modal.php'; ?>
    <?php include __DIR__ . '/include/components/modal/quick-delivery-modal.php'; ?>
    
    <!-- footer -->
    <?php include __DIR__ . '/include/components/layout/footer.php'; ?>



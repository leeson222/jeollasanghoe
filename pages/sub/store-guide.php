<?php
$restaurants = [
    'floor-2' => [
        ['name' => '1호 끄트머리', 'tel' => '02-2254-7766'],
        ['name' => '2~3호 해운대', 'tel' => '02-2254-7986'],
        ['name' => '4호 유달식당', 'tel' => '02-2254-7909'],
        ['name' => '5호 강변식당', 'tel' => '02-2254-8885'],
        ['name' => '6호 황금어장', 'tel' => '02-2254-7991'],
        ['name' => '7호 서울식당', 'tel' => '02-2254-7915'],
        ['name' => '8호 미자식당', 'tel' => '02-2254-7953'],
        ['name' => '9호 금학식당', 'tel' => '02-2254-7982'],
        ['name' => '10호 황제양념', 'tel' => '02-2254-7777'],
        ['name' => '11호 또순이', 'tel' => '02-2254-7988'],
        ['name' => '12호 중앙', 'tel' => '02-2254-7905'],
        ['name' => '13호 진남', 'tel' => '02-2254-7978'],
        ['name' => '14호 일번지', 'tel' => '02-2254-7980'],
        ['name' => '15호 바다회센터', 'tel' => '02-2254-7985'],
        ['name' => '16호 전라도', 'tel' => '02-2254-7995'],
        ['name' => '17호 용궁', 'tel' => '02-2254-7942'],
        ['name' => '19호 장터식당', 'tel' => '02-2254-7922'],
        ['name' => '20호 청해진', 'tel' => '02-2254-7964'],
        ['name' => '22호 수산회관', 'tel' => '02-2254-7919'],
        ['name' => '23호 충남식당', 'tel' => '02-2254-8467'],
    ],
    'floor-5' => [
        ['name' => '고급식당 전라회관', 'tel' => '02-2254-7770'],
        ['name' => '오션뷰 식당', 'tel' => '02-2254-7771'],
        ['name' => '노량진 횟집', 'tel' => '02-2254-7772'],
    ],
];
?>
<?php include __DIR__ . '/../../include/components/layout/head.php'; ?>
<?php include __DIR__ . '/../../include/components/layout/sub-header.php'; ?>

<link rel="stylesheet" href="/assets/css/sub.css">
<script src="/assets/js/sub.js" defer></script>

<main id="contents" class="store-guide">
    <div class="container">
        <h1 class="store-guide__title Body-M2">매장 안내</h1>

        <section class="store-guide__visual" aria-label="매장 위치 안내">
            <div class="swiper store-guide__swiper" data-store-guide-swiper>
                <div class="swiper-wrapper">
                    <?php for ($slide = 1; $slide <= 3; $slide++): ?>
                        <div class="swiper-slide"><img src="/assets/images/store-guide-slideimg01.png" alt="전라상회 매장 전경 <?= $slide ?>"></div>
                    <?php endfor; ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="store-guide__map"><img src="/assets/images/store-guide-map-img.png" alt="노량진수산시장 전라상회 위치 지도"></div>
        </section>

        <section class="store-guide__directions">
            <h2>오시는 길</h2>
            <p class="store-guide__directions-desc">노량진수산시장 남3문으로 들어오신 후 북3문 방향으로 오시면 전라상회가 있습니다</p>
            <ul class="store-guide__info-list">
                <li><img src="/assets/icons/prod-detail-info-ico-map.svg" alt=""><span>서울 동작구 노들로 674 노량진수산시장 1층 159호, 160호, 161호</span></li>
                <li><img src="/assets/icons/prod-detail-info-ico-clock.svg" alt=""><span>월-금 : 10시 - 8시 30분 / 토, 일, 공휴일 : 9시 - 8시 30분</span></li>
                <li><img src="/assets/icons/prod-detail-info-ico-tel.svg" alt=""><a href="tel:0507-1397-5707">0507-1397-5707</a></li>
            </ul>
        </section>

        <section class="store-guide__restaurants common-tabs" data-tabs="store-restaurants">
            <h2>식당(초장집)예약</h2>
            <div class="common-tabs__list" role="tablist" aria-label="식당 층 선택">
                <button type="button" class="common-tabs__tab is-active" id="store-tab-floor-2" data-tab="floor-2" role="tab" aria-selected="true" aria-controls="store-panel-floor-2" tabindex="0">2층</button>
                <button type="button" class="common-tabs__tab" id="store-tab-floor-5" data-tab="floor-5" role="tab" aria-selected="false" aria-controls="store-panel-floor-5" tabindex="-1">5층 고급식당</button>
            </div>

            <?php foreach ($restaurants as $floor => $items): ?>
                <div class="store-guide__restaurant-panel common-tabs__panel<?= $floor === 'floor-2' ? ' is-active' : '' ?>" id="store-panel-<?= $floor ?>" data-tab-panel="<?= $floor ?>" role="tabpanel" aria-labelledby="store-tab-<?= $floor ?>"<?= $floor === 'floor-2' ? '' : ' hidden' ?>>
                    <div class="store-guide__restaurant-head" aria-hidden="true"><span>식당이름</span><span>연락처</span></div>
                    <ul class="store-guide__restaurant-list">
                        <?php foreach ($items as $restaurant): ?>
                            <li><strong><?= htmlspecialchars($restaurant['name']) ?></strong><a href="tel:<?= str_replace('-', '', $restaurant['tel']) ?>"><?= htmlspecialchars($restaurant['tel']) ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </section>
    </div>
</main>

<?php include __DIR__ . '/../../include/components/layout/footer.php'; ?>

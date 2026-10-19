<?php
/**
 * 메가메뉴 퍼블리싱용 더미 데이터
 * 추후 관리자 카테고리 데이터로 교체합니다.
 */
$megaMenuCategories = [
    [
        'id' => 'seafood',
        'name' => '해산물',
        'items' => [
            ['id' => 'jeolla-home-omakase', 'name' => '전라홈마카세'],
            ['id' => 'live-shrimp', 'name' => '활새우'],
            ['id' => 'spot-prawn', 'name' => '딱새우'],
            ['id' => 'salmon-roe', 'name' => '연어알'],
            ['id' => 'fresh-shrimp-700g', 'name' => '생물새우(700g)'],
            ['id' => 'live-abalone-1kg', 'name' => '활전복(1kg)'],
            ['id' => 'assorted-seafood', 'name' => '해물모듬(소,중)'],
            ['id' => 'squid-series', 'name' => '오징어시리즈'],
            ['id' => 'ankimo-sauce', 'name' => '안키모 + 소스'],
        ],
    ],
    [
        'id' => 'signature',
        'name' => '대표메뉴',
        'items' => [
            ['id' => 'jeolla-omakase', 'name' => '전라오마카세'],
            ['id' => 'special-cuts-special', 'name' => '전라특수부위스페셜'],
            ['id' => 'premium-assorted-sashimi', 'name' => '프리미엄모둠회'],
        ],
    ],
    [
        'id' => 'assorted-sashimi',
        'name' => '모둠회',
        'items' => [
            ['id' => 'regular-assorted-sashimi', 'name' => '일반모둠회'],
            ['id' => 'striped-jack-assorted', 'name' => '줄전갱이모둠회'],
            ['id' => 'conger-eel-assorted', 'name' => '아나고모둠회(중,대,특대)'],
            ['id' => 'beautiful-unknown-sashimi', 'name' => '아름다운미상회'],
        ],
    ],
    [
        'id' => 'seasonal',
        'name' => '제철메뉴',
        'items' => [
            ['id' => 'gizzard-shad', 'name' => '전어'],
            ['id' => 'flounder-sashimi', 'name' => '도다리회'],
            ['id' => 'flounder-sekkoshi', 'name' => '도다리세꼬시(1인)'],
            ['id' => 'croaker-yellowtail', 'name' => '민어,방어회'],
        ],
    ],
    [
        'id' => 'single-sashimi',
        'name' => '단품',
        'items' => [
            ['id' => 'large-red-sea-bream', 'name' => '대참돔회'],
            ['id' => 'large-flounder', 'name' => '대광어회'],
            ['id' => 'yellowtail', 'name' => '방어'],
            ['id' => 'croaker', 'name' => '민어'],
            ['id' => 'mulhoe-series', 'name' => '물회시리즈'],
        ],
    ],
    [
        'id' => 'half-and-half',
        'name' => '반반',
        'items' => [
            ['id' => 'flounder-red-sea-bream', 'name' => '대광어참돔회'],
            ['id' => 'kamatoro-striped-jack', 'name' => '가마도로전갱이회'],
            ['id' => 'tuna-flounder-red-sea-bream', 'name' => '참치광참회'],
            ['id' => 'flounder-salmon', 'name' => '대광어연어회'],
            ['id' => 'striped-jack-flounder', 'name' => '줄전갱이광어회'],
            ['id' => 'striped-jack-red-sea-bream', 'name' => '줄전갱이참돔회'],
            ['id' => 'croaker-assorted-half', 'name' => '민어반모둠반'],
            ['id' => 'yellowtail-assorted-half', 'name' => '방어반모둠반'],
        ],
    ],
    [
        'id' => 'jeolla-set',
        'name' => '전라세트',
        'items' => [
            ['id' => 'jeolla-a-set', 'name' => '전라A세트(4인/5인)'],
        ],
    ],
    [
        'id' => 'jeolla-tuna',
        'name' => '전라참치',
        'items' => [
            ['id' => 'tuna-kama-special', 'name' => '참치가마스페셜'],
            ['id' => 'tuna-belly-no1', 'name' => '70상1번뱃살'],
            ['id' => 'jeolla-tuna-kase', 'name' => '전라참치카세'],
        ],
    ],
];

$initialMegaMenuCategory = $megaMenuCategories[0];
?>

<div class="mega-menu" id="mega-menu" data-mega-menu aria-hidden="true" inert>
    <div class="mega-menu__inner inner">
        <div class="mega-menu__panel mega-menu__panel--depth2">
            <ul class="mega-menu__list mega-menu__list--depth2">
                <?php foreach ($megaMenuCategories as $index => $category): ?>
                    <li class="mega-menu__item has-child<?= $index === 0 ? ' is-active' : '' ?>" data-depth="2" data-menu-id="<?= htmlspecialchars($category['id']) ?>">
                        <a href="/pages/product/products.php?category=<?= urlencode($category['id']) ?>" class="mega-menu__link"><span><?= htmlspecialchars($category['name']) ?></span></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="mega-menu__panel mega-menu__panel--depth3" data-parent-id="<?= htmlspecialchars($initialMegaMenuCategory['id']) ?>">
            <ul class="mega-menu__list mega-menu__list--depth3">
                <li class="mega-menu__item mega-menu__item--all no-child"><a href="/pages/product/products.php?category=<?= urlencode($initialMegaMenuCategory['id']) ?>" class="mega-menu__link"><span>전체</span></a></li>
                <?php foreach ($initialMegaMenuCategory['items'] as $item): ?>
                    <li class="mega-menu__item no-child" data-depth="3" data-menu-id="<?= htmlspecialchars($item['id']) ?>">
                        <a href="/pages/product/products.php?category=<?= urlencode($initialMegaMenuCategory['id']) ?>&amp;item=<?= urlencode($item['id']) ?>" class="mega-menu__link"><span><?= htmlspecialchars($item['name']) ?></span></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="mega-menu__panel mega-menu__panel--depth4"></div>

        <?php foreach (array_slice($megaMenuCategories, 1) as $category): ?>
            <template data-mega-template="<?= htmlspecialchars($category['id']) ?>">
                <ul class="mega-menu__list mega-menu__list--depth3">
                    <li class="mega-menu__item mega-menu__item--all no-child"><a href="/pages/product/products.php?category=<?= urlencode($category['id']) ?>" class="mega-menu__link"><span>전체</span></a></li>
                    <?php foreach ($category['items'] as $item): ?>
                        <li class="mega-menu__item no-child" data-depth="3" data-menu-id="<?= htmlspecialchars($item['id']) ?>">
                            <a href="/pages/product/products.php?category=<?= urlencode($category['id']) ?>&amp;item=<?= urlencode($item['id']) ?>" class="mega-menu__link"><span><?= htmlspecialchars($item['name']) ?></span></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </template>
        <?php endforeach; ?>
    </div>
</div>

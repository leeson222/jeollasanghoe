<?php
/**
 * 상품 목록 공통 LNB
 * 메가메뉴에서 정의한 $megaMenuCategories를 동일하게 사용합니다.
 * 호출부에서 $productCategories를 전달하면 해당 데이터가 우선합니다.
 */
$productCategories = $productCategories ?? ($megaMenuCategories ?? []);
$activeCategoryId = $activeCategoryId ?? 'seafood';
$activeItemId = $activeItemId ?? 'all';
$activeCategory = null;

foreach ($productCategories as $category) {
    if ($category['id'] === $activeCategoryId) {
        $activeCategory = $category;
        break;
    }
}

if ($activeCategory === null) {
    $activeCategory = $productCategories[0] ?? [
        'id' => 'all',
        'name' => '전체',
        'items' => [],
    ];
    $activeCategoryId = $activeCategory['id'];
}
?>

<aside class="product-lnb" aria-label="상품 카테고리">
    <h1 class="product-lnb__title Body-M2"><?= htmlspecialchars($activeCategory['name']) ?></h1>

    <nav class="product-lnb__current" aria-label="<?= htmlspecialchars($activeCategory['name']) ?> 하위 카테고리">
        <ul class="product-lnb__list">
            <li><a class="product-lnb__link<?= $activeItemId === 'all' ? ' is-active' : '' ?>" href="?category=<?= urlencode($activeCategory['id']) ?>">전체</a></li>
            <?php foreach ($activeCategory['items'] as $item): ?>
                <li><a class="product-lnb__link<?= $activeItemId === $item['id'] ? ' is-active' : '' ?>" href="?category=<?= urlencode($activeCategory['id']) ?>&amp;item=<?= urlencode($item['id']) ?>"><?= htmlspecialchars($item['name']) ?></a></li>
            <?php endforeach; ?>
        </ul>
    </nav>

    <nav class="product-lnb__categories" aria-label="전체 상품 카테고리">
        <ul class="product-lnb__list">
            <?php foreach ($productCategories as $category): ?>
                <li><a class="product-lnb__link<?= $category['id'] === $activeCategory['id'] ? ' is-current' : '' ?>" href="?category=<?= urlencode($category['id']) ?>"><?= htmlspecialchars($category['name']) ?></a></li>
            <?php endforeach; ?>
        </ul>
    </nav>
</aside>

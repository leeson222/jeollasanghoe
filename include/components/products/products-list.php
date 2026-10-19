
<?php
/**
 * [퍼블리싱 임시 데이터 / 프론트 연동 필요]
 * - 실제 상품 데이터는 프론트에서 전달
 * - 기존 product-card.php 컴포넌트 재사용
 */

$defaultProducts = [
    [
        'link' => '/pages/product/product-detail.php',
        'image' => '/assets/images/prod-img01.png',
        'rating' => '5.0',
        'name' => '돌돔 모듬회',
        'description' => '돌돔, 대참돔, 줄무늬전갱이, 강도다리, 특대광어 뱃살',
        'discount' => 10,
        'price' => 120000,
        'best' => true,
        'new' => true,
        'view' => 1234,
    ],
    [
        'link' => '/pages/product/product-detail.php',
        'image' => '/assets/images/prod-img01.png',
        'rating' => '5.0',
        'name' => '돌돔 모듬회',
        'description' => '돌돔, 대참돔, 줄무늬전갱이, 강도다리, 특대광어 뱃살',
        'discount' => 10,
        'price' => 120000,
        'best' => true,
        'new' => true,
        'view' => 1234,
    ],
    [
        'link' => '/pages/product/product-detail.php',
        'image' => '/assets/images/prod-img01.png',
        'rating' => '5.0',
        'name' => '돌돔 모듬회',
        'description' => '돌돔, 대참돔, 줄무늬전갱이, 강도다리, 특대광어 뱃살',
        'discount' => 10,
        'price' => 120000,
        'best' => true,
        'new' => true,
        'view' => 1234,
    ],
    [
        'link' => '/pages/product/product-detail.php',
        'image' => '/assets/images/prod-img01.png',
        'rating' => '5.0',
        'name' => '돌돔 모듬회',
        'description' => '돌돔, 대참돔, 줄무늬전갱이, 강도다리, 특대광어 뱃살',
        'discount' => 10,
        'price' => 120000,
        'best' => true,
        'new' => true,
        'view' => 1234,
        'soldout' => true,
    ],
];

// 퍼블리싱 확인용 12개 상품
$products = $products ?? array_merge($defaultProducts, $defaultProducts, $defaultProducts);
$productsListContext = $productsListContext ?? 'default';
?>

<div class="prod-area">
    <div class="product-list product-list-default grid-4"<?= $productsListContext === 'order' ? ' data-order-product-list' : ' data-product-list' ?>>
        <?php $productCardContext = $productsListContext; ?>
        <?php foreach ($products as $productIndex => $product): ?>
            <?php $product['id'] = $product['id'] ?? $productIndex + 1; ?>
            <?php include __DIR__ . '/product-card.php'; ?>
        <?php endforeach; ?>
        <?php unset($productCardContext, $productIndex, $defaultProducts); ?>
    </div>
</div>

<?php
/** 공통 상품 상세 본문 조립. 일반 페이지(page) / 주문 모달(order) */

$productDetailMode = $productDetailMode ?? 'page';

if (!isset($productDetail)) {
    require __DIR__ . '/dummy-data.php';
}

$detailInstance = $detailInstance ?? (
    $productDetailMode === 'order'
        ? 'order-detail'
        : 'page-detail'
);
?>

<div class="product-detail product-detail--<?= htmlspecialchars($productDetailMode) ?>" data-product-detail data-product-id="<?= htmlspecialchars((string)$productDetail['id']) ?>" data-detail-instance="<?= htmlspecialchars($detailInstance) ?>">

    <!-- 상단 상품 정보 -->
    <div class="container">
        <div class="product-detail__top">
            <?php include __DIR__ . '/product-gallery.php'; ?>

            <div class="product-detail__right">
                <?php include __DIR__ . '/product-info.php'; ?>
                <?php if ($productDetailMode !== 'order'): ?>
                    <?php include __DIR__ . '/product-purchase.php'; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php if ($productDetailMode === 'order'): ?>
        <?php include __DIR__ . '/product-purchase.php'; ?>
    <?php endif; ?>

    <!-- 하단 상품 상세 + Sticky 구매 영역 -->
    <div class="product-detail__bottom">
        <?php include __DIR__ . '/product-contents.php'; ?>
    </div>

</div>

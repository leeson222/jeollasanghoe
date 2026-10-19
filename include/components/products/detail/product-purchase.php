<?php
/**
 * 공통 구매 패널
 * $purchaseContext: primary / sticky / order
 * $showPurchaseActions: 주문 모달에서는 구매 버튼 숨김
 */
$purchaseContext = $purchaseContext ?? 'primary';
$productDetailMode = $productDetailMode ?? 'default';
$showPurchaseActions = $showPurchaseActions ?? ($productDetailMode !== 'order');
?>

<section class="product-detail-purchase flex-c" data-purchase-panel data-purchase-context="<?= htmlspecialchars($purchaseContext) ?>">

    <!-- 기본 옵션 -->
    <div class="product-detail-purchase__default flex-c">
        <div class="product-detail-purchase__group">
            <h3 class="product-detail-purchase__label Body-XXS2 gray-8">가격</h3>
            <div class="product-detail-purchase__options flex" data-option-group="size">
                <?php foreach ($productDetail['size_options'] as $i => $option): ?>
                    <button type="button" class="product-detail-purchase__option<?= $i === 0 ? ' is-selected' : '' ?>" data-option-id="<?= htmlspecialchars($option['id']) ?>" data-option-label="<?= htmlspecialchars($option['label']) ?>" data-option-price="<?= (int)$option['price'] ?>" aria-pressed="<?= $i === 0 ? 'true' : 'false' ?>"><?= htmlspecialchars($option['label']) ?> <strong><?= number_format($option['price']) ?>원</strong></button>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="product-detail-purchase__group">
            <h3 class="product-detail-purchase__label Body-XXS2 gray-8">회두께</h3>
            <div class="product-detail-purchase__options flex" data-option-group="thickness">
                <?php foreach ($productDetail['thickness_options'] as $i => $option): ?>
                    <button type="button" class="product-detail-purchase__option<?= $i === 0 ? ' is-selected' : '' ?>" data-option-id="<?= htmlspecialchars($option['id']) ?>" aria-pressed="<?= $i === 0 ? 'true' : 'false' ?>"><?= htmlspecialchars($option['label']) ?></button>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="product-detail-purchase__group">
            <h3 class="product-detail-purchase__label Body-XXS2 gray-8">매운맛</h3>
            <div class="product-detail-purchase__options flex" data-option-group="spicy">
                <?php foreach ($productDetail['spicy_options'] as $i => $option): ?>
                    <button type="button" class="product-detail-purchase__option<?= $i === 0 ? ' is-selected' : '' ?>" data-option-id="<?= htmlspecialchars($option['id']) ?>" aria-pressed="<?= $i === 0 ? 'true' : 'false' ?>"><?= htmlspecialchars($option['label']) ?></button>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- 추가 옵션 -->
    <div class="product-detail-purchase__extras">
        <button type="button" class="product-detail-purchase__extras-title js-dropdown-trigger is-active flex-btw" data-dropdown-target="product-extras-list" data-extras-toggle aria-expanded="true">추가 옵션 <span aria-hidden="true"><img src="/assets/icons/prod-detail-add-option-arrow.svg" alt=""></span></button>

        <div id="product-extras-list" class="is-open" data-extras-list>
            <?php foreach ($productDetail['extras'] as $option): ?>
                <button type="button" class="product-detail-purchase__extra flex" data-extra-id="<?= htmlspecialchars($option['id']) ?>" data-extra-label="<?= htmlspecialchars($option['label']) ?>" data-extra-price="<?= (int)$option['price'] ?>" aria-pressed="false"><span><?= htmlspecialchars($option['label']) ?></span><strong>+<?= number_format($option['price']) ?>원</strong></button>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- 선택 상품 및 결제 -->
    <div class="product-detail-purchase__selected" data-selected-items>
        <div class="product-detail-purchase__selected-item">
            <div class="product-detail-purchase__selected-top flex-btw">
                <span class="product-detail-purchase__selected-name Body-XXS4">소(2인) [500g]</span>
                <button type="button" class="product-detail-purchase__selected-remove" aria-label="상품 삭제"><img src="/assets/icons/prod-detail-option-del.svg" alt=""></button>
            </div>

            <div class="product-detail-purchase__selected-bottom flex-btw">
                <div class="product-detail-purchase__quantity flex">
                    <button type="button" class="product-detail-purchase__quantity-minus" aria-label="수량 감소"><img src="/assets/icons/quantity-minus.svg" alt="수량 감소"></button>
                    <span class="product-detail-purchase__quantity-value Body-XXS3">1</span>
                    <button type="button" class="product-detail-purchase__quantity-plus" aria-label="수량 증가"><img src="/assets/icons/quantity-plus.svg" alt="수량 증가"></button>
                </div>

                <strong class="product-detail-purchase__selected-price Body-XS1">85,000원</strong>
            </div>
        </div>
    </div>
    <div class="product-detail-purchase__total flex-btw"><span class="Body-XS3 gray-7">결제금액</span><strong class="Body-L2" data-product-total>0원</strong></div>

    <?php if ($showPurchaseActions): ?>
        <div class="product-detail-purchase__actions flex">
            <a href="/pages/order/basket.php" class="btnNormal sizeL" data-purchase-action="cart">장바구니</a>
            <a href="/pages/order/payment.php" class="btnSubmit sizeL" data-purchase-action="buy">주문하기</a>
        </div>
    <?php endif; ?>

</section>

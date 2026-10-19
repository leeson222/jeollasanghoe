<?php
/** 주문 상품 상세 모달 */
$productDetailMode = 'order';
$purchaseContext = 'order';
$showPurchaseActions = false;
$detailInstance = 'order-product-modal-detail';
?>

<div id="order-product-modal" class="common-modal order-product-modal" role="dialog" aria-modal="true" aria-label="주문 상품 상세" hidden>
    <div class="dim" data-modal-close></div>

    <div class="common-modal__container order-product-modal__container">
        <div class="common-modal__title-wrap">
            <h3>상품 선택</h3>
            <button type="button" class="common-modal__close" data-modal-close aria-label="닫기">
                <img src="/assets/icons/order-modal-close-ico.svg" alt="">
            </button>
        </div>

        <div class="order-product-modal__content">
            <?php include __DIR__ . '/../products/detail/detail.php'; ?>
        </div>

        <div class="order-product-modal__sticky">
            <div class="order-product-modal__total flex-btw">
                <span class="Body-XXS3 gray-7">결제금액</span>
                <strong class="Body-S1" data-order-product-total>
                    <?= number_format((int)($productDetail['size_options'][0]['price'] ?? 0)) ?>원
                </strong>
            </div>
            <button type="button" class="btnSubmit sizeL" data-order-add-menu>메뉴 담기</button>
        </div>
    </div>
</div>

<?php
unset($productDetailMode, $purchaseContext, $showPurchaseActions, $detailInstance);
?>

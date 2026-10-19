<?php
$orderNextUrl = $orderNextUrl ?? '/pages/order/products.php';
$orderNextRequiresProduct = $orderNextRequiresProduct ?? false;
?>

<!-- 주문내역 : PC 사이드 영역 -->
<aside class="order-summary">
    <h3 class="order-summary__title mb-16 Body-XXS2">주문내역</h3>

    <div class="order-summary__box mb-20">
        <div class="order-summary__info">
            <dl class="flex-btw">
                <dt>날짜</dt>
                <dd data-order-date>2026.10.06 화</dd>
            </dl>
            <dl class="flex-btw">
                <dt>시간</dt>
                <dd data-order-time>오후 12:00</dd>
            </dl>
        </div>

        <div class="order-summary__products-wrap">
            <div class="order-summary__products" data-order-products>
                <p class="order-summary__empty">다음을 눌러 상품을 선택해 주세요</p>
            </div>
        </div>
    </div>

    <div class="order-summary__total flex-btw" data-order-summary-total hidden>
        <span class="Body-XS3">결제금액</span>
        <strong class="Body-M2" data-order-grand-total>0원</strong>
    </div>

    <div class="order-summary__buttons flex">
        <a href="/" class="btnNormal sizeL" data-modal-open="order-cancel-modal">취소</a>
        <a
            href="<?= htmlspecialchars($orderNextUrl) ?>"
            class="btnSubmit sizeL"
            data-action="order-next"
            <?= $orderNextRequiresProduct ? 'data-requires-product' : '' ?>
        >다음</a>
    </div>
</aside>

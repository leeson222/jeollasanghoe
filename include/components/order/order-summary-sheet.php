
<!-- 모바일 : 접힌 주문내역 -->
<section class="order-summary-mobile-bar" aria-label="주문내역">
    <button type="button" class="order-summary-mobile-bar__toggle" data-sheet-open="order-summary-sheet" aria-expanded="false" aria-controls="order-summary-sheet">
        <span data-order-date>2026.10.06 화</span>
        <img src="/assets/icons/m-reservation-bottom-sheet-ico.svg" alt="">
    </button>
    <div class="order-summary-mobile-bar__buttons">
        <button type="button" class="btnNormal sizeL" data-modal-open="order-cancel-modal">취소</button>
        <a href="<?= htmlspecialchars($orderNextUrl ?? '/pages/order/products.php') ?>" class="btnSubmit sizeL">다음</a>
    </div>
</section>

<?php include __DIR__ . '/month-select-sheet.php'; ?>

<!-- 모바일 : 주문내역 바텀시트 -->
<div id="order-summary-sheet" class="bottom-sheet order-summary-sheet" role="dialog" aria-modal="true" aria-labelledby="summary-sheet-title" hidden>
    <div class="bottom-sheet__dim" data-sheet-close></div>
    <div class="bottom-sheet__container">
        <button type="button" class="bottom-sheet__handle-wrap" data-sheet-close aria-label="주문내역 닫기">
            <span class="bottom-sheet__handle"></span>
        </button>

        <div class="bottom-sheet__header">
            <h3 id="summary-sheet-title" class="bottom-sheet__title">주문내역</h3>
        </div>

        <div class="bottom-sheet__content">
            <div class="order-summary__info">
                <dl>
                    <dt>날짜</dt>
                    <dd data-order-date>2026.10.06 화</dd>
                </dl>
                <dl>
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

        <div class="order-summary__total product-detail-purchase__total flex-btw" data-order-summary-total hidden>
            <span>결제금액</span>
            <strong data-order-grand-total>0원</strong>
        </div>

        <!-- 선택된 값 없을 경우 [다음] 태그에 'is-disable' 클래스명을 부여해야 합니다 -->
        <div class="bottom-sheet__footer flex">
            <button type="button" class="btnNormal sizeL" data-sheet-close data-modal-open="order-cancel-modal">취소</button>
            <a href="<?= htmlspecialchars($orderNextUrl ?? '/pages/order/products.php') ?>" class="btnSubmit sizeL" data-action="order-next">다음</a>
        </div>
    </div>
</div>

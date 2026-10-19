
<!-- 모바일 : 월 선택 바텀시트 -->
<div id="month-select-sheet" class="bottom-sheet month-select-sheet" role="dialog" aria-modal="true" aria-labelledby="month-select-title" hidden>
    <div class="bottom-sheet__dim" data-sheet-close></div>
    <div class="bottom-sheet__container">
        <div class="bottom-sheet__header">
            <h3 id="month-select-title" class="bottom-sheet__title">날짜 선택</h3>
            <button type="button" class="bottom-sheet__close" data-sheet-close aria-label="닫기">
                <img src="/assets/icons/close.svg" alt="">
            </button>
        </div>

        <div class="bottom-sheet__content">
            <div class="month-select__list" data-month-list>
                <button type="button" class="month-select__item" data-month="2026-08">2026년 8월</button>
                <button type="button" class="month-select__item" data-month="2026-09">2026년 9월</button>
                <button type="button" class="month-select__item is-selected" data-month="2026-10" aria-pressed="true">2026년 10월</button>
                <button type="button" class="month-select__item" data-month="2026-11">2026년 11월</button>
                <button type="button" class="month-select__item" data-month="2026-12">2026년 12월</button>
            </div>
        </div>

        <div class="bottom-sheet__footer">
            <button type="button" class="btnSubmit sizeL" data-action="select-month">선택</button>
        </div>
    </div>
</div>

<!-- 모바일 : 주문내역 바텀시트 -->
<div id="order-summary-sheet" class="bottom-sheet order-summary-sheet" role="dialog" aria-modal="true" aria-labelledby="summary-sheet-title" hidden>
    <div class="bottom-sheet__dim" data-sheet-close></div>
    <div class="bottom-sheet__container">
        <div class="bottom-sheet__handle"></div>

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

        <!-- 선택된 값 없을 경우 [다음] 태그에 'is-disable' 클래스명을 부여해야 합니다 -->
        <div class="bottom-sheet__footer flex">
            <button type="button" class="btnNormal sizeL" data-action="order-cancel">취소</button>
            <a href="<?= htmlspecialchars($orderNextUrl ?? '/pages/order/products.php') ?>" class="btnSubmit sizeL" data-action="order-next">다음</a>
        </div>
    </div>
</div>

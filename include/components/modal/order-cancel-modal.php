<!-- 주문 취소 확인 모달 -->
<div id="order-cancel-modal" class="common-modal order-cancel-modal" role="dialog" aria-modal="true" aria-labelledby="order-cancel-title" hidden>
    <div class="dim" data-modal-close></div>

    <div class="common-modal__container">
        <button type="button" class="common-modal__close" data-modal-close aria-label="닫기">
            <img src="/assets/icons/close.svg" alt="">
        </button>

        <div class="common-modal__content">
            <h2 id="order-cancel-title" class="common-modal__title Body-S2">주문을 취소하시겠습니까?</h2>
            <p id="guest-order-modal-desc" class="common-modal__desc">진행중인 주문 내역은 저장되지 않습니다</p>
        </div>

        <div class="common-modal__buttons">
            <button type="button" class="btnNormal sizeL" data-modal-close>계속 주문</button>
            <a href="/" class="btnSubmit sizeL">주문 취소</a>
        </div>
    </div>
</div>

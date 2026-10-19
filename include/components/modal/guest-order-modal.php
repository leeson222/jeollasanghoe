<!-- 공통 모달 : 비회원 주문 확인 -->
<div id="guest-order-modal" class="common-modal" role="dialog" aria-modal="true" aria-labelledby="guest-order-modal-title" aria-describedby="guest-order-modal-desc" hidden>
    <div class="dim" data-modal-close></div>

    <div class="common-modal__container">
        <button type="button" class="common-modal__close" data-modal-close aria-label="닫기">
            <img src="/assets/icons/close.svg" alt="">
        </button>

        <div class="common-modal__content">
            <h2 id="guest-order-modal-title" class="common-modal__title Body-S2">비회원으로 주문하시겠습니까?</h2>
            <p id="guest-order-modal-desc" class="common-modal__desc">회원으로 주문하시면 더 많은 혜택을 받으실 수 있어요</p>
        </div>

        <div class="common-modal__buttons">
            <a href="/pages/order/reservation.php" class="btnNormal sizeL">비회원 주문</a>
            <a href="/pages/member/login.php" class="btnSubmit sizeL">로그인</a>
        </div>
    </div>
</div>

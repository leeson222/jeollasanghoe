
<!-- 공통 모달 : 매장픽업 -->
<div id="store-pickup-modal" class="common-modal store-pickup-modal" role="dialog" aria-modal="true" aria-labelledby="store-pickup-modal-title" hidden>
    <div class="dim" data-modal-close></div>

    <div class="common-modal__container">
        <button type="button" class="common-modal__close" data-modal-close aria-label="닫기">
            <img src="/assets/icons/close.svg" alt="">
        </button>

        <div class="common-modal__content">
            <h2 id="store-pickup-modal-title" class="common-modal__title">매장픽업</h2>

            <div class="store-pickup__options">
                <a href="/pages/order/reservation.php" class="store-pickup__item btnNormal" data-pickup-type="dine-in">
                    <i class="store-pickup__icon"><img src="/assets/icons/store-dine-in.svg" alt=""></i>
                    <div class="store-pickup__txt">
                        <strong class="store-pickup__name Body-XS1">매장 식사</strong>
                        <span class="store-pickup__desc Body-XXXS3 gray-5">초장집에서 먹고가기</span>
                    </div>
                </a>

                <a href="/pages/order/reservation.php?pickup_type=takeout" class="store-pickup__item btnNormal" data-pickup-type="takeout">
                    <i class="store-pickup__icon"><img src="/assets/icons/store-takeout.svg" alt=""></i>
                    <div class="store-pickup__txt">
                        <strong class="store-pickup__name Body-XS1">방문 포장</strong>
                    </div>
                </a>
            </div>

            <div class="store-pickup__notice">
                식사하실 식당(초장집)은 별도로 예약해 주셔야 합니다.
                <a href="#" class="store-pickup__notice-link" data-action="view-store-guide">매장안내</a>
                를 참고해 주세요
            </div>
        </div>
    </div>
</div>

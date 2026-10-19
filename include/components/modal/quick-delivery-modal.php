<!-- 공통 모달 : 퀵배송 -->
<div id="quick-delivery-modal" class="common-modal quick-delivery-modal" role="dialog" aria-modal="true" aria-labelledby="quick-delivery-modal-title" hidden>
    <div class="dim" data-modal-close></div>

    <div class="common-modal__container">
        <button type="button" class="common-modal__close" data-modal-close aria-label="닫기">
            <img src="/assets/icons/close.svg" alt="">
        </button>

        <div class="common-modal__content">
            <h2 id="quick-delivery-modal-title" class="common-modal__title">퀵배송</h2>

            <div class="store-pickup__options">
                <a href="/pages/order/products.php?order_type=quick&amp;delivery_type=immediate" class="store-pickup__item btnNormal" data-delivery-type="immediate">
                    <i class="store-pickup__icon"><img src="/assets/icons/delivery-immediate.svg" alt=""></i>
                    <div class="store-pickup__txt">
                        <strong class="store-pickup__name Body-XS1">즉시 배달</strong>
                        <span class="store-pickup__desc Body-XXXS3 gray-5">주문 즉시 기사가 배정되며 거리에 따라 최대 3시간이 소요될 수 있습니다</span>
                    </div>
                </a>

                <a href="/pages/order/reservation.php?order_type=quick&amp;delivery_type=scheduled" class="store-pickup__item btnNormal" data-delivery-type="scheduled">
                    <i class="store-pickup__icon"><img src="/assets/icons/delivery-scheduled.svg" alt=""></i>
                    <div class="store-pickup__txt">
                        <strong class="store-pickup__name Body-XS1">예약 배달</strong>
                        <span class="store-pickup__desc Body-XXXS3 gray-5">지정하신 시간에 맞춰 도착하며 지연 대비를 위해 1시간 일찍 예약해 주세요.</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

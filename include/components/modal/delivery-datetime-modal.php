<!-- 퀵배송 날짜 및 시간 선택 모달 -->
<div id="delivery-datetime-modal" class="common-modal delivery-datetime-modal" role="dialog" aria-modal="true" aria-labelledby="delivery-datetime-modal-title" hidden>
    <div class="dim" data-modal-close></div>
    <div class="common-modal__container delivery-datetime-modal__container">
        <div class="delivery-datetime-modal__header">
            <h3 id="delivery-datetime-modal-title">날짜 및 시간 선택</h3>
            <button type="button" class="common-modal__close" data-modal-close aria-label="닫기"><img src="/assets/icons/close.svg" alt=""></button>
        </div>

        <div class="delivery-datetime-modal__body">
            <div class="order-calendar-wrap delivery-datetime-modal__picker">
                <div class="order-calendar" data-delivery-calendar>
                    <div class="order-calendar__header flex mb-30">
                        <button type="button" class="order-calendar__arrow prev" data-delivery-calendar-prev aria-label="이전 달"><img src="/assets/icons/calendar-prev.svg" alt=""></button>
                        <span class="order-calendar__month Body-XS1" data-delivery-calendar-month></span>
                        <button type="button" class="order-calendar__arrow next" data-delivery-calendar-next aria-label="다음 달"><img src="/assets/icons/calendar-next.svg" alt=""></button>
                    </div>
                    <div class="order-calendar__weekdays flex"><span class="red">일</span><span>월</span><span>화</span><span>수</span><span>목</span><span>금</span><span>토</span></div>
                    <div class="order-calendar__days" data-delivery-calendar-days></div>
                </div>

                <div class="order-time flex-c">
                    <div class="order-time__group">
                        <h4 class="order-time__title mb-10 Body-XXS4">오전</h4>
                        <div class="order-time__list">
                            <button type="button" class="order-time__item" data-delivery-time-option="오전 10:00">10:00</button>
                            <button type="button" class="order-time__item" data-delivery-time-option="오전 10:30">10:30</button>
                            <button type="button" class="order-time__item" data-delivery-time-option="오전 11:00">11:00</button>
                            <button type="button" class="order-time__item" data-delivery-time-option="오전 11:30">11:30</button>
                        </div>
                    </div>

                    <div class="order-time__group">
                        <h4 class="order-time__title mb-10 Body-XXS4">오후</h4>
                        <div class="order-time__list">
                            <button type="button" class="order-time__item" data-delivery-time-option="오후 12:00">12:00</button>
                            <button type="button" class="order-time__item is-disable" data-delivery-time-option="오후 12:30" disabled>12:30</button>
                            <button type="button" class="order-time__item" data-delivery-time-option="오후 1:00">1:00</button>
                            <button type="button" class="order-time__item" data-delivery-time-option="오후 1:30">1:30</button>
                            <button type="button" class="order-time__item" data-delivery-time-option="오후 2:00">2:00</button>
                            <button type="button" class="order-time__item" data-delivery-time-option="오후 2:30">2:30</button>
                            <button type="button" class="order-time__item" data-delivery-time-option="오후 3:00">3:00</button>
                            <button type="button" class="order-time__item" data-delivery-time-option="오후 3:30">3:30</button>
                            <button type="button" class="order-time__item" data-delivery-time-option="오후 4:00">4:00</button>
                            <button type="button" class="order-time__item" data-delivery-time-option="오후 4:30">4:30</button>
                            <button type="button" class="order-time__item" data-delivery-time-option="오후 5:00">5:00</button>
                            <button type="button" class="order-time__item" data-delivery-time-option="오후 5:30">5:30</button>
                            <button type="button" class="order-time__item" data-delivery-time-option="오후 6:00">6:00</button>
                            <button type="button" class="order-time__item" data-delivery-time-option="오후 6:30">6:30</button>
                            <button type="button" class="order-time__item" data-delivery-time-option="오후 7:00">7:00</button>
                            <button type="button" class="order-time__item" data-delivery-time-option="오후 7:30">7:30</button>
                            <button type="button" class="order-time__item" data-delivery-time-option="오후 8:00">8:00</button>
                            <button type="button" class="order-time__item" data-delivery-time-option="오후 8:30">8:30</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="delivery-datetime-modal__footer">
            <button type="button" class="btnNormal sizeL" data-modal-close>취소</button>
            <button type="button" class="btnSubmit sizeL" data-delivery-datetime-save disabled>저장</button>
        </div>
    </div>
</div>

<!-- 배송지 변경 모달 -->
<div id="delivery-address-change-modal" class="common-modal delivery-address-change-modal" role="dialog" aria-modal="true" aria-labelledby="delivery-address-change-modal-title" hidden>
    <div class="dim" data-modal-close></div>
    <div class="common-modal__container delivery-address-change-modal__container">
        <div class="delivery-address-change-modal__header">
            <h3 id="delivery-address-change-modal-title">배송지 변경</h3>
            <button type="button" class="common-modal__close" data-modal-close aria-label="닫기"><img src="/assets/icons/close.svg" alt=""></button>
        </div>

        <div class="delivery-address-change-modal__body">
            <button type="button" class="delivery-address-change-modal__add btnNormal sizeM" data-modal-open="delivery-address-modal">배송지 추가하기</button>

            <div class="delivery-address-change-modal__list">
                <div class="delivery-address-change-modal__item">
                    <input type="radio" id="delivery-address-home" name="selected_delivery_address" value="home" checked>
                    <div class="delivery-address-change-modal__item-content">
                        <label class="delivery-address-change-modal__name" for="delivery-address-home"><strong>집</strong><span>기본 배송지</span></label>
                        <div class="delivery-address-change-modal__recipient">
                            <strong>김전라</strong>
                            <p>서울시 영등포구 선유서로25길 28 디스테이트 909호</p>
                            <p>010-1234-5678</p>
                        </div>
                        <div class="delivery-address-change-modal__item-actions">
                            <button type="button" class="btnNormal sizeXS" data-address-edit="home">수정</button>
                        </div>
                    </div>
                </div>

                <div class="delivery-address-change-modal__item">
                    <input type="radio" id="delivery-address-office" name="selected_delivery_address" value="office">
                    <div class="delivery-address-change-modal__item-content">
                        <label class="delivery-address-change-modal__name" for="delivery-address-office"><strong>회사</strong></label>
                        <div class="delivery-address-change-modal__recipient">
                            <strong>김전라</strong>
                            <p>서울시 영등포구 선유서로25길 28 디스테이트 909호</p>
                            <p>010-1234-5678</p>
                        </div>
                        <div class="delivery-address-change-modal__item-actions">
                            <button type="button" class="btnNormal sizeXS" data-address-edit="office">수정</button>
                            <button type="button" class="btnNormal sizeXS" data-address-delete="office">삭제</button>
                        </div>
                    </div>
                </div>

                <div class="delivery-address-change-modal__item">
                    <input type="radio" id="delivery-address-parents" name="selected_delivery_address" value="parents">
                    <div class="delivery-address-change-modal__item-content">
                        <label class="delivery-address-change-modal__name" for="delivery-address-parents"><strong>부모님댁</strong></label>
                        <div class="delivery-address-change-modal__recipient">
                            <strong>김전라</strong>
                            <p>서울시 영등포구 선유서로25길 28 디스테이트 909호</p>
                            <p>010-1234-5678</p>
                        </div>
                        <div class="delivery-address-change-modal__item-actions">
                            <button type="button" class="btnNormal sizeXS" data-address-edit="parents">수정</button>
                            <button type="button" class="btnNormal sizeXS" data-address-delete="parents">삭제</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="delivery-address-change-modal__footer">
            <button type="button" class="btnSubmit sizeL" data-delivery-address-change-save data-modal-close>변경</button>
        </div>
    </div>
</div>

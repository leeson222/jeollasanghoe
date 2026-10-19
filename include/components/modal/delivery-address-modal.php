<!-- 배송지 추가 모달 -->
<div id="delivery-address-modal" class="common-modal delivery-address-modal" role="dialog" aria-modal="true" aria-labelledby="delivery-address-modal-title" hidden>
    <div class="dim" data-modal-close></div>
    <div class="common-modal__container delivery-address-modal__container">
        <div class="delivery-address-modal__header">
            <h3 id="delivery-address-modal-title">배송지 추가</h3>
            <button type="button" class="common-modal__close" data-modal-close aria-label="닫기"><img src="/assets/icons/close.svg" alt=""></button>
        </div>

        <div class="delivery-address-modal__body">
            <div class="delivery-address-modal__field">
                <label for="delivery-address-name">별칭</label>
                <input type="text" id="delivery-address-name" name="delivery_address_name" placeholder="배송지 이름을 입력해 주세요">
            </div>

            <div class="delivery-address-modal__field">
                <label for="delivery-recipient-name">이름</label>
                <input type="text" id="delivery-recipient-name" name="delivery_recipient_name" placeholder="받는 분의 이름을 입력해 주세요" autocomplete="name">
            </div>

            <div class="delivery-address-modal__field">
                <label for="delivery-recipient-phone">휴대전화</label>
                <input type="tel" id="delivery-recipient-phone" name="delivery_recipient_phone" placeholder="-없이 입력 11자리" maxlength="11" inputmode="numeric" autocomplete="tel">
            </div>

            <div class="delivery-address-modal__field">
                <label for="delivery-address-postcode">주소</label>
                <div class="delivery-address-modal__address flex-c">
                    <div class="delivery-address-modal__address-row">
                        <input type="text" id="delivery-address-postcode" name="delivery_address_postcode" placeholder="우편번호" readonly>
                        <button type="button" class="btnNormal sizeM" data-address-search>주소 검색</button>
                    </div>
                    <input type="text" id="delivery-address-base" name="delivery_address_base" placeholder="기본 주소" readonly>
                    <input type="text" id="delivery-address-detail" name="delivery_address_detail" placeholder="나머지 주소 (선택)">
                </div>
            </div>

            <div class="delivery-address-modal__field">
                <label for="delivery-address-request">배송요청사항 (선택)</label>
                <div class="custom-select delivery-address-modal__select" data-select="delivery-address-request">
                    <button type="button" class="custom-select__trigger" aria-expanded="false" aria-controls="delivery-address-request-options"><span class="custom-select__value">배송요청사항을 선택해 주세요</span><i class="custom-select__arrow"><img src="/assets/icons/select-arrow-ico.svg" alt=""></i></button>
                    <ul id="delivery-address-request-options" class="custom-select__options" hidden>
                        <li><button type="button" data-value="door">문 앞에 놓아주세요</button></li>
                        <li><button type="button" data-value="contact">배송 전 연락 부탁드립니다</button></li>
                        <li><button type="button" data-value="security">경비실에 맡겨주세요</button></li>
                        <li><button type="button" data-value="direct">직접 입력</button></li>
                    </ul>
                    <input type="hidden" id="delivery-address-request" name="delivery_address_request" value="">
                </div>
            </div>

            <fieldset class="delivery-address-modal__entrance">
                <legend>공동현관 출입번호 (선택)</legend>
                <label class="delivery-address-modal__entrance-option">
                    <input type="radio" name="delivery_entrance_type" value="free" checked>
                    <span>자유 출입 가능</span>
                </label>
                <label class="delivery-address-modal__entrance-option delivery-address-modal__entrance-option--code">
                    <input type="radio" name="delivery_entrance_type" value="code">
                    <input type="text" name="delivery_entrance_code" placeholder="예: #1234" data-delivery-entrance-code disabled>
                </label>
                <p class="delivery-address-modal__notice">공동현관 출입번호는 주문하신 상품을 배송하는 용도로 이용되며, 정보 삭제 또는 회원 탈퇴 시 삭제됩니다.</p>
            </fieldset>
        </div>

        <div class="delivery-address-modal__footer">
            <button type="button" class="btnNormal sizeL" data-modal-close>취소</button>
            <button type="button" class="btnSubmit sizeL" data-delivery-address-save>저장</button>
        </div>
    </div>
</div>

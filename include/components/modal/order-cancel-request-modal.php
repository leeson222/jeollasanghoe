<!-- 마이페이지 주문 취소 신청 모달 -->
<div id="order-cancel-request-modal" class="common-modal order-cancel-request-modal" role="dialog" aria-modal="true" aria-labelledby="order-cancel-request-title" hidden>
    <div class="dim" data-modal-close></div>

    <div class="common-modal__container order-cancel-request-modal__container">
        <button type="button" class="common-modal__close" data-modal-close aria-label="닫기">
            <img src="/assets/icons/close.svg" alt="">
        </button>

        <header class="order-cancel-request-modal__header">
            <h2 id="order-cancel-request-title">주문 취소 신청</h2>
        </header>

        <form class="order-cancel-request-modal__form" action="" method="post" data-order-cancel-request-form>
            <input type="hidden" name="order_id" value="" data-cancel-order-id>

            <div class="order-cancel-request-modal__body">
                <div class="order-cancel-request-modal__product" data-cancel-product>
                    <div class="order-cancel-request-modal__product-image">
                        <img src="/assets/images/payment-prod-img.png" alt="줄무늬전갱이회" data-cancel-product-image>
                    </div>
                    <div class="order-cancel-request-modal__product-info">
                        <div class="order-cancel-request-modal__product-name">
                            <strong data-cancel-product-name>줄무늬전갱이회</strong>
                            <line class="line-sm"></line>
                            <span><span data-cancel-product-quantity>1</span>개</span>
                        </div>
                        <span class="order-cancel-request-modal__product-price"><span data-cancel-product-price>45,000</span>원</span>
                    </div>
                </div>

                <div class="order-cancel-request-modal__reason">
                    <label class="order-cancel-request-modal__reason-label" for="order-cancel-reason">취소 사유 <em aria-hidden="true"></em></label>

                    <div class="custom-select order-cancel-request-modal__select" data-select="order-cancel-reason">
                        <button type="button" class="custom-select__trigger" aria-expanded="false" aria-controls="order-cancel-reason-options">
                            <span class="custom-select__value">기타</span>
                            <i class="custom-select__arrow"><img src="/assets/icons/select-arrow-ico.svg" alt=""></i>
                        </button>
                        <ul id="order-cancel-reason-options" class="custom-select__options" hidden>
                            <li><button type="button" data-value="change-mind">단순 변심</button></li>
                            <li><button type="button" data-value="wrong-order">상품을 잘못 주문함</button></li>
                            <li><button type="button" data-value="schedule">수령 일정 변경</button></li>
                            <li><button type="button" class="is-selected" data-value="other" aria-selected="true">기타</button></li>
                        </ul>
                        <input type="hidden" id="order-cancel-reason" name="cancel_reason" value="other" required>
                    </div>

                    <label class="displaynone" for="order-cancel-reason-detail">취소 사유 상세</label>
                    <textarea id="order-cancel-reason-detail" name="cancel_reason_detail" placeholder="사유를 입력해 주세요" maxlength="500" data-cancel-reason-detail></textarea>
                </div>

                <ul class="order-cancel-request-modal__notice">
                    <li>결제 시 사용한 적립금 및 할인쿠폰은 취소 완료 즉시 반환됩니다.</li>
                    <li>가상계좌(무통장)의 경우 최근 7일 이내 3회 이상 주문 취소 시 결제수단 이용에 제한될 수 있습니다.</li>
                    <li>구매 후 일부 상품 취소 또는 반품으로 장바구니 쿠폰 사용 조건을 충족하지 못한 경우, 해당 쿠폰 혜택은 전액 회수됩니다.</li>
                </ul>
            </div>

            <footer class="order-cancel-request-modal__footer">
                <button type="button" class="btnNormal sizeL" data-modal-close>취소</button>
                <button type="submit" class="btnSubmit sizeL" data-order-cancel-submit>취소 신청</button>
            </footer>
        </form>
    </div>
</div>

<!-- 쿠폰 선택 모달 -->
<div id="payment-coupon-modal" class="common-modal payment-coupon-modal" role="dialog" aria-modal="true" aria-labelledby="payment-coupon-modal-title" hidden>
    <div class="dim" data-modal-close></div>

    <div class="common-modal__container payment-coupon-modal__container">
        <header class="payment-coupon-modal__header">
            <h3 id="payment-coupon-modal-title">쿠폰 목록</h3>
            <button type="button" class="common-modal__close" data-modal-close aria-label="닫기">
                <img src="/assets/icons/close.svg" alt="">
            </button>
        </header>

        <div class="payment-coupon-modal__body">
            <div class="payment-coupon-modal__list">
                <label class="payment-coupon-modal__item">
                    <input type="checkbox" value="3000" data-payment-coupon>
                    <span class="payment-coupon-modal__info">
                        <strong>3,000원</strong>
                        <span class="payment-coupon-modal__name">WELCOME 회원가입 쿠폰</span>
                        <span class="payment-coupon-modal__meta">신규 회원 대상 <em>1일 남음</em></span>
                        <span class="payment-coupon-modal__period">2026.09.01 ~ 2026.10.30</span>
                    </span>
                </label>

                <label class="payment-coupon-modal__item">
                    <input type="checkbox" value="3000" data-payment-coupon>
                    <span class="payment-coupon-modal__info">
                        <strong>3,000원</strong>
                        <span class="payment-coupon-modal__name">WELCOME 회원가입 쿠폰</span>
                        <span class="payment-coupon-modal__meta">신규 회원 대상 <em>1일 남음</em></span>
                        <span class="payment-coupon-modal__period">2026.09.01 ~ 2026.10.30</span>
                    </span>
                </label>

                <label class="payment-coupon-modal__item is-disabled">
                    <input type="checkbox" value="3000" data-payment-coupon disabled>
                    <span class="payment-coupon-modal__info">
                        <strong>3,000원</strong>
                        <span class="payment-coupon-modal__name">WELCOME 회원가입 쿠폰</span>
                        <span class="payment-coupon-modal__meta">신규 회원 대상 <em>1일 남음</em></span>
                        <span class="payment-coupon-modal__period">2026.09.01 ~ 2026.10.30</span>
                    </span>
                </label>

                <label class="payment-coupon-modal__item is-disabled">
                    <input type="checkbox" value="3000" data-payment-coupon disabled>
                    <span class="payment-coupon-modal__info">
                        <strong>3,000원</strong>
                        <span class="payment-coupon-modal__name">WELCOME 회원가입 쿠폰</span>
                        <span class="payment-coupon-modal__meta">신규 회원 대상 <em>1일 남음</em></span>
                        <span class="payment-coupon-modal__period">2026.09.01 ~ 2026.10.30</span>
                    </span>
                </label>
            </div>
        </div>

        <footer class="payment-coupon-modal__footer">
            <button type="button" class="btnSubmit sizeL" data-payment-coupon-apply>쿠폰 적용</button>
        </footer>
    </div>
</div>

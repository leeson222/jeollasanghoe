<?php
$initialOrderType = ($_GET['order_type'] ?? '') === 'quick' ? 'quick' : 'pickup';
$initialPickupType = ($_GET['pickup_type'] ?? '') === 'takeout' ? 'takeout' : 'dine-in';
$initialDeliveryType = ($_GET['delivery_type'] ?? '') === 'scheduled' ? 'scheduled' : 'immediate';
$isPickupInitial = $initialOrderType === 'pickup';
?>
<?php include __DIR__ . '/../../include/components/layout/head.php'; ?>
<?php include __DIR__ . '/../../include/components/layout/sub-header.php'; ?>
<link rel="stylesheet" href="/assets/css/order.css">

<div id="contents">
    <div class="order-page">
        <div class="container">

            <section class="order-payment" data-order-payment>
                <h2 class="order-payment__title Body-M2">주문/결제</h2>

                <div class="order-payment__layout">

                    <!-- 주문/결제 본문 -->
                    <div class="order-payment__main" data-tabs="order-payment">

                        <!-- 매장픽업 / 퀵배송 탭 -->
                        <div class="order-payment__tabs common-tabs__list" role="tablist" aria-label="수령 방법">
                            <button type="button" class="order-payment__tab common-tabs__tab<?= $isPickupInitial ? ' is-active' : '' ?>" id="order-tab-pickup" data-payment-tab="pickup" data-tab="pickup" role="tab" aria-selected="<?= $isPickupInitial ? 'true' : 'false' ?>" aria-controls="order-panel-pickup" tabindex="<?= $isPickupInitial ? '0' : '-1' ?>">매장픽업</button>
                            <button type="button" class="order-payment__tab common-tabs__tab<?= !$isPickupInitial ? ' is-active' : '' ?>" id="order-tab-delivery" data-payment-tab="delivery" data-tab="delivery" role="tab" aria-selected="<?= !$isPickupInitial ? 'true' : 'false' ?>" aria-controls="order-panel-delivery" tabindex="<?= !$isPickupInitial ? '0' : '-1' ?>">퀵배송</button>
                        </div>
                        
                        <!-- 비회원 주문 정보: 개발 연동 시 회원 여부에 따라 노출 -->
                        <section class="order-payment__section displaynone">
                            <div class="order-payment__section-body order-payment__guest-agreement">
                                <label class="order-payment__guest-agree-label">
                                    <input type="checkbox" name="guest_privacy_agree" required>
                                    <span>비회원 개인정보 수집/이용에 동의합니다.</span>
                                </label>
                                <div class="order-payment__guest-agree-detail">
                                    <strong>수집하는 개인정보 항목</strong>
                                    <p>-성명, 주소, 전화번호, 결제정보</p>
                                </div>
                            </div>
                        </section>
                        <div class="order-payment__guest displaynone" data-guest-payment-fields>
                            <section class="order-payment__section">
                                <div class="order-payment__section-body order-payment__guest-fields">
                                    <div class="order-payment__field">
                                        <label class="order-payment__label" for="guest-payment-name">이름 <em class="order-payment__required" aria-hidden="true">*</em></label>
                                        <input type="text" class="order-payment__input" id="guest-payment-name" name="guest_name" placeholder="이름" autocomplete="name" required>
                                    </div>

                                    <div class="order-payment__field">
                                        <label class="order-payment__label" for="guest-payment-phone">휴대폰 <em class="order-payment__required" aria-hidden="true">*</em></label>
                                        <input type="tel" class="order-payment__input" id="guest-payment-phone" name="guest_phone" placeholder="-없이 입력 11자리" maxlength="11" inputmode="numeric" autocomplete="tel" required>
                                    </div>

                                    <div class="order-payment__field">
                                        <label class="order-payment__label" for="guest-payment-postcode">주소</label>
                                        <div class="order-payment__guest-address-row">
                                            <input type="text" class="order-payment__input" id="guest-payment-postcode" name="guest_postcode" placeholder="우편번호" readonly>
                                            <button type="button" class="btnNormal sizeL" data-guest-address-search>주소 검색</button>
                                        </div>
                                        <input type="text" class="order-payment__input" name="guest_address" placeholder="기본 주소" readonly>
                                        <input type="text" class="order-payment__input" name="guest_address_detail" placeholder="나머지 주소 (선택)">
                                    </div>

                                    <div class="order-payment__field">
                                        <label class="order-payment__label" for="guest-delivery-request">배송요청사항</label>
                                        <div class="custom-select order-payment__select" data-select="guest-delivery-request">
                                            <button type="button" class="custom-select__trigger" aria-expanded="false" aria-controls="guest-delivery-request-options"><span class="custom-select__value">배송요청사항을 선택해 주세요</span><i class="custom-select__arrow"><img src="/assets/icons/select-arrow-ico.svg" alt=""></i></button>
                                            <ul id="guest-delivery-request-options" class="custom-select__options" hidden>
                                                <li><button type="button" data-value="door">문 앞에 놓아주세요</button></li>
                                                <li><button type="button" data-value="contact">배송 전 연락 부탁드립니다</button></li>
                                                <li><button type="button" data-value="security">경비실에 맡겨주세요</button></li>
                                                <li><button type="button" data-value="direct">직접 입력</button></li>
                                            </ul>
                                            <input type="hidden" id="guest-delivery-request" name="guest_delivery_request" value="">
                                        </div>
                                    </div>
                                </div>
                            </section>

                        </div>

                        <div class="order-payment__panel-wrap">
                            <!-- 매장픽업 탭 -->
                            <div class="order-payment__panel common-tabs__panel<?= $isPickupInitial ? ' is-active' : '' ?>" id="order-panel-pickup" data-payment-panel="pickup" data-tab-panel="pickup" role="tabpanel" aria-labelledby="order-tab-pickup"<?= $isPickupInitial ? '' : ' hidden' ?>>

                                <!-- 구매상품 -->
                                <section class="order-payment__section">
                                    <h3 class="order-payment__section-title">구매상품</h3>

                                    <div class="order-payment__section-body">
                                        <div class="order-payment__products" data-payment-products>

                                            <div class="order-payment__product" data-payment-product-id="1">
                                                <div class="order-payment__product-image">
                                                    <img src="/assets/images/payment-prod-img.png" alt="돌돔 모둠회">
                                                </div>

                                                <div class="order-payment__product-info">
                                                    <h4 class="order-payment__product-name Body-XXS2">돌돔 모둠회</h4>
                                                    <ul class="order-payment__product-options flex-c Body-XXXS4">
                                                        <li>가격 : 소(2인) [500g] - 85,000원</li>
                                                        <li>회두께 : 보통</li>
                                                        <li>매운탕뼈 : 있음</li>
                                                        <li>추가옵션 : 쌈야채 - 3,000원</li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </section>

                                <!-- 픽업 구분 -->
                                <section class="order-payment__section">
                                    <h3 class="order-payment__section-title">픽업 구분</h3>

                                    <div class="order-payment__section-body">
                                        <div class="order-payment__radio-group flex">
                                            <label class="order-payment__radio">
                                                <input type="radio" name="pickup_type" value="dine-in"<?= $initialPickupType === 'dine-in' ? ' checked' : '' ?>>
                                                <span>매장 식사</span>
                                            </label>
                                            <label class="order-payment__radio">
                                                <input type="radio" name="pickup_type" value="takeout"<?= $initialPickupType === 'takeout' ? ' checked' : '' ?>>
                                                <span>방문 포장</span>
                                            </label>
                                        </div>
                                    </div>
                                </section>

                                <!-- 예약 일시 -->
                                <section class="order-payment__section">
                                    <h3 class="order-payment__section-title">예약 일시</h3>

                                    <div class="order-payment__section-body">
                                        <button type="button" class="order-payment__delivery-datetime btnNormal" data-payment-datetime data-payment-schedule="pickup" data-modal-open="delivery-datetime-modal"><img src="/assets/icons/month-ico.svg" alt=""><span data-payment-pickup-datetime-text>예약 날짜와 시간을 선택해 주세요.</span></button>
                                        <input type="hidden" name="pickup_date" value="" data-payment-pickup-date>
                                        <input type="hidden" name="pickup_time" value="" data-payment-pickup-time>
                                    </div>
                                </section>

                                <!-- 요청사항 -->
                                <section class="order-payment__section">
                                    <h3 class="order-payment__section-title">요청사항</h3>

                                    <div class="order-payment__section-body">
                                        <div class="order-payment__field">
                                            <label class="order-payment__label" for="order-request">매장 요청사항</label>

                                            <div class="order-payment__textarea-wrap">
                                                <textarea id="order-request" name="request" maxlength="50" placeholder="50자 내외로 입력해 주세요" data-payment-request></textarea>
                                                <span class="order-payment__char-count"><span data-request-count>0</span>/50</span>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                                <!-- 수령자 정보 -->
                                <section class="order-payment__section">
                                    <h3 class="order-payment__section-title">수령자 정보</h3>

                                    <div class="order-payment__section-body">
                                        <div class="order-payment__field">
                                            <label class="order-payment__label" for="order-receiver-name">수령자명</label>
                                            <input type="text" class="order-payment__input" id="order-receiver-name" name="receiver_name" placeholder="수령하실 분의 이름을 입력해 주세요" autocomplete="name">
                                        </div>

                                        <div class="order-payment__field">
                                            <label class="order-payment__label" for="order-receiver-phone">휴대폰</label>
                                            <input type="tel" class="order-payment__input" id="order-receiver-phone" name="receiver_phone" placeholder="-없이 입력 11자리" maxlength="11" inputmode="numeric" autocomplete="tel">
                                        </div>
                                    </div>
                                </section>

                            </div>
                            <!-- 퀵배송 탭 -->
                            <div class="order-payment__panel common-tabs__panel<?= !$isPickupInitial ? ' is-active' : '' ?>" id="order-panel-delivery" data-payment-panel="delivery" data-tab-panel="delivery" role="tabpanel" aria-labelledby="order-tab-delivery"<?= !$isPickupInitial ? '' : ' hidden' ?>>

                                <!-- 배송지 정보 -->
                                <section class="order-payment__section order-payment__section--address">
                                    <div class="order-payment__section-body">

                                        <!--
                                            order-payment__delivery-address-box 안에 내용이 없을 경우
                                            displaynone 클래스명 부여 및 order-payment__delivery-address-empty 노출
                                        -->
                                        <div class="order-payment__delivery-address-box flex-c" data-delivery-address-filled>
                                            <div class="order-payment__delivery-head flex-btw">
                                                <div class="order-payment__delivery-title flex">
                                                    <strong class="order-payment__delivery-name Body-XS1">집</strong>
                                                    <span class="order-payment__delivery-badge Body-XXXS4">기본 배송지</span>
                                                </div>

                                                <button type="button" class="order-payment__address-change btnNormal sizeXS" data-address-change data-modal-open="delivery-address-change-modal">배송지 변경</button>
                                            </div>

                                            <div class="order-payment__delivery-info">
                                                <strong class="order-payment__delivery-receiver Body-XXS2" data-delivery-receiver>김전라</strong>
                                                <p class="order-payment__delivery-address Body-XXS4" data-delivery-address>서울시 영등포구 선유서로25길 28 디스테이트 909호</p>
                                                <p class="order-payment__delivery-phone Body-XXS4" data-delivery-phone>010-1234-5678</p>
                                            </div>
                                        </div>

                                        <div class="order-payment__delivery-address-empty displaynone flex-c" data-delivery-address-empty>
                                            <p class="Body-XXS3">배송지를 추가해주세요.</p>
                                            <button type="button" class="btnNormal sizeXS" data-address-add data-modal-open="delivery-address-modal">배송지 추가</button>
                                        </div>

                                        <div class="order-payment__field order-payment__delivery-request">
                                            <label class="order-payment__label" for="delivery-request-select">배송요청사항</label>

                                            <div class="custom-select order-payment__select" data-select="delivery-request">
                                                <button type="button" class="custom-select__trigger" aria-expanded="false" aria-controls="delivery-request-options"><span class="custom-select__value">배송요청사항을 선택해 주세요</span><i class="custom-select__arrow"><img src="/assets/icons/select-arrow-ico.svg" alt=""></i></button>
                                                <ul id="delivery-request-options" class="custom-select__options" hidden>
                                                    <li><button type="button" data-value="door">문 앞에 놓아주세요</button></li>
                                                    <li><button type="button" data-value="contact">배송 전 연락 부탁드립니다</button></li>
                                                    <li><button type="button" data-value="security">경비실에 맡겨주세요</button></li>
                                                    <li><button type="button" data-value="direct">직접 입력</button></li>
                                                </ul>
                                                <input type="hidden" id="delivery-request-select" name="delivery_request" value="">
                                            </div>
                                        </div>

                                    </div>
                                </section>

                                <!-- 구매상품 -->
                                <section class="order-payment__section">
                                    <h3 class="order-payment__section-title">구매상품</h3>

                                    <div class="order-payment__section-body">
                                        <div class="order-payment__products" data-delivery-products>

                                            <div class="order-payment__product" data-payment-product-id="1">
                                                <div class="order-payment__product-image">
                                                    <img src="/assets/images/payment-prod-img.png" alt="돌돔 모둠회">
                                                </div>

                                                <div class="order-payment__product-info">
                                                    <h4 class="order-payment__product-name Body-XXS2">돌돔 모둠회</h4>
                                                    <ul class="order-payment__product-options flex-c Body-XXXS4">
                                                        <li>가격 : 소(2인) [500g] - 85,000원</li>
                                                        <li>회두께 : 보통</li>
                                                        <li>매운탕뼈 : 있음</li>
                                                        <li>추가옵션 : 쌈야채 - 3,000원</li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </section>

                                <!-- 배송 구분 -->
                                <section class="order-payment__section">
                                    <h3 class="order-payment__section-title">배송 구분</h3>

                                    <div class="order-payment__section-body">
                                        <div class="order-payment__radio-group flex">
                                            <label class="order-payment__radio">
                                                <input type="radio" name="delivery_type" value="immediate"<?= $initialDeliveryType === 'immediate' ? ' checked' : '' ?>>
                                                <span>즉시 배달</span>
                                            </label>

                                            <label class="order-payment__radio">
                                                <input type="radio" name="delivery_type" value="scheduled"<?= $initialDeliveryType === 'scheduled' ? ' checked' : '' ?>>
                                                <span>예약 배달</span>
                                            </label>
                                        </div>
                                    </div>
                                </section>

                                <!-- 배송 일시 -->
                                <!--
                                    배송일시는 상품상세에서 넘어갔을 경우에만 노출됩니다.
                                    매장식사/방문포장/예약배달 - order 페이지에서 날짜 선택 후 넘어가고
                                    즉시배달은 주문 즉시 조리 후 배달이기 때문에 날짜가 고정되어 보여야 합니다
                                -->
                                <section class="order-payment__section" data-delivery-schedule<?= $initialDeliveryType === 'immediate' ? ' hidden' : '' ?>>
                                    <h3 class="order-payment__section-title">배송 일시</h3>

                                    <div class="order-payment__section-body">
                                        <div class="order-payment__delivery-schedule">
                                            <button type="button" class="order-payment__delivery-datetime btnNormal" data-payment-schedule="delivery" data-modal-open="delivery-datetime-modal"><img src="/assets/icons/month-ico.svg" alt=""><span data-delivery-datetime-text>배송받으실 날짜와 시간을 선택해 주세요.</span></button>
                                            <input type="hidden" name="delivery_date" value="" data-delivery-date>
                                            <input type="hidden" name="delivery_time" value="" data-delivery-time>
                                        </div>
                                    </div>
                                </section>

                                <!-- 요청사항 -->
                                <section class="order-payment__section">
                                    <h3 class="order-payment__section-title">요청사항</h3>

                                    <div class="order-payment__section-body">
                                        <div class="order-payment__field">
                                            <label class="order-payment__label" for="delivery-store-request">매장 요청사항</label>

                                            <div class="order-payment__textarea-wrap">
                                                <textarea id="delivery-store-request" name="delivery_store_request" maxlength="50" placeholder="50자 내외로 입력해 주세요" data-payment-request>젓가락 부탁드립니다.</textarea>
                                                <span class="order-payment__char-count"><span data-request-count>11</span>/50</span>
                                            </div>
                                        </div>
                                    </div>
                                </section>

                            </div>
                        </div>

                        <!-- 공통 결제 정보 -->
                        <div class="order-payment__common">

                            <!-- 쿠폰 -->
                            <section class="order-payment__section">
                                <h3 class="order-payment__section-title">쿠폰</h3>

                                <div class="order-payment__section-body">
                                    <button type="button" class="order-payment__coupon flex-btw Body-XXS4" data-payment-coupon-open data-modal-open="payment-coupon-modal">
                                        <span data-payment-coupon-label>사용가능 쿠폰 <em>5장</em></span>
                                        <img src="/assets/icons/arrow-right.svg" alt="">
                                    </button>
                                </div>
                            </section>

                            <!-- 포인트 -->
                            <section class="order-payment__section">
                                <h3 class="order-payment__section-title">포인트</h3>

                                <div class="order-payment__section-body">
                                    <div class="order-payment__point-row flex">
                                        <input type="text" class="order-payment__input" name="use_points" inputmode="numeric" data-payment-points>

                                        <label class="order-payment__checkbox">
                                            <input type="checkbox" data-payment-points-all>
                                            <span>전액 사용</span>
                                        </label>
                                    </div>

                                    <p class="order-payment__point-balance">보유 포인트 <strong data-available-points>2,000P</strong></p>
                                </div>
                            </section>

                            <!-- 결제 수단 -->
                            <section class="order-payment__section">
                                <h3 class="order-payment__section-title">결제 수단</h3>

                                <div class="order-payment__section-body">
                                    <div class="order-payment__radio-group order-payment__radio-group--vertical">
                                        <label class="order-payment__radio">
                                            <input type="radio" name="payment_method" value="card" checked>
                                            <span>신용카드</span>
                                        </label>

                                        <label class="order-payment__radio">
                                            <input type="radio" name="payment_method" value="easy">
                                            <span>간편결제</span>
                                        </label>
                                    </div>
                                </div>
                            </section>

                            <!-- 공지사항 -->
                            <section class="order-payment__notice">
                                <h3 class="Body-XXS2">공지사항</h3>
                                <p class="Body-XXXS4 gray-8">공지사항 내용이 들어갑니다</p>
                            </section>

                            <label class="order-payment__notice-agree">
                                <input type="checkbox" name="notice_agree" data-payment-notice-agree>
                                <span class="Body-XXXS4">공지사항을 숙지했습니다</span>
                            </label>

                        </div>
                    </div>

                    <!-- 우측 결제 요약 -->
                    <aside class="payment-sidebar">
                        <div class="payment-sidebar__inner">

                            <div class="payment-summary">
                                <h3 class="payment-summary__title mb-16 Body-XXS2" data-payment-summary-type>매장픽업</h3>

                                <div class="payment-summary__content">
                                    <div class="payment-summary__info flex-btw">
                                        <span class="Body-XXXS4" data-payment-summary-method>매장 식사</span>
                                        <span class="payment-summary__date Body-XXXS3" data-payment-summary-date hidden></span>
                                    </div>

                                    <div class="payment-summary__prices">
                                        <h4 class="mb-16 Body-XXS2">결제금액</h4>

                                        <div class="payment-summary__price-list">
                                            <dl class="flex-btw Body-XXXS4">
                                                <dt>상품금액</dt>
                                                <dd data-payment-product-total>176,000원</dd>
                                            </dl>

                                            <dl class="flex-btw Body-XXXS4">
                                                <dt>배송비</dt>
                                                <dd data-payment-shipping-fee>0원</dd>
                                            </dl>

                                            <dl class="flex-btw Body-XXXS4">
                                                <dt>쿠폰 할인</dt>
                                                <dd class="payment-summary__discount" data-payment-coupon-discount>-0원</dd>
                                            </dl>

                                            <dl class="flex-btw Body-XXXS4">
                                                <dt>포인트</dt>
                                                <dd class="payment-summary__discount" data-payment-point-discount>-0원</dd>
                                            </dl>
                                        </div>
                                    </div>

                                    <div class="payment-summary__total flex-btw">
                                        <strong class="Body-XXS2">총 결제금액</strong>
                                        <strong class="Body-S2" data-payment-total>176,000원</strong>
                                    </div>
                                </div>
                            </div>

                            <button type="button" class="payment-submit btnSubmit sizeL" data-payment-submit>
                                <span data-payment-submit-amount>176,000원</span> 결제
                            </button>

                        </div>
                    </aside>

                </div>
            </section>
        </div>
    </div>
</div>

<!-- 상품 상세 모달 -->
<?php include __DIR__ . '/../../include/components/modal/order-product-modal.php'; ?>

<!-- 퀵배송 날짜 및 시간 선택 모달 -->
<?php include __DIR__ . '/../../include/components/modal/delivery-datetime-modal.php'; ?>

<!-- 배송지 추가 모달 -->
<?php include __DIR__ . '/../../include/components/modal/delivery-address-modal.php'; ?>

<!-- 배송지 변경 모달 -->
<?php include __DIR__ . '/../../include/components/modal/delivery-address-change-modal.php'; ?>

<!-- 주문 취소 모달 -->
<?php include __DIR__ . '/../../include/components/modal/order-cancel-modal.php'; ?>

<!-- 쿠폰 선택 모달 -->
<?php include __DIR__ . '/../../include/components/modal/payment-coupon-modal.php'; ?>

<?php include __DIR__ . '/../../include/components/layout/footer.php'; ?>

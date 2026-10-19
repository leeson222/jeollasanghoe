<?php include __DIR__ . '/../../include/components/layout/head.php'; ?>
<?php include __DIR__ . '/../../include/components/layout/sub-header.php'; ?>

<link rel="stylesheet" href="/assets/css/order-result.css">

<div id="contents">
    <div class="order-result-page">
        <div class="container">
            <div class="order-result">
                <section class="order-result__complete">
                    <img class="order-result__icon" src="/assets/icons/order-result-ico.svg" alt="">
                    <h2 class="order-result__title Body-S2">주문 완료</h2>
                    <p class="order-result__message Body-XS3">구매가 정상적으로 완료되었습니다</p>
                    <p class="order-result__number Body-XXXS3">주문번호 <strong data-order-number>2026050600001</strong></p>

                    <div class="order-result__actions flex">
                        <a href="/" class="btnSubmit sizeS">쇼핑 계속하기</a>
                        <a href="#" class="btnNormal sizeS" data-order-history-link>주문내역 보기</a>
                    </div>
                </section>

                <section class="order-result__info">
                    <h3 class="order-result__info-title Body-XXS2">주문 정보</h3>

                    <dl class="order-result__info-list">
                        <div class="order-result__info-row">
                            <dt>주문유형</dt>
                            <dd data-order-type>퀵배송 / 예약 배달</dd>
                        </div>
                        <div class="order-result__info-row">
                            <dt>예약 일시</dt>
                            <dd data-order-datetime>2026.10.06 화 오후 12:00</dd>
                        </div>
                        <div class="order-result__info-row">
                            <dt>결제 수단</dt>
                            <dd data-order-payment-method>신용카드</dd>
                        </div>
                        <div class="order-result__info-row">
                            <dt>결제 금액</dt>
                            <dd data-order-payment-total>176,000원</dd>
                        </div>
                    </dl>
                </section>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../../include/components/layout/footer.php'; ?>

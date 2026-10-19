<?php
$orderId = isset($_GET['order_id']) ? (string)$_GET['order_id'] : '202603150001';
$orderType = ($_GET['order_type'] ?? '') === 'quick' ? 'quick' : 'pickup';
$method = (string)($_GET['method'] ?? ($orderType === 'quick' ? 'scheduled' : 'dine-in'));

if ($orderType === 'pickup') {
    $method = $method === 'takeout' ? 'takeout' : 'dine-in';
} else {
    $method = $method === 'immediate' ? 'immediate' : 'scheduled';
}

$orderTypeLabel = $orderType === 'pickup' ? '픽업' : '퀵배송';
$methodLabels = [
    'dine-in' => '매장식사',
    'takeout' => '방문포장',
    'immediate' => '즉시배달',
    'scheduled' => '예약배달',
];
$methodLabel = $methodLabels[$method];
$hasReservation = $method !== 'immediate';
?>
<?php include __DIR__ . '/../../../include/components/layout/head.php'; ?>
<?php include __DIR__ . '/../../../include/components/layout/sub-header.php'; ?>

<div id="contents">
    <div class="container">
        <main class="myshop-order-detail" data-order-detail data-order-id="<?= htmlspecialchars($orderId) ?>" data-order-type="<?= htmlspecialchars($orderType) ?>" data-order-method="<?= htmlspecialchars($method) ?>">
            <h1 class="myshop-order-detail__title Body-M2">주문 상세</h1>
 
            <article class="myshop-order-detail__card">
                <header class="myshop-order-detail__header flex-btw">
                    <div class="myshop-order-detail__meta flex">
                        <time datetime="2026-03-15" data-order-date>2026.03.15</time>
                        <span>주문 <span data-order-product-count>1</span>건</span>
                        <line></line>
                        <span>주문번호 <span data-order-number><?= htmlspecialchars($orderId) ?></span></span>
                    </div>
                    <div class="myshop-order-detail__status flex">
                        <span class="myshop-order-card__badge myshop-order-card__badge--<?= htmlspecialchars($orderType) ?>" data-order-type-label><?= htmlspecialchars($orderTypeLabel) ?></span>
                        <strong data-order-status>상품 준비중</strong>
                    </div>
                </header>

                <section class="myshop-order-detail__section" aria-labelledby="order-receive-title">
                    <h2 id="order-receive-title">수령 정보</h2>
                    <dl class="myshop-order-detail__info">
                        <div class="myshop-order-detail__row"><dt>수령방법</dt><dd><span data-receive-type><?= htmlspecialchars($orderTypeLabel) ?></span> <line aria-hidden="true"></line> <span data-receive-method><?= htmlspecialchars($methodLabel) ?></span></dd></div>
                        <?php if ($hasReservation): ?>
                            <div class="myshop-order-detail__row"><dt>예약시간</dt><dd><time datetime="2026-03-20T12:00" data-reservation-datetime>2026.03.20 12:00</time></dd></div>
                        <?php endif; ?>
                    </dl>
                </section>

                <section class="myshop-order-detail__section" aria-labelledby="order-customer-title">
                    <h2 id="order-customer-title">구매자 정보</h2>
                    <dl class="myshop-order-detail__info">
                        <div class="myshop-order-detail__row"><dt>이름</dt><dd data-customer-name>김전라</dd></div>
                        <div class="myshop-order-detail__row"><dt>휴대전화</dt><dd data-customer-phone>(+82) 01012345678</dd></div>
                    </dl>
                </section>

                <section class="myshop-order-detail__section" aria-labelledby="order-product-title">
                    <h2 id="order-product-title">상품 정보</h2>
                    <dl class="myshop-order-detail__info" data-order-product data-product-id="1">
                        <div class="myshop-order-detail__row"><dt>상품</dt><dd data-product-name>줄무늬전갱이회</dd></div>
                        <div class="myshop-order-detail__row">
                            <dt>옵션</dt>
                            <dd><ul data-product-option-list><li data-product-option="size">가격 : 소(2인) [500g] - 85,000원</li><li data-product-option="thickness">회두께 : 보통</li><li data-product-option="spicy">매운탕뼈 : 있음</li><li data-product-option="extra">추가옵션 : 쌈야채 - 3,000원</li></ul></dd>
                        </div>
                        <div class="myshop-order-detail__row"><dt>수량</dt><dd><span data-product-quantity>1</span></dd></div>
                        <div class="myshop-order-detail__row"><dt>판매가</dt><dd><span class="myshop-order-detail__amount"><span data-product-price>10,700</span>원</span></dd></div>
                    </dl>
                </section>

                <section class="myshop-order-detail__section" aria-labelledby="order-discount-title">
                    <h2 id="order-discount-title">할인 정보</h2>
                    <dl class="myshop-order-detail__info">
                        <div class="myshop-order-detail__row"><dt>쿠폰</dt><dd><span class="myshop-order-detail__amount"><span data-coupon-discount>-10,000</span>원</span></dd></div>
                        <div class="myshop-order-detail__row"><dt>포인트</dt><dd><span class="myshop-order-detail__amount"><span data-point-discount>-2,000</span>P</span></dd></div>
                        <div class="myshop-order-detail__row"><dt>합계</dt><dd class="myshop-order-detail__discount-total"><span class="myshop-order-detail__amount"><span data-discount-total>-12,000</span>원</span></dd></div>
                    </dl>
                </section>

                <section class="myshop-order-detail__section" aria-labelledby="order-payment-title">
                    <h2 id="order-payment-title">결제 정보</h2>
                    <dl class="myshop-order-detail__info">
                        <div class="myshop-order-detail__row"><dt>결제방법</dt><dd data-payment-method>신용카드</dd></div>
                        <div class="myshop-order-detail__row"><dt>카드</dt><dd data-payment-card>국민카드</dd></div>
                        <div class="myshop-order-detail__row"><dt>할부</dt><dd data-payment-installment>일시불</dd></div>
                        <div class="myshop-order-detail__row"><dt>결제금액</dt><dd><span class="myshop-order-detail__amount"><span data-payment-amount>5,000</span>원</span></dd></div>
                        <div class="myshop-order-detail__row"><dt>결제일</dt><dd><time datetime="2026-03-15T06:30:55" data-payment-date>2026.03.15 06:30:55</time></dd></div>
                    </dl>
                </section>
            </article>

            <div class="myshop-order-detail__actions">
                <a href="/pages/myshop/index.php" class="btnNormal sizeM">목록</a>
            </div>
        </main>
    </div>
</div>

<?php include __DIR__ . '/../../../include/components/layout/footer.php'; ?>

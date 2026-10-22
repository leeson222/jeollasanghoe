<?php
$recentOrders = [
    ['type' => '픽업', 'method_key' => 'dine-in', 'reservation' => '2026.03.20 12:00', 'status' => '결제대기', 'count' => 1, 'actions' => ['주문 취소', '옵션 변경']],
    ['type' => '픽업', 'method_key' => 'takeout', 'reservation' => '2026.03.20 12:00', 'status' => '결제완료', 'count' => 1, 'actions' => ['주문 취소', '옵션 변경']],
    ['type' => '픽업', 'method_key' => 'dine-in', 'reservation' => '2026.03.20 12:00', 'status' => '상품 준비중', 'count' => 1, 'actions' => []],
    ['type' => '퀵배송', 'method_key' => 'scheduled', 'reservation' => '2026.03.20 12:00', 'status' => '상품 준비중', 'count' => 2, 'actions' => []],
    ['type' => '퀵배송', 'method_key' => 'immediate', 'reservation' => '', 'status' => '배송완료', 'count' => 1, 'actions' => ['배송 조회', '구매 확정']],
    ['type' => '퀵배송', 'method_key' => 'scheduled', 'reservation' => '2026.03.20 12:00', 'status' => '구매확정', 'count' => 1, 'actions' => ['리뷰 작성']],
];

$orderActionKeys = [
    '주문 취소' => 'cancel',
    '옵션 변경' => 'change-options',
    '배송 조회' => 'track-delivery',
    '구매 확정' => 'confirm-purchase',
    '리뷰 작성' => 'write-review',
];
?>
<?php include __DIR__ . '/../../include/components/layout/head.php'; ?>
<?php
$mobileHeaderBackUrl = '/pages/myshop/index.php';
$mobileHeaderBackUsesHistory = false;
?>
<?php include __DIR__ . '/../../include/components/layout/sub-header.php'; ?>
<link rel="stylesheet" href="/assets/css/order.css">

<div id="contents">
    <div class="container">
        <div class="myshop-layout">
            <?php include __DIR__ . '/../../include/components/myshop/myshop-menu.php'; ?>

            <main class="myshop-content" data-myshop-dashboard>
                <section class="myshop-summary" data-myshop-summary>
                    <h1 class="myshop-summary__title Body-M2"><span data-myshop-member-name>김전라</span>님, 반갑습니다</h1>
                    <dl class="myshop-summary__stats" data-myshop-summary-stats>
                        <div class="myshop-summary__stat" data-myshop-summary-item="points">
                            <dt>
                                <i class="myshop-summary__stat-icon myshop-summary__stat-icon--points" aria-hidden="true">
                                    <img src="/assets/icons/myshop-index-point.svg" alt="">
                                </i>
                                <span class="Body-XXS3 gray-8">포인트</span>
                            </dt>
                            <dd class="Body-XXS2"><span data-myshop-point-balance>2,050</span>P</dd>
                        </div>
                        <div class="myshop-summary__stat" data-myshop-summary-item="coupons">
                            <dt>
                                <i class="myshop-summary__stat-icon myshop-summary__stat-icon--coupons" aria-hidden="true">
                                    <img src="/assets/icons/myshop-index-coupon.svg" alt="">
                                </i>
                                <span class="Body-XXS3 gray-8">쿠폰</span>
                            </dt>
                            <dd class="Body-XXS2"><span data-myshop-coupon-count>2</span>장</dd>
                        </div>
                        <div class="myshop-summary__stat" data-myshop-summary-item="reviews">
                            <dt>
                                <i class="myshop-summary__stat-icon myshop-summary__stat-icon--reviews" aria-hidden="true">
                                    <img src="/assets/icons/myshop-index-review.svg" alt="">
                                </i>
                                <span class="Body-XXS3 gray-8">리뷰</span>
                            </dt>
                            <dd class="Body-XXS2"><span data-myshop-review-count>2</span>건</dd>
                        </div>
                        <div class="myshop-summary__stat" data-myshop-summary-item="inquiries">
                            <dt>
                                <i class="myshop-summary__stat-icon myshop-summary__stat-icon--inquiries" aria-hidden="true">
                                    <img src="/assets/icons/myshop-index-qna.svg" alt="">
                                </i>
                                <span class="Body-XXS3 gray-8">문의</span>
                            </dt>
                            <dd class="Body-XXS2"><span data-myshop-inquiry-count>2</span>건</dd>
                        </div>
                    </dl>
                </section>

                <div class="myshop-dashboard__orders" data-myshop-dashboard-orders>
                <section class="myshop-period myshop-period--dashboard" aria-labelledby="myshop-period-title" data-myshop-period-filter>
                    <h2 id="myshop-period-title" class="Body-XS3">조회 기간</h2>
                    <button type="button" class="myshop-period__mobile-toggle" aria-expanded="false" aria-controls="myshop-period-controls" data-period-mobile-toggle>
                        <span data-period-summary-months>1개월</span>
                        <i aria-hidden="true"></i>
                        <span><span data-period-summary-start>2026-07-01</span> ~ <span data-period-summary-end>2026-08-01</span></span>
                        <img src="/assets/icons/select-arrow-ico.svg" alt="">
                    </button>
                    <div class="myshop-period__controls" id="myshop-period-controls">
                        <div class="myshop-period__presets">
                            <button class="btnNormal sizeL is-active" type="button" data-period-months="1">1개월</button>
                            <button class="btnNormal sizeL" type="button" data-period-months="3">3개월</button>
                            <button class="btnNormal sizeL" type="button" data-period-months="6">6개월</button>
                        </div>
                        <div class="myshop-period__dates">
                            <label><img src="/assets/icons/month-ico.svg" alt=""><input type="text" value="2026-07-01" data-period-start data-myshop-date-input readonly aria-haspopup="dialog" aria-expanded="false"></label>
                            <span aria-hidden="true">~</span>
                            <label><img src="/assets/icons/month-ico.svg" alt=""><input type="text" value="2026-08-01" data-period-end data-myshop-date-input readonly aria-haspopup="dialog" aria-expanded="false"></label>

                            <div class="myshop-calendar" data-myshop-calendar role="dialog" aria-label="날짜 선택" hidden>
                                <div class="myshop-calendar__header">
                                    <button type="button" class="myshop-calendar__nav" data-calendar-prev aria-label="이전 달"><img src="/assets/icons/myshop-cal-left.svg" alt="이전 달"></button>
                                    <strong data-calendar-title></strong>
                                    <button type="button" class="myshop-calendar__nav" data-calendar-next aria-label="다음 달"><img src="/assets/icons/myshop-cal-right.svg" alt="다음 달"></button>
                                </div>
                                <div class="myshop-calendar__weekdays" aria-hidden="true">
                                    <span>일</span><span>월</span><span>화</span><span>수</span><span>목</span><span>금</span><span>토</span>
                                </div>
                                <div class="myshop-calendar__days" data-calendar-days></div>
                            </div>
                        </div>
                        <button type="button" class="btnSubmit sizeM" data-period-submit>조회</button>
                    </div>
                </section>

                <section class="myshop-recent-orders" data-myshop-recent-orders>
                    <div class="myshop-order-list" data-myshop-order-list>
                        <?php foreach ($recentOrders as $orderIndex => $order): ?>
                            <article class="myshop-order-card" data-myshop-order data-order-id="202603150001" data-order-type="<?= $order['type'] === '픽업' ? 'pickup' : 'quick' ?>" data-order-method="<?= htmlspecialchars($order['method_key']) ?>" data-order-status="<?= htmlspecialchars($order['status']) ?>">
                                <header class="myshop-order-card__header">
                                    <div class="myshop-order-card__meta flex">
                                        <time class="Body-XXS3" datetime="2026-03-20" data-order-date>2026.03.20</time>
                                        <div class="myshop-order-card__order-info flex">
                                            <strong class="Body-XXXS3 gray-5">주문 <span data-order-product-count><?= $order['count'] ?></span>건</strong>
                                            <span class="Caption-S3 gray-5">주문번호 <span data-order-number>202603150001</span></span>
                                        </div>
                                    </div>
                                    <div class="myshop-order-card__header-actions flex">
                                        <?php if ($order['status'] === '상품 준비중'): ?>
                                            <button type="button" class="Body-XXXS1 gray-7" data-order-action="change-address">배송지 변경 <line class="line-md"></line></button>
                                        <?php endif; ?>
                                        <a href="/pages/myshop/order/detail.php?<?= http_build_query(['order_id' => '202603150001', 'order_type' => $order['type'] === '픽업' ? 'pickup' : 'quick', 'method' => $order['method_key']]) ?>" class="flex Body-XXXS1 gray-7" data-order-detail-link>주문 상세<i><img src="/assets/icons/myshop-order-detail-more.svg" alt=""></i></a>
                                    </div>
                                </header>

                                <div class="myshop-order-card__body">
                                    <div class="myshop-order-card__status">
                                        <span class="myshop-order-card__badge myshop-order-card__badge--<?= $order['type'] === '픽업' ? 'pickup' : 'quick' ?>" data-order-type-label><?= htmlspecialchars($order['type']) ?></span>
                                        <strong class="Body-XXS2" data-order-status-label><?= htmlspecialchars($order['status']) ?></strong>
                                        <line<?= $order['method_key'] === 'immediate' ? ' class="displaynone"' : '' ?>></line>
                                        <?php if ($order['reservation'] !== ''): ?>
                                            <span class="Caption-S3 gray-5">예약시간 <time datetime="<?= str_replace(' ', 'T', htmlspecialchars($order['reservation'])) ?>" data-order-reservation><?= htmlspecialchars($order['reservation']) ?></time></span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="myshop-order-card__content">
                                        <div class="myshop-order-card__products">
                                            <?php for ($productIndex = 0; $productIndex < $order['count']; $productIndex++): ?>
                                                <div class="myshop-order-product" data-order-product data-product-id="1">
                                                    <a href="/pages/product/product-detail.php" class="myshop-order-product__image" data-product-link>
                                                        <img src="/assets/images/payment-prod-img.png" alt="줄무늬전갱이회" data-product-image>
                                                    </a>
                                                    <div class="myshop-order-product__info">
                                                        <h3 class="flex"><a href="/pages/product/product-detail.php" class="Body-XS3" data-product-name>줄무늬전갱이회</a><line></line><span><span data-product-quantity>1</span>개</span></h3>
                                                        <strong class="Body-XXS3"><span data-product-price>45,000</span>원</strong>
                                                        <details data-product-options<?= $orderIndex === 0 && $productIndex === 0 ? ' open' : '' ?>>
                                                            <summary class="Body-XXXS3 gray-6">옵션 상세 <img src="/assets/icons/myshop-index-option-arrow.svg" alt="" aria-hidden="true"></summary>
                                                            <ul class="Body-XXXS3 gray-7" data-product-option-list>
                                                                <li data-product-option="size">가격 : 소(2인) [500g] - 85,000원</li>
                                                                <li data-product-option="thickness">회두께 : 보통</li>
                                                                <li data-product-option="spicy">매운탕뼈 : 있음</li>
                                                                <li data-product-option="extra">추가옵션 : 쌈야채 - 3,000원</li>
                                                            </ul>
                                                        </details>
                                                    </div>
                                                </div>
                                            <?php endfor; ?>
                                        </div>

                                        <?php if ($order['actions']): ?>
                                            <div class="myshop-order-card__actions" data-order-actions>
                                                <?php foreach ($order['actions'] as $action): ?>
                                                    <button type="button" class="<?= $action === '구매 확정' ? 'btnSubmit' : 'btnNormal' ?> sizeS" data-order-action="<?= htmlspecialchars($orderActionKeys[$action] ?? '') ?>"<?= $action === '주문 취소' ? ' data-modal-open="order-cancel-request-modal"' : '' ?><?= $action === '옵션 변경' ? ' data-option-change-trigger data-modal-open="option-change-modal"' : '' ?><?= $action === '리뷰 작성' ? ' data-review-write data-modal-open="review-write-modal"' : '' ?>><?= htmlspecialchars($action) ?></button>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </section>
                </div>
            </main>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../../include/components/modal/order-cancel-request-modal.php'; ?>
<?php include __DIR__ . '/../../include/components/modal/option-change-modal.php'; ?>
<?php include __DIR__ . '/../../include/components/modal/review-write-modal.php'; ?>

<?php include __DIR__ . '/../../include/components/layout/footer.php'; ?>

<?php
$cancelOrders = [
    ['id' => '202603150001', 'type' => '픽업', 'method_key' => 'dine-in', 'reservation' => '2026.03.20 12:00', 'status' => '취소신청', 'count' => 1, 'cancel_reason' => '기타', 'cancel_detail' => '주문 내용을 변경하기 위해 취소를 신청했습니다.', 'actions' => ['취소철회']],
    ['id' => '202603150002', 'type' => '퀵배송', 'method_key' => 'scheduled', 'reservation' => '2026.03.20 12:00', 'status' => '취소처리중', 'count' => 1, 'cancel_reason' => '배송지 변경', 'cancel_detail' => '배송지를 변경한 뒤 다시 주문할 예정입니다.', 'actions' => ['취소철회']],
    ['id' => '202603150003', 'type' => '퀵배송', 'method_key' => 'immediate', 'reservation' => '', 'status' => '취소완료', 'count' => 1, 'cancel_reason' => '단순 변심', 'cancel_detail' => '고객 요청으로 주문 취소가 완료되었습니다.', 'actions' => ['재구매']],
];

$cancelActionKeys = [
    '재구매' => 'reorder',
    '취소철회' => 'withdraw-cancel',
];
?>
<?php include __DIR__ . '/../../include/components/layout/head.php'; ?>
<?php include __DIR__ . '/../../include/components/layout/sub-header.php'; ?>

<div id="contents">
    <div class="container">
        <div class="myshop-layout">
            <?php include __DIR__ . '/../../include/components/myshop/myshop-menu.php'; ?>

            <main class="myshop-content" data-myshop-cancel-history>
                <div class="myshop-title-wrap">
                    <h2 class="Body-M2">주문취소 내역</h2>
                </div>
                <section class="myshop-period" aria-labelledby="myshop-cancel-period-title" data-myshop-period-filter>
                    <h1 id="myshop-cancel-period-title" class="Body-XS3">조회 기간</h1>
                    <div class="myshop-period__controls">
                        <div class="myshop-period__presets">
                            <button type="button" class="btnNormal sizeL is-active" data-period-months="1">1개월</button>
                            <button type="button" class="btnNormal sizeL" data-period-months="3">3개월</button>
                            <button type="button" class="btnNormal sizeL" data-period-months="6">6개월</button>
                        </div>
                        <div class="myshop-period__dates">
                            <label><img src="/assets/icons/month-ico.svg" alt=""><input type="text" value="2026-07-01" data-period-start data-myshop-date-input readonly aria-label="시작일" aria-haspopup="dialog" aria-expanded="false"></label>
                            <span aria-hidden="true">~</span>
                            <label><img src="/assets/icons/month-ico.svg" alt=""><input type="text" value="2026-08-01" data-period-end data-myshop-date-input readonly aria-label="종료일" aria-haspopup="dialog" aria-expanded="false"></label>

                            <div class="myshop-calendar" data-myshop-calendar role="dialog" aria-label="날짜 선택" hidden>
                                <div class="myshop-calendar__header">
                                    <button type="button" class="myshop-calendar__nav" data-calendar-prev aria-label="이전 달"><img src="/assets/icons/myshop-cal-left.svg" alt=""></button>
                                    <strong data-calendar-title></strong>
                                    <button type="button" class="myshop-calendar__nav" data-calendar-next aria-label="다음 달"><img src="/assets/icons/myshop-cal-right.svg" alt=""></button>
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

                <section class="myshop-recent-orders" aria-label="주문취소 내역" data-myshop-cancel-orders>
                    <div class="myshop-order-list" data-myshop-order-list>
                        <?php foreach ($cancelOrders as $orderIndex => $order): ?>
                            <?php $orderTypeKey = $order['type'] === '픽업' ? 'pickup' : 'quick'; ?>
                            <article class="myshop-order-card" data-myshop-order data-order-id="<?= htmlspecialchars($order['id']) ?>" data-order-type="<?= $orderTypeKey ?>" data-order-method="<?= htmlspecialchars($order['method_key']) ?>" data-order-status="<?= htmlspecialchars($order['status']) ?>">
                                <header class="myshop-order-card__header">
                                    <div class="myshop-order-card__meta flex">
                                        <time class="Body-XXS3" datetime="2026-03-20" data-order-date>2026.03.20</time>
                                        <div class="myshop-order-card__order-info flex">
                                            <strong class="Body-XXXS3 gray-5">주문 <span data-order-product-count><?= $order['count'] ?></span>건</strong>
                                            <span class="Caption-S3 gray-5">주문번호 <span data-order-number><?= htmlspecialchars($order['id']) ?></span></span>
                                        </div>
                                    </div>
                                    <a href="/pages/myshop/order/detail.php?<?= http_build_query(['order_id' => $order['id'], 'order_type' => $orderTypeKey, 'method' => $order['method_key']]) ?>" class="flex Body-XXXS1 gray-7" data-order-detail-link>주문 상세<i><img src="/assets/icons/myshop-order-detail-more.svg" alt=""></i></a>
                                </header>

                                <div class="myshop-order-card__body">
                                    <div class="myshop-order-card__status">
                                        <span class="myshop-order-card__badge myshop-order-card__badge--<?= $orderTypeKey ?>" data-order-type-label><?= htmlspecialchars($order['type']) ?></span>
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
                                                        <h2 class="flex"><a href="/pages/product/product-detail.php" class="Body-XS3" data-product-name>줄무늬전갱이회</a><line></line><span><span data-product-quantity>1</span>개</span></h2>
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
                                                        <details class="myshop-order-cancel-detail" data-order-cancel-detail<?= $orderIndex === 0 && $productIndex === 0 ? ' open' : '' ?>>
                                                            <summary class="Body-XXXS3 gray-6">취소 상세 <img src="/assets/icons/myshop-index-option-arrow.svg" alt="" aria-hidden="true"></summary>
                                                            <dl class="myshop-order-cancel-detail__content Body-XXXS3 gray-7">
                                                                <div class="myshop-order-cancel-detail__row">
                                                                    <dt>취소 사유</dt>
                                                                    <dd data-cancel-reason><?= htmlspecialchars($order['cancel_reason']) ?></dd>
                                                                </div>
                                                                <div class="myshop-order-cancel-detail__row">
                                                                    <dt>취소 내용</dt>
                                                                    <dd data-cancel-detail><?= htmlspecialchars($order['cancel_detail']) ?></dd>
                                                                </div>
                                                            </dl>
                                                        </details>
                                                    </div>
                                                </div>
                                            <?php endfor; ?>
                                        </div>

                                        <div class="myshop-order-card__actions" data-order-actions>
                                            <?php foreach ($order['actions'] as $action): ?>
                                                <button type="button" class="btnNormal sizeS" data-order-action="<?= htmlspecialchars($cancelActionKeys[$action]) ?>"><?= htmlspecialchars($action) ?></button>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </section>
            </main>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../../include/components/layout/footer.php'; ?>

<?php
$coupons = [
    ['id' => 1, 'discount' => '10%', 'name' => 'WELCOME 회원가입 쿠폰', 'condition' => '신규 회원 대상', 'remaining' => '25일 남음', 'period' => '2026.02.17 ~ 2026.03.17', 'status' => 'available', 'status_label' => '사용 가능'],
    ['id' => 2, 'discount' => '10%', 'name' => 'WELCOME 회원가입 쿠폰', 'condition' => '신규 회원 대상', 'remaining' => '25일 남음', 'period' => '2026.02.17 ~ 2026.03.17', 'status' => 'available', 'status_label' => '사용 가능'],
    ['id' => 3, 'discount' => '10%', 'name' => 'WELCOME 회원가입 쿠폰', 'condition' => '신규 회원 대상', 'remaining' => '3개월 남음', 'period' => '2026.02.17 ~ 2026.03.17', 'status' => 'available', 'status_label' => '사용 가능'],
    ['id' => 4, 'discount' => '10%', 'name' => 'WELCOME 회원가입 쿠폰', 'condition' => '신규 회원 대상', 'remaining' => '', 'period' => '2026.02.17 ~ 2026.03.17', 'status' => 'available', 'status_label' => '사용 가능'],
    ['id' => 5, 'discount' => '10%', 'name' => 'WELCOME 회원가입 쿠폰', 'condition' => '신규 회원 대상', 'remaining' => '', 'period' => '2026.02.17 ~ 2026.03.17', 'status' => 'available', 'status_label' => '사용 가능'],
    ['id' => 6, 'discount' => '10%', 'name' => 'WELCOME 회원가입 쿠폰', 'condition' => '신규 회원 대상', 'remaining' => '', 'period' => '2026.02.17 ~ 2026.03.17', 'status' => 'unavailable', 'status_label' => '사용 불가'],
    ['id' => 7, 'discount' => '10%', 'name' => 'WELCOME 회원가입 쿠폰', 'condition' => '신규 회원 대상', 'remaining' => '', 'period' => '2026.02.17 ~ 2026.03.17', 'status' => 'unavailable', 'status_label' => '사용 만료'],
];
?>
<?php include __DIR__ . '/../../include/components/layout/head.php'; ?>
<?php include __DIR__ . '/../../include/components/layout/sub-header.php'; ?>

<div id="contents">
    <div class="container">
        <div class="myshop-layout">
            <?php include __DIR__ . '/../../include/components/myshop/myshop-menu.php'; ?>

            <main class="myshop-content">
                <section class="myshop-coupons" data-myshop-coupons>
                    <h1 class="myshop-page__title Body-M2">쿠폰 관리</h1>

                    <section class="myshop-period" aria-labelledby="coupon-period-title" data-myshop-period-filter>
                        <h2 id="coupon-period-title" class="Body-XS3">조회 기간</h2>
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
                                    <div class="myshop-calendar__weekdays" aria-hidden="true"><span>일</span><span>월</span><span>화</span><span>수</span><span>목</span><span>금</span><span>토</span></div>
                                    <div class="myshop-calendar__days" data-calendar-days></div>
                                </div>
                            </div>
                            <button type="button" class="btnSubmit sizeM" data-period-submit>조회</button>
                        </div>
                    </section>

                    <div class="myshop-coupon-register" data-coupon-register>
                        <label for="coupon-number" class="Body-XS3">쿠폰 등록</label>
                        <div class="myshop-coupon-register__controls">
                            <input type="text" id="coupon-number" name="coupon_number" placeholder="쿠폰 번호를 입력해 주세요" data-coupon-number>
                            <button type="button" class="btnSubmit sizeM" data-coupon-register-submit>등록</button>
                        </div>
                    </div>

                    <div class="myshop-coupon-filter" role="group" aria-label="쿠폰 상태 필터" data-coupon-filter>
                        <button type="button" class="btnNormal sizeM is-active" data-coupon-status="all" aria-pressed="true">전체</button>
                        <button type="button" class="btnNormal sizeM" data-coupon-status="available" aria-pressed="false">사용 가능</button>
                        <button type="button" class="btnNormal sizeM" data-coupon-status="unavailable" aria-pressed="false">사용 불가</button>
                    </div>

                    <div class="myshop-coupon-list" data-coupon-list>
                        <?php foreach ($coupons as $coupon): ?>
                            <article class="myshop-coupon-card myshop-coupon-card--<?= htmlspecialchars($coupon['status']) ?>" data-coupon-item data-coupon-id="<?= $coupon['id'] ?>" data-coupon-state="<?= htmlspecialchars($coupon['status']) ?>">
                                <div class="myshop-coupon-card__head">
                                    <strong data-coupon-discount><?= htmlspecialchars($coupon['discount']) ?></strong>
                                    <span data-coupon-status-label><?= htmlspecialchars($coupon['status_label']) ?></span>
                                </div>
                                <h2 class="Body-XXS2" data-coupon-name><?= htmlspecialchars($coupon['name']) ?></h2>
                                <p class="myshop-coupon-card__condition Body-XXXS2 gray-7"><span data-coupon-condition><?= htmlspecialchars($coupon['condition']) ?></span><?php if ($coupon['remaining'] !== ''): ?> <em data-coupon-remaining><?= htmlspecialchars($coupon['remaining']) ?></em><?php endif; ?></p>
                                <p class="Body-XXXS2 gray-5" data-coupon-period><?= htmlspecialchars($coupon['period']) ?></p>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </section>
            </main>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../../include/components/layout/footer.php'; ?>

<?php
$orderTypeParam = ($_GET['order_type'] ?? '') === 'quick' ? 'quick' : 'pickup';
$orderFlowParams = ['order_type' => $orderTypeParam];

if ($orderTypeParam === 'quick') {
    $orderFlowParams['delivery_type'] = ($_GET['delivery_type'] ?? '') === 'scheduled' ? 'scheduled' : 'immediate';
} else {
    $orderFlowParams['pickup_type'] = ($_GET['pickup_type'] ?? '') === 'takeout' ? 'takeout' : 'dine-in';
}

$orderNextUrl = '/pages/order/products.php?' . http_build_query($orderFlowParams);
?>
<?php include __DIR__ . '/../../include/components/layout/head.php'; ?>
<?php include __DIR__ . '/../../include/components/layout/sub-header.php'; ?>

<link rel="stylesheet" href="/assets/css/order.css">

<div id="contents">
    <div class="order-page">
        <div class="container">
            
            <!-- 공통 타이틀 -->
            <?php include __DIR__ . '/../../include/components/order/order-header.php'; ?>

            <div class="order-section">
                
                <div class="order-layout flex">
                    <!-- 날짜 및 시간 선택 -->
                    <div class="order-schedule">
                        <h3 class="order-section__title mb-16 Body-XXS2">날짜 및 시간 선택</h3>
                        <div class="order-calendar-wrap">
                            <!-- 캘린더 -->
                            <div class="order-calendar" data-calendar="order">
                                <div class="order-calendar__header flex mb-30">
                                    <button type="button" class="order-calendar__arrow prev" data-calendar-action="prev" aria-label="이전 달">
                                        <img src="/assets/icons/calendar-prev.svg" alt="">
                                    </button>

                                    <button type="button" class="order-calendar__month" data-sheet-open="month-select-sheet">
                                        <span class="Body-XS1" data-calendar-month>2026년 10월</span>
                                    </button>

                                    <button type="button" class="order-calendar__arrow next" data-calendar-action="next" aria-label="다음 달">
                                        <img src="/assets/icons/calendar-next.svg" alt="">
                                    </button>
                                </div>

                                <div class="order-calendar__weekdays flex">
                                    <span class="red">일</span>
                                    <span>월</span>
                                    <span>화</span>
                                    <span>수</span>
                                    <span>목</span>
                                    <span>금</span>
                                    <span>토</span>
                                </div>

                                <!--
                                    [퍼블리싱 임시 구현 / 프론트 연동 필요]
                                    - order.js에서 현재 월을 기준으로 달력 생성
                                    - 이전/다음 버튼으로 월 이동
                                    - 날짜 선택 시 is-selected 클래스 적용
                                    - 추후 실제 예약 가능 날짜 API와 연동 필요
                                    - 퀵배송을 통해 접속 시 오늘로부터 일주일만 활성화
                                      일주일을 제외한 날짜에 is-outside 클래스명 추가
                                -->
                                <div class="order-calendar__days" data-calendar-days></div>
                            </div>

                            <!-- 시간 선택 -->
                            <div class="order-time flex-c" data-time-picker>
                                <div class="order-time__group">
                                    <h4 class="order-time__title mb-10 Body-XXS4">오전</h4>
                                    <div class="order-time__list">
                                        <button type="button" class="order-time__item" data-time="10:00">10:00</button>
                                        <button type="button" class="order-time__item" data-time="10:30">10:30</button>
                                        <button type="button" class="order-time__item" data-time="11:00">11:00</button>
                                        <button type="button" class="order-time__item" data-time="11:30">11:30</button>
                                    </div>
                                </div>

                                <div class="order-time__group">
                                    <h4 class="order-time__title mb-10 Body-XXS4">오후</h4>
                                    <div class="order-time__list">
                                        <button type="button" class="order-time__item is-selected" data-time="12:00" aria-pressed="true">12:00</button>
                                        <button type="button" class="order-time__item is-disable" data-time="12:30" disabled>12:30</button>
                                        <button type="button" class="order-time__item" data-time="13:00">1:00</button>
                                        <button type="button" class="order-time__item" data-time="13:30">1:30</button>
                                        <button type="button" class="order-time__item" data-time="14:00">2:00</button>
                                        <button type="button" class="order-time__item" data-time="14:30">2:30</button>
                                        <button type="button" class="order-time__item" data-time="15:00">3:00</button>
                                        <button type="button" class="order-time__item" data-time="15:30">3:30</button>
                                        <button type="button" class="order-time__item" data-time="16:00">4:00</button>
                                        <button type="button" class="order-time__item" data-time="16:30">4:30</button>
                                        <button type="button" class="order-time__item" data-time="17:00">5:00</button>
                                        <button type="button" class="order-time__item" data-time="17:30">5:30</button>
                                        <button type="button" class="order-time__item" data-time="18:00">6:00</button>
                                        <button type="button" class="order-time__item" data-time="18:30">6:30</button>
                                        <button type="button" class="order-time__item" data-time="19:00">7:00</button>
                                        <button type="button" class="order-time__item" data-time="19:30">7:30</button>
                                        <button type="button" class="order-time__item" data-time="20:00">8:00</button>
                                        <button type="button" class="order-time__item" data-time="20:30">8:30</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php include __DIR__ . '/../../include/components/order/order-summary.php'; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 모바일 바텀 시트 -->
<?php include __DIR__ . '/../../include/components/order/order-summary-sheet.php'; ?>

<!-- 취소 모달 -->
<?php include __DIR__ . '/../../include/components/modal/order-cancel-modal.php'; ?>

<?php include __DIR__ . '/../../include/components/layout/footer.php'; ?>

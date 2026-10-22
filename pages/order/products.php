<?php include __DIR__ . '/../../include/components/layout/head.php'; ?>
<?php include __DIR__ . '/../../include/components/layout/sub-header.php'; ?>
<link rel="stylesheet" href="/assets/css/order.css">

<div id="contents">
    <div class="order-page order-page--products">
        <div class="container">

            <!-- 공통 타이틀 -->
            <?php include __DIR__ . '/../../include/components/order/order-header.php'; ?>

            <div class="order-layout flex">

                <!-- 상품 선택 영역 -->
                <div class="order-schedule order-products">

                    <!-- 상품 대분류 / 소분류 -->
                    <div class="order-products__category">
                        <!-- 대분류 -->
                        <div class="order-products__depth1">
                            <!-- [퍼블리싱 임시 데이터 / 프론트 연동 필요] -->
                            <ul class="order-products__depth1-list flex">
                                <li class="is-active"><button type="button" data-category-id="all">전체</button></li>
                                <li><button type="button" data-category-id="season">제철메뉴</button></li>
                                <li><button type="button" data-category-id="signature">대표메뉴</button></li>
                                <li><button type="button" data-category-id="single">단품회</button></li>
                                <li><button type="button" data-category-id="assorted">모둠회</button></li>
                                <li><button type="button" data-category-id="seafood">해물</button></li>
                            </ul>
                        </div>

                        <!-- 소분류 -->
                        <div class="order-products__depth2">
                            <!-- [퍼블리싱 임시 데이터 / 프론트 연동 필요] 대분류 선택에 따라 목록 갱신 -->
                            <ul class="order-products__depth2-list flex">
                                <li class="is-active"><button type="button" data-category-id="all">전체</button></li>
                                <li><button type="button" data-category-id="gizzard-shad">전어</button></li>
                                <li><button type="button" data-category-id="horse-mackerel">전갱이</button></li>
                                <li><button type="button" data-category-id="live-shrimp">활새우</button></li>
                                <li><button type="button" data-category-id="benchari">벤차리</button></li>
                                <li><button type="button" data-category-id="wrasse">놀래미</button></li>
                                <li><button type="button" data-category-id="squid">오징어</button></li>
                            </ul>
                        </div>
                    </div>

                    <!-- 기존 상품 리스트 컴포넌트 재사용 -->
                    <div class="order-products__list">
                        <?php
                        $productsListContext = 'order';
                        include __DIR__ . '/../../include/components/products/products-list.php';
                        unset($productsListContext, $products);
                        ?>
                    </div>

                </div>

                <!-- 공통 주문내역 -->
                <?php
                $paymentParams = [];

                if (($_GET['order_type'] ?? '') === 'quick') {
                    $paymentParams['order_type'] = 'quick';
                    $paymentParams['delivery_type'] = ($_GET['delivery_type'] ?? '') === 'scheduled' ? 'scheduled' : 'immediate';
                } else {
                    $paymentParams['order_type'] = 'pickup';
                    $paymentParams['pickup_type'] = ($_GET['pickup_type'] ?? '') === 'takeout' ? 'takeout' : 'dine-in';
                }

                $orderNextUrl = '/pages/order/payment.php?' . http_build_query($paymentParams);
                $orderNextRequiresProduct = true;
                include __DIR__ . '/../../include/components/order/order-summary.php';
                ?>

            </div>
        </div>
    </div>
</div>

<!-- 모바일 바텀 시트 -->
<?php include __DIR__ . '/../../include/components/order/order-summary-sheet.php'; ?>
<?php unset($orderNextUrl, $orderNextRequiresProduct, $paymentParams); ?>

<!-- 상품 상세 모달 -->
<?php include __DIR__ . '/../../include/components/modal/order-product-modal.php'; ?>
<?php include __DIR__ . '/../../include/components/modal/product-review-photo-modal.php'; ?>

<!-- 주문 취소 모달 -->
<?php include __DIR__ . '/../../include/components/modal/order-cancel-modal.php'; ?>

<?php include __DIR__ . '/../../include/components/layout/footer.php'; ?>

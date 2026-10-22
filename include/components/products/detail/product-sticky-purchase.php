<?php
/** 상품 상세 Sticky 구매 영역 */

/**
 * [프론트 연동 필요]
 * 실제 연동 시 상품 API 데이터에서 옵션 목록을 전달하면 됨.
 * 상품 기본정보는 기존 $productDetail을 사용.
 */

$stickyOptions = [
    'sizes' => [
        ['id' => 'small', 'name' => '소(2인)', 'weight' => '500g', 'price' => 85000],
        ['id' => 'medium', 'name' => '중(2~3인)', 'weight' => '700g', 'price' => 120000],
        ['id' => 'large', 'name' => '대(3~4인)', 'weight' => '900g', 'price' => 160000],
        ['id' => 'special', 'name' => '특(4~5인)', 'weight' => '1,100g', 'price' => 200000],
    ],
    'thickness' => [
        ['id' => 'normal', 'name' => '보통'],
        ['id' => 'thin', 'name' => '얇게'],
        ['id' => 'thick', 'name' => '두껍게'],
    ],
    'bones' => [
        ['id' => 'yes', 'name' => '있음'],
        ['id' => 'no', 'name' => '없음'],
    ],
    'extras' => [
        ['id' => 'vegetables', 'name' => '쌈야채', 'price' => 3000],
        ['id' => 'spicy-vegetables', 'name' => '매운탕 야채', 'price' => 2500],
        ['id' => 'soup', 'name' => '물회육수', 'price' => 3000],
    ],
];
?>


<div class="product-sticky-purchase product-detail-purchase flex-c" data-sticky-purchase data-product-id="<?= htmlspecialchars((string)$productDetail['id']) ?>" data-product-name="<?= htmlspecialchars($productDetail['name'], ENT_QUOTES) ?>">

    <div class="product-sticky-purchase__scroll">

    <!-- 기본 옵션 -->
    <div class="product-detail-purchase__default flex-c">

        <!-- 가격 옵션 -->
        <div class="product-sticky-purchase__group product-detail-purchase__group">
            <h3 class="product-sticky-purchase__title product-detail-purchase__label Body-XXS2 gray-8">가격</h3>

            <div class="product-sticky-purchase__sizes product-detail-purchase__options flex">
                <?php foreach ($stickyOptions['sizes'] as $index => $option): ?>
                    <button type="button" class="product-sticky-purchase__size product-detail-purchase__option <?= $index === 0 ? 'is-active is-selected' : '' ?>" data-sticky-size data-option-id="<?= htmlspecialchars($option['id']) ?>" data-option-name="<?= htmlspecialchars($option['name'] . ' [' . $option['weight'] . ']', ENT_QUOTES) ?>" data-option-price="<?= (int)$option['price'] ?>" aria-pressed="<?= $index === 0 ? 'true' : 'false' ?>">
                        <span><?= htmlspecialchars($option['name']) ?> [<?= htmlspecialchars($option['weight']) ?>]</span>
                        <strong><?= number_format($option['price']) ?>원</strong>
                    </button>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- 회두께 -->
        <div class="product-sticky-purchase__group product-detail-purchase__group">
            <h3 class="product-sticky-purchase__title product-detail-purchase__label Body-XXS2 gray-8">회두께</h3>

            <div class="product-sticky-purchase__choices product-detail-purchase__options flex" data-sticky-choice-group="thickness">
                <?php foreach ($stickyOptions['thickness'] as $index => $option): ?>
                    <button type="button" class="product-sticky-purchase__choice product-detail-purchase__option <?= $index === 0 ? 'is-active is-selected' : '' ?>" data-sticky-choice data-option-id="<?= htmlspecialchars($option['id']) ?>" aria-pressed="<?= $index === 0 ? 'true' : 'false' ?>"><?= htmlspecialchars($option['name']) ?></button>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- 매운탕뼈 -->
        <div class="product-sticky-purchase__group product-detail-purchase__group">
            <h3 class="product-sticky-purchase__title product-detail-purchase__label Body-XXS2 gray-8">매운탕뼈</h3>

            <div class="product-sticky-purchase__choices product-detail-purchase__options flex" data-sticky-choice-group="bones">
                <?php foreach ($stickyOptions['bones'] as $index => $option): ?>
                    <button type="button" class="product-sticky-purchase__choice product-detail-purchase__option <?= $index === 0 ? 'is-active is-selected' : '' ?>" data-sticky-choice data-option-id="<?= htmlspecialchars($option['id']) ?>" aria-pressed="<?= $index === 0 ? 'true' : 'false' ?>"><?= htmlspecialchars($option['name']) ?></button>
                <?php endforeach; ?>
            </div>
        </div>

    </div>

    <!-- 추가 옵션 -->
    <div class="product-sticky-purchase__extras product-detail-purchase__extras">
        <button
            type="button"
            class="product-sticky-purchase__extras-toggle product-detail-purchase__extras-title js-dropdown-trigger is-active flex-btw"
            data-dropdown-target="sticky-product-extras-list"
            data-sticky-extras-toggle
            aria-expanded="true"
        >
            추가 옵션
            <span class="product-sticky-purchase__arrow flex" aria-hidden="true">
                <img src="/assets/icons/prod-detail-add-option-arrow.svg" alt="">
            </span>
        </button>

        <div
            id="sticky-product-extras-list"
            class="product-sticky-purchase__extras-list is-open"
            data-sticky-extras-list
        >
            <?php foreach ($stickyOptions['extras'] as $option): ?>
                <button
                    type="button"
                    class="product-sticky-purchase__extra product-detail-purchase__extra flex"
                    data-sticky-extra
                    data-option-id="<?= htmlspecialchars($option['id']) ?>"
                    data-option-name="<?= htmlspecialchars($option['name'], ENT_QUOTES) ?>"
                    data-option-price="<?= (int)$option['price'] ?>"
                    aria-pressed="false"
                >
                    <span><?= htmlspecialchars($option['name']) ?></span>
                    <strong>+<?= number_format($option['price']) ?>원</strong>
                </button>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- 선택 상품 -->
    <div class="product-sticky-purchase__selected product-detail-purchase__selected" data-sticky-selected></div>

    </div>

    <!-- 결제금액 -->
    <div class="product-sticky-purchase__total product-detail-purchase__total flex-btw">
        <span class="Body-XS3 gray-7">결제금액</span>
        <strong class="Body-L2" data-sticky-total>0원</strong>
    </div>

    <!-- 구매 버튼 -->
    <div class="product-sticky-purchase__actions product-detail-purchase__actions flex">
        <a href="/pages/order/basket.php" class="product-sticky-purchase__cart btnNormal sizeL" data-sticky-cart>장바구니</a>
        <a href="/pages/order/payment.php" class="product-sticky-purchase__order btnSubmit sizeL" data-sticky-order>주문하기</a>
    </div>

</div>

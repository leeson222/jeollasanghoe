<?php
$basketItems = [
    ['id' => 1, 'name' => '돌돔 모둠회', 'price' => 85000, 'quantity' => 1, 'image' => '/assets/images/payment-prod-img.png', 'selected' => true, 'soldOut' => false],
    ['id' => 2, 'name' => '돌돔 모둠회', 'price' => 88000, 'quantity' => 1, 'image' => '/assets/images/payment-prod-img.png', 'selected' => false, 'soldOut' => false],
    ['id' => 3, 'name' => '돌돔 모둠회', 'price' => 85000, 'quantity' => 1, 'image' => '/assets/images/payment-prod-img.png', 'selected' => false, 'soldOut' => true],
];
?>
<?php include __DIR__ . '/../../include/components/layout/head.php'; ?>
<?php include __DIR__ . '/../../include/components/layout/sub-header.php'; ?>

<link rel="stylesheet" href="/assets/css/order.css">

<div id="contents">
    <main class="order-page basket-page" data-basket>
        <div class="container">
            <h1 class="basket-page__title Body-M2">장바구니</h1>

            <section class="basket-empty" data-basket-empty hidden>
                <p>장바구니에 담은 상품이 없습니다.</p>
                <a href="/pages/product/products.php" class="btnNormal sizeS">상품 보러가기</a>
            </section>

            <div class="basket-layout" data-basket-content>
                <section class="basket-products" aria-label="장바구니 상품">
                    <div class="basket-products__toolbar">
                        <label class="basket-check-all">
                            <input type="checkbox" data-basket-check-all>
                            <span>전체 선택</span>
                        </label>
                        <button type="button" class="basket-delete-selected" data-basket-delete-selected>선택 삭제</button>
                    </div>

                    <div class="basket-products__list" data-basket-list>
                        <?php foreach ($basketItems as $item): ?>
                            <article class="basket-item<?= $item['soldOut'] ? ' is-sold-out' : '' ?>" data-basket-item data-unit-price="<?= $item['price'] ?>" data-product-id="<?= $item['id'] ?>">
                                <label class="basket-item__check">
                                    <span class="sr-only"><?= htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8') ?> 선택</span>
                                    <input type="checkbox" data-basket-check<?= $item['selected'] ? ' checked' : '' ?><?= $item['soldOut'] ? ' disabled' : '' ?>>
                                </label>

                                <div class="basket-item__body">
                                    <div class="basket-item__summary">
                                        <a href="/pages/product/product-detail.php" class="basket-item__thumb">
                                            <img src="<?= htmlspecialchars($item['image'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8') ?>">
                                        </a>
                                        <div class="basket-item__info">
                                            <a href="/pages/product/product-detail.php" class="basket-item__name"><?= htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8') ?></a>
                                            <strong class="basket-item__price" data-basket-item-price><?= number_format($item['price']) ?>원</strong>
                                            <?php if ($item['soldOut']): ?>
                                                <span class="basket-item__sold-out">품절</span>
                                            <?php else: ?>
                                                <div class="basket-item__controls">
                                                    <div class="product-detail-purchase__quantity flex">
                                                        <button type="button" class="product-detail-purchase__quantity-minus" data-basket-minus aria-label="수량 감소"><img src="/assets/icons/quantity-minus.svg" alt="수량 감소"></button>
                                                        <span class="product-detail-purchase__quantity-value Body-XXS3" data-basket-quantity><?= $item['quantity'] ?></span>
                                                        <button type="button" class="product-detail-purchase__quantity-plus" data-basket-plus aria-label="수량 증가"><img src="/assets/icons/quantity-plus.svg" alt="수량 증가"></button>
                                                    </div>
                                                    <button type="button" class="btnNormal sizeXS" data-option-change-trigger data-modal-open="option-change-modal">옵션 변경</button>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <button type="button" class="basket-item__remove" data-basket-remove aria-label="<?= htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8') ?> 삭제"><img src="/assets/icons/basket-del-ico.svg" alt=""></button>

                                    <details class="basket-item__options" open>
                                        <summary>옵션 정보<img src="/assets/icons/myshop-index-option-arrow.svg" alt=""></summary>
                                        <div class="basket-item__options-content">
                                            <p>가격 : 소(2인) [500g] - 85,000원</p>
                                            <p>회두께 : 보통</p>
                                            <p>매운탕뼈 : 있음</p>
                                            <p>추가옵션 : 쌈야채 - 3,000원</p>
                                        </div>
                                    </details>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>

                </section>

                <aside class="basket-payment" aria-label="구매 금액">
                    <section class="basket-payment__box">
                        <h2>구매 금액</h2>
                        <section class="basket-payment__body" aria-labelledby="basket-payment-title">
                            <h3 id="basket-payment-title">결제금액</h3>
                            <dl>
                                <dt>상품금액</dt><dd data-basket-subtotal>0원</dd>
                                <dt>배송비</dt><dd data-basket-delivery>0원</dd>
                            </dl>
                            <dl class="basket-payment__total">
                                <dt>총 결제금액</dt>
                                <dd><strong data-basket-total>0원</strong></dd>
                            </dl>
                            <a href="/pages/order/payment.php" class="basket-payment__submit btnSubmit sizeL" data-basket-purchase><span data-basket-selected-count>0</span>개 상품 구매하기</a>
                        </section>
                    </section>
                    <p class="basket-payment__notice">쿠폰 및 할인권 적용 금액은 결제 페이지에서<br>확인 가능합니다</p>
                </aside>
            </div>
        </div>
    </main>
</div>


<?php include __DIR__ . '/../../include/components/modal/option-change-modal.php'; ?>
<?php include __DIR__ . '/../../include/components/layout/footer.php'; ?>

<?php
$deliveryAddresses = [
    ['id' => 1, 'recipient' => '김전라', 'address' => '서울시 영등포구 선유서로25길 28 디스테이트 909호', 'phone' => '010-1234-5678', 'is_default' => true, 'is_recent' => true],
    ['id' => 2, 'recipient' => '김상회', 'address' => '서울시 강남구 가로수길 5', 'phone' => '010-9876-5432', 'is_default' => false, 'is_recent' => false],
    ['id' => 3, 'recipient' => '김상회', 'address' => '서울시 강남구 가로수길 5', 'phone' => '010-9876-5432', 'is_default' => false, 'is_recent' => false],
    ['id' => 4, 'recipient' => '김상회', 'address' => '서울시 강남구 가로수길 5', 'phone' => '010-9876-5432', 'is_default' => false, 'is_recent' => false],
];
?>
<?php include __DIR__ . '/../../include/components/layout/head.php'; ?>
<?php include __DIR__ . '/../../include/components/layout/sub-header.php'; ?>

<div id="contents">
    <div class="container">
        <div class="myshop-layout">
            <?php include __DIR__ . '/../../include/components/myshop/myshop-menu.php'; ?>

            <main class="myshop-content">
                <section class="myshop-addresses" data-myshop-addresses>
                    <header class="myshop-page__head">
                        <h1 class="Body-M2">배송지 관리</h1>
                        <button type="button" class="btnNormal sizeM" data-address-add data-modal-open="delivery-address-modal">배송지 추가</button>
                    </header>

                    <div class="myshop-address-list" data-address-list>
                        <?php foreach ($deliveryAddresses as $address): ?>
                            <article class="myshop-address-card" data-address-item data-address-id="<?= $address['id'] ?>"<?= $address['is_default'] ? ' data-default-address="true"' : '' ?>>
                                <div class="myshop-address-card__head">
                                    <strong class="Body-XXS2" data-address-recipient><?= htmlspecialchars($address['recipient']) ?></strong>
                                    <div class="myshop-address-card__badges">
                                        <?php if ($address['is_default']): ?>
                                            <span class="myshop-address-card__badge" data-address-default>기본 배송지</span>
                                        <?php endif; ?>
                                        <?php if ($address['is_recent']): ?>
                                            <span class="myshop-address-card__badge" data-address-recent>최근 사용</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="myshop-address-card__info Body-XXXS2 gray-black">
                                    <p data-address-value><?= htmlspecialchars($address['address']) ?></p>
                                    <p data-address-phone><?= htmlspecialchars($address['phone']) ?></p>
                                </div>
                                <div class="myshop-address-card__actions">
                                    <button type="button" class="btnNormal sizeXS" data-address-edit="<?= $address['id'] ?>" data-modal-open="delivery-address-modal">수정</button>
                                    <?php if (!$address['is_default']): ?>
                                        <button type="button" class="btnNormal sizeXS" data-address-delete="<?= $address['id'] ?>">삭제</button>
                                    <?php endif; ?>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </section>
            </main>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../../include/components/modal/delivery-address-modal.php'; ?>
<?php include __DIR__ . '/../../include/components/layout/footer.php'; ?>

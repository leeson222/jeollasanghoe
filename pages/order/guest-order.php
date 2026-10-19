<?php include __DIR__ . '/../../include/components/layout/head.php'; ?>
<?php include __DIR__ . '/../../include/components/layout/sub-header.php'; ?>

<link rel="stylesheet" href="/assets/css/order.css">

<div id="contents">
    <div class="guest-order-lookup">
        <div class="title-center flex-c-c mb-40">
            <h2 class="Body-M2">비회원 주문조회</h2>
        </div>

        <form class="guest-order-lookup__form" action="" method="post" data-guest-order-lookup>
            <div class="guest-order-lookup__field">
                <label for="guest-order-number">주문번호</label>
                <input type="text" id="guest-order-number" name="order_number" autocomplete="off" required>
            </div>

            <div class="guest-order-lookup__field">
                <label for="guest-order-name">주문자명</label>
                <input type="text" id="guest-order-name" name="orderer_name" autocomplete="name" required>
            </div>

            <div class="guest-order-lookup__field">
                <label for="guest-order-phone">휴대폰 번호</label>
                <input type="tel" id="guest-order-phone" name="phone" inputmode="numeric" autocomplete="tel" required>
            </div>

            <div class="guest-order-lookup__field">
                <label for="guest-order-password">비회원 주문 비밀번호</label>
                <input type="password" id="guest-order-password" name="order_password" inputmode="numeric" maxlength="4" autocomplete="off" required>
            </div>

            <div class="guest-order-lookup__notice Body-XXXS3 gray-5">
                <p>비회원 주문 진행 시 입력한 비밀번호 4자리를 입력하세요.</p>
                <p>비밀번호를 잊어버린 경우 고객센터로 연락해 주세요.</p>
            </div>

            <button type="submit" class="guest-order-lookup__submit btnSubmit sizeL">주문조회</button>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../../include/components/layout/footer.php'; ?>

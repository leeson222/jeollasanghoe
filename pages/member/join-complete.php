
<?php include __DIR__ . '/../../include/components/layout/head.php'; ?>
<?php include __DIR__ . '/../../include/components/layout/sub-header.php'; ?>

<link rel="stylesheet" href="/assets/css/member.css">

<div id="contents">
    <div class="member-area join-area">
        <div class="title-center flex-c-c mb-40">
            <h2 class="Body-M2">가입완료</h2>
        </div>
        <div class="join-complete">
            <div class="join-complete__inner">
                <div class="join-complete__message flex-c mb-40">
                    <h2 class="join-complete__title Body-M3">
                        <span data-field="user-name">김전라</span>님, 회원가입이 완료되었습니다.
                    </h2>
                    <p class="join-complete__desc Body-XXS3 gray-6">로그인 후 서비스를 이용하세요</p>
                </div>

                <div class="join-complete__buttons flex">
                    <a href="/pages/member/login.php" class="btnSubmit sizeL">로그인</a>
                    <a href="/" class="btnNormal sizeL">메인으로</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../../include/components/layout/footer.php'; ?>

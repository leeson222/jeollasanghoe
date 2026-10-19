
<?php include __DIR__ . '/../../include/components/layout/head.php'; ?>
<?php include __DIR__ . '/../../include/components/layout/sub-header.php'; ?>

<link rel="stylesheet" href="/assets/css/member.css">

<div id="contents">
    <div class="member-area find-area">
        <div class="title-center flex-c-c mb-40">
            <h2 class="Body-M2">비밀번호 찾기 결과</h2>
        </div>
        <div class="member-find-result">
            <div class="member-find-result__message mb-40">
                <p class="member-find-result__text Body-S3">
                    회원님의 임시비밀번호는 <strong class="member-find-result__id red" data-field="masked-id">37D5CEF2</strong> 입니다
                </p>
            </div>

            <div class="member-find-result__buttons flex">
                <a href="/pages/member/login.php" class="btnSubmit sizeL">로그인</a>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../../include/components/layout/footer.php'; ?>

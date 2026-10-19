
<?php include __DIR__ . '/../../include/components/layout/head.php'; ?>
<?php include __DIR__ . '/../../include/components/layout/sub-header.php'; ?>

<link rel="stylesheet" href="/assets/css/member.css">

<div id="contents">
    <div class="member-area find-area">
        <div class="title-center flex-c-c mb-40">
            <h2 class="Body-M2">아이디 찾기/비밀번호 찾기</h2>
        </div>
        <div class="member-find">
            <!-- 탭 -->
            <div class="member-find__tabs flex" role="tablist" aria-label="계정 찾기">
                <a href="/pages/member/find-id.php" class="member-find__tab is-active" role="tab" aria-selected="true">아이디 찾기</a>
                <a href="/pages/member/find-pw.php" class="member-find__tab" role="tab" aria-selected="false">비밀번호 찾기</a>
            </div>

            <!-- 아이디 찾기 -->
            <div class="member-find__content">
                <form id="find-id-form" class="member-find__form" action="" method="post" data-form="find-id">
                    <div class="member-find__field" data-field="user-name">
                        <label for="find-id-name">이름</label>
                        <input type="text" id="find-id-name" name="user_name" placeholder="이름을 입력해 주세요" autocomplete="name" required>
                    </div>

                    <div class="member-find__field" data-field="phone">
                        <label for="find-id-phone">휴대폰</label>
                        <input type="tel" id="find-id-phone" name="phone" placeholder="휴대폰 번호를 입력해 주세요" autocomplete="tel" inputmode="numeric" required>
                    </div>

                    <p class="member-find__message" data-message="find-id" aria-live="polite"></p>

                    <div class="member-find__submit">
                        <a href="/pages/member/find-id-result.php" type="submit" class="btnSubmit sizeL" data-action="find-id">아이디 찾기</a>
                    </div>
                </form>
            </div>

            <div class="member-find__bottom flex-c-c">
                <a class="Body-XXXS2 gray-5" href="/pages/member/login.php">로그인</a>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../../include/components/layout/footer.php'; ?>

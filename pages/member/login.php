
<?php include __DIR__ . '/../../include/components/layout/head.php'; ?>
<?php include __DIR__ . '/../../include/components/layout/sub-header.php'; ?>

<link rel="stylesheet" href="/assets/css/member.css">

<div id="contents">
    <div class="member-area login-area">
        <div class="title-center flex-c-c mb-40">
            <h2 class="Body-M2">로그인</h2>
        </div>
        <div class="login-page">
            <div class="login-inner">
                <form id="login-form" class="login-form" action="" method="post" data-form="login">
                    <div class="login-field flex-c" data-field="user-id">
                        <label class="Body-XXXS2 gray-black" for="login-id">아이디</label>
                        <input type="text" id="login-id" name="user_id" placeholder="아이디를 입력해 주세요" autocomplete="username" required>
                    </div>
                    <div class="login-field flex-c" data-field="password">
                        <label class="Body-XXXS2 gray-black" for="login-password">비밀번호</label>
                        <input type="password" id="login-password" name="password" placeholder="비밀번호를 입력해 주세요" autocomplete="current-password" required>
                    </div>

                    <p class="login-message" data-message="login" aria-live="polite"></p>

                    <div class="login-buttons flex-c ">
                        <button type="submit" class="btn-login btnSubmit sizeL" data-action="submit-login">로그인</button>
                        <a href="/pages/member/join.php" class="btn-join btnNormal sizeL">회원가입</a>
                    </div>

                    <div class="login-options flex-btw">
                        <label class="login-save flex">
                            <input type="checkbox" id="save-id" name="save_id" value="1">
                            <span class="Body-XXXS2">아이디 저장</span>
                        </label>

                        <div class="login-links flex">
                            <a href="/pages/member/find-id.php" class="Body-XXXS2 gray-5">아이디 찾기</a>
                            <a href="/pages/member/find-pw.php" class="Body-XXXS2 gray-5">비밀번호 찾기</a>
                            <a href="/pages/order/reservation.php" class="Body-XXXS2 gray-5">비회원 주문</a>
                        </div>
                    </div>
                </form>

                <div class="login-social flex-c">
                    <a href="#" class="login-social-btn login-kakao btnNormal sizeL" data-action="login-kakao">
                        <i class="login-social-icon"><img src="/assets/icons/login-kakao-ico.svg" alt="카카오 로그인"></i>
                        <span>카카오 로그인</span>
                    </a>
                    <a href="#" class="login-social-btn login-naver btnNormal sizeL" data-action="login-naver">
                        <i class="login-social-icon"><img src="/assets/icons/login-naver-ico.svg" alt="네이버 로그인"></i>
                        <span>네이버 로그인</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../../include/components/layout/footer.php'; ?>

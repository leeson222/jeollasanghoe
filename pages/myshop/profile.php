<?php include __DIR__ . '/../../include/components/layout/head.php'; ?>
<?php include __DIR__ . '/../../include/components/layout/sub-header.php'; ?>

<div id="contents">
    <div class="container">
        <div class="myshop-layout">
            <?php include __DIR__ . '/../../include/components/myshop/myshop-menu.php'; ?>
            <main class="myshop-content">
                <section class="myshop-profile" data-profile-page>
                    <h1 class="myshop-profile__title Body-M2">내 정보 수정</h1>
                    <form class="myshop-profile-check" action="" method="post" data-profile-password-form>
                        <p>정보를 안전하게 보호하기 위해 비밀번호를 다시 한 번 입력해 주세요</p>
                        <div class="myshop-profile__field">
                            <label for="profile-current-password">비밀번호</label>
                            <input type="password" id="profile-current-password" name="current_password" placeholder="비밀번호를 입력해 주세요" autocomplete="current-password" required>
                            <p class="hint error" data-profile-password-error aria-live="polite" hidden>비밀번호를 입력해 주세요.</p>
                        </div>
                        <button type="submit" class="btnSubmit sizeM">확인</button>
                    </form>
                    <form class="myshop-profile-form" action="" method="post" data-myshop-profile data-password-validation data-password-optional hidden>
                        <div class="myshop-profile__field"><label for="profile-name">이름 <em aria-hidden="true"></em></label><input type="text" id="profile-name" name="name" value="김전라" disabled></div>
                        <div class="myshop-profile__field"><label for="profile-id">아이디 <em aria-hidden="true"></em></label><input type="text" id="profile-id" name="user_id" value="disabled" disabled></div>
                        <div class="myshop-profile__field"><label for="profile-password">새 비밀번호 <em aria-hidden="true"></em></label><input type="password" id="profile-password" name="password" placeholder="새 비밀번호를 입력해 주세요" minlength="8" maxlength="12" autocomplete="new-password" data-password-input aria-describedby="profile-password-hint profile-password-error"><p class="hint" id="profile-password-hint" data-password-hint>영문, 숫자를 포함한 8자~12자</p><p class="hint error" id="profile-password-error" data-password-error aria-live="polite" hidden>비밀번호는 영문, 숫자를 포함한 8~12자로 입력해 주세요.</p></div>
                        <div class="myshop-profile__field"><label for="profile-password-confirm">새 비밀번호 확인 <em aria-hidden="true"></em></label><input type="password" id="profile-password-confirm" name="password_confirm" placeholder="새 비밀번호를 다시 한 번 입력해 주세요" autocomplete="new-password" data-password-confirm aria-describedby="profile-password-confirm-error profile-password-confirm-success"><p class="hint error" id="profile-password-confirm-error" data-password-confirm-error aria-live="polite" hidden>비밀번호가 일치하지 않습니다.</p><p class="hint success" id="profile-password-confirm-success" data-password-confirm-success aria-live="polite" hidden>비밀번호가 일치합니다.</p></div>
                        <div class="myshop-profile__field">
                            <label>생년월일</label>
                            <div class="myshop-profile__birth"><input type="text" name="birth_year" value="2000" aria-label="출생 연도" disabled><input type="text" name="birth_month" value="01" aria-label="출생 월" disabled><input type="text" name="birth_day" value="12" aria-label="출생 일" disabled></div>
                        </div>
                        <div class="myshop-profile__field">
                            <label for="profile-email-id">이메일 <em aria-hidden="true"></em></label>
                            <div class="myshop-profile__email"><input type="text" id="profile-email-id" name="email_id" value="abc1234" aria-label="이메일 아이디"><span>@</span><input type="text" name="email_domain" value="gmail.com" aria-label="이메일 도메인"><button type="button" class="btnNormal sizeL">중복확인</button></div>
                        </div>
                        <fieldset class="myshop-profile__agreements">
                            <legend>수신동의(선택)</legend>
                            <label><input type="checkbox" name="agree_sms" value="1"><span>SMS 수신 동의</span></label>
                            <label><input type="checkbox" name="agree_email" value="1"><span>이메일 수신 동의</span></label>
                        </fieldset>
                        <div class="myshop-profile__actions"><button type="button" class="btnNormal sizeL" data-profile-edit-cancel>취소</button><button type="submit" class="btnSubmit sizeL">수정</button></div>
                        <button type="button" class="myshop-profile__withdraw" data-modal-open="withdraw-modal" aria-haspopup="dialog" aria-controls="withdraw-modal">회원탈퇴</button>
                    </form>
                </section>
            </main>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../../include/components/modal/withdraw-modal.php'; ?>
<?php include __DIR__ . '/../../include/components/layout/footer.php'; ?>


<?php include __DIR__ . '/../../include/components/layout/head.php'; ?>
<?php include __DIR__ . '/../../include/components/layout/sub-header.php'; ?>

<link rel="stylesheet" href="/assets/css/member.css">

<div id="contents">
    <div class="member-area find-area">
        <div class="title-center flex-c-c mb-40">
            <h2 class="Body-M2">비밀번호 변경</h2>
        </div>
        <div class="member-password">
            <form id="change-password-form" class="member-password__form" action="" method="post" data-form="change-password" data-password-validation novalidate>

                <!-- 현재 비밀번호 -->
                <div class="member-password__field" data-field="current-password">
                    <label for="current-password">현재 비밀번호</label>
                    <input type="password" id="current-password" name="current_password" placeholder="비밀번호를 입력해 주세요" autocomplete="current-password" required>
                    <p class="member-password__message" data-message="current-password" aria-live="polite"></p>
                </div>

                <!--
                 * [임시 구현 / 프론트 연동 시 확인 필요]
                 * 비밀번호 입력값에 따른 안내(Hint), 오류(Error), 성공(Success) 메시지 노출 제어
                 *
                 * 현재 퍼블리싱 단계에서 UI 동작 확인을 위해 /assets/js/member.js에 임시 구현한 코드입니다.
                 * 추후 프론트 개발 시 실제 유효성 검사 및 API 연동 로직에 맞춰 수정 또는 대체해 주세요.
                -->

                <!-- 새 비밀번호 -->
                <div class="member-password__field" data-field="new-password">
                    <label for="new-password">새 비밀번호</label>
                    <input type="password" id="new-password" name="new_password" placeholder="새 비밀번호를 입력해 주세요" autocomplete="new-password" data-password-input required>
                    <p class="member-password__message hint" data-message="new-password" data-password-hint>영문, 숫자를 포함한 8자~12자</p>
                    <p class="member-password__message hint error" data-message="new-password-error" data-password-error aria-live="polite" hidden>비밀번호는 영문, 숫자를 포함한 8~12자로 입력해 주세요.</p>
                </div>

                <!-- 새 비밀번호 확인 -->
                <div class="member-password__field" data-field="confirm-password">
                    <label for="confirm-password">새 비밀번호 확인</label>
                    <input type="password" id="confirm-password" name="new_password_confirm" placeholder="새 비밀번호를 한번 더 입력해 주세요" autocomplete="new-password" data-password-confirm required>
                    <p class="member-password__message hint error" data-message="confirm-password-error" data-password-confirm-error aria-live="polite" hidden>비밀번호가 일치하지 않습니다.</p>
                    <p class="member-password__message hint success" data-message="confirm-password-success" data-password-confirm-success aria-live="polite" hidden>비밀번호가 일치합니다.</p>
                </div>

                <div class="member-password__submit">
                    <button type="submit" class="btnSubmit sizeL" data-action="change-password">비밀번호 변경</button>
                </div>

                <p class="member-password__message" data-message="form" aria-live="polite"></p>
            </form>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../../include/components/layout/footer.php'; ?>

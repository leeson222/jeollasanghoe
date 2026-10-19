
<?php include __DIR__ . '/../../include/components/layout/head.php'; ?>
<?php include __DIR__ . '/../../include/components/layout/sub-header.php'; ?>

<link rel="stylesheet" href="/assets/css/member.css">

<div id="contents">
    <div class="member-area join-area">
        <div class="title-center flex-c-c mb-40">
            <h2 class="Body-M2">회원가입</h2>
        </div>
        <div class="join-page">
            <div class="join-inner">
                <form id="join-form" class="join-form" action="" method="post" data-form="join" data-password-validation novalidate>

                    <!-- 아이디 -->
                    <div class="join-field" data-field="user-id">
                        <label for="join-id">아이디 <em class="required">*</em></label>
                        <div class="join-field__row">
                            <input type="text" id="join-id" name="user_id" placeholder="아이디 입력" minlength="6" maxlength="15" autocomplete="username" aria-describedby="join-id-message" required>
                            <button type="button" class="btn-check btnNormal sizeL" data-action="check-id">중복확인</button>
                        </div>
                        <p class="join-field__hint hint" id="join-id-message" data-message="user-id" aria-live="polite">영문, 숫자를 포함한 6자~15자</p>
                    </div>

                    <!-- 비밀번호 -->
                    <div class="join-field" data-field="password">
                        <label for="join-password">비밀번호 <em class="required">*</em></label>
                        <input type="password" id="join-password" name="password" placeholder="비밀번호 입력" minlength="8" maxlength="12" autocomplete="new-password" aria-describedby="join-password-message join-password-error" data-password-input required>
                        <p class="join-field__hint hint" id="join-password-message" data-password-hint>영문, 숫자를 포함한 8자~12자</p>
                        <p class="join-field__message hint error" id="join-password-error" data-password-error aria-live="polite" hidden>비밀번호는 영문, 숫자를 포함한 8~12자로 입력해 주세요.</p>
                    </div>

                    <!-- 비밀번호 확인 -->
                    <div class="join-field" data-field="password-confirm">
                        <label for="join-password-confirm">비밀번호 확인 <em class="required">*</em></label>
                        <input type="password" id="join-password-confirm" name="password_confirm" placeholder="비밀번호 재입력" autocomplete="new-password" aria-describedby="join-password-confirm-error join-password-confirm-success" data-password-confirm required>
                        <p class="join-field__message hint error" id="join-password-confirm-error" data-password-confirm-error aria-live="polite" hidden>비밀번호가 일치하지 않습니다.</p>
                        <p class="join-field__message hint success" id="join-password-confirm-success" data-password-confirm-success aria-live="polite" hidden>비밀번호가 일치합니다.</p>
                    </div>

                    <!-- 이름 -->
                    <div class="join-field" data-field="user-name">
                        <label for="join-name">이름 <em class="required">*</em></label>
                        <input type="text" id="join-name" name="user_name" placeholder="이름" autocomplete="name" required>
                    </div>

                    <!-- 휴대폰 -->
                    <div class="join-field" data-field="phone">
                        <label for="join-phone">휴대폰 <em class="required">*</em></label>
                        <input type="tel" id="join-phone" name="phone" placeholder="- 없이 입력" inputmode="numeric" autocomplete="tel" required>
                    </div>

                    <!-- 이메일 -->
                    <div class="join-field" data-field="email">
                        <label for="join-email-id">이메일 <em class="required">*</em></label>
                        <div class="join-field__row join-email">
                            <input type="text" id="join-email-id" name="email_id" aria-label="이메일 아이디" required>
                            <span class="join-email__at">@</span>
                            <input type="text" id="join-email-domain" name="email_domain" aria-label="이메일 도메인" required>
                            <button type="button" class="btn-check btnNormal sizeL" data-action="check-email">중복확인</button>
                        </div>
                        <p class="join-field__message" data-message="email" aria-live="polite"></p>
                    </div>

                    <!-- 주소 -->
                    <div class="join-field" data-field="address">
                        <label for="join-postcode">주소</label>
                        <div class="join-field__col flex-c">
                            <div class="join-field__row">
                                <input type="text" id="join-postcode" name="postcode" placeholder="우편번호" readonly>
                                <button type="button" class="btn-address btnNormal sizeL" data-action="search-address">주소 검색</button>
                            </div>
                            <input type="text" id="join-address" name="address" placeholder="기본 주소" readonly>
                            <input type="text" id="join-address-detail" name="address_detail" placeholder="나머지 주소 (선택)">
                        </div>
                    </div>


                    <!-- 생년월일 -->
                    <div class="join-field" data-field="birth">
                        <label>생년월일</label>
                        <div class="join-birth flex">
                            <!-- 년 -->
                            <div class="custom-select" data-select="birth-year">
                                <button type="button" class="custom-select__trigger" aria-expanded="false" aria-controls="birth-year-options">
                                    <span class="custom-select__value">년</span>
                                    <i class="custom-select__arrow"><img src="/assets/icons/select-arrow-ico.svg" alt=""></i>
                                </button>
                                <ul id="birth-year-options" class="custom-select__options" hidden>
                                    <?php for ($year = (int)date('Y'); $year >= 1900; $year--): ?>
                                        <li><button type="button" data-value="<?= $year ?>"><?= $year ?></button></li>
                                    <?php endfor; ?>
                                </ul>
                                <input type="hidden" name="birth_year" value="">
                            </div>

                            <!-- 월 -->
                            <div class="custom-select" data-select="birth-month">
                                <button type="button" class="custom-select__trigger" aria-expanded="false" aria-controls="birth-month-options">
                                    <span class="custom-select__value">월</span>
                                    <i class="custom-select__arrow"><img src="/assets/icons/select-arrow-ico.svg" alt=""></i>
                                </button>
                                <ul id="birth-month-options" class="custom-select__options" hidden>
                                    <?php for ($month = 1; $month <= 12; $month++): ?>
                                        <li><button type="button" data-value="<?= $month ?>"><?= $month ?></button></li>
                                    <?php endfor; ?>
                                </ul>
                                <input type="hidden" name="birth_month" value="">
                            </div>

                            <!-- 일 -->
                            <div class="custom-select" data-select="birth-day">
                                <button type="button" class="custom-select__trigger" aria-expanded="false" aria-controls="birth-day-options">
                                    <span class="custom-select__value">일</span>
                                    <i class="custom-select__arrow"><img src="/assets/icons/select-arrow-ico.svg" alt=""></i>
                                </button>
                                <ul id="birth-day-options" class="custom-select__options" hidden>
                                    <?php for ($day = 1; $day <= 31; $day++): ?>
                                        <li><button type="button" data-value="<?= $day ?>"><?= $day ?></button></li>
                                    <?php endfor; ?>
                                </ul>
                                <input type="hidden" name="birth_day" value="">
                            </div>
                        </div>
                    </div>



                    <!-- 약관 동의 -->
                    <div class="join-agreement" data-field="agreement">
                        <h3 class="join-agreement__title">약관동의 <em class="required">*</em></h3>

                        <div class="join-agreement__all">
                            <label for="agree-all">
                                <input type="checkbox" id="agree-all" data-action="agree-all">
                                <span>모든 약관을 확인하고 전체 동의합니다.</span>
                            </label>
                        </div>

                        <div class="join-agreement__list">
                            <!-- 이용약관 -->
                            <div class="join-agreement__item">
                                <div class="join-agreement__head">
                                    <label for="agree-terms">
                                        <input type="checkbox" id="agree-terms" name="agree_terms" value="1" data-agree="required" required>
                                        <span>이용약관 동의 <em class="required-text">(필수)</em></span>
                                    </label>
                                    <button type="button" class="btn-agreement js-dropdown-trigger" data-dropdown-target="agreement-terms" aria-expanded="false" aria-controls="agreement-terms">내용보기</button>
                                </div>
                                <div id="agreement-terms" class="join-agreement__content js-dropdown-content" hidden>
                                    <div class="join-agreement__text">
                                        <strong>제1조 (목적)</strong>
                                        <p>본 약관은 전라상회가 제공하는 온라인 쇼핑몰 서비스의 이용 조건 및 절차, 회원과 회사의 권리와 의무를 규정하는 것을 목적으로 합니다.</p>

                                        <strong>제2조 (회원가입)</strong>
                                        <p>이용자는 회사가 정한 가입 양식에 따라 회원정보를 기입하고 본 약관에 동의함으로써 회원가입을 신청할 수 있습니다.</p>

                                        <strong>제3조 (서비스 이용)</strong>
                                        <p>회원은 상품 검색, 주문, 결제, 배송 조회 등 회사가 제공하는 서비스를 이용할 수 있습니다.</p>

                                        <strong>제4조 (회원의 의무)</strong>
                                        <p>회원은 정확한 정보를 제공해야 하며, 타인의 정보를 도용하거나 서비스를 부정한 목적으로 이용해서는 안 됩니다.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- 개인정보 수집 및 이용 -->
                            <div class="join-agreement__item">
                                <div class="join-agreement__head">
                                    <label for="agree-privacy">
                                        <input type="checkbox" id="agree-privacy" name="agree_privacy" value="1" data-agree="required" required>
                                        <span>개인정보 수집 및 이용 동의 <em class="required-text">(필수)</em></span>
                                    </label>
                                    <button type="button" class="btn-agreement js-dropdown-trigger" data-dropdown-target="agreement-privacy" aria-expanded="false" aria-controls="agreement-privacy">내용보기</button>
                                </div>
                                <div id="agreement-privacy" class="join-agreement__content js-dropdown-content" hidden>
                                    <div class="join-agreement__text">
                                        <strong>1. 수집하는 개인정보 항목</strong>
                                        <p>아이디, 비밀번호, 이름, 휴대폰 번호, 이메일 주소 및 회원이 선택적으로 입력한 정보</p>

                                        <strong>2. 개인정보 이용 목적</strong>
                                        <p>회원 식별, 회원 서비스 제공, 주문 및 배송 관련 안내, 고객 문의 처리</p>

                                        <strong>3. 개인정보 보유 및 이용 기간</strong>
                                        <p>회원 탈퇴 시까지 보유하며, 관계 법령에 따라 보존이 필요한 경우 해당 기간 동안 보관할 수 있습니다.</p>

                                        <strong>4. 동의 거부 권리</strong>
                                        <p>개인정보 수집 및 이용에 대한 동의를 거부할 수 있으나, 필수 정보에 동의하지 않을 경우 회원가입이 제한될 수 있습니다.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- 선택 동의 -->
                            <div class="join-agreement__item">
                                <label for="agree-sms">
                                    <input type="checkbox" id="agree-sms" name="agree_sms" value="1" data-agree="optional">
                                    <span>SMS 수신 동의 <em class="optional-text">(선택)</em></span>
                                </label>
                            </div>

                            <div class="join-agreement__item">
                                <label for="agree-email">
                                    <input type="checkbox" id="agree-email" name="agree_email" value="1" data-agree="optional">
                                    <span>이메일 수신 동의 <em class="optional-text">(선택)</em></span>
                                </label>
                            </div>
                        </div>

                        <p class="join-field__message" data-message="agreement" aria-live="polite"></p>
                    </div>


                    <div class="join-submit">
                        <a href="/pages/member/join-complete.php" class="btn-join-submit btnSubmit sizeL" data-action="submit-join">가입하기</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../../include/components/layout/footer.php'; ?>

<?php
/**
 * 사이트 공통 푸터
 * 사업자 정보와 고객센터 정보는 운영 데이터로 교체합니다.
 */
?>
<footer id="site-footer" class="footer">
    <div class="footer-top">
        <div class="container flex-btw">
            <nav class="footer-menu">
                <ul class="footer-menu__list flex">
                    <li class="footer-menu__item">
                        <a href="/pages/sub/brand-story.php" class="footer-menu__link Body-XXXS1 gray-7">회사소개</a>
                    </li>
                    <li class="footer-menu__item">
                        <a href="#terms-modal" class="footer-menu__link Body-XXXS1 gray-7" data-modal-open="terms-modal" aria-haspopup="dialog" aria-controls="terms-modal">이용약관</a>
                    </li>
                    <li class="footer-menu__item">
                        <a href="#privacy-modal" class="footer-menu__link Body-XXXS1 gray-7" data-modal-open="privacy-modal" aria-haspopup="dialog" aria-controls="privacy-modal">개인정보처리방침</a>
                    </li>
                    <li class="footer-menu__item">
                        <a href="/pages/sub/faq.php" class="footer-menu__link Body-XXXS1 gray-7">고객센터</a>
                    </li>
                </ul>
            </nav>

            <div class="footer-utils flex">
                <p class="footer-benefit Body-XXXS1 gray-6">회원혜택 안내</p>

                <div class="footer-sns flex">
                    <a href="/pages/myshop/inquiries.php?write=1" class="footer-sns__link Body-XXXS1 gray-6">문의하기</a>
                    <a href="#" class="footer-sns__link Body-XXXS1 gray-6">Instagram</a>
                    <a href="https://www.youtube.com/@%EC%83%9D%EC%84%A0%EC%9D%98%EB%AA%85%EC%88%98/videos" class="footer-sns__link Body-XXXS1 gray-6" target="_blank">Youtube</a>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container flex-c">
            <div class="footer-logo">
                <img src="/assets/icons/f-logo.svg" alt="전라상회">
            </div>

            <div class="footer-info">
                <div class="footer-info__inner">
                    <div class="footer-info__row flex">
                        <span>상호명 : 전라상회</span>
                        <span>대표이사 : 이명수</span>
                    </div>
                    <span>주소 : 서울 동작구 노들로 674 (노량진동, 노량진 수산물 도매시장)</span>
                    <span>사업자등록번호 : 108-90-87961</span>
                    <span>통신판매업신고번호 : 제 2023-서울동작-0967호</span>
                    <span>개인정보관리자 : 이명수</span>
                </div>
            </div>


            <div class="footer-desc">
                <div class="footer-notice">
                    고객님은 안전거래를 위해 현금 등으로 결제 시 저희 쇼핑몰에서 가입한 구매안전서비스 소비자 피해보상보험 서비스를 이용하실 수 있습니다.
                </div>
                <div class="footer-copy">
                    Copyright © 전라상회. All rights reserved.
                </div>
            </div>
        </div>
    </div>
</footer>
<?php include __DIR__ . '/../modal/legal-modal.php'; ?>
</body>
</html>

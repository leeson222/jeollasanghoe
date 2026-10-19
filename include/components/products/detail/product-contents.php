<?php /** 공통 상세 탭 + 상품 상세 + 구매안내 + 리뷰 + 상품문의 */ ?>

<div class="product-detail-content" data-detail-content>

    <div class="product-detail-content__tabs-wrap">
        <nav class="product-detail-content__tabs container flex" aria-label="상품 상세 메뉴">
            <button type="button" class="is-active" data-detail-tab="description" aria-current="true">상품 상세</button>
            <button type="button" data-detail-tab="guide">구매안내</button>
            <button type="button" data-detail-tab="reviews">리뷰 <?= (int)$productDetail['review_count'] ?></button>
            <button type="button" data-detail-tab="qna">상품문의 <?= (int)$productDetail['qna_count'] ?></button>
        </nav>
    </div>

    <div class="container product-detail-content__container">
        <div class="product-detail-content__layout">

            <!-- 왼쪽 : 상품 상세 콘텐츠 -->
            <div class="product-detail-content__main flex-c">

                <!-- 상품 상세 -->
                <section class="product-detail-content__description" data-detail-section="description">
                    <div class="product-detail-content__image is-collapsed" data-detail-image>
                        <!-- [프론트 연동 필요] 상세 HTML/이미지 데이터가 들어갈 영역 -->
                        <div class="product-detail-content__placeholder" aria-label="상품 상세 이미지 임시 영역"></div>
                    </div>

                    <div class="prod-detail-content-btn-wrap">
                        <button type="button" class="product-detail-content__more btnNormal" data-detail-more aria-expanded="false">상품정보 더보기 <span aria-hidden="true"><img src="/assets/icons/prod-detail-more-arrow.svg" alt=""></span></button>
                    </div>
                </section>

                <div class="product-detail-content__sections-buy flex-c">
                    <!-- 구매안내 -->
                    <section class="product-detail-content__guide" data-detail-section="guide">
                        <h3 class="product-detail-section__title">구매안내</h3>
                        <div class="product-detail-content__guide-txt">
                            <p><?= htmlspecialchars($productDetail['guide']) ?></p>
                        </div>
                    </section>

                    <!-- 리뷰 -->
                    <div class="product-detail-content__reviews" data-detail-section="reviews">
                        <?php include __DIR__ . '/product-reviews.php'; ?>
                    </div>
                </div>

                <div class="product-detail-content__sections-qna">
                    <!-- 상품문의 -->
                    <div class="product-detail-content__qna" data-detail-section="qna">
                        <?php include __DIR__ . '/product-qna.php'; ?>
                    </div>
                </div>

            </div>

            <!-- 오른쪽 : Sticky 구매 영역 (일반 상세에서만 출력) -->
            <?php if ($productDetailMode === 'page'): ?>
                <aside class="product-detail-content__sticky">
                    <?php include __DIR__ . '/product-sticky-purchase.php'; ?>
                </aside>
            <?php endif; ?>

        </div>
    </div>

</div>
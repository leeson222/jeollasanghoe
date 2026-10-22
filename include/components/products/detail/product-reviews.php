<?php /** 공통 리뷰: 통계/포토/목록/정렬/페이지네이션 */ ?>
<section class="product-detail-reviews" data-detail-section="reviews">
    <div class="product-detail-section__head flex-btw">
        <h3 class="product-detail-section__title">
            리뷰 <span><?= (int)$productDetail['review_count'] ?></span>
        </h3>
        <button type="button" data-review-write>리뷰 남기기</button>
    </div>
    <div class="product-detail-reviews__summary">
        <div class="product-detail-reviews__average">
            <strong><?= htmlspecialchars($productDetail['review_average']) ?></strong>

            <span class="product-detail-reviews__stars">
                <?php
                // 평균 평점 반올림 (0.5 이상 올림, 미만 내림)
                $rating = (float)$productDetail['review_average'];
                $filledStars = max(0, min(5, (int)round($rating)));

                for ($i = 1; $i <= 5; $i++):
                    $starIcon = $i <= $filledStars
                        ? 'prod-detail-star-color.svg'
                        : 'prod-detail-star-gray.svg';
                ?>
                    <img
                        src="/assets/icons/<?= $starIcon ?>"
                        alt=""
                        aria-hidden="true"
                    >
                <?php endfor; ?>
            </span>
        </div>

        <div class="product-detail-reviews__bars">
            <?php foreach ($productDetail['review_bars'] as $star => $count): ?>
                <div class="product-detail-reviews__bar">
                    <span class="product-detail-reviews__bar-count"><?= (int)$count ?></span>
                    <div class="product-detail-reviews__track">
                        <i style="width:<?= $productDetail['review_count'] ? round($count / $productDetail['review_count'] * 100) : 0 ?>%"></i>
                    </div>
                    <span class="product-detail-reviews__bar-num"><?= (int)$star ?>점</span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="product-detail-reviews__photos">
        <h4>포토 리뷰 <span><?= (int)($productDetail['photo_review_count'] ?? $productDetail['review_count']) ?></span></h4>
        <div class="product-detail-reviews__photo-list">
            <?php for ($i=0;$i<6;$i++): ?><button type="button" data-review-photo="<?= $i ?>" <?= $i === 5 ? 'data-modal-open="photo-review-list-modal"' : 'data-review-photo-open' ?>><img src="/assets/images/prod-img01.png" alt="리뷰 이미지 <?= $i+1 ?>"><?php if ($i===5): ?><span>전체보기</span><?php endif; ?></button><?php endfor; ?>
        </div>
    </div>

    <!-- 전체 리뷰 -->
    <div class="product-detail-reviews__list-head flex-btw">
        <h4>
            전체 리뷰
            <span><?= (int)$productDetail['review_count'] ?></span>
        </h4>

        <div class="custom-select is-selected product-detail-reviews__sort" data-review-sort>
            <button
                type="button"
                class="custom-select__trigger"
                aria-label="리뷰 정렬"
                aria-haspopup="listbox"
                aria-expanded="false"
            >
                <span>추천순</span>
                <img src="/assets/icons/select-arrow-ico.svg" alt="">
            </button>

            <ul class="custom-select__options" role="listbox" hidden>
                <li role="presentation">
                    <button type="button" role="option" data-value="recommended" aria-selected="true">추천순</button>
                </li>
                <li role="presentation">
                    <button type="button" role="option" data-value="latest" aria-selected="false">최신순</button>
                </li>
                <li role="presentation">
                    <button type="button" role="option" data-value="rating" aria-selected="false">평점 높은순</button>
                </li>
            </ul>
        </div>
    </div>

    <div class="product-detail-reviews__list" data-review-list>
        <?php foreach ($productReviews as $review): ?>
            <?php
            $reviewRating = max(0, min(5, (int)round((float)($review['rating'] ?? 0))));
            $reviewImages = $review['images'] ?? [];
            ?>

            <article
                class="product-detail-reviews__item"
                data-review-id="<?= (int)$review['id'] ?>"
            >

                <!-- 별점 / 작성자 / 작성일 -->
                <div class="product-detail-reviews__meta flex">

                    <span
                        class="product-detail-reviews__stars flex"
                        aria-label="별점 <?= $reviewRating ?>점"
                    >
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <img
                                src="/assets/icons/<?= $i <= $reviewRating ? 'prod-detail-all-review-star-color.svg' : 'prod-detail-all-review-star-gray.svg' ?>"
                                alt=""
                                aria-hidden="true"
                            >
                        <?php endfor; ?>
                    </span>

                    <span class="product-detail-reviews__author">
                        <?= htmlspecialchars($review['author']) ?>
                    </span>

                    <span class="product-detail-reviews__meta-dot" aria-hidden="true">·</span>

                    <time
                        class="product-detail-reviews__date"
                        datetime="<?= htmlspecialchars($review['date']) ?>"
                    >
                        <?= htmlspecialchars($review['date']) ?>
                    </time>

                </div>

                <!-- 구매 옵션 -->
                <p class="product-detail-reviews__option">
                    <?= htmlspecialchars($review['option']) ?>
                </p>

                <!-- 리뷰 이미지 -->
                <?php if (!empty($reviewImages)): ?>
                    <div class="product-detail-reviews__item-photos flex">
                        <?php foreach ($reviewImages as $image): ?>
                            <button
                                type="button"
                                class="product-detail-reviews__photo"
                                data-review-photo-open
                            >
                                <img
                                    src="<?= htmlspecialchars($image) ?>"
                                    alt="구매자 리뷰 사진"
                                    loading="lazy"
                                >
                            </button>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <!-- 리뷰 내용 -->
                <p class="product-detail-reviews__text">
                    <?= nl2br(htmlspecialchars($review['text'])) ?>
                </p>

            </article>
        <?php endforeach; ?>
    </div>

    <!-- [프론트 연동 필요] 실제 페이지 데이터 조회 -->
    <nav class="product-detail-pagination custom-pagination" aria-label="리뷰 페이지" data-pagination="reviews">
        <button type="button" class="custom-pagination__prev" data-page-prev disabled aria-label="이전 페이지"><img src="/assets/icons/pagenation-left.svg" alt="이전페이지"></button>
        <?php for ($i = 1; $i <= 5; $i++): ?>
            <button type="button" class="custom-pagination__number <?= $i === 1 ? 'is-active' : '' ?>" data-page="<?= $i ?>" <?= $i === 1 ? 'aria-current="page"' : '' ?>><?= $i ?></button>
        <?php endfor; ?>
        <button type="button" class="custom-pagination__next" data-page-next aria-label="다음 페이지"><img src="/assets/icons/pagenation-right.svg" alt="다음페이지"></button>
    </nav>

</section>

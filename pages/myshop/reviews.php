<?php
$writableReviews = [
    ['id' => 1, 'product_name' => '줄무늬전갱이회', 'product_image' => '/assets/images/payment-prod-img.png', 'deadline' => '리뷰 마감 1일'],
];

$writtenReviews = [
    ['id' => 1, 'rating' => 5, 'text' => '맛있어요! 양 실하고 좋아요', 'date' => '2026.05.13', 'images' => [], 'reply' => ''],
    ['id' => 2, 'rating' => 5, 'text' => '맛있어요! 양 실하고 좋아요', 'date' => '2026.05.13', 'images' => array_fill(0, 5, '/assets/images/prod-img01.png'), 'reply' => ''],
    ['id' => 3, 'rating' => 4, 'text' => '맛있어요! 양 실하고 좋아요', 'date' => '2026.05.13', 'images' => array_fill(0, 5, '/assets/images/prod-img01.png'), 'reply' => '저희 제품을 믿고 구매해주셔서 감사드립니다.'],
    ['id' => 4, 'rating' => 5, 'text' => '맛있어요! 양 실하고 좋아요', 'date' => '2026.05.13', 'images' => array_fill(0, 5, '/assets/images/prod-img01.png'), 'reply' => '저희 제품을 믿고 구매해주셔서 감사드립니다.'],
];
?>
<?php include __DIR__ . '/../../include/components/layout/head.php'; ?>
<?php include __DIR__ . '/../../include/components/layout/sub-header.php'; ?>

<div id="contents">
    <div class="container">
        <div class="myshop-layout">
            <?php include __DIR__ . '/../../include/components/myshop/myshop-menu.php'; ?>

            <main class="myshop-content">
                <section class="myshop-reviews" data-myshop-reviews>
                    <h1 class="myshop-page__title Body-M2">리뷰 관리</h1>

                    <div class="myshop-review-tabs" role="tablist" aria-label="리뷰 관리 메뉴">
                        <button type="button" class="is-active" role="tab" aria-selected="true" aria-controls="writable-review-panel" data-review-tab="writable">작성 가능한 리뷰 <span data-writable-review-count><?= count($writableReviews) ?></span></button>
                        <button type="button" role="tab" aria-selected="false" aria-controls="written-review-panel" data-review-tab="written">작성한 리뷰 <span data-written-review-count><?= count($writtenReviews) ?></span></button>
                    </div>

                    <div id="writable-review-panel" class="myshop-review-panel" role="tabpanel" data-review-panel="writable">
                        <div class="myshop-review-list" data-writable-review-list>
                            <?php foreach ($writableReviews as $review): ?>
                                <article class="myshop-review-card myshop-review-card--writable" data-writable-review data-review-id="<?= $review['id'] ?>">
                                    <div class="myshop-review-card__product">
                                        <a href="/pages/product/product-detail.php" class="myshop-review-card__product-image"><img src="<?= htmlspecialchars($review['product_image']) ?>" alt="<?= htmlspecialchars($review['product_name']) ?>"></a>
                                        <div class="myshop-review-card__product-info">
                                            <h2 class="Body-XXXS0"><a href="/pages/product/product-detail.php" data-product-name><?= htmlspecialchars($review['product_name']) ?></a></h2>
                                            <p class="Caption-S3 gray-6" data-review-deadline><?= htmlspecialchars($review['deadline']) ?></p>
                                        </div>
                                    </div>
                                    <div class="myshop-review-card--writable-btn-wrap">
                                    <button type="button" class="btnSubmit sizeM" data-review-write data-modal-open="review-write-modal">리뷰 작성하고 최대 1500P 받기</button>
                                    </div>
                                </article>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div id="written-review-panel" class="myshop-review-panel displaynone" role="tabpanel" data-review-panel="written">
                        <div class="myshop-review-list" data-written-review-list>
                            <?php foreach ($writtenReviews as $review): ?>
                                <article class="myshop-review-card myshop-review-card--written" data-written-review data-review-id="<?= $review['id'] ?>">
                                    <header class="myshop-review-card__header">
                                        <div class="myshop-review-card__product">
                                            <a href="/pages/product/product-detail.php" class="myshop-review-card__product-image"><img src="/assets/images/payment-prod-img.png" alt="줄무늬전갱이회"></a>
                                            <h2 class="Body-XXXS0"><a href="/pages/product/product-detail.php" data-product-name>줄무늬전갱이회</a></h2>
                                        </div>
                                        <div class="myshop-review-card__control">
                                            <div class="myshop-review-card__control-menu displaynone" data-review-control-menu>
                                                <button type="button" data-review-edit data-modal-open="review-write-modal">수정</button>
                                                <button type="button" data-review-delete>삭제</button>
                                            </div>
                                            <button type="button" class="myshop-review-card__control-button" aria-label="리뷰 관리 메뉴" aria-expanded="false" data-review-control><img src="/assets/icons/myshop-review-control.svg" alt=""></button>
                                        </div>
                                    </header>

                                    <div class="myshop-review-card__body">
                                        <div class="myshop-review-card__stars" aria-label="별점 <?= $review['rating'] ?>점" data-review-rating="<?= $review['rating'] ?>">
                                            <?php for ($star = 1; $star <= 5; $star++): ?>
                                                <img src="/assets/icons/<?= $star <= $review['rating'] ? 'prod-detail-all-review-star-color.svg' : 'prod-detail-all-review-star-gray.svg' ?>" alt="" aria-hidden="true">
                                            <?php endfor; ?>
                                        </div>
                                        <p class="Body-XXXS3 gray-8" data-review-text><?= htmlspecialchars($review['text']) ?></p>
                                        <time class="Caption-S2 gray-5" datetime="<?= str_replace('.', '-', htmlspecialchars($review['date'])) ?>" data-review-date><?= htmlspecialchars($review['date']) ?></time>

                                        <?php if ($review['images']): ?>
                                            <div class="myshop-review-card__photos" data-review-images>
                                                <?php foreach ($review['images'] as $imageIndex => $image): ?>
                                                    <button type="button" data-review-image="<?= $imageIndex + 1 ?>"><img src="<?= htmlspecialchars($image) ?>" alt="리뷰 사진 <?= $imageIndex + 1 ?>"></button>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ($review['reply'] !== ''): ?>
                                            <div class="myshop-review-card__reply" data-review-reply>
                                                <div class="myshop-review-card__reply-content">
                                                    <i aria-hidden="true">
                                                        <img src="/assets/icons/myshop-review-comment.svg" alt="">
                                                    </i>
                                                    <div class="myshop-review-card__reply-comment-wrap">
                                                        <span class="Body-XXXS3" data-review-reply-text><?= htmlspecialchars($review['reply']) ?></span>
                                                        <span class="Caption-S3 gray-6">전라상회</span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </article>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../../include/components/modal/review-write-modal.php'; ?>
<?php include __DIR__ . '/../../include/components/layout/footer.php'; ?>

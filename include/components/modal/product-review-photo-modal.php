<?php
$photoReviewItems = [];
foreach (($productReviews ?? []) as $review) {
    foreach (($review['images'] ?? []) as $image) {
        $photoReviewItems[] = [
            'image' => $image,
            'rating' => (int)($review['rating'] ?? 0),
            'author' => $review['author'] ?? '',
            'date' => $review['date'] ?? '',
            'text' => $review['text'] ?? '',
        ];
    }
}
if (!$photoReviewItems) {
    $photoReviewItems[] = ['image' => '/assets/images/prod-img01.png', 'rating' => 5, 'author' => '', 'date' => '', 'text' => ''];
}
?>

<div id="photo-review-list-modal" class="common-modal photo-review-list-modal" role="dialog" aria-modal="true" aria-labelledby="photo-review-list-title" hidden>
    <div class="dim" data-modal-close></div>
    <div class="common-modal__container photo-review-list-modal__container">
        <header class="photo-review-list-modal__header">
            <h2 id="photo-review-list-title">포토 리뷰 <span><?= (int)($productDetail['photo_review_count'] ?? count($photoReviewItems)) ?></span></h2>
            <button type="button" class="common-modal__close" data-modal-close aria-label="닫기"><img src="/assets/icons/close.svg" alt=""></button>
        </header>
        <div class="photo-review-list-modal__content">
            <?php for ($index = 0; $index < 25; $index++): $item = $photoReviewItems[$index % count($photoReviewItems)]; ?>
                <button type="button" class="photo-review-list-modal__item" data-review-photo-open data-review-photo-index="<?= $index ?>" data-review-rating="<?= $item['rating'] ?>" data-review-author="<?= htmlspecialchars($item['author'], ENT_QUOTES) ?>" data-review-date="<?= htmlspecialchars($item['date'], ENT_QUOTES) ?>" data-review-text="<?= htmlspecialchars($item['text'], ENT_QUOTES) ?>">
                    <img src="<?= htmlspecialchars($item['image'], ENT_QUOTES) ?>" alt="포토 리뷰 이미지" loading="lazy">
                </button>
            <?php endfor; ?>
        </div>
    </div>
</div>

<div id="photo-review-detail-modal" class="common-modal photo-review-detail-modal" role="dialog" aria-modal="true" aria-label="포토 리뷰 상세" hidden>
    <div class="dim" data-modal-close></div>
    <div class="common-modal__container photo-review-detail-modal__container">
        <button type="button" class="common-modal__close" data-modal-close aria-label="닫기"><img src="/assets/icons/close.svg" alt=""></button>
        <div class="photo-review-detail-modal__viewer">
            <button type="button" class="photo-review-detail-modal__arrow prev" data-review-photo-prev aria-label="이전 이미지"><img src="/assets/icons/photo-review-modal-arrow-left.svg" alt=""></button>
            <img class="photo-review-detail-modal__image" src="" alt="포토 리뷰 이미지" data-review-detail-image>
            <button type="button" class="photo-review-detail-modal__arrow next" data-review-photo-next aria-label="다음 이미지"><img src="/assets/icons/photo-review-modal-arrow-right.svg" alt=""></button>
        </div>
        <div class="photo-review-detail-modal__info">
            <div class="photo-review-detail-modal__stars" data-review-detail-stars></div>
            <strong data-review-detail-title>대한항공 키링</strong>
            <p data-review-detail-text></p>
            <div class="photo-review-detail-modal__meta"><span data-review-detail-author></span><time data-review-detail-date></time></div>
        </div>
    </div>
</div>

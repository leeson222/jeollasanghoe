<?php
/** 공통 갤러리 */
?>
<!-- 상품 이미지 갤러리 -->
<div class="product-detail__gallery" data-product-gallery>

    <!-- 메인 이미지 -->
    <div class="swiper product-detail__main-swiper">
        <div class="swiper-wrapper">
            <?php foreach ($productDetail['images'] as $image): ?>
                <div class="swiper-slide">
                    <img src="<?= htmlspecialchars($image) ?>" alt="<?= htmlspecialchars($productDetail['name']) ?>">
                </div>
            <?php endforeach; ?>
        </div>

        <button type="button" class="product-detail__swiper-prev" aria-label="이전 이미지">
            <img src="/assets/icons/prod-detail-slide-prev.svg" alt="">
        </button>
        <button type="button" class="product-detail__swiper-next" aria-label="다음 이미지">
            <img src="/assets/icons/prod-detail-slide-next.svg" alt="">
        </button>
    </div>

    <!-- 썸네일 -->
    <div class="swiper product-detail__thumb-swiper">
        <div class="swiper-wrapper">
            <?php foreach ($productDetail['images'] as $image): ?>
                <div class="swiper-slide">
                    <img src="<?= htmlspecialchars($image) ?>" alt="상품 썸네일">
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>

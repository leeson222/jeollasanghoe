<?php
/** 공통 상품 기본정보 */
?>

<section class="product-detail-info" data-product-info>
    <div class="product-detail-info__summary">
        <div class="product-detail-info__meta flex-btw">
            <span class="product-detail-info__rating flex">
                <small class="flex info__rating"><img src="/assets/icons/prod-info-star.svg" alt=""><span data-product-rating><?= htmlspecialchars($productDetail['rating']) ?></span></small>
                <small class="flex info__view"><img src="/assets/icons/prod-info-eyes.svg" alt=""><span data-product-views><?= number_format($productDetail['views']) ?></span></small></span>
            <div class="product-detail-info__actions flex">
                <button type="button" data-product-like aria-pressed="false" aria-label="찜하기"><img src="/assets/icons/prod-info-like-ico.svg" alt=""></button>
                <button type="button" data-product-share aria-label="공유하기"><img src="/assets/icons/prod-info-share-ico.svg" alt=""></button>
            </div>
        </div>

        <h2 class="product-detail-info__name Body-XL3" data-product-name><?= htmlspecialchars($productDetail['name']) ?></h2>
        <p class="product-detail-info__description Body-XXS4 gray-5"><?= htmlspecialchars($productDetail['description']) ?></p>
        <strong class="product-detail-info__price Body-XL2" data-base-price><?= number_format($productDetail['base_price']) ?>원</strong>

        <div class="product-detail-info__notice flex-c">
            <button type="button" class="product-detail-info__notice-trigger js-dropdown-trigger is-active flex Body-XXS2 gray-8" data-dropdown-target="store-info-content" aria-expanded="true">노량진 전라상회<span class="flex" aria-hidden="true"><img src="/assets/icons/prod-info-toggle-arrow-type1.svg" alt=""></span></button>

            <div class="store-info__body is-open" id="store-info-content">
                <div class="store-info__item flex">
                    <img src="/assets/icons/prod-detail-info-ico-clock.svg" alt="">
                    <div class="store-info__conents flex">
                        <strong class="Body-XXXS1" data-store-status>영업 준비중</strong>
                        <span class="Body-XXXS3">10:00 - 21:00</span>
                    </div>
                </div>

                <div class="store-info__item flex">
                    <img src="/assets/icons/prod-detail-info-ico-map.svg" alt="">
                    <div class="store-info__conents">
                        <p class="Body-XXXS3">서울 동작구 노들로 674 노량진수산시장 1층 159호, 160호, 161호</p>
                        <p class="Body-XXXS3">노량진역 9번 출구에서 495m</p>
                    </div>
                </div>

                <div class="store-info__item flex">
                    <img src="/assets/icons/prod-detail-info-ico-tel.svg" alt="">
                    <a class="Body-XXXS3" href="tel:050713975707">0507-1397-5707</a>
                </div>
            </div>
        </div>
    </div>
</section>

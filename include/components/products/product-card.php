<?php
/** 공통 상품 카드 영역 */
?>

<article class="product-card<?= !empty($product['soldout']) ? ' is-soldout' : '' ?>" data-product-name="<?= htmlspecialchars($product['name'] ?? '', ENT_QUOTES) ?>" data-product-price="<?= (int)($product['price'] ?? 0) ?>" data-product-view="<?= (int)($product['view'] ?? 0) ?>" data-product-index="<?= (int)($productIndex ?? 0) ?>">
    <a href="<?= htmlspecialchars($product['link'] ?? '/pages/product/product-detail.php') ?>" class="product-card__link"<?php if (($productCardContext ?? '') === 'order'): ?> data-modal-open="order-product-modal" data-product-id="<?= htmlspecialchars((string)($product['id'] ?? '')) ?>" data-product-name="<?= htmlspecialchars($product['name'] ?? '', ENT_QUOTES) ?>" data-product-description="<?= htmlspecialchars($product['description'] ?? '', ENT_QUOTES) ?>" data-product-image="<?= htmlspecialchars($product['image'] ?? '', ENT_QUOTES) ?>" data-product-rating="<?= htmlspecialchars((string)($product['rating'] ?? '')) ?>" data-product-views="<?= (int)($product['view'] ?? 0) ?>" data-product-price="<?= (int)($product['price'] ?? 0) ?>" aria-haspopup="dialog" aria-controls="order-product-modal"<?php endif; ?>>

        <div class="product-card__thumb">
            <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
            <?php if (!empty($product['soldout'])): ?>
                <span class="product-card__soldout">품절</span>
            <?php endif; ?>
        </div>

        <div class="product-card__content">

            <div class="product-card__rating">
                <span class="product-card__star"><img src="/assets/icons/star.svg" alt=""></span>
                <span><?= $product['rating'] ?></span>
            </div>

            <h3 class="product-card__name Body-M2">
                <?= $product['name'] ?>
            </h3>

            <p class="product-card__desc Body-XXS4 gray-7">
                <?= $product['description'] ?>
            </p>

            <div class="product-card__price flex mb-16">
                <strong class="product-card__discount Body-M2 percent">
                    <?= $product['discount'] ?>%
                </strong>

                <strong class="product-card__amount Body-M2">
                    <?= number_format($product['price']) ?>~
                </strong>
            </div>

            <div class="product-card__badges flex-d">
                <?php if (!empty($product['best'])): ?>
                    <span class="product-card__badge is-best">BEST</span>
                <?php endif; ?>

                <?php if (!empty($product['new'])): ?>
                    <span class="product-card__badge is-new">NEW</span>
                <?php endif; ?>

                <span class="product-card__view flex">
                    <img src="/assets/icons/view-ico.svg" alt="view"> <?= number_format($product['view']) ?>
                </span>
            </div>

        </div>
    </a>
    <?php if (($productCardContext ?? '') === 'wishlist'): ?>
        <button type="button" class="product-card__wishlist" data-wishlist-remove data-modal-open="wishlist-delete-modal" aria-label="<?= htmlspecialchars($product['name'] ?? '', ENT_QUOTES) ?> 위시리스트에서 삭제" aria-haspopup="dialog" aria-controls="wishlist-delete-modal">
            <img src="/assets/icons/prod-wishlist-like-ico.svg" alt="">
        </button>
    <?php endif; ?>
</article>

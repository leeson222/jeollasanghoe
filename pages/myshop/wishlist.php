<?php $productsListContext = 'wishlist'; ?>
<?php include __DIR__ . '/../../include/components/layout/head.php'; ?>
<?php include __DIR__ . '/../../include/components/layout/sub-header.php'; ?>

<div id="contents">
    <div class="container">
        <div class="myshop-layout">
            <?php include __DIR__ . '/../../include/components/myshop/myshop-menu.php'; ?>

            <main class="myshop-content">
                <section class="myshop-wishlist" data-wishlist>
                    <h1 class="myshop-page__title Body-M2">위시리스트</h1>

                    <div data-wishlist-products>
                        <?php include __DIR__ . '/../../include/components/products/products-list.php'; ?>

                        <nav class="myshop-wishlist__pagination custom-pagination" aria-label="위시리스트 페이지">
                            <button type="button" class="custom-pagination__prev" disabled aria-label="이전 페이지"><img src="/assets/icons/pagenation-left.svg" alt=""></button>
                            <button type="button" class="custom-pagination__number is-active" aria-current="page">1</button>
                            <button type="button" class="custom-pagination__number">2</button>
                            <button type="button" class="custom-pagination__number">3</button>
                            <button type="button" class="custom-pagination__next" aria-label="다음 페이지"><img src="/assets/icons/pagenation-right.svg" alt=""></button>
                        </nav>
                    </div>

                    <div class="myshop-wishlist__empty" data-wishlist-empty hidden>
                        <p>위시리스트에 담긴 상품이 없습니다.</p>
                        <a href="/pages/product/products.php" class="btnNormal sizeS">상품 보러가기</a>
                    </div>
                </section>
            </main>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../../include/components/modal/wishlist-delete-modal.php'; ?>
<?php include __DIR__ . '/../../include/components/layout/footer.php'; ?>

<?php
$activeCategoryId = isset($_GET['category']) ? (string)$_GET['category'] : 'seasonal';
$activeItemId = isset($_GET['item']) ? (string)$_GET['item'] : 'all';
$productTotal = 65;
?>
<?php include __DIR__ . '/../../include/components/layout/head.php'; ?>
<?php include __DIR__ . '/../../include/components/layout/sub-header.php'; ?>

<div id="contents">
    <main class="products-page">
        <div class="container">
            <div class="products-page__layout">
                <?php include __DIR__ . '/../../include/components/products/category-lnb.php'; ?>

                <section class="products-page__content" aria-label="상품 목록">
                    <div class="products-page__toolbar flex-btw">
                        <p class="products-page__count Body-XXS3">총 <strong><?= number_format($productTotal) ?>건</strong></p>

                        <div class="product-sort custom-select" data-product-sort>
                            <button type="button" class="product-sort__trigger custom-select__trigger js-dropdown-trigger" data-dropdown-target="product-sort-options" aria-expanded="false" aria-controls="product-sort-options"><span data-product-sort-label>정렬방식</span><img src="/assets/icons/select-arrow-ico.svg" alt=""></button>
                            <ul class="product-sort__options custom-select__options js-dropdown-content" id="product-sort-options" role="listbox" hidden>
                                <li><button type="button" class="product-sort__option is-selected" role="option" aria-selected="true" data-sort-value="default">정렬방식</button></li>
                                <li><button type="button" class="product-sort__option" role="option" aria-selected="false" data-sort-value="popular">인기순</button></li>
                                <li><button type="button" class="product-sort__option" role="option" aria-selected="false" data-sort-value="low-price">낮은 가격순</button></li>
                                <li><button type="button" class="product-sort__option" role="option" aria-selected="false" data-sort-value="high-price">높은 가격순</button></li>
                                <li><button type="button" class="product-sort__option" role="option" aria-selected="false" data-sort-value="name">상품명순</button></li>
                            </ul>
                        </div>
                    </div>

                    <?php
                    $productsListContext = 'default';
                    include __DIR__ . '/../../include/components/products/products-list.php';
                    unset($productsListContext, $products);
                    ?>

                    <nav class="products-page__pagination custom-pagination" aria-label="상품 목록 페이지">
                        <button type="button" class="custom-pagination__prev" disabled aria-label="이전 페이지"><img src="/assets/icons/pagenation-left.svg" alt=""></button>
                        <button type="button" class="custom-pagination__number is-active" aria-current="page">1</button>
                        <button type="button" class="custom-pagination__number">2</button>
                        <button type="button" class="custom-pagination__number">3</button>
                        <button type="button" class="custom-pagination__number">4</button>
                        <button type="button" class="custom-pagination__number">5</button>
                        <button type="button" class="custom-pagination__next" aria-label="다음 페이지"><img src="/assets/icons/pagenation-right.svg" alt=""></button>
                    </nav>
                </section>
            </div>
        </div>
    </main>
</div>

<?php include __DIR__ . '/../../include/components/layout/footer.php'; ?>

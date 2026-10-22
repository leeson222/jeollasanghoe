<?php
/** 상품 디테일 페이지 */
?>

<?php include __DIR__ . '/../../include/components/layout/head.php'; ?>
<?php include __DIR__ . '/../../include/components/layout/sub-header.php'; ?>

<link rel="stylesheet" href="/assets/css/product-detail.css">

<div id="contents">
    <?php include __DIR__ . '/../../include/components/products/detail/detail.php'; ?>
</div>


<?php include __DIR__ . '/../../include/components/modal/inquiry-write-modal.php'; ?>
<?php include __DIR__ . '/../../include/components/modal/product-review-photo-modal.php'; ?>
<?php include __DIR__ . '/../../include/components/layout/footer.php'; ?>

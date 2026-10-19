<?php
$inquiries = [
    ['id' => 1, 'has_product' => true, 'answered' => false, 'title' => '배송일 질문드립니다', 'content' => '오늘 주문하면 배송이 얼마나 걸리는지 알 수 있을까요?', 'date' => '2026.05.13', 'answer' => ''],
    ['id' => 2, 'has_product' => true, 'answered' => false, 'title' => '배송일 질문드립니다', 'content' => '오늘 주문하면 배송이 얼마나 걸리는지 알 수 있을까요?', 'date' => '2026.05.13', 'answer' => ''],
    ['id' => 3, 'has_product' => false, 'answered' => false, 'title' => '배송일 질문드립니다', 'content' => '오늘 주문하면 배송이 얼마나 걸리는지 알 수 있을까요?', 'date' => '2026.05.13', 'answer' => ''],
    ['id' => 4, 'has_product' => true, 'answered' => true, 'title' => '배송일 질문드립니다', 'content' => "오늘 주문하면 배송이 얼마나 걸리는지 알 수 있을까요?\n오늘 주문하면 배송이 얼마나 걸리는지 알 수 있을까요?\n오늘 주문하면 배송이 얼마나 걸리는지 알 수 있을까요?", 'date' => '2026.05.13', 'answer' => "안녕하세요 고객님.\n문의주신 제품 사이즈는 가로 25mm 세로 35mm 입니다.\n자세한 사이즈는 제품 상세정보에 표기되어 있습니다."],
];
?>
<?php include __DIR__ . '/../../include/components/layout/head.php'; ?>
<?php include __DIR__ . '/../../include/components/layout/sub-header.php'; ?>

<div id="contents">
    <div class="container">
        <div class="myshop-layout">
            <?php include __DIR__ . '/../../include/components/myshop/myshop-menu.php'; ?>

            <main class="myshop-content">
                <section class="myshop-inquiries" data-myshop-inquiries>
                    <header class="myshop-page__head">
                        <h1 class="Body-M2">문의 관리</h1>
                        <button type="button" class="btnNormal sizeM" data-inquiry-write data-modal-open="inquiry-write-modal" aria-haspopup="dialog" aria-controls="inquiry-write-modal">문의 하기</button>
                    </header>

                    <div class="myshop-inquiry-list" data-inquiry-list>
                        <?php foreach ($inquiries as $inquiry): ?>
                            <article class="myshop-inquiry-card<?= $inquiry['answered'] ? ' myshop-inquiry-card--answered' : '' ?>" data-inquiry-item data-inquiry-id="<?= $inquiry['id'] ?>" data-inquiry-status="<?= $inquiry['answered'] ? 'answered' : 'pending' ?>">
                                <?php if ($inquiry['has_product']): ?>
                                    <div class="myshop-inquiry-card__product" data-inquiry-product>
                                        <a href="/pages/product/product-detail.php" class="myshop-inquiry-card__product-image"><img src="/assets/images/payment-prod-img.png" alt="줄무늬전갱이회"></a>
                                        <strong class="Body-XXXS0"><a href="/pages/product/product-detail.php" data-product-name>줄무늬전갱이회</a></strong>
                                    </div>
                                <?php endif; ?>

                                <?php if (!$inquiry['answered']): ?>
                                    <div class="myshop-inquiry-card__control">
                                        <div class="myshop-inquiry-card__control-menu displaynone" data-inquiry-control-menu>
                                            <button type="button" data-inquiry-edit data-modal-open="inquiry-write-modal" aria-haspopup="dialog" aria-controls="inquiry-write-modal">수정</button>
                                            <button type="button" data-inquiry-delete>삭제</button>
                                        </div>
                                        <button type="button" class="myshop-inquiry-card__control-button" aria-label="문의 관리 메뉴" aria-expanded="false" data-inquiry-control><img src="/assets/icons/myshop-review-control.svg" alt=""></button>
                                    </div>
                                <?php endif; ?>

                                <div class="myshop-inquiry-card__body">
                                    <div class="myshop-inquiry-card__title-row">
                                        <h2 class="Body-XS3" data-inquiry-title><?= htmlspecialchars($inquiry['title']) ?></h2>
                                        <img src="/assets/icons/prod-detail-qna-lock.svg" alt="비밀글" data-inquiry-secret>
                                        <span class="myshop-inquiry-card__status myshop-inquiry-card__status--<?= $inquiry['answered'] ? 'answered' : 'pending' ?>" data-inquiry-status-label><?= $inquiry['answered'] ? '답변완료' : '답변대기' ?></span>
                                    </div>
                                    <p class="myshop-inquiry-card__content Body-XXS3 gray-7" data-inquiry-content><?= nl2br(htmlspecialchars($inquiry['content'])) ?></p>
                                    <?php if ($inquiry['answered']): ?>
                                        <button type="button" class="myshop-inquiry-card__more" data-inquiry-more>더보기</button>
                                    <?php endif; ?>
                                    <time class="Caption-S2 gray-5" datetime="<?= str_replace('.', '-', htmlspecialchars($inquiry['date'])) ?>" data-inquiry-date><?= htmlspecialchars($inquiry['date']) ?></time>
                                </div>

                                <?php if ($inquiry['answered']): ?>
                                    <div class="myshop-inquiry-card__answer" data-inquiry-answer>
                                        <p><?= nl2br(htmlspecialchars($inquiry['answer'])) ?></p>
                                        <time datetime="<?= str_replace('.', '-', htmlspecialchars($inquiry['date'])) ?>"><?= htmlspecialchars($inquiry['date']) ?></time>
                                    </div>
                                <?php endif; ?>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </section>
            </main>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../../include/components/modal/inquiry-write-modal.php'; ?>
<?php include __DIR__ . '/../../include/components/layout/footer.php'; ?>

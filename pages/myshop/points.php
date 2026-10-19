<?php
$pointHistory = [
    ['date' => '2026.07.31', 'type' => '구매', 'description' => '주문 사용', 'change' => -1000, 'balance' => 500],
    ['date' => '2026.07.30', 'type' => '구매', 'description' => '주문 사용', 'change' => -1000, 'balance' => 500],
    ['date' => '2026.07.29', 'type' => '구매', 'description' => '구매 적립', 'change' => 1000, 'balance' => 2500],
    ['date' => '2026.07.28', 'type' => '구매', 'description' => '구매 적립', 'change' => 500, 'balance' => 1500],
    ['date' => '2026.07.27', 'type' => '적립', 'description' => '구매 적립', 'change' => 500, 'balance' => 1000],
    ['date' => '2026.07.26', 'type' => '적립', 'description' => '구매 적립', 'change' => 100, 'balance' => 500],
    ['date' => '2026.07.25', 'type' => '적립', 'description' => '구매 적립', 'change' => 100, 'balance' => 400],
    ['date' => '2026.07.25', 'type' => '적립', 'description' => '구매 적립', 'change' => 100, 'balance' => 300],
    ['date' => '2026.07.25', 'type' => '적립', 'description' => '구매 적립', 'change' => 100, 'balance' => 200],
    ['date' => '2026.07.25', 'type' => '적립', 'description' => '구매 적립', 'change' => 100, 'balance' => 100],
];
?>
<?php include __DIR__ . '/../../include/components/layout/head.php'; ?>
<?php include __DIR__ . '/../../include/components/layout/sub-header.php'; ?>

<div id="contents">
    <div class="container">
        <div class="myshop-layout">
            <?php include __DIR__ . '/../../include/components/myshop/myshop-menu.php'; ?>

            <main class="myshop-content">
                <section class="myshop-points" data-myshop-points>
                    <h1 class="myshop-page__title Body-M2">포인트 관리</h1>

                    <dl class="myshop-point-summary" data-point-summary>
                        <dt class="Body-XXS2">사용 가능한 포인트</dt>
                        <dd><strong data-point-balance>500</strong>P</dd>
                    </dl>

                    <section class="myshop-point-history" aria-labelledby="point-history-title">
                        <h2 id="point-history-title" class="Body-XS3">포인트 내역</h2>
                        <div class="myshop-point-list__head" aria-hidden="true">
                            <span>생성 날짜</span>
                            <span>구분</span>
                            <span>내용</span>
                            <span>변동 포인트</span>
                            <span>잔여 포인트</span>
                        </div>
                        <ul class="myshop-point-list" data-point-history-list>
                            <?php foreach ($pointHistory as $point): ?>
                                <li class="myshop-point-list__item" data-point-history-item>
                                    <dl class="myshop-point-list__fields">
                                        <div class="myshop-point-list__field">
                                            <dt>생성 날짜</dt>
                                            <dd><time datetime="<?= str_replace('.', '-', htmlspecialchars($point['date'])) ?>" data-point-date><?= htmlspecialchars($point['date']) ?></time></dd>
                                        </div>
                                        <div class="myshop-point-list__field">
                                            <dt>구분</dt>
                                            <dd data-point-type><?= htmlspecialchars($point['type']) ?></dd>
                                        </div>
                                        <div class="myshop-point-list__field myshop-point-list__field--description">
                                            <dt>내용</dt>
                                            <dd data-point-description><?= htmlspecialchars($point['description']) ?></dd>
                                        </div>
                                        <div class="myshop-point-list__field myshop-point-list__change myshop-point-list__change--<?= $point['change'] < 0 ? 'used' : 'earned' ?>">
                                            <dt>변동 포인트</dt>
                                            <dd><span data-point-change><?= $point['change'] > 0 ? '+' : '' ?><?= number_format($point['change']) ?></span>P</dd>
                                        </div>
                                        <div class="myshop-point-list__field myshop-point-list__field--remaining">
                                            <dt>잔여 포인트</dt>
                                            <dd><span data-point-remaining><?= number_format($point['balance']) ?></span>P</dd>
                                        </div>
                                    </dl>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                        <nav class="myshop-point-pagination custom-pagination" aria-label="포인트 내역 페이지" data-pagination="points">
                            <button type="button" class="custom-pagination__prev" data-page-prev disabled aria-label="이전 페이지"><img src="/assets/icons/pagenation-left.svg" alt=""></button>
                            <?php for ($page = 1; $page <= 5; $page++): ?>
                                <button type="button" class="custom-pagination__number<?= $page === 1 ? ' is-active' : '' ?>" data-page="<?= $page ?>"<?= $page === 1 ? ' aria-current="page"' : '' ?>><?= $page ?></button>
                            <?php endfor; ?>
                            <button type="button" class="custom-pagination__next" data-page-next aria-label="다음 페이지"><img src="/assets/icons/pagenation-right.svg" alt=""></button>
                        </nav>
                    </section>
                </section>
            </main>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../../include/components/layout/footer.php'; ?>

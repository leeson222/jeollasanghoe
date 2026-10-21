<?php
$customerPage = 'notice';
$notices = [
    1 => ['fixed' => true, 'title' => '전라상회 온라인몰 이용 안내', 'date' => '2026.10.15'],
    2 => ['fixed' => true, 'title' => '배송 및 매장 픽업 운영시간 안내', 'date' => '2026.10.10'],
    3 => ['fixed' => true, 'title' => '신선식품 교환 및 반품 정책 안내', 'date' => '2026.10.01'],
    4 => ['fixed' => true, 'title' => '포인트 및 쿠폰 사용 안내', 'date' => '2026.09.25'],
    5 => ['fixed' => true, 'title' => '개인정보 처리방침 변경 안내', 'date' => '2026.09.20'],
    6 => ['title' => '추석 연휴 배송 일정 안내', 'date' => '2026.09.15'],
    7 => ['title' => '퀵배송 가능 지역이 확대되었습니다', 'date' => '2026.09.08'],
    8 => ['title' => '시스템 점검으로 인한 서비스 일시 중단 안내', 'date' => '2026.08.30'],
    9 => ['title' => '여름철 신선 배송 포장 안내', 'date' => '2026.08.18'],
    10 => ['title' => '신규 회원 가입 혜택 안내', 'date' => '2026.08.01'],
];

$noticeId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ?: 1;
if (!isset($notices[$noticeId])) {
    $noticeId = 1;
}
$notice = $notices[$noticeId];
$previousId = $noticeId > 1 && isset($notices[$noticeId - 1]) ? $noticeId - 1 : null;
$nextId = isset($notices[$noticeId + 1]) ? $noticeId + 1 : null;

function noticeTitle(array $notices, ?int $id): string
{
    return $id !== null ? $notices[$id]['title'] : '이전/다음 게시글이 없습니다.';
}
?>
<?php include __DIR__ . '/../../include/components/layout/head.php'; ?>
<?php include __DIR__ . '/../../include/components/layout/sub-header.php'; ?>
<link rel="stylesheet" href="/assets/css/sub.css">

<main id="contents">
    <div class="container">
        <section class="customer-board notice-detail" aria-labelledby="notice-detail-heading">
            <article>
                <header class="notice-detail__header">
                    <?php if (!empty($notice['fixed'])): ?><span class="notice-detail__badge">공지</span><?php endif; ?>
                    <h2 id="notice-detail-heading"><?= htmlspecialchars($notice['title'], ENT_QUOTES, 'UTF-8') ?></h2>
                    <p>등록일 : <time datetime="<?= str_replace('.', '-', $notice['date']) ?>"><?= htmlspecialchars($notice['date'], ENT_QUOTES, 'UTF-8') ?></time></p>
                </header>

                <div class="notice-detail__content" aria-label="공지사항 본문">
                    <span class="sr-only">공지사항 내용 영역</span>
                </div>
            </article>

            <nav class="notice-detail__navigation" aria-label="이전 및 다음 공지사항">
                <div class="notice-detail__navigation-row">
                    <span class="notice-detail__navigation-label">이전 글</span>
                    <?php if ($previousId !== null): ?>
                        <a href="/pages/sub/read.php?id=<?= $previousId ?>"><?= !empty($notices[$previousId]['fixed']) ? '<em>공지</em>' : '' ?><span><?= htmlspecialchars(noticeTitle($notices, $previousId), ENT_QUOTES, 'UTF-8') ?></span></a>
                    <?php else: ?>
                        <span class="notice-detail__navigation-empty">이전 게시글이 없습니다.</span>
                    <?php endif; ?>
                </div>
                <div class="notice-detail__navigation-row">
                    <span class="notice-detail__navigation-label">다음 글</span>
                    <?php if ($nextId !== null): ?>
                        <a href="/pages/sub/read.php?id=<?= $nextId ?>"><?= !empty($notices[$nextId]['fixed']) ? '<em>공지</em>' : '' ?><span><?= htmlspecialchars(noticeTitle($notices, $nextId), ENT_QUOTES, 'UTF-8') ?></span></a>
                    <?php else: ?>
                        <span class="notice-detail__navigation-empty">다음 게시글이 없습니다.</span>
                    <?php endif; ?>
                </div>
            </nav>

            <div class="notice-detail__actions">
                <a href="/pages/sub/customer-center.php" class="btnNormal sizeL">목록</a>
            </div>
        </section>
    </div>
</main>

<?php include __DIR__ . '/../../include/components/layout/footer.php'; ?>

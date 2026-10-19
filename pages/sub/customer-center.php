<?php
$customerPage = 'notice';
$notices = [
    ['fixed' => true, 'title' => '전라상회 온라인몰 이용 안내', 'date' => '2026.10.15'],
    ['fixed' => true, 'title' => '배송 및 매장 픽업 운영시간 안내', 'date' => '2026.10.10'],
    ['fixed' => true, 'title' => '신선식품 교환 및 반품 정책 안내', 'date' => '2026.10.01'],
    ['fixed' => true, 'title' => '포인트 및 쿠폰 사용 안내', 'date' => '2026.09.25'],
    ['fixed' => true, 'title' => '개인정보 처리방침 변경 안내', 'date' => '2026.09.20'],
    ['number' => 15, 'title' => '추석 연휴 배송 일정 안내', 'date' => '2026.09.15'],
    ['number' => 14, 'title' => '퀵배송 가능 지역이 확대되었습니다', 'date' => '2026.09.08'],
    ['number' => 13, 'title' => '시스템 점검으로 인한 서비스 일시 중단 안내', 'date' => '2026.08.30'],
    ['number' => 12, 'title' => '여름철 신선 배송 포장 안내', 'date' => '2026.08.18'],
    ['number' => 11, 'title' => '신규 회원 가입 혜택 안내', 'date' => '2026.08.01'],
];
?>
<?php include __DIR__ . '/../../include/components/layout/head.php'; ?>
<?php include __DIR__ . '/../../include/components/layout/sub-header.php'; ?>
<link rel="stylesheet" href="/assets/css/sub.css">

<main id="contents">
    <div class="container customer-layout">
        <?php include __DIR__ . '/../../include/components/sub/customer-lnb.php'; ?>
        <section class="customer-board">
            <h1 class="Body-M2">공지사항</h1>
            <div class="notice-board" role="list">
                <div class="notice-board__head" aria-hidden="true"><span>번호</span><span>제목</span><span>등록일</span></div>
                <?php foreach ($notices as $notice): ?>
                    <a href="#" class="notice-board__item<?= !empty($notice['fixed']) ? ' is-fixed' : '' ?>" role="listitem">
                        <span class="notice-board__number"><?php if (!empty($notice['fixed'])): ?><em>공지</em><?php else: ?><?= (int)$notice['number'] ?><?php endif; ?></span>
                        <strong class="notice-board__subject"><?= htmlspecialchars($notice['title']) ?></strong>
                        <time datetime="<?= str_replace('.', '-', $notice['date']) ?>"><?= htmlspecialchars($notice['date']) ?></time>
                    </a>
                <?php endforeach; ?>
            </div>
            <nav class="customer-board__pagination custom-pagination" aria-label="공지사항 페이지">
                <button type="button" class="custom-pagination__prev" disabled aria-label="이전 페이지"><img src="/assets/icons/pagenation-left.svg" alt=""></button>
                <button type="button" class="custom-pagination__number is-active" aria-current="page">1</button>
                <button type="button" class="custom-pagination__number">2</button>
                <button type="button" class="custom-pagination__next" aria-label="다음 페이지"><img src="/assets/icons/pagenation-right.svg" alt=""></button>
            </nav>
            <form class="notice-board__search" action="" method="get" role="search">
                <div class="custom-select notice-board__search-type is-selected" data-select="notice-search-type">
                    <button type="button" class="custom-select__trigger" aria-haspopup="listbox" aria-expanded="false">
                        <span class="custom-select__value">제목+내용</span>
                        <img src="/assets/icons/select-arrow-ico.svg" alt="">
                    </button>
                    <input type="hidden" name="search_type" value="title_content">
                    <ul class="custom-select__options" role="listbox" hidden>
                        <li><button type="button" data-value="title_content" class="is-selected" aria-selected="true">제목+내용</button></li>
                        <li><button type="button" data-value="title">제목</button></li>
                        <li><button type="button" data-value="content">내용</button></li>
                    </ul>
                </div>
                <label class="notice-board__search-keyword">
                    <span class="sr-only">공지사항 검색어</span>
                    <input type="text" name="keyword" placeholder="검색어를 입력해 주세요">
                    <button type="submit" aria-label="검색"><img src="/assets/icons/board-search-ico.svg" alt=""></button>
                </label>
            </form>
        </section>
    </div>
</main>
<?php include __DIR__ . '/../../include/components/layout/footer.php'; ?>

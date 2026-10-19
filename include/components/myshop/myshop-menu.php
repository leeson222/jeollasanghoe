<?php
$myshopCurrentPage = basename($_SERVER['SCRIPT_NAME'] ?? 'index.php');
$myshopMenus = [
    ['file' => 'index.php', 'label' => '마이페이지 홈'],
    ['file' => 'cancel.php', 'label' => '주문취소 내역'],
    ['file' => 'addresses.php', 'label' => '배송지 관리'],
    ['file' => 'points.php', 'label' => '포인트 관리'],
    ['file' => 'coupons.php', 'label' => '쿠폰 관리'],
    ['file' => 'reviews.php', 'label' => '리뷰 관리'],
    ['file' => 'inquiries.php', 'label' => '문의 관리'],
    ['file' => 'profile.php', 'label' => '내 정보 수정'],
];
?>

<aside class="myshop-menu">
    <nav aria-label="마이페이지 메뉴">
        <ul class="myshop-menu__list">
            <?php foreach ($myshopMenus as $menu): ?>
                <li class="myshop-menu__item<?= $myshopCurrentPage === $menu['file'] ? ' is-active' : '' ?>">
                    <a href="/pages/myshop/<?= htmlspecialchars($menu['file']) ?>"<?= $myshopCurrentPage === $menu['file'] ? ' aria-current="page"' : '' ?>><?= htmlspecialchars($menu['label']) ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
        <a href="/" class="myshop-menu__logout">로그아웃</a>
    </nav>
</aside>

<?php $customerPage = $customerPage ?? 'notice'; ?>
<aside class="customer-lnb">
    <span class="customer-lnb__title">고객센터</span>
    <nav aria-label="고객센터 메뉴">
        <ul>
            <li class="<?= $customerPage === 'notice' ? 'is-active' : '' ?>"><a href="/pages/sub/customer-center.php"<?= $customerPage === 'notice' ? ' aria-current="page"' : '' ?>>공지사항</a></li>
            <li class="<?= $customerPage === 'faq' ? 'is-active' : '' ?>"><a href="/pages/sub/faq.php"<?= $customerPage === 'faq' ? ' aria-current="page"' : '' ?>>FAQ</a></li>
        </ul>
    </nav>
</aside>

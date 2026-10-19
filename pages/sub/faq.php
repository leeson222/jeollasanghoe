<?php
$customerPage = 'faq';
$faqGroups = [
    'product' => ['label' => '상품/결제', 'items' => [
        ['q' => '구매 전 재고 확인이 가능한가요?', 'a' => '상품별 재고는 실시간으로 변동될 수 있습니다. 정확한 재고 확인이 필요한 경우 고객센터로 문의해 주세요.'],
        ['q' => '상품 반품/교환 진행 시, 배송비가 부과되나요?', 'a' => '고객님의 마음이 바뀌어 교환, 반품을 하실 경우 상품반송 비용은 고객님께서 부담하셔야 합니다. (색상 교환, 사이즈 교환 등 포함)'],
        ['q' => 'CS 문의는 어떻게 하나요?', 'a' => '마이페이지의 문의 관리 또는 화면 하단의 1:1 문의를 이용해 주세요.'],
    ]],
    'delivery' => ['label' => '배송/취소', 'items' => [
        ['q' => '배송 일정은 어떻게 확인하나요?', 'a' => '주문 내역에서 선택한 배송 날짜와 시간을 확인할 수 있습니다.'],
        ['q' => '주문 취소는 언제까지 가능한가요?', 'a' => '상품 준비가 시작되기 전까지 마이페이지 주문 내역에서 취소할 수 있습니다.'],
    ]],
    'benefit' => ['label' => '포인트/쿠폰', 'items' => [
        ['q' => '포인트는 어떻게 사용하나요?', 'a' => '결제 단계에서 보유 포인트를 확인하고 사용할 금액을 입력해 주세요.'],
        ['q' => '쿠폰과 포인트를 함께 사용할 수 있나요?', 'a' => '일부 쿠폰을 제외하고 포인트와 함께 사용할 수 있습니다.'],
    ]],
    'member' => ['label' => '회원', 'items' => [
        ['q' => '회원정보는 어디에서 변경하나요?', 'a' => '마이페이지 내 정보 수정에서 비밀번호 확인 후 변경할 수 있습니다.'],
        ['q' => '회원탈퇴 후 재가입할 수 있나요?', 'a' => '회원탈퇴 후 동일 계정 재가입은 30일 동안 제한됩니다.'],
    ]],
];
?>
<?php include __DIR__ . '/../../include/components/layout/head.php'; ?>
<?php include __DIR__ . '/../../include/components/layout/sub-header.php'; ?>
<link rel="stylesheet" href="/assets/css/sub.css">

<main id="contents">
    <div class="container customer-layout">
        <?php include __DIR__ . '/../../include/components/sub/customer-lnb.php'; ?>
        <section class="customer-board customer-faq common-tabs" data-tabs="faq-category">
            <h1 class="Body-M2">FAQ</h1>
            <div class="common-tabs__list" role="tablist" aria-label="FAQ 분류">
                <?php $tabIndex = 0; foreach ($faqGroups as $key => $group): ?>
                    <button type="button" class="common-tabs__tab<?= $tabIndex === 0 ? ' is-active' : '' ?>" id="faq-tab-<?= $key ?>" data-tab="<?= $key ?>" role="tab" aria-selected="<?= $tabIndex === 0 ? 'true' : 'false' ?>" aria-controls="faq-panel-<?= $key ?>" tabindex="<?= $tabIndex === 0 ? '0' : '-1' ?>"><?= htmlspecialchars($group['label']) ?></button>
                <?php $tabIndex++; endforeach; ?>
            </div>
            <?php $panelIndex = 0; foreach ($faqGroups as $key => $group): ?>
                <div class="faq-panel common-tabs__panel<?= $panelIndex === 0 ? ' is-active' : '' ?>" id="faq-panel-<?= $key ?>" data-tab-panel="<?= $key ?>" role="tabpanel" aria-labelledby="faq-tab-<?= $key ?>"<?= $panelIndex === 0 ? '' : ' hidden' ?>>
                    <?php foreach ($group['items'] as $index => $faq): $faqId = 'faq-' . $key . '-' . $index; ?>
                        <article class="faq-item">
                            <button type="button" class="faq-item__question js-dropdown-trigger" data-dropdown-target="<?= $faqId ?>" data-dropdown-group="faq-<?= $key ?>" aria-expanded="false" aria-controls="<?= $faqId ?>">
                                <span class="faq-item__category"><?= htmlspecialchars($group['label']) ?></span><strong><?= htmlspecialchars($faq['q']) ?></strong><i aria-hidden="true"></i>
                            </button>
                            <div class="faq-item__answer js-dropdown-content" id="<?= $faqId ?>" hidden><p><?= htmlspecialchars($faq['a']) ?></p></div>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php $panelIndex++; endforeach; ?>
            <p class="customer-faq__contact">찾으시는 질문이 없나요? <a href="/pages/myshop/inquiries.php">1:1문의 바로가기</a></p>
        </section>
    </div>
</main>
<?php include __DIR__ . '/../../include/components/layout/footer.php'; ?>

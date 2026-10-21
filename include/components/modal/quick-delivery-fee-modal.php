<?php
$quickDeliveryDates = [
    ['value' => '2026-10-21', 'label' => '2026-10-21 (수)'],
    ['value' => '2026-10-22', 'label' => '2026-10-22 (목)'],
    ['value' => '2026-10-23', 'label' => '2026-10-23 (금)'],
    ['value' => '2026-10-24', 'label' => '2026-10-24 (토)'],
    ['value' => '2026-10-25', 'label' => '2026-10-25 (일)'],
    ['value' => '2026-10-26', 'label' => '2026-10-26 (월)'],
    ['value' => '2026-10-27', 'label' => '2026-10-27 (화)'],
    ['value' => '2026-10-28', 'label' => '2026-10-28 (수)'],
    ['value' => '2026-10-29', 'label' => '2026-10-29 (목)'],
    ['value' => '2026-10-30', 'label' => '2026-10-30 (금)'],
    ['value' => '2026-10-31', 'label' => '2026-10-31 (토)'],
    ['value' => '2026-11-01', 'label' => '2026-11-01 (일)'],
    ['value' => '2026-11-02', 'label' => '2026-11-02 (월)'],
    ['value' => '2026-11-03', 'label' => '2026-11-03 (화)'],
];

$quickDeliveryStores = [
    ['key' => 'noryangjin', 'name' => '노량진수산시장', 'fee' => '18,000'],
];
?>
<div id="quick-delivery-fee-modal" class="common-modal quick-delivery-fee-modal" role="dialog" aria-modal="true" aria-labelledby="quick-delivery-fee-title" hidden>
    <div class="dim" data-modal-close></div>
    <div class="common-modal__container quick-delivery-fee-modal__container">
        <header class="quick-delivery-fee-modal__header">
            <div>
                <h2 id="quick-delivery-fee-title">퀵 배송비 조회</h2>
                <p>검색 시간 및 주말, 공휴일에 따라 금액 차이가 있을 수 있습니다.</p>
            </div>
            <button type="button" class="common-modal__close" data-modal-close aria-label="퀵 배송비 조회 창 닫기"><img src="/assets/icons/close.svg" alt=""></button>
        </header>

        <div class="quick-delivery-fee-modal__body">
            <form class="quick-delivery-fee-form" data-quick-delivery-fee-form>
                <div class="quick-delivery-fee-form__field">
                    <label for="quick-delivery-address">수령주소</label>
                    <input type="text" id="quick-delivery-address" name="address" value="서울 영등포구 선유서로25길 28" disabled>
                </div>

                <div class="quick-delivery-fee-form__field">
                    <label for="quick-delivery-date">수령일시</label>
                    <div class="quick-delivery-fee-form__schedule">
                        <div class="custom-select quick-delivery-fee-form__select is-selected" data-select="quick-delivery-date">
                            <button type="button" class="custom-select__trigger" aria-haspopup="listbox" aria-expanded="false" aria-controls="quick-delivery-date-options">
                                <span class="custom-select__value"><?= htmlspecialchars($quickDeliveryDates[0]['label']) ?></span>
                                <i class="custom-select__arrow"><img src="/assets/icons/select-arrow-ico.svg" alt=""></i>
                            </button>
                            <input type="hidden" id="quick-delivery-date" name="delivery_date" value="<?= htmlspecialchars($quickDeliveryDates[0]['value']) ?>">
                            <ul id="quick-delivery-date-options" class="custom-select__options" role="listbox" hidden>
                                <?php foreach ($quickDeliveryDates as $index => $date): ?>
                                    <li><button type="button" data-value="<?= htmlspecialchars($date['value']) ?>"<?= $index === 0 ? ' class="is-selected" aria-selected="true"' : ' aria-selected="false"' ?>><?= htmlspecialchars($date['label']) ?></button></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="custom-select quick-delivery-fee-form__select is-selected" data-select="quick-delivery-hour">
                            <button type="button" class="custom-select__trigger" aria-haspopup="listbox" aria-expanded="false" aria-controls="quick-delivery-hour-options">
                                <span class="custom-select__value">16:00</span>
                                <i class="custom-select__arrow"><img src="/assets/icons/select-arrow-ico.svg" alt=""></i>
                            </button>
                            <input type="hidden" id="quick-delivery-hour" name="delivery_hour" value="16:00">
                            <ul id="quick-delivery-hour-options" class="custom-select__options" role="listbox" hidden>
                                <?php foreach (['16:00', '17:00', '18:00', '19:00', '20:00', '21:00'] as $index => $hour): ?>
                                    <li><button type="button" data-value="<?= $hour ?>"<?= $index === 0 ? ' class="is-selected" aria-selected="true"' : ' aria-selected="false"' ?>><?= $hour ?></button></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <button type="submit" class="btnSubmit sizeM">조회</button>
                    </div>
                </div>
            </form>

            <section class="quick-delivery-fee-results" aria-live="polite">
                <h3 class="sr-only">지점별 퀵 배송비</h3>
                <?php foreach ($quickDeliveryStores as $store): ?>
                    <div class="quick-delivery-fee-result">
                        <strong><?= htmlspecialchars($store['name']) ?> 출발</strong>
                        <p><span>퀵 배송비</span><em data-quick-delivery-fee="<?= htmlspecialchars($store['fee']) ?>">-</em><b>원</b></p>
                    </div>
                <?php endforeach; ?>
            </section>

            <section class="quick-delivery-fee-guide">
                <h3>퀵 배송 시 참고해 주세요.</h3>
                <div class="quick-delivery-fee-guide__list">
                    <?php foreach ($quickDeliveryStores as $store): ?>
                        <dl>
                            <dt><?= htmlspecialchars($store['name']) ?></dt>
                            <dd>서울 동작구 노들로 674 노량진수산시장 1층 159호, 160호, 161호</dd>
                        </dl>
                    <?php endforeach; ?>
                </div>
            </section>
        </div>
    </div>
</div>

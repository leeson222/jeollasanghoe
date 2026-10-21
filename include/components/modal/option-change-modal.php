<div id="option-change-modal" class="common-modal option-change-modal" role="dialog" aria-modal="true" aria-labelledby="option-change-modal-title" hidden>
    <div class="dim" data-modal-close></div>
    <div class="common-modal__container option-change-modal__container">
        <button type="button" class="common-modal__close" data-modal-close aria-label="옵션 변경 창 닫기"><img src="/assets/icons/close.svg" alt=""></button>
        <h2 id="option-change-modal-title" class="option-change-modal__title">옵션 변경</h2>
        <form class="option-change-modal__form" data-option-change-form>
            <div class="option-change-modal__product">
                <img src="/assets/images/payment-prod-img.png" alt="줄무늬전갱이회" data-option-change-image>
                <div class="option-change-modal__product-info">
                    <p><strong data-option-change-name>줄무늬전갱이회</strong><span aria-hidden="true"></span><em><span data-option-change-product-quantity>1</span>개</em></p>
                    <small data-option-change-base-price>45,000원</small>
                </div>
            </div>

            <?php
            $optionChangeFields = [
                ['name' => 'size', 'label' => '가격', 'value' => 'small', 'options' => ['small' => '소(2인) [500g] 85,000원', 'medium' => '중(3인) [750g] 125,000원']],
                ['name' => 'thickness', 'label' => '회두께', 'value' => 'normal', 'options' => ['normal' => '보통', 'thick' => '두껍게']],
                ['name' => 'spicy', 'label' => '매운탕뼈', 'value' => 'yes', 'options' => ['yes' => '있음', 'no' => '없음']],
                ['name' => 'extra', 'label' => '추가 옵션', 'value' => 'vegetable', 'options' => ['vegetable' => '쌈야채 3,000원', 'none' => '선택 안함']],
            ];
            ?>
            <div class="option-change-modal__fields">
                <?php foreach ($optionChangeFields as $field): ?>
                    <div class="option-change-modal__field">
                        <label class="option-change-modal__label" id="option-change-<?= $field['name'] ?>-label"><?= $field['label'] ?><em aria-hidden="true"></em></label>
                        <div class="custom-select option-change-modal__select is-selected" data-select="option-change-<?= $field['name'] ?>">
                            <button type="button" class="custom-select__trigger" aria-haspopup="listbox" aria-expanded="false" aria-labelledby="option-change-<?= $field['name'] ?>-label">
                                <?php
                                $selectedLabel = $field['options'][$field['value']];
                                $hasPrice = preg_match('/^(.*?)(\d{1,3}(?:,\d{3})*원)$/u', $selectedLabel, $selectedParts);
                                ?>
                                <span class="custom-select__value"><?php if ($hasPrice): ?><?= htmlspecialchars($selectedParts[1], ENT_QUOTES, 'UTF-8') ?><em><?= htmlspecialchars($selectedParts[2], ENT_QUOTES, 'UTF-8') ?></em><?php else: ?><?= htmlspecialchars($selectedLabel, ENT_QUOTES, 'UTF-8') ?><?php endif; ?></span>
                                <img src="/assets/icons/select-arrow-ico.svg" alt="">
                            </button>
                            <input type="hidden" name="<?= $field['name'] ?>" value="<?= $field['value'] ?>" data-initial-value="<?= $field['value'] ?>">
                            <ul class="custom-select__options" role="listbox" hidden>
                                <?php foreach ($field['options'] as $value => $label): ?>
                                    <li><button type="button" data-value="<?= $value ?>" class="<?= $value === $field['value'] ? 'is-selected' : '' ?>" aria-selected="<?= $value === $field['value'] ? 'true' : 'false' ?>"><?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8') ?></button></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="option-change-modal__total">
                <div class="product-detail-purchase__quantity flex">
                    <button type="button" class="product-detail-purchase__quantity-minus" data-option-change-minus aria-label="수량 감소"><img src="/assets/icons/quantity-minus.svg" alt="수량 감소"></button>
                    <span class="product-detail-purchase__quantity-value Body-XXS3" data-option-change-quantity>1</span>
                    <button type="button" class="product-detail-purchase__quantity-plus" data-option-change-plus aria-label="수량 증가"><img src="/assets/icons/quantity-plus.svg" alt="수량 증가"></button>
                </div>
                <strong data-option-change-total>88,000원</strong>
            </div>

            <div class="option-change-modal__buttons">
                <button type="button" class="btnNormal sizeL" data-modal-close>취소</button>
                <button type="submit" class="btnSubmit sizeL" data-option-change-submit disabled>변경하기</button>
            </div>
        </form>
    </div>
</div>

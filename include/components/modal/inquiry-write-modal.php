<?php
$inquiryProducts = $inquiryProducts ?? [
    ['id' => '1', 'name' => '줄무늬 전갱이'],
    ['id' => '2', 'name' => '제철 해산물 모둠'],
];
?>
<div id="inquiry-write-modal" class="common-modal inquiry-write-modal" role="dialog" aria-modal="true" aria-labelledby="inquiry-write-modal-title" hidden>
    <div class="dim" data-modal-close></div>
    <div class="common-modal__container inquiry-write-modal__container">
        <header class="inquiry-write-modal__header">
            <h2 id="inquiry-write-modal-title">문의하기</h2>
            <button type="button" class="common-modal__close" data-modal-close aria-label="문의 창 닫기"><img src="/assets/icons/close.svg" alt=""></button>
        </header>
        <form class="inquiry-write-modal__form" action="" method="post" enctype="multipart/form-data" data-inquiry-form>
            <div class="inquiry-write-modal__body">
                <fieldset class="inquiry-write-modal__visibility">
                    <legend class="sr-only">문의 공개 여부</legend>
                    <label><input type="radio" name="inquiry_visibility" value="public" checked><span>공개</span></label>
                    <label><input type="radio" name="inquiry_visibility" value="private"><span>비공개</span></label>
                </fieldset>
                <div class="inquiry-write-modal__field">
                    <label for="inquiry-product">상품</label>
                    <div class="custom-select inquiry-write-modal__select" data-select="inquiry-product">
                        <button type="button" class="custom-select__trigger" aria-haspopup="listbox" aria-expanded="false"><span class="custom-select__value">상품을 선택해 주세요</span><img src="/assets/icons/select-arrow-ico.svg" alt=""></button>
                        <input type="hidden" id="inquiry-product" name="product_id">
                        <ul class="custom-select__options" role="listbox" hidden>
                            <li><button type="button" data-value="">상품을 선택해 주세요</button></li>
                            <?php foreach ($inquiryProducts as $product): ?>
                                <li><button type="button" data-value="<?= htmlspecialchars((string)$product['id']) ?>"><?= htmlspecialchars($product['name']) ?></button></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="inquiry-write-modal__field">
                    <label for="inquiry-title">제목 <em aria-hidden="true"></em></label>
                    <input type="text" id="inquiry-title" name="title" placeholder="제목을 입력해 주세요" required>
                </div>
                <div class="inquiry-write-modal__field">
                    <label for="inquiry-content">내용 <em aria-hidden="true"></em></label>
                    <textarea id="inquiry-content" name="content" placeholder="내용을 입력해 주세요" required></textarea>
                </div>
                <div class="inquiry-write-modal__field inquiry-write-modal__upload">
                    <span class="inquiry-write-modal__label">사진 첨부</span>
                    <label class="inquiry-write-modal__upload-button" for="inquiry-photos"><span>사진 첨부</span><img src="/assets/icons/myshop-review-photo.svg" alt=""></label>
                    <input class="sr-only" type="file" id="inquiry-photos" name="photos[]" accept="image/*" multiple data-inquiry-photos>
                    <div class="inquiry-write-modal__previews" data-inquiry-previews></div>
                </div>
            </div>
            <footer class="inquiry-write-modal__footer"><button type="submit" class="btnSubmit sizeL" data-inquiry-submit>등록</button></footer>
        </form>
    </div>
</div>

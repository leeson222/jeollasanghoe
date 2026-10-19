<div id="review-write-modal" class="common-modal review-write-modal" role="dialog" aria-modal="true" aria-labelledby="review-write-modal-title" hidden>
    <div class="dim" data-modal-close></div>
    <form class="common-modal__container review-write-modal__container" data-review-write-form>
        <header class="review-write-modal__header">
            <h2 id="review-write-modal-title">리뷰 작성</h2>
            <p>구매하신 상품의 리뷰를 작성해 주세요</p>
            <button type="button" class="common-modal__close" data-modal-close aria-label="닫기"><img src="/assets/icons/close.svg" alt=""></button>
        </header>

        <div class="review-write-modal__body">
            <div class="review-write-modal__product">
                <img src="/assets/images/payment-prod-img.png" alt="줄무늬전갱이회" data-review-product-image>
                <strong data-review-product-name>줄무늬전갱이회</strong>
            </div>

            <fieldset class="review-write-modal__rating">
                <legend>이 상품 어떠셨나요?</legend>
                <div class="review-write-modal__stars" role="radiogroup" aria-label="상품 별점" data-review-rating-control>
                    <?php for ($rating = 1; $rating <= 5; $rating++): ?>
                        <button type="button" role="radio" aria-checked="false" aria-label="<?= $rating ?>점" data-review-rating-value="<?= $rating ?>"><img src="/assets/icons/prod-detail-all-review-star-gray.svg" alt=""></button>
                    <?php endfor; ?>
                </div>
                <input type="hidden" name="review_rating" value="" data-review-rating-input required>
            </fieldset>

            <div class="review-write-modal__upload">
                <div class="review-write-modal__label Body-XXS3"><strong>사진 첨부 (선택)</strong><span class="gray-5">여러 장 첨부 가능</span></div>
                <label for="review-write-images" class="review-write-modal__upload-button">사진 첨부 <i aria-hidden="true"><img src="/assets/icons/myshop-review-photo.svg" alt=""></i></label>
                <input type="file" id="review-write-images" name="review_images[]" accept="image/*" multiple class="displaynone" data-review-image-input>
                <div class="review-write-modal__previews" data-review-image-previews></div>
            </div>

            <div class="review-write-modal__content">
                <label class="review-write-modal__content-label" for="review-write-content">내용<em aria-hidden="true"></em></label>
                <textarea id="review-write-content" name="review_content" placeholder="리뷰 내용을 입력해 주세요" required data-review-content></textarea>
            </div>
        </div>

        <footer class="review-write-modal__footer">
            <button type="submit" class="btnSubmit sizeL" data-review-submit>등록</button>
        </footer>
    </form>
</div>

<!-- 모바일 공통: 년월 선택 바텀시트 -->
<div id="month-select-sheet" class="bottom-sheet month-select-sheet" role="dialog" aria-modal="true" aria-labelledby="month-select-title" hidden>
    <div class="bottom-sheet__dim" data-sheet-close></div>
    <div class="bottom-sheet__container">
        <div class="bottom-sheet__header">
            <h3 id="month-select-title" class="bottom-sheet__title">날짜 선택</h3>
            <button type="button" class="bottom-sheet__close" data-sheet-close aria-label="닫기">
                <img src="/assets/icons/close.svg" alt="">
            </button>
        </div>

        <div class="bottom-sheet__content">
            <div class="month-select__list" data-month-list></div>
        </div>

        <div class="bottom-sheet__footer">
            <button type="button" class="btnSubmit sizeL" data-action="select-month">선택</button>
        </div>
    </div>
</div>

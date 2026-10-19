
<?php /** 공통 상품문의 */ ?>
<section class="product-detail-qna" data-detail-section="qna">

    <!-- 상품문의 헤더 -->
    <div class="product-detail-qna__list-head flex-btw">
        <h4>상품문의 <span><?= (int)$productDetail['qna_count'] ?></span></h4>
        <button type="button" class="product-detail-qna__write" data-qna-write data-modal-open="inquiry-write-modal" aria-haspopup="dialog" aria-controls="inquiry-write-modal">문의하기</button>
    </div>

    <!-- 상품문의 목록 -->
    <div class="product-detail-qna__list" data-qna-list>
        <?php foreach ($productQuestions as $i => $q): ?>
            <?php
            $isSecret = !empty($q['secret']);
            $canShow = !$isSecret; // 추후 작성자/관리자 권한 체크로 교체
            $hasContent = !empty($q['question']);
            $isComplete = ($q['status'] === '답변완료');
            ?>

            <article class="product-detail-qna__item" data-qna-id="<?= (int)$q['id'] ?>">

                <!-- 문의 제목 -->
                <button type="button" class="product-detail-qna__trigger flex-btw" data-qna-toggle aria-expanded="false">
                    <span class="product-detail-qna__title-wrap flex">
                        <div class="product-detail-qna__title-group flex">
                            <span class="product-detail-qna__title Body-XXS2 gray-7"><?= htmlspecialchars($q['title']) ?></span>
                            <?php if ($isSecret): ?>
                                <img class="product-detail-qna__lock" src="/assets/icons/prod-detail-qna-lock.svg" alt="비밀글">
                            <?php endif; ?>
                        </div>

                        <span class="product-detail-qna__status <?= $isComplete ? 'is-complete' : 'is-pending' ?>">
                            <?= htmlspecialchars($q['status']) ?>
                        </span>
                    </span>

                    <span class="product-detail-qna__meta flex">
                        <span class="product-detail-qna__author Body-XXXS3"><?= htmlspecialchars($q['author']) ?></span>
                        <time class="product-detail-qna__date Body-XXXS3" datetime="<?= htmlspecialchars($q['date']) ?>"><?= htmlspecialchars($q['date']) ?></time>
                    </span>
                </button>

                <!-- 문의 내용 및 관리자 답변 -->
                <div class="product-detail-qna__answer" data-qna-answer hidden>

                    <?php if ($isSecret && !$canShow): ?>

                        <!-- 비밀글 안내 -->
                        <div class="product-detail-qna__secret" data-qna-secret>
                            <p class="product-detail-qna__secret-message Body-XXXS3" id="qna-secret-message-<?= (int)$q['id'] ?>">비밀글입니다.<br>작성자와 관리자만 확인할 수 있습니다.</p>

                            <form class="product-detail-qna__secret-pw flex" action="" method="post" data-qna-secret-form>
                                <label class="displaynone" for="qna-secret-password-<?= (int)$q['id'] ?>">비밀글 비밀번호</label>
                                <input type="password" id="qna-secret-password-<?= (int)$q['id'] ?>" name="qna_password" placeholder="비밀번호 입력" autocomplete="current-password" aria-describedby="qna-secret-message-<?= (int)$q['id'] ?>" required>
                                <button type="submit" class="btnNormal sizeXS">확인</button>
                            </form>
                        </div>

                    <?php else: ?>

                        <!-- 문의 내용 -->
                        <div class="product-detail-qna__question">
                            <p><?= nl2br(htmlspecialchars($q['question'] ?? '')) ?></p>
                        </div>

                        <!-- 관리자 답변 -->
                        <?php if (!empty($q['answer'])): ?>
                            <div class="product-detail-qna__reply">
                                <p><?= nl2br(htmlspecialchars($q['answer'])) ?></p>

                                <?php if (!empty($q['answered_at'])): ?>
                                    <time class="product-detail-qna__reply-date"><?= htmlspecialchars($q['answered_at']) ?></time>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                    <?php endif; ?>

                </div>


            </article>
        <?php endforeach; ?>
    </div>

    <!-- 페이지네이션 -->
    <nav class="product-detail-pagination custom-pagination" aria-label="상품문의 페이지" data-pagination="qna">
        <button type="button" class="custom-pagination__prev" data-page-prev disabled aria-label="이전 페이지"><img src="/assets/icons/pagenation-left.svg" alt=""></button>

        <?php for ($i = 1; $i <= 2; $i++): ?>
            <button type="button" class="custom-pagination__number <?= $i === 1 ? 'is-active' : '' ?>" data-page="<?= $i ?>" <?= $i === 1 ? 'aria-current="page"' : '' ?>><?= $i ?></button>
        <?php endfor; ?>

        <button type="button" class="custom-pagination__next" data-page-next aria-label="다음 페이지"><img src="/assets/icons/pagenation-right.svg" alt=""></button>
    </nav>

</section>

/************************************
 * 메인 페이지 전용 스크립트
************************************/


/** 
 * 비주얼 슬라이드
*/

$(function () {
    const $visual = $('.visual-slide');

    if (!$visual.length) return;

    const $current = $visual.find('.visual-current');
    const $total = $visual.find('.visual-total');
    const $progress = $visual.find('.visual-progress span');

    const visualSwiper = new Swiper('.visual-slide', {
        loop: true,
        speed: 700,

        autoplay: {
            delay: 4000,
            disableOnInteraction: false
        },

        fadeEffect: {
            crossFade: true
        },

        on: {
            init: function () {
                $total.text(this.slides.length);
                $current.text(this.realIndex + 1);

                startProgress();
            },

            slideChange: function () {
                $current.text(this.realIndex + 1);
                startProgress();
            }
        }
    });

    function startProgress() {
        // 진행바 초기화
        $progress.css({
            transition: 'none',
            width: '0%'
        });

        // 브라우저가 width: 0 상태를 먼저 그리게 함
        requestAnimationFrame(function () {
            requestAnimationFrame(function () {
                $progress.css({
                    transition: 'width 4s linear',
                    width: '100%'
                });
            });
        });
    }
});


// 유튜브 제목 추출
$(function () {
    const $iframe = $('.youtube-area iframe');
    const $title = $('.youtube-title');

    if (!$iframe.length || !$title.length) return;

    const videoUrl = $iframe.attr('src');
    const videoId = videoUrl.match(/embed\/([^?]+)/)?.[1];

    if (!videoId) return;

    const youtubeUrl = 'https://www.youtube.com/watch?v=' + videoId;

    $.getJSON(
        'https://www.youtube.com/oembed?url=' +
        encodeURIComponent(youtubeUrl) +
        '&format=json',
        function (data) {
            if (data && data.title) {
                $title.text(data.title);
            }
        }
    );
});
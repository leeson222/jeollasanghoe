/**
 * 전 페이지 공통 스크립트
 * 모바일 전체 메뉴 등 공통 UI 동작을 관리합니다.
 */
document.addEventListener('DOMContentLoaded', function () {
    const menuButton = document.querySelector('[data-menu-toggle], .gnb__toggle');
    const menu = document.querySelector('[data-menu], #gnb-menu');

    if (!menuButton || !menu) return;

    menuButton.addEventListener('click', function () {
        const isOpen = menuButton.getAttribute('aria-expanded') === 'true';
        menuButton.setAttribute('aria-expanded', String(!isOpen));
        menu.classList.toggle('is-open', !isOpen);
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const animationElements = document.querySelectorAll('.fadeInUp, .fadeInLeft, .fadeInRight');

    if (!('IntersectionObserver' in window)) {
        animationElements.forEach(function (element) {
            element.classList.add('is-animated');
        });
        return;
    }

    const animationObserver = new IntersectionObserver(function (entries, observer) {
        entries.forEach(function (entry) {
            if (!entry.isIntersecting) return;
            entry.target.classList.add('is-animated');
            observer.unobserve(entry.target);
        });
    }, { threshold: 0.15 });

    animationElements.forEach(function (element) {
        animationObserver.observe(element);
    });
});


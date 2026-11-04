import './bootstrap';

const menuToggle = document.querySelector('.menu-toggle');
const sectionNavigation = document.getElementById('section-navigation');

if (menuToggle && sectionNavigation) {
    const closeNavigation = () => {
        menuToggle.setAttribute('aria-expanded', 'false');
        sectionNavigation.classList.remove('is-open');
    };

    menuToggle.addEventListener('click', () => {
        const isOpen = menuToggle.getAttribute('aria-expanded') === 'true';
        menuToggle.setAttribute('aria-expanded', String(!isOpen));
        sectionNavigation.classList.toggle('is-open', !isOpen);
    });

    sectionNavigation.addEventListener('click', (event) => {
        if (event.target instanceof HTMLAnchorElement) {
            closeNavigation();
        }
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && menuToggle.getAttribute('aria-expanded') === 'true') {
            closeNavigation();
            menuToggle.focus();
        }
    });
}

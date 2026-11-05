import './bootstrap';

const themeToggle = document.querySelector('.theme-toggle');
const themeIcon = document.querySelector('.theme-toggle__icon');

function applyTheme(theme) {
    document.documentElement.setAttribute('data-theme', theme);
    document.documentElement.setAttribute('data-bs-theme', theme);
    if (themeToggle) {
        themeToggle.setAttribute('aria-pressed', theme === 'dark' ? 'true' : 'false');
    }
    if (themeIcon) {
        themeIcon.textContent = theme === 'dark' ? '◑' : '◐';
    }
}

if (themeToggle) {
    themeToggle.addEventListener('click', () => {
        const current = document.documentElement.getAttribute('data-theme') === 'dark' ? 'dark' : 'light';
        const next = current === 'dark' ? 'light' : 'dark';
        try { localStorage.setItem('theme', next); } catch (e) {}
        applyTheme(next);
    });
}

applyTheme(document.documentElement.getAttribute('data-theme') || 'light');

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

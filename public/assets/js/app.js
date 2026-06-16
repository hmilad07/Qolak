const root = document.documentElement;
root.dataset.theme = localStorage.theme || 'light';

const body = document.body;
const menuButton = document.querySelector('#menu');
const sidebar = document.querySelector('#sidebar');

function setMenu(open) {
    body.classList.toggle('menu-open', open);
    menuButton?.setAttribute('aria-expanded', open ? 'true' : 'false');
    sidebar?.setAttribute('aria-hidden', open ? 'false' : 'true');
}

menuButton?.addEventListener('click', () => setMenu(!body.classList.contains('menu-open')));
document.querySelector('[data-close-menu]')?.addEventListener('click', () => setMenu(false));
document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') setMenu(false);
});
document.querySelectorAll('.nav a').forEach((link) => link.addEventListener('click', () => setMenu(false)));

document.querySelector('#theme')?.addEventListener('click', () => {
    localStorage.theme = root.dataset.theme = root.dataset.theme === 'dark' ? 'light' : 'dark';
});

document.querySelectorAll('form.ajax').forEach((form) => {
    form.addEventListener('submit', async (event) => {
        event.preventDefault();
        const messageBox = form.querySelector('.msg');
        if (messageBox) messageBox.textContent = 'در حال ارسال...';

        try {
            const response = await fetch(form.action, {
                method: form.method,
                body: new FormData(form),
                headers: {'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content},
            });
            const payload = await response.json();
            if (messageBox) messageBox.textContent = payload.message || JSON.stringify(payload.result || payload);
            if (payload.redirect) location.href = payload.redirect;
        } catch (error) {
            if (messageBox) messageBox.textContent = 'ارتباط با سرور برقرار نشد.';
        }
    });
});

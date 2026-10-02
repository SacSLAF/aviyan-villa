// Mobile navigation
const header = document.querySelector('.site-header');
const toggle = document.querySelector('.nav-toggle');
const nav = document.querySelector('.main-nav');

toggle.addEventListener('click', () => {
    const open = nav.classList.toggle('open');
    toggle.setAttribute('aria-expanded', open);
});
nav.querySelectorAll('a').forEach(link =>
    link.addEventListener('click', () => {
        nav.classList.remove('open');
        toggle.setAttribute('aria-expanded', 'false');
    })
);

// Solid header after scrolling past the hero
const onScroll = () => header.classList.toggle('scrolled', window.scrollY > 60);
window.addEventListener('scroll', onScroll, { passive: true });
onScroll();

// Fade-in on scroll
const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            observer.unobserve(entry.target);
        }
    });
}, { threshold: 0.15 });
document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

// Gallery lightbox
const lightbox = document.querySelector('.lightbox');
const lbImg = lightbox.querySelector('img');
const lbCaption = lightbox.querySelector('.lightbox-caption');

document.querySelectorAll('.gallery-item').forEach(item =>
    item.addEventListener('click', () => {
        lbImg.src = item.dataset.src;
        lbImg.alt = item.dataset.caption;
        lbCaption.textContent = item.dataset.caption;
        lightbox.hidden = false;
    })
);
const closeLightbox = () => { lightbox.hidden = true; lbImg.src = ''; };
lightbox.addEventListener('click', e => { if (e.target !== lbImg) closeLightbox(); });
document.addEventListener('keydown', e => { if (e.key === 'Escape') closeLightbox(); });

// Booking form: date limits, nights summary and validation
const form = document.querySelector('.booking-form');
const checkin = form.querySelector('#checkin');
const checkout = form.querySelector('#checkout');
const summary = form.querySelector('.form-summary');

const toISO = d => d.toISOString().slice(0, 10);
const today = new Date();
today.setMinutes(today.getMinutes() - today.getTimezoneOffset());
checkin.min = toISO(today);

function updateDates() {
    if (checkin.value) {
        const next = new Date(checkin.value);
        next.setDate(next.getDate() + 1);
        checkout.min = toISO(next);
        if (checkout.value && checkout.value <= checkin.value) checkout.value = '';
    }
    if (checkin.value && checkout.value) {
        const nights = Math.round((new Date(checkout.value) - new Date(checkin.value)) / 86400000);
        summary.textContent = `${nights} night${nights > 1 ? 's' : ''} selected`;
    } else {
        summary.textContent = '';
    }
}
checkin.addEventListener('change', updateDates);
checkout.addEventListener('change', updateDates);

form.addEventListener('submit', e => {
    let ok = true;
    form.querySelectorAll('[required]').forEach(field => {
        const invalid = !field.checkValidity();
        field.classList.toggle('invalid', invalid);
        if (invalid) ok = false;
    });
    if (!ok) {
        e.preventDefault();
        summary.textContent = 'Please fill in all required fields correctly.';
        form.querySelector('.invalid').focus();
    }
});

// After a booking is saved, open WhatsApp with the request pre-filled
const waConfirm = document.querySelector('.wa-confirm');
if (waConfirm) {
    waConfirm.scrollIntoView({ block: 'center' });
    setTimeout(() => { window.location.href = waConfirm.dataset.waLink; }, 1800);
}

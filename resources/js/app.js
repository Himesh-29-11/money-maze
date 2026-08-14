import 'bootstrap';
import '../css/app.css';

const money = new Intl.NumberFormat('en-IN', {
    style: 'currency',
    currency: 'INR',
    maximumFractionDigits: 0,
});

const number = (value) => {
    const parsed = Number.parseFloat(value);
    return Number.isFinite(parsed) ? parsed : 0;
};

const formatted = (value) => money.format(Math.max(0, Math.round(value || 0)));

const annuityDue = (payment, rate, years) => {
    if (years <= 0 || payment <= 0) return 0;
    if (Math.abs(rate) < 0.0000001) return payment * years;
    return payment * (1 + rate) * (1 - (1 / Math.pow(1 + rate, years))) / rate;
};

const setText = (id, value) => {
    const element = document.getElementById(id);
    if (element) element.textContent = value;
};

function initNavigation() {
    const button = document.querySelector('.nav-toggle');
    const navigation = document.querySelector('.primary-nav');
    if (!button || !navigation) return;
    button.addEventListener('click', () => {
        const isOpen = navigation.classList.toggle('is-open');
        button.setAttribute('aria-expanded', String(isOpen));
    });
    navigation.querySelectorAll('a').forEach((link) => link.addEventListener('click', () => {
        navigation.classList.remove('is-open');
        button.setAttribute('aria-expanded', 'false');
    }));
}

function initInsightFilters() {
    const chips = document.querySelectorAll('[data-filter]');
    const cards = document.querySelectorAll('.insi-card[data-topic]');
    const rows = [...document.querySelectorAll('.article-row[data-topic]')];
    const search = document.getElementById('article-search');
    const pager = document.getElementById('insi-pager');
    const empty = document.querySelector('.insi-empty');
    if (!chips.length) return;

    const active = new Set();
    const PAGE = 4;
    let page = 1;

    const matches = (el) => {
        const query = (search?.value || '').trim().toLowerCase();
        const okTopic = active.size === 0 || active.has(el.dataset.topic);
        const okQuery = !query || ((el.dataset.search || el.textContent.toLowerCase()).includes(query));
        return okTopic && okQuery;
    };

    const update = () => {
        cards.forEach((card) => card.classList.toggle('is-hidden', !matches(card)));
        const visible = rows.filter(matches);
        const pages = Math.max(1, Math.ceil(visible.length / PAGE));
        if (page > pages) page = pages;
        rows.forEach((row) => row.classList.add('is-hidden'));
        visible.slice((page - 1) * PAGE, page * PAGE).forEach((row) => row.classList.remove('is-hidden'));
        empty?.classList.toggle('is-hidden', visible.length > 0);
        if (pager) {
            pager.innerHTML = '';
            for (let i = 1; i <= pages; i += 1) {
                const button = document.createElement('button');
                button.type = 'button';
                button.textContent = i;
                if (i === page) button.classList.add('is-active');
                button.addEventListener('click', () => { page = i; update(); });
                pager.appendChild(button);
            }
            if (pages > 1) {
                const next = document.createElement('button');
                next.type = 'button';
                next.className = 'insi-next';
                next.textContent = 'Next →';
                next.addEventListener('click', () => { page = page < pages ? page + 1 : 1; update(); });
                pager.appendChild(next);
            }
        }
    };

    chips.forEach((chip) => chip.addEventListener('click', () => {
        const filter = chip.dataset.filter;
        if (active.has(filter)) active.delete(filter); else active.add(filter);
        chip.classList.toggle('is-selected', active.has(filter));
        page = 1;
        update();
    }));
    search?.addEventListener('input', () => { page = 1; update(); });
    update();
}

function initCalculator() {
    const shell = document.querySelector('[data-calculator]');
    if (!shell) return;
    const type = shell.dataset.calculator;

    if (type === 'sip') initSip();
    if (type === 'life-insurance') initLifeInsurance();
    if (type === 'retirement') initRetirement();
    if (type === 'swp') initSwp();
}

function initSip() {
    const form = document.getElementById('sip-form');
    const tabs = document.querySelectorAll('[data-sip-mode]');
    let mode = 'percent';
    const fixed = document.querySelectorAll('.fixed-only');
    const percent = document.querySelectorAll('.percent-only');

    const updateMode = () => {
        fixed.forEach((element) => element.classList.toggle('is-hidden', mode !== 'fixed'));
        percent.forEach((element) => element.classList.toggle('is-hidden', mode !== 'percent'));
    };
    tabs.forEach((tab) => tab.addEventListener('click', () => {
        mode = tab.dataset.sipMode;
        tabs.forEach((item) => item.classList.toggle('is-active', item === tab));
        updateMode();
        calculate();
    }));

    const calculate = () => {
        const monthly = number(document.getElementById('sip-monthly')?.value);
        const sipYears = Math.max(0, Math.floor(number(document.getElementById('sip-years')?.value)));
        const growthYears = Math.max(0, Math.floor(number(document.getElementById('sip-growth-years')?.value)));
        const postYears = Math.max(0, Math.floor(number(document.getElementById('sip-post-years')?.value)));
        const returnRate = number(document.getElementById('sip-return')?.value) / 100;
        const percentGrowth = number(document.getElementById('sip-growth-percent')?.value) / 100;
        const fixedGrowth = number(document.getElementById('sip-growth-fixed')?.value);
        const totalMonths = (sipYears + postYears) * 12;
        const monthlyReturn = Math.pow(1 + returnRate, 1 / 12) - 1;
        let corpus = 0;
        let invested = 0;
        for (let month = 0; month < totalMonths; month += 1) {
            const yearIndex = Math.floor(month / 12);
            let contribution = 0;
            if (month < sipYears * 12) {
                contribution = mode === 'percent'
                    ? monthly * Math.pow(1 + percentGrowth, Math.min(yearIndex, growthYears))
                    : monthly + (fixedGrowth * Math.min(yearIndex, growthYears));
                invested += contribution;
            }
            corpus = (corpus + contribution) * (1 + monthlyReturn);
        }
        setText('sip-duration', `${sipYears + postYears} years`);
        setText('sip-invested', formatted(invested));
        setText('sip-corpus', formatted(corpus));
        const bars = document.querySelectorAll('#sip-chart span');
        bars.forEach((bar, index) => {
            const height = 24 + Math.min(72, ((index + 1) / bars.length) * 72 + (corpus > invested ? 5 : 0));
            bar.style.height = `${height}%`;
        });
    };

    form?.addEventListener('submit', (event) => { event.preventDefault(); calculate(); });
    form?.addEventListener('reset', () => setTimeout(calculate, 0));
    updateMode();
    calculate();
}

function initLifeInsurance() {
    const form = document.getElementById('life-form');
    if (!form) return;
    const value = (id) => number(document.getElementById(id)?.value);
    const calculate = () => {
        const liabilities = ['home', 'vehicle', 'personal', 'education', 'other-liability'].reduce((sum, id) => sum + value(`life-${id}`), 0);
        const goals = ['higher', 'school', 'parents', 'other-goal'].reduce((sum, id) => sum + value(`life-${id}`), 0);
        const expenses = (value('life-household') + value('life-lifestyle')) * (1 - value('life-reduction') / 100);
        const years = Math.max(0, value('life-years'));
        const inflation = value('life-inflation') / 100;
        const returnRate = value('life-return') / 100;
        const realRate = ((1 + returnRate) / (1 + inflation)) - 1;
        const corpus = annuityDue(expenses, realRate, years);
        const resources = ['existing-insurance', 'assets', 'spouse'].reduce((sum, id) => sum + value(`life-${id}`), 0);
        const required = liabilities + goals + corpus;
        const additional = Math.max(0, required - resources);
        setText('life-liabilities', formatted(liabilities));
        setText('life-goals', formatted(goals));
        setText('life-corpus', formatted(corpus));
        setText('life-required', formatted(required));
        setText('life-resources', `− ${formatted(resources)}`);
        setText('life-additional', formatted(additional));
    };
    form.addEventListener('submit', (event) => { event.preventDefault(); calculate(); });
    form.addEventListener('reset', () => setTimeout(calculate, 0));
    calculate();
}

function initRetirement() {
    const form = document.getElementById('retirement-form');
    if (!form) return;
    const value = (id) => number(document.getElementById(id)?.value);
    const calculate = () => {
        const currentExpenses = value('ret-household') + value('ret-lifestyle') + value('ret-other');
        const currentAge = value('ret-current-age');
        const retirementAge = Math.max(currentAge, value('ret-retirement-age'));
        const yearsToRetirement = Math.max(0, retirementAge - currentAge);
        const inflation = value('ret-inflation') / 100;
        const drop = value('ret-drop') / 100;
        const annualAtRetirement = currentExpenses * Math.pow(1 + inflation, yearsToRetirement) * (1 - drop);
        const postYears = Math.max(0, value('ret-life-age') - retirementAge);
        const tax = value('ret-tax') / 100;
        const returnRate = value('ret-return') / 100;
        const realRate = ((1 + (returnRate * (1 - tax))) / (1 + value('ret-ret-inflation') / 100)) - 1;
        const corpus = annuityDue(annualAtRetirement, realRate, postYears);
        setText('ret-years', `${yearsToRetirement} years`);
        setText('ret-annual', formatted(annualAtRetirement));
        setText('ret-post-years', `${postYears} years`);
        setText('ret-corpus', formatted(corpus));
    };
    form.addEventListener('submit', (event) => { event.preventDefault(); calculate(); });
    form.addEventListener('reset', () => setTimeout(calculate, 0));
    calculate();
}

function initSwp() {
    const form = document.getElementById('swp-form');
    if (!form) return;
    const value = (id) => number(document.getElementById(id)?.value);
    const calculate = () => {
        let corpus = value('swp-corpus');
        let withdrawal = value('swp-monthly');
        const monthlyReturn = Math.pow(1 + value('swp-return') / 100, 1 / 12) - 1;
        const inflation = value('swp-inflation') / 100;
        const months = Math.max(0, Math.floor(value('swp-years') * 12));
        let totalWithdrawal = 0;
        let monthsFunded = 0;
        for (let month = 0; month < months && corpus > 0; month += 1) {
            if (month > 0 && month % 12 === 0) withdrawal *= 1 + inflation;
            const actualWithdrawal = Math.min(withdrawal, corpus);
            corpus = Math.max(0, (corpus - actualWithdrawal) * (1 + monthlyReturn));
            totalWithdrawal += actualWithdrawal;
            monthsFunded += 1;
        }
        const duration = monthsFunded / 12;
        setText('swp-duration', `${duration.toFixed(1)} years`);
        setText('swp-withdrawal', formatted(totalWithdrawal));
        setText('swp-closing', formatted(corpus));
        setText('swp-status', monthsFunded >= months ? 'Corpus remains' : 'Corpus exhausted');
    };
    form.addEventListener('submit', (event) => { event.preventDefault(); calculate(); });
    form.addEventListener('reset', () => setTimeout(calculate, 0));
    calculate();
}

function initLightbox() {
    const triggers = document.querySelectorAll('[data-lightbox]');
    if (!triggers.length) return;

    const box = document.createElement('div');
    box.id = 'mm-lightbox';
    box.className = 'mm-lightbox is-hidden';
    box.innerHTML = '<div class="mm-lightbox-backdrop"></div><figure class="mm-lightbox-frame"><button class="mm-lightbox-close" aria-label="Close">×</button><button class="mm-lightbox-prev" aria-label="Previous">‹</button><img alt=""><button class="mm-lightbox-next" aria-label="Next">›</button><figcaption class="mm-lightbox-caption"></figcaption></figure>';
    document.body.appendChild(box);

    const img = box.querySelector('img');
    const caption = box.querySelector('figcaption');
    let list = [];
    let index = 0;

    const show = () => {
        const el = list[index];
        img.src = el.getAttribute('src');
        img.alt = el.getAttribute('alt') || '';
        caption.textContent = `${index + 1} / ${list.length} — ${el.getAttribute('alt') || ''}`;
    };
    const open = (el) => {
        list = [...document.querySelectorAll(`[data-lightbox][data-group="${el.dataset.group}"]`)];
        index = list.indexOf(el);
        show();
        box.classList.remove('is-hidden');
        document.body.style.overflow = 'hidden';
    };
    const close = () => {
        box.classList.add('is-hidden');
        document.body.style.overflow = '';
    };

    document.addEventListener('click', (event) => {
        const trigger = event.target.closest('[data-lightbox]');
        if (trigger) { event.preventDefault(); open(trigger); return; }
        if (event.target.closest('.mm-lightbox-close') || event.target.classList.contains('mm-lightbox-backdrop')) { close(); return; }
        if (event.target.closest('.mm-lightbox-prev')) { index = (index - 1 + list.length) % list.length; show(); return; }
        if (event.target.closest('.mm-lightbox-next')) { index = (index + 1) % list.length; show(); }
    });
    document.addEventListener('keydown', (event) => {
        if (box.classList.contains('is-hidden')) return;
        if (event.key === 'Escape') close();
        if (event.key === 'ArrowLeft') { index = (index - 1 + list.length) % list.length; show(); }
        if (event.key === 'ArrowRight') { index = (index + 1) % list.length; show(); }
    });
}

const bookData = {
    b1: {
        title: 'Planning in Your 40s', sub: 'Building Strength for the Future', img: '/assets/crops/books2-s1.jpg',
        toc: ['Why your 40s are the pivot decade', 'Taking stock: income, expenses and what’s left', 'Setting goals that fit your real life', 'Building the retirement corpus engine', 'Balancing children’s goals with your own', 'Insurance and protection check-up', 'Your 10-year action plan'],
        excerpt: '“The 40s are where retirement stops being an abstract idea and becomes a plan. The decisions of this decade — how much you save, what you protect and what you ignore — quietly decide how your 60s will feel.”',
    },
    b2: {
        title: 'Retirement Income That Lasts', sub: 'From Corpus to Cash Flow', img: '/assets/crops/books2-s2.jpg',
        toc: ['Thinking in cash flow, not corpus', 'Estimating your real retirement expenses', 'Inflation: the quiet risk', 'Income buckets: liquidity, stability, growth', 'Withdrawal strategies and safe rates', 'Buffering health shocks', 'Making money last as long as you do'],
        excerpt: '“A corpus is only a number until it becomes income. The real question of retirement is not what you accumulate — it is whether what you built can pay you, reliably, for as long as you need it to.”',
    },
    b3: {
        title: 'Purpose, Identity & Well-being', sub: 'The Non-Financial Side of Retirement', img: '/assets/crops/books2-s3.jpg',
        toc: ['Retirement is a life transition, not a financial event', 'Identity after work: who are you now?', 'Rebuilding routine and rhythm', 'Relationships, family and changing roles', 'Health, energy and emotional well-being', 'Purpose, contribution and legacy', 'Designing your ideal week'],
        excerpt: '“Many people prepare for the money side of retirement and nobody prepares them for the morning side — the quiet weekdays, the shifted identity, the search for meaning. This chapter is about that morning.”',
    },
};

function initBookModal() {
    if (!document.querySelector('[data-book]')) return;
    const modal = document.createElement('div');
    modal.id = 'mm-book-modal';
    modal.className = 'mm-book-modal is-hidden';
    modal.innerHTML = '<div class="mm-bm-backdrop"></div><div class="mm-bm-frame"><button class="mm-lightbox-close" aria-label="Close">×</button><div class="mm-bm-grid"><div class="mm-bm-cover"><img alt=""></div><div class="mm-bm-body"><p class="bok-eyebrow">BOOK PREVIEW</p><h3></h3><p class="mm-bm-sub"></p><p class="mm-bm-label">Inside this book</p><ol class="mm-bm-toc"></ol><p class="mm-bm-excerpt"></p><div class="mm-bm-actions"><a class="svch-btn-solid" href="/contact">Get the Book</a><button type="button" class="svch-btn-outline mm-bm-close2">Close</button></div></div></div></div>';
    document.body.appendChild(modal);

    const open = (id) => {
        const book = Object.assign({}, bookData[id], (window.MM_BOOKS || {})[id]);
        if (!book) return;
        modal.querySelector('img').src = book.img;
        modal.querySelector('img').alt = book.title;
        modal.querySelector('h3').textContent = book.title;
        modal.querySelector('.mm-bm-sub').textContent = book.sub;
        modal.querySelector('.mm-bm-toc').innerHTML = book.toc.map((t) => `<li>${t}</li>`).join('');
        modal.querySelector('.mm-bm-excerpt').textContent = book.excerpt;
        modal.classList.remove('is-hidden');
        document.body.style.overflow = 'hidden';
    };
    const close = () => {
        modal.classList.add('is-hidden');
        document.body.style.overflow = '';
    };

    document.addEventListener('click', (event) => {
        const trigger = event.target.closest('[data-book]');
        if (trigger) { open(trigger.dataset.book); return; }
        if (event.target.closest('.mm-lightbox-close') || event.target.closest('.mm-bm-close2') || event.target.classList.contains('mm-bm-backdrop')) close();
    });
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && !modal.classList.contains('is-hidden')) close();
    });
}

function initArchiveTools() {
    const rows = [...document.querySelectorAll('.article-row[data-topic]')];
    const cards = [...document.querySelectorAll('.insi-card[data-topic]')];
    const search = document.getElementById('article-search');
    const selTopic = document.getElementById('insi-filter-topic');
    const selPub = document.getElementById('insi-filter-pub');
    const selYear = document.getElementById('insi-filter-year');
    const selSort = document.getElementById('insi-sort');
    if (!rows.length && !cards.length) return;
    const matches = (el) => {
        const q = (search?.value || '').toLowerCase();
        const okT = !selTopic?.value || (el.dataset.topic || '').includes(selTopic.value.toLowerCase());
        const okPub = !selPub?.value || el.dataset.pub === selPub.value;
        const okY = !selYear?.value || (el.dataset.date || '').startsWith(selYear.value);
        const okQ = !q || ((el.dataset.search || el.textContent.toLowerCase()).includes(q));
        return okT && okPub && okY && okQ;
    };
    const apply = () => {
        [...rows, ...cards].forEach((el) => el.classList.toggle('is-hidden', !matches(el)));
    };
    search?.addEventListener('input', apply);
    [selTopic, selPub, selYear].forEach((x) => x?.addEventListener('change', apply));
    selSort?.addEventListener('change', () => {
        const dir = selSort.value === 'asc' ? 1 : -1;
        const parent = rows[0]?.parentElement;
        if (parent) [...rows].sort((a, b) => (a.dataset.date || '').localeCompare(b.dataset.date || '') * dir).forEach((r) => parent.appendChild(r));
        apply();
    });
    apply();
}
document.addEventListener('DOMContentLoaded', () => {
    initNavigation();
    initInsightFilters();
    initCalculator();
    initLightbox();
    initBookModal();
    initArchiveTools();
});

export { annuityDue, formatted };

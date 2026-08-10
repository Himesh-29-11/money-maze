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
    const cards = document.querySelectorAll('.article-card[data-topic], .featured-insight-card[data-topic]');
    const rows = document.querySelectorAll('.article-row[data-topic], .table-body-row[data-topic]');
    const search = document.getElementById('article-search');
    if (!chips.length) return;

    let activeFilter = 'all';
    const update = () => {
        const query = (search?.value || '').trim().toLowerCase();
        [...cards, ...rows].forEach((item) => {
            const topic = item.dataset.topic || '';
            const text = item.dataset.search || item.textContent.toLowerCase();
            const visible = (activeFilter === 'all' || topic.includes(activeFilter)) && (!query || text.includes(query));
            item.classList.toggle('is-hidden', !visible);
        });
    };

    chips.forEach((chip) => chip.addEventListener('click', () => {
        activeFilter = chip.dataset.filter || 'all';
        chips.forEach((item) => item.classList.toggle('is-selected', item === chip));
        update();
    }));
    search?.addEventListener('input', update);
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

document.addEventListener('DOMContentLoaded', () => {
    initNavigation();
    initInsightFilters();
    initCalculator();
});

export { annuityDue, formatted };

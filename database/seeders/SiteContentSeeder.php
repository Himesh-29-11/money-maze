<?php

namespace Database\Seeders;

use App\Models\SiteContent;
use Illuminate\Database\Seeder;

class SiteContentSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            // ---------------- HOME ----------------
            ['home', 'Hero', 'eyebrow', 'Eyebrow line', 'text', 'Personal finance, investments, taxation and financial organisation — brought together under one roof.', 1],
            ['home', 'Hero', 'title', 'Headline', 'text', 'I’m Mitali Mehta, a Certified Financial Planner, Chartered Accountant and Lawyer based in Ahmedabad.', 2],
            ['home', 'Hero', 'byline', 'Byline', 'text', 'I’m Mitali Mehta, a Certified Financial Planner, Chartered Accountant and Lawyer based in Ahmedabad.', 3],
            ['home', 'Hero', 'lead', 'Intro paragraph', 'textarea', 'Through Money Maze, I work with individuals, professionals and families on investment execution, taxation, financial organisation and the practical matters that come with managing money well.', 4],
            ['home', 'Hero', 'regulatory', 'Regulatory note', 'textarea', 'Mitali Mehta is a SEBI-registered Mutual Fund Distributor. Mutual fund investments are subject to market risks; please read all scheme-related documents carefully before investing.', 5],
            ['home', 'Service Pillars', 'pillar1_title', 'Pillar 1 title', 'text', '1. INVESTMENT SOLUTIONS', 1],
            ['home', 'Service Pillars', 'pillar1_text', 'Pillar 1 text', 'textarea', 'Access to a range of investment solutions including mutual funds, fixed deposits, bonds, NCDs, GIFT City products and select opportunities, depending on client requirements and suitability.', 2],
            ['home', 'Service Pillars', 'pillar2_title', 'Pillar 2 title', 'text', '2. TAX PLANNING & COMPLIANCE', 3],
            ['home', 'Service Pillars', 'pillar2_text', 'Pillar 2 text', 'textarea', 'Support with income tax returns, tax planning, GST registrations and GST return filings to keep your financial affairs organised, compliant and tax-efficient.', 4],
            ['home', 'Service Pillars', 'pillar3_title', 'Pillar 3 title', 'text', '3. FINANCIAL ORGANISATION & PROFESSIONAL SUPPORT', 5],
            ['home', 'Service Pillars', 'pillar3_text', 'Pillar 3 text', 'textarea', 'Practical support for salaried individuals and self-employed professionals across financial records, cash flow review, tax-ready documentation and better financial clarity.', 6],
            ['home', 'Why Work With Me', 'why_title', 'Section title', 'text', 'WHY WORK WITH ME?', 1],
            ['home', 'Credentials', 'credentials_title', 'Section title', 'text', 'PROFESSIONAL CREDENTIALS', 1],
            ['home', 'Highlights', 'insights_title', 'Insights card title', 'text', 'INSIGHTS & ARTICLES', 1],
            ['home', 'Highlights', 'insights_text', 'Insights card text', 'textarea', 'Thoughtful articles and practical insights on personal finance, taxation and investments.', 2],
            ['home', 'Highlights', 'featured_title', 'Featured-in card title', 'text', 'FEATURED IN', 3],
            ['home', 'Highlights', 'featured_text', 'Featured-in card text', 'textarea', 'Seen in leading publications and platforms.', 4],
            ['home', 'Highlights', 'clients_title', 'Testimonials card title', 'text', 'WHAT CLIENTS SAY', 5],
            ['home', 'Closing CTA', 'cta_title', 'CTA heading', 'text', 'Looking to get your finances better organised?', 1],
            ['home', 'Closing CTA', 'cta_text', 'CTA text', 'textarea', 'Explore the services on offer, or get in touch directly with what you need.', 2],

            ['home', 'Hero', 'about_link', 'About-link line', 'text', 'Curious about the path that led here?', 6],
            ['home', 'Hero', 'btn_services', 'Button 1 label', 'text', 'Explore Services', 7],
            ['home', 'Hero', 'btn_about', 'Button 2 label', 'text', 'About Me', 8],
            ['home', 'Hero', 'btn_contact', 'Button 3 label', 'text', 'Get in Touch', 9],
            ['home', 'What I Do', 'whatido_title', 'Section title', 'text', 'WHAT I DO', 1],
            ['home', 'Who I Work With', 'who_title', 'Section title', 'text', 'WHO I WORK WITH', 1],
            ['home', 'Who I Work With', 'who_text', 'Section text', 'textarea', 'My work is built primarily around individuals, salaried professionals, self-employed professionals and families — and is growing to serve small business owners who need dependable support with tax, compliance and broader financial matters.', 2],
            // ---------------- ABOUT ----------------
            ['about', 'Hero', 'title', 'Heading', 'text', 'About', 1],
            ['about', 'Hero', 'name', 'Name line', 'text', 'Mitali Mehta', 2],
            ['about', 'My Professional Journey', 'journey_title', 'Section title', 'text', 'My Professional Journey', 1],
            ['about', 'My Professional Journey', 'journey_p1', 'Paragraph 1', 'textarea', 'My background spans three disciplines that shape how I work today: finance, taxation and law.', 2],
            ['about', 'My Professional Journey', 'journey_p2', 'Paragraph 2', 'textarea', 'As a Chartered Accountant, I bring a strong grounding in taxation, compliance and documentation. As a Certified Financial Planner, I bring structured, long-term thinking to personal finance and investing. My legal training adds a third lens — useful in situations where documentation, interpretation and financial decisions intersect.', 3],
            ['about', 'My Professional Journey', 'journey_p3', 'Paragraph 3', 'textarea', 'Over time these strands have come together naturally, letting me look at a client’s financial needs more holistically rather than one requirement at a time.', 4],
            ['about', 'Work Today', 'today_title', 'Section title', 'text', 'What My Work Looks Like Today', 1],
            ['about', 'Work Today', 'today_p1', 'Paragraph 1', 'textarea', 'Today, my work spans investment execution, tax and compliance support, financial organisation and personal finance content across writing, speaking and educational formats.', 2],
            ['about', 'Work Today', 'today_p2', 'Paragraph 2', 'textarea', 'This mix keeps the work connected to real questions, rather than narrowing it to one type of service or to one type of client.', 3],
            ['about', 'Professional Background', 'background_title', 'Section title', 'text', 'Professional Background', 1],
            ['about', 'Professional Background', 'background_note', 'Closing note', 'textarea', 'Each of these has shaped the way I look at financial matters — not as isolated tasks, but as interconnected decisions involving investments, taxes, structure, regulation and long-term priorities.', 2],
            ['about', 'Why It Matters', 'why_title', 'Section title', 'text', 'Why This Work Matters to Me', 1],
            ['about', 'Why It Matters', 'why_p1', 'Paragraph 1', 'textarea', 'Money decisions often cluster around moments of change — a first job, a growing family, retirement, a new business, or simply the realisation that one’s finances have become more scattered than they would like.', 2],
            ['about', 'Why It Matters', 'why_p2', 'Paragraph 2', 'textarea', 'What draws me to this work isn’t only the technical side of finance, but the part it plays in helping people feel more prepared and more in control of decisions that genuinely affect their lives.', 3],
            ['about', 'Writing Media Authorship', 'writing_title', 'Section title', 'text', 'Writing, Media & Authorship', 1],
            ['about', 'Writing Media Authorship', 'writing_p1', 'Paragraph 1', 'textarea', 'I also write on personal finance for publications, appear across television and other media platforms, and am the author of The Second Half of Zindagi!, a book on retirement planning.', 2],
            ['about', 'Writing Media Authorship', 'writing_p2', 'Paragraph 2 (HTML links allowed)', 'textarea', 'You can find more on <a href="/insights">Insights</a>, <a href="/media-features">Media &amp; Features</a> and <a href="/books">Books</a>.', 3],
            ['about', 'Closing Note', 'closing_title', 'Section title', 'text', 'Closing Note', 1],
            ['about', 'Closing Note', 'closing_p1', 'Paragraph 1', 'textarea', 'At the core, this is work about making finance more usable — whether the need is investment-related, tax-related, documentation-heavy, retirement-focused or educational.', 2],
            ['about', 'Closing Note', 'closing_p2', 'Paragraph 2', 'textarea', 'I see financial work as something that should leave people more aware, more prepared and more confident in their decisions.', 3],
            ['about', 'Closing Note', 'btn_services', 'Button 1 label', 'text', 'Explore Services', 4],
            ['about', 'Closing Note', 'btn_contact', 'Button 2 label', 'text', 'Get in Touch', 5],
// ---------------- SERVICES ----------------
            ['services', 'Hero', 'title', 'Headline', 'textarea', 'A practical approach to investments, taxation and financial organisation.', 1],
            ['services', 'Hero', 'lead', 'Paragraph 1', 'textarea', 'At Money Maze, I offer services across investment solutions, taxation and compliance, and financial organisation support for individuals and professionals.', 2],
            ['services', 'Hero', 'lead2', 'Paragraph 2', 'textarea', 'The aim is to make important financial matters easier to manage — whether that involves investing, tax filings, GST-related work, or keeping financial records and information in better order.', 3],
            ['services', 'Pillars', 'pillar1_text', 'Investment Solutions text', 'textarea', 'Access to a range of investment avenues across mutual funds and other financial products, based on individual requirements and preferences.', 1],
            ['services', 'Pillars', 'pillar2_text', 'Taxation & Compliance text', 'textarea', 'Practical support with tax-related responsibilities and compliance requirements, with a focus on keeping the process smooth, timely and easier to manage.', 2],
            ['services', 'Pillars', 'pillar3_text', 'Financial Organisation text', 'textarea', 'Support with financial records, account-related information and key financial data so that filings, reporting and ongoing financial matters are handled with greater ease and continuity.', 3],
            ['services', 'How I Work', 'how_title', 'Section title', 'text', 'How I Work', 1],
            ['services', 'Who I Work With', 'who_title', 'Section title', 'text', 'Who I Work With', 1],
            ['services', 'Closing CTA', 'cta_title', 'CTA heading', 'text', 'Need support with investments, taxation, compliance or the practical side of managing your finances?', 1],
            ['services', 'Closing CTA', 'cta_text', 'CTA text', 'textarea', '', 2],
            ['services', 'Regulatory', 'regulatory', 'Regulatory strip', 'textarea', 'Mitali Mehta is a SEBI-registered Mutual Fund Distributor. Mutual fund investments are subject to market risks; please read all scheme-related documents carefully before investing.', 1],

            // ---------------- INSIGHTS ----------------
            ['insights', 'Hero', 'lead', 'Lead paragraph', 'textarea', 'Articles, explainers and educational content on personal finance, retirement, taxation and related topics.', 1],
            ['insights', 'Hero', 'body', 'Intro paragraph', 'textarea', 'This page brings together my written work — articles, columns and educational pieces created to make financial ideas easier to understand and more relevant to everyday life.', 2],
            ['insights', 'Closing CTA', 'cta_title', 'CTA heading', 'text', 'Prefer to watch or listen instead?', 1],
            ['insights', 'Closing CTA', 'cta_text', 'CTA text', 'textarea', 'For interviews, television appearances, podcasts and other media features, head to Media & Features.', 2],
            ['insights', 'What Youll Find Here', 'find_title', 'Section title', 'text', 'WHAT YOU’LL FIND HERE', 3],
            ['insights', 'What Youll Find Here', 'find_p1', 'Paragraph 1', 'textarea', 'My writing spans retirement planning, investing, taxation, borrowing, insurance, cash flow, financial habits and long-term money decisions.', 4],
            ['insights', 'What Youll Find Here', 'find_p2', 'Paragraph 2', 'textarea', 'Some pieces are written for newspapers and publications; others appear here in a website-friendly format for easier reading. This page is meant to be a single home for that written work.', 5],
            ['insights', 'What Youll Find Here', 'find_p3', 'Paragraph 3', 'textarea', 'My articles and columns regularly appear in publications such as Mumbai Samachar, Capital World and Business Guardian.', 6],
            ['insights', 'Topics', 'topics_title', 'Section title', 'text', 'TOPICS I WRITE ABOUT', 7],
            ['insights', 'Closing CTA', 'btn_browse', 'Button 1 label', 'text', 'Browse Articles', 8],
            ['insights', 'Closing CTA', 'btn_featured', 'Button 2 label', 'text', 'Read Featured Pieces', 9],
            ['insights', 'Closing CTA', 'btn_media', 'Button 3 label', 'text', 'Explore Media & Features', 10],
            ['insights', 'Closing CTA', 'btn_contact', 'Button 4 label', 'text', 'Get in Touch', 11],

            ['insights', 'Hero', 'btn_browse', 'Button 1 label', 'text', 'Browse Articles', 3],
            ['insights', 'Hero', 'btn_featured', 'Button 2 label', 'text', 'Read Featured Pieces', 4],
            ['insights', 'What Youll Find', 'find_title', 'Section title', 'text', 'WHAT YOU’LL FIND HERE', 1],
            ['insights', 'What Youll Find', 'find_p1', 'Paragraph 1', 'textarea', 'My writing spans retirement planning, investing, taxation, borrowing, insurance, cash flow, financial habits and long-term money decisions.', 2],
            ['insights', 'What Youll Find', 'find_p2', 'Paragraph 2', 'textarea', 'Some pieces are written for newspapers and publications; others appear here in a website-friendly format for easier reading. This page is meant to be a single home for that written work.', 3],
            ['insights', 'What Youll Find', 'find_p3', 'Paragraph 3 (HTML allowed)', 'textarea', 'My articles and columns regularly appear in publications such as <strong>Mumbai Samachar, Capital World and Business Guardian.</strong>', 4],
            ['insights', 'Topics', 'topics_title', 'Section title', 'text', 'TOPICS I WRITE ABOUT', 1],
            ['insights', 'Closing CTA', 'cta_title', 'CTA heading', 'text', 'Prefer to watch or listen instead?', 1],
            ['insights', 'Closing CTA', 'cta_text', 'CTA text', 'textarea', 'For interviews, television appearances, podcasts and other media features, head to Media & Features.', 2],
            // ---------------- MEDIA ----------------
            ['media', 'Hero', 'lead', 'Lead paragraph', 'textarea', 'Television interviews, video series, podcasts and media appearances across personal finance, retirement, taxation and investing.', 1],
            ['media', 'Hero', 'body', 'Intro paragraph', 'textarea', 'This section brings together my television interviews, educational video content, podcasts and selected media features across personal finance, retirement planning, taxation, investing and related financial topics. It is a space for conversations, appearances and educational formats that go beyond written articles.', 2],
            ['media', 'Closing CTA', 'cta_title', 'CTA heading', 'text', 'Looking for my written work?', 1],
            ['media', 'Closing CTA', 'cta_text', 'CTA text', 'textarea', 'Head to Insights for articles, columns and educational pieces.', 2],

            // ---------------- BOOKS ----------------
            ['books', 'Hero', 'lead', 'Lead paragraph', 'textarea', 'Long-form financial writing designed to make retirement planning more practical, relatable and easier to navigate.', 1],
            ['books', 'Hero', 'body', 'Intro paragraph', 'textarea', 'This page brings together my long-form writing in personal finance and retirement planning, beginning with my first book — The Second Half of Zindagi! The book reflects the same philosophy that shapes my work across articles, media and client conversations: making financial decisions easier to understand, more grounded in real life, and more meaningful over the long term.', 2],
            ['books', 'Featured Book', 'featured_title', 'Featured title', 'text', 'The Second Half of Zindagi!', 1],
            ['books', 'Featured Book', 'featured_subtitle', 'Featured subtitle', 'text', 'Your Guide to Financial Freedom, Purpose & Well-being in Your Retirement', 2],
            ['books', 'Closing CTA', 'cta_title', 'CTA heading', 'text', 'Explore the second half with greater clarity', 1],
            ['books', 'Closing CTA', 'cta_text', 'CTA text', 'textarea', 'If retirement planning has felt overwhelming, technical or difficult to begin, The Second Half of Zindagi! is designed to make the subject more approachable — one idea, one decision and one chapter at a time.', 2],

            // ---------------- RESOURCES ----------------
            ['resources', 'Hero', 'lead', 'Lead paragraph', 'textarea', 'Calculators, checklists and practical tools to review, estimate and organise key parts of your financial life.', 1],
            ['resources', 'Hero', 'body', 'Intro paragraph', 'textarea', 'A growing set of financial tools designed to make everyday decisions easier — whether you’re estimating a retirement corpus, reviewing insurance needs or keeping track of financial documents.', 2],
            ['resources', 'QR Companion', 'qr_intro', 'Section intro', 'textarea', 'This section is designed as a practical companion to The Second Half of Zindagi!. Use these tools to apply the ideas from the book and strengthen your planning.', 1],
            ['resources', 'Note', 'note_p1', 'Paragraph 1', 'textarea', 'These calculators, worksheets and checklists are designed to make financial concepts easier to understand and easier to apply. They can help you organise financial information, test assumptions and approach financial questions with more structure.', 1],
            ['resources', 'Note', 'note_p2', 'Paragraph 2', 'textarea', 'At the same time, every financial situation comes with its own context, constraints and trade-offs. Calculator outputs depend on the assumptions used, and real-life decisions often involve factors that no tool can fully capture—such as changing income patterns, taxation, family responsibilities, risk tolerance, liquidity needs and future uncertainty.', 2],
            ['resources', 'Note', 'note_bold', 'Bold closing line', 'text', 'Use these resources as a practical starting point for clarity and preparation.', 3],
            ['resources', 'Closing CTA', 'cta_title', 'CTA heading', 'text', '5. NEED HELP PUTTING THE NUMBERS IN CONTEXT?', 1],
            ['resources', 'Closing CTA', 'cta_text', 'CTA text', 'textarea', 'If a calculator has raised new questions, a worksheet has highlighted gaps you want to address, or you’d like to approach your finances in a more organised way, I’m here to help.', 2],

            ['resources', 'What You Will Find', 'find_title', 'Section title', 'text', 'WHAT YOU WILL FIND HERE', 1],
            ['resources', 'What You Will Find', 'find_p1', 'Section text', 'textarea', 'Some tools here help you calculate or estimate numbers. Others help you review information, organise records or work through financial tasks more methodically.', 2],
            ['resources', 'Closing CTA', 'cta_articles', 'Articles line', 'text', 'Looking for articles too? Visit Insights for more on financial topics.', 3],
            // ---------------- TESTIMONIALS ----------------
            ['testimonials', 'Hero', 'title', 'Headline', 'textarea', 'What it is like to work together — in clients’ own words.', 1],
            ['testimonials', 'Hero', 'lead', 'Intro paragraph', 'textarea', 'Working with money is rarely just a transaction. It often involves ongoing decisions, sensitive questions and the need for someone dependable on the other side.', 2],

            // ---------------- CONTACT ----------------
            ['contact', 'Office', 'office', 'Office location', 'text', 'Ahmedabad, Gujarat, India', 1],
            ['contact', 'Hero', 'title', 'Headline', 'textarea', 'Get in touch about investments, taxation, financial organisation, media enquiries or other professional matters.', 3],
            ['contact', 'Closing', 'closing', 'Closing note', 'textarea', 'Thank you for visiting. If your query relates to the work I do, I’ll do my best to respond as soon as possible.', 1],
            ['contact', 'Closing', 'btn_services', 'Button 1 label', 'text', 'Explore Services', 2],
            ['contact', 'Closing', 'btn_insights', 'Button 2 label', 'text', 'Read Insights', 3],
            ['contact', 'Hero', 'lead', 'Intro paragraph', 'textarea', 'Whether you are reaching out for a service-related query, a writing or a media request, or a general professional enquiry, you can use the form below or the contact details on this page.', 2],

            // ---------------- SETTINGS ----------------
            ['settings', 'Contact & Social', 'email', 'Contact email', 'text', 'hello@moneymaze.in', 1],
            ['settings', 'Contact & Social', 'whatsapp', 'WhatsApp link', 'text', 'https://wa.me/919000000000', 2],
            ['settings', 'Contact & Social', 'linkedin', 'LinkedIn URL', 'text', 'https://www.linkedin.com/', 3],
            ['settings', 'Contact & Social', 'youtube', 'YouTube URL', 'text', 'https://www.youtube.com/', 4],
            ['settings', 'Contact & Social', 'phone', 'Phone number', 'text', '', 6],
            ['settings', 'Contact & Social', 'footer_tagline', 'Footer tagline', 'text', 'Clarity today. Freedom tomorrow.', 5],
        ];


        foreach ($rows as [$page, $section, $key, $label, $type, $value, $sort]) {
            SiteContent::query()->updateOrCreate(
                ['page' => $page, 'key' => $key],
                ['section' => $section, 'label' => $label, 'type' => $type, 'value' => $value, 'sort' => $sort]
            );
        }
    }
}

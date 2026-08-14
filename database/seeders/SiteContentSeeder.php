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
            ['home', 'Hero', 'eyebrow', 'Eyebrow line', 'text', 'CLARITY. STRUCTURE. CONFIDENCE.', 1],
            ['home', 'Hero', 'title', 'Headline', 'text', 'Navigate Life’s Financial Decisions with Confidence.', 2],
            ['home', 'Hero', 'byline', 'Byline', 'text', 'I’m Mitali Mehta, a Certified Financial Planner, Chartered Accountant and Lawyer based in Ahmedabad.', 3],
            ['home', 'Hero', 'lead', 'Intro paragraph', 'textarea', 'Personal finance, investments, taxation and financial organisation — brought together under one roof. Through Money Maze, I work with individuals, professionals and families on investment execution, taxation, financial organisation and the practical matters that come with managing money well.', 4],
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
            ['home', 'What I Do', 'whatido_title', 'Section title', 'text', 'WHAT I DO', 1],
            ['home', 'Who I Work With', 'who_title', 'Section title', 'text', 'WHO I WORK WITH', 1],
            ['home', 'Who I Work With', 'who_text', 'Section text', 'textarea', 'My work is built primarily around individuals, salaried professionals, self-employed professionals and families — and is growing to serve small business owners who need dependable support with tax, compliance and broader financial matters.', 2],
            // ---------------- ABOUT ----------------
            ['about', 'Hero', 'title', 'Page title', 'text', 'About Mitali', 1],
            ['about', 'Hero', 'lead', 'Intro paragraph', 'textarea', 'Chartered Accountant, CFP professional, and founder of Money Maze — a practice built around thoughtful financial solutions, tax support and organised financial decision-making for individuals and professionals.', 2],
            ['about', 'A Little About Me', 'little_p1', 'Paragraph 1', 'textarea', 'I am a finance professional with a background across personal finance, taxation and financial organisation, and the founder of Money Maze.', 1],
            ['about', 'A Little About Me', 'little_p2', 'Paragraph 2', 'textarea', 'Over the years, I have come to value one thing deeply: most people do not need more noise around money — they need more structure, more context and a more organised way of looking at their finances.', 2],
            ['about', 'A Little About Me', 'little_p3', 'Paragraph 3', 'textarea', 'My work today brings together multiple parts of an individual’s financial life — from investment solutions and tax-related support to financial organisation and practical money conversations — with the aim of making the overall process feel more structured, more thoughtful and easier to navigate.', 3],
            ['about', 'Why Money Maze', 'maze_lead', 'Lead line', 'textarea', 'Because for many people, money can genuinely feel like a maze.', 1],
            ['about', 'Why Money Maze', 'maze_p2', 'Paragraph 2', 'textarea', 'There is often too much information, too many opinions, too many products, too many moving parts — and not enough clarity on what deserves attention, what can wait, and how different financial pieces fit together.', 2],
            ['about', 'Why Money Maze', 'maze_p3', 'Paragraph 3', 'textarea', 'Money Maze was built around the idea of making that journey feel more organised and less intimidating.', 3],
            ['about', 'Professional Background', 'background_note', 'Closing note', 'textarea', 'Each of these has shaped the way I look at financial matters — not as isolated tasks, but as interconnected decisions involving investments, taxes, structure, regulation and long-term priorities.', 1],
            ['about', 'Current Capacity', 'capacity_p1', 'Line 1', 'textarea', 'I am a SEBI-registered Mutual Fund Distributor (MFD).', 1],
            ['about', 'Current Capacity', 'capacity_p2', 'Paragraph 2', 'textarea', 'My work includes facilitating access to mutual fund solutions and supporting clients with broader financial organisation, tax planning and related financial matters in a practical and structured manner.', 2],
            ['about', 'Approach & Values', 'approach_lead', 'Approach lead', 'textarea', 'I believe financial work is rarely one-dimensional.', 1],
            ['about', 'Approach & Values', 'matters_p1', 'What matters paragraph', 'textarea', 'One of the things I value most about this profession is the opportunity to be part of meaningful financial journeys — whether that involves putting structure around finances, handling important compliance work, or simply being a steady point of contact in an area that often feels overwhelming.', 2],

            // ---------------- SERVICES ----------------
            ['services', 'Hero', 'title', 'Headline', 'textarea', 'A practical approach to investments, taxation and financial organisation.', 1],
            ['services', 'Hero', 'lead', 'Paragraph 1', 'textarea', 'At Money Maze, I offer services across investment solutions, taxation and compliance, and financial organisation support for individuals and professionals.', 2],
            ['services', 'Hero', 'lead2', 'Paragraph 2', 'textarea', 'The aim is to make important financial matters easier to manage — whether that involves investing, tax filings, GST-related work, or keeping financial records and information in better order.', 3],
            ['services', 'Pillars', 'pillar1_text', 'Investment Solutions text', 'textarea', 'Access to a range of investment avenues across mutual funds and other financial products, based on individual requirements and preferences.', 1],
            ['services', 'Pillars', 'pillar2_text', 'Taxation & Compliance text', 'textarea', 'Practical support with tax-related responsibilities and compliance requirements, with a focus on keeping the process smooth, timely and easier to manage.', 2],
            ['services', 'Pillars', 'pillar3_text', 'Financial Organisation text', 'textarea', 'Support with financial records, account-related information and key financial data so that filings, reporting and ongoing financial matters are handled with greater ease and continuity.', 3],
            ['services', 'How I Work', 'how_title', 'Section title', 'text', 'How I Work', 1],
            ['services', 'Who I Work With', 'who_title', 'Section title', 'text', 'Who I Work With', 1],
            ['services', 'Closing CTA', 'cta_title', 'CTA heading', 'text', 'Looking for support with investments, taxation or financial organisation?', 1],
            ['services', 'Closing CTA', 'cta_text', 'CTA text', 'textarea', 'If you’d like to understand whether my services may be relevant for your requirements, feel free to get in touch.', 2],
            ['services', 'Regulatory', 'regulatory', 'Regulatory strip', 'textarea', 'Mutual fund-related services are offered in my capacity as a SEBI-registered Mutual Fund Distributor (MFD). Other professional services are offered separately in the course of my practice.', 1],

            // ---------------- INSIGHTS ----------------
            ['insights', 'Hero', 'lead', 'Lead paragraph', 'textarea', 'Articles, columns and financial perspectives across investing, taxation, retirement and personal finance.', 1],
            ['insights', 'Hero', 'body', 'Intro paragraph', 'textarea', 'This section brings together my written work across personal finance, retirement, taxation, investing, IPOs and related financial topics. It includes published newspaper articles, practical financial explainers and English originals of Gujarati-language pieces, all organised in one place for readers who want to explore financial ideas in greater depth.', 2],
            ['insights', 'Closing CTA', 'cta_title', 'CTA heading', 'text', 'Explore financial ideas, one topic at a time.', 1],
            ['insights', 'Closing CTA', 'cta_text', 'CTA text', 'textarea', 'Whether you are looking for a practical tax explainer, a retirement perspective, an investing concept or a piece on personal finance, this section is designed to make that journey easier to navigate.', 2],

            // ---------------- MEDIA ----------------
            ['media', 'Hero', 'lead', 'Lead paragraph', 'textarea', 'Television interviews, video series, podcasts and media appearances across personal finance, retirement, taxation and investing.', 1],
            ['media', 'Hero', 'body', 'Intro paragraph', 'textarea', 'This section brings together my television interviews, educational video content, podcasts and selected media features across personal finance, retirement planning, taxation, investing and related financial topics. It is a space for conversations, appearances and educational formats that go beyond written articles.', 2],
            ['media', 'Closing CTA', 'cta_title', 'CTA heading', 'text', 'Explore the conversations behind the work', 1],
            ['media', 'Closing CTA', 'cta_text', 'CTA text', 'textarea', 'From articles and interviews to short educational videos and podcasts, each format offers a different way to engage with financial ideas.', 2],

            // ---------------- BOOKS ----------------
            ['books', 'Hero', 'lead', 'Lead paragraph', 'textarea', 'Long-form financial writing designed to make retirement planning more practical, relatable and easier to navigate.', 1],
            ['books', 'Hero', 'body', 'Intro paragraph', 'textarea', 'This page brings together my long-form writing in personal finance and retirement planning, beginning with my first book — The Second Half of Zindagi! The book reflects the same philosophy that shapes my work across articles, media and client conversations: making financial decisions easier to understand, more grounded in real life, and more meaningful over the long term.', 2],
            ['books', 'Featured Book', 'featured_title', 'Featured title', 'text', 'The Second Half of Zindagi!', 1],
            ['books', 'Featured Book', 'featured_subtitle', 'Featured subtitle', 'text', 'Your Guide to Financial Freedom, Purpose & Well-being in Your Retirement', 2],
            ['books', 'Closing CTA', 'cta_title', 'CTA heading', 'text', 'Explore the second half with greater clarity', 1],
            ['books', 'Closing CTA', 'cta_text', 'CTA text', 'textarea', 'If retirement planning has felt overwhelming, technical or difficult to begin, The Second Half of Zindagi! is designed to make the subject more approachable — one idea, one decision and one chapter at a time.', 2],

            // ---------------- RESOURCES ----------------
            ['resources', 'Hero', 'lead', 'Lead paragraph', 'textarea', 'Practical tools, worksheets and financial calculators designed to help you turn ideas into action.', 1],
            ['resources', 'Hero', 'body', 'Intro paragraph', 'textarea', 'Whether you are planning for retirement, reviewing your cash flow, working through a chapter of The Second Half of Zindagi! or simply trying to organise your finances better, this page brings together practical tools that can help you move from concept to clarity.', 2],
            ['resources', 'QR Companion', 'qr_intro', 'Section intro', 'textarea', 'This section is designed as a practical companion to The Second Half of Zindagi!. Use these tools to apply the ideas from the book and strengthen your planning.', 1],
            ['resources', 'Note', 'note_p1', 'Paragraph 1', 'textarea', 'These calculators, worksheets and checklists are designed to make financial concepts easier to understand and easier to apply. They can help you organise financial information, test assumptions and approach financial questions with more structure.', 1],
            ['resources', 'Note', 'note_p2', 'Paragraph 2', 'textarea', 'At the same time, every financial situation comes with its own context, constraints and trade-offs. Calculator outputs depend on the assumptions used, and real-life decisions often involve factors that no tool can fully capture—such as changing income patterns, taxation, family responsibilities, risk tolerance, liquidity needs and future uncertainty.', 2],
            ['resources', 'Note', 'note_bold', 'Bold closing line', 'text', 'Use these resources as a practical starting point for clarity and preparation.', 3],
            ['resources', 'Closing CTA', 'cta_title', 'CTA heading', 'text', '5. NEED HELP PUTTING THE NUMBERS IN CONTEXT?', 1],
            ['resources', 'Closing CTA', 'cta_text', 'CTA text', 'textarea', 'If a calculator has raised new questions, a worksheet has highlighted gaps you want to address, or you’d like to approach your finances in a more organised way, I’m here to help.', 2],

            // ---------------- TESTIMONIALS ----------------
            ['testimonials', 'Hero', 'title', 'Headline', 'textarea', 'What it is like to work together — in clients’ own words.', 1],
            ['testimonials', 'Hero', 'lead', 'Intro paragraph', 'textarea', 'Working with money is rarely just a transaction. It often involves ongoing decisions, sensitive questions and the need for someone dependable on the other side.', 2],

            // ---------------- CONTACT ----------------
            ['contact', 'Office', 'office', 'Office location', 'text', 'Ahmedabad, Gujarat, India', 1],
            ['contact', 'Hero', 'lead', 'Intro paragraph', 'textarea', 'Whether you are reaching out for a service-related query, a writing or a media request, or a general professional enquiry, you can use the form below or the contact details on this page.', 2],

            // ---------------- SETTINGS ----------------
            ['settings', 'Contact & Social', 'email', 'Contact email', 'text', 'hello@moneymaze.in', 1],
            ['settings', 'Contact & Social', 'whatsapp', 'WhatsApp link', 'text', 'https://wa.me/919000000000', 2],
            ['settings', 'Contact & Social', 'linkedin', 'LinkedIn URL', 'text', 'https://www.linkedin.com/', 3],
            ['settings', 'Contact & Social', 'youtube', 'YouTube URL', 'text', 'https://www.youtube.com/', 4],
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

<?php

namespace Database\Seeders;

use App\Models\SiteContent;
use Illuminate\Database\Seeder;

class SiteContentSeeder extends Seeder
{
    public function run(): void
    {
        // Rows are listed in the same order the sections appear on each page
        // of the website (top to bottom), and fields inside each section are
        // listed in display order.
        $rows = [
            // ---------------- HOME ----------------
            ['home', 'Hero', 'eyebrow', 'Eyebrow line', 'text', 'Personal finance, investments, taxation and financial organisation — brought together under one roof.', 1],
            ['home', 'Hero', 'title', 'Headline', 'text', 'I’m Mitali Mehta, a Certified Financial Planner, Chartered Accountant and Lawyer based in Ahmedabad.', 2],
            ['home', 'Hero', 'byline', 'Byline', 'text', 'I’m Mitali Mehta, a Certified Financial Planner, Chartered Accountant and Lawyer based in Ahmedabad.', 3],
            ['home', 'Hero', 'lead', 'Intro paragraph', 'textarea', 'Through Money Maze, I work with individuals, professionals and families on investment execution, taxation, financial organisation and the practical matters that come with managing money well.', 4],
            ['home', 'Hero', 'about_link', 'About-link line', 'text', 'Curious about the path that led here?', 5],
            ['home', 'Hero', 'btn_services', 'Button 1 label', 'text', 'Explore Services', 6],
            ['home', 'Hero', 'btn_about', 'Button 2 label', 'text', 'About Me', 7],
            ['home', 'Hero', 'btn_contact', 'Button 3 label', 'text', 'Get in Touch', 8],
            ['home', 'Hero', 'regulatory', 'Regulatory note', 'textarea', 'Mitali Mehta is a SEBI-registered Mutual Fund Distributor. Mutual fund investments are subject to market risks; please read all scheme-related documents carefully before investing.', 9],
            ['home', 'Hero', 'hero_image', 'Profile photo', 'image', 'assets/mitali-profile-black.png', 10],
            ['home', 'What I Do', 'whatido_title', 'Section title', 'text', 'WHAT I DO', 1],
            ['home', 'What I Do', 'role1_title', 'Card 1 title', 'text', 'Financial Professional', 2],
            ['home', 'What I Do', 'role1_text', 'Card 1 text', 'textarea', 'Investment execution, taxation and financial organisation.', 3],
            ['home', 'What I Do', 'role1_link', 'Card 1 link label', 'text', 'See Services', 4],
            ['home', 'What I Do', 'role2_title', 'Card 2 title', 'text', 'Writer', 5],
            ['home', 'What I Do', 'role2_text', 'Card 2 text', 'textarea', 'Articles and educational content on personal finance.', 6],
            ['home', 'What I Do', 'role2_link', 'Card 2 link label', 'text', 'See Insights', 7],
            ['home', 'What I Do', 'role3_title', 'Card 3 title', 'text', 'Author', 8],
            ['home', 'What I Do', 'role3_text', 'Card 3 text', 'textarea', 'The Second Half of Zindagi!, a retirement planning book.', 9],
            ['home', 'What I Do', 'role3_link', 'Card 3 link label', 'text', 'See Books', 10],
            ['home', 'What I Do', 'role4_title', 'Card 4 title', 'text', 'Educator', 11],
            ['home', 'What I Do', 'role4_text', 'Card 4 text', 'textarea', 'Television appearances, interviews and financial awareness initiatives.', 12],
            ['home', 'What I Do', 'role4_link', 'Card 4 link label', 'text', 'See Media & Features', 13],
            ['home', 'Who I Work With', 'who_title', 'Section title', 'text', 'WHO I WORK WITH', 1],
            ['home', 'Who I Work With', 'who_text', 'Section text', 'textarea', 'My work is built primarily around individuals, salaried professionals, self-employed professionals and families — and is growing to serve small business owners who need dependable support with tax, compliance and broader financial matters.', 2],
            ['home', 'Why Work With Me', 'why_title', 'Section title', 'text', 'WHY WORK WITH ME?', 1],
            ['home', 'Credentials', 'credentials_title', 'Section title', 'text', 'PROFESSIONAL CREDENTIALS', 1],
            ['home', 'Highlights', 'insights_title', 'Insights card title', 'text', 'INSIGHTS & ARTICLES', 1],
            ['home', 'Highlights', 'insights_text', 'Insights card text', 'textarea', 'Thoughtful articles and practical insights on personal finance, taxation and investments.', 2],
            ['home', 'Highlights', 'featured_title', 'Featured-in card title', 'text', 'FEATURED IN', 3],
            ['home', 'Highlights', 'featured_text', 'Featured-in card text', 'textarea', 'Seen in leading publications and platforms.', 4],
            ['home', 'Highlights', 'clients_title', 'Testimonials card title', 'text', 'WHAT CLIENTS SAY', 5],
            ['home', 'Highlights', 'insights_img1', 'Insights & Articles image', 'image', 'assets/crops/insights-1.jpg', 6],
            ['home', 'Highlights', 'insights_img2', 'Featured In image', 'image', 'assets/crops/insights-2.jpg', 7],
            ['home', 'Highlights', 'insights_img3', 'Testimonials image', 'image', 'assets/crops/insights-3.jpg', 8],
            ['home', 'Closing CTA', 'cta_title', 'CTA heading', 'text', 'Looking to get your finances better organised?', 1],
            ['home', 'Closing CTA', 'cta_text', 'CTA text', 'textarea', 'Explore the services on offer, or get in touch directly with what you need.', 2],

            // ---------------- ABOUT ----------------
            ['about', 'Hero', 'title', 'Heading', 'text', 'About', 1],
            ['about', 'Hero', 'name', 'Name line', 'text', 'Mitali Mehta', 2],
            ['about', 'Hero', 'hero_image', 'Main photo', 'image', 'assets/crops/about-hero.jpg', 3],
            ['about', 'Hero', 'side_image', 'Side photo (plant & books)', 'image', 'assets/crops/about-little.jpg', 4],
            ['about', 'My Professional Journey', 'journey_title', 'Section title', 'text', 'My Professional Journey', 1],
            ['about', 'My Professional Journey', 'journey_p1', 'Paragraph 1', 'textarea', 'My background spans three disciplines that shape how I work today: finance, taxation and law.', 2],
            ['about', 'My Professional Journey', 'journey_p2', 'Paragraph 2', 'textarea', 'As a Chartered Accountant, I bring a strong grounding in taxation, compliance and documentation. As a Certified Financial Planner, I bring structured, long-term thinking to personal finance and investing. My legal training adds a third lens — useful in situations where documentation, interpretation and financial decisions intersect.', 3],
            ['about', 'My Professional Journey', 'journey_p3', 'Paragraph 3', 'textarea', 'Over time these strands have come together naturally, letting me look at a client’s financial needs more holistically rather than one requirement at a time.', 4],
            ['about', 'My Professional Journey', 'maze_image', 'Maze photo', 'image', 'assets/crops/about-maze.jpg', 5],
            ['about', 'Work Today', 'today_title', 'Section title', 'text', 'What My Work Looks Like Today', 1],
            ['about', 'Work Today', 'today_p1', 'Paragraph 1', 'textarea', 'Today, my work spans investment execution, tax and compliance support, financial organisation and personal finance content across writing, speaking and educational formats.', 2],
            ['about', 'Work Today', 'today_p2', 'Paragraph 2', 'textarea', 'This mix keeps the work connected to real questions, rather than narrowing it to one type of service or to one type of client.', 3],
            ['about', 'Work Today', 'sprout_image', 'Sprout photo', 'image', 'assets/crops/about-sprout.jpg', 4],
            ['about', 'Professional Background', 'background_title', 'Section title', 'text', 'Professional Background', 1],
            ['about', 'Professional Background', 'background_note', 'Closing note', 'textarea', 'Each of these has shaped the way I look at financial matters — not as isolated tasks, but as interconnected decisions involving investments, taxes, structure, regulation and long-term priorities.', 2],
            ['about', 'Why It Matters', 'why_title', 'Section title', 'text', 'Why This Work Matters to Me', 1],
            ['about', 'Why It Matters', 'why_p1', 'Paragraph 1', 'textarea', 'Money decisions often cluster around moments of change — a first job, a growing family, retirement, a new business, or simply the realisation that one’s finances have become more scattered than they would like.', 2],
            ['about', 'Why It Matters', 'why_p2', 'Paragraph 2', 'textarea', 'What draws me to this work isn’t only the technical side of finance, but the part it plays in helping people feel more prepared and more in control of decisions that genuinely affect their lives.', 3],
            ['about', 'Why It Matters', 'compass_image', 'Compass photo', 'image', 'assets/crops/about-compass.jpg', 4],
            ['about', 'Writing Media Authorship', 'writing_title', 'Section title', 'text', 'Writing, Media & Authorship', 1],
            ['about', 'Writing Media Authorship', 'writing_p1', 'Paragraph 1', 'textarea', 'I also write on personal finance for publications, appear across television and other media platforms, and am the author of The Second Half of Zindagi!, a book on retirement planning.', 2],
            ['about', 'Writing Media Authorship', 'writing_p2', 'Paragraph 2', 'textarea', 'You can find more on Insights, Media & Features and Books.', 3],
            ['about', 'Closing Note', 'closing_title', 'Section title', 'text', 'Closing Note', 1],
            ['about', 'Closing Note', 'closing_p1', 'Paragraph 1', 'textarea', 'At the core, this is work about making finance more usable — whether the need is investment-related, tax-related, documentation-heavy, retirement-focused or educational.', 2],
            ['about', 'Closing Note', 'closing_p2', 'Paragraph 2', 'textarea', 'I see financial work as something that should leave people more aware, more prepared and more confident in their decisions.', 3],
            ['about', 'Closing Note', 'btn_services', 'Button 1 label', 'text', 'Explore Services', 4],
            ['about', 'Closing Note', 'btn_contact', 'Button 2 label', 'text', 'Get in Touch', 5],

            // ---------------- SERVICES ----------------
            ['services', 'Hero', 'title', 'Headline', 'textarea', 'A practical approach to investments, taxation and financial organisation.', 1],
            ['services', 'Hero', 'lead', 'Paragraph 1', 'textarea', 'At Money Maze, I offer services across investment solutions, taxation and compliance, and financial organisation support for individuals and professionals.', 2],
            ['services', 'Hero', 'lead2', 'Paragraph 2', 'textarea', 'The aim is to make important financial matters easier to manage — whether that involves investing, tax filings, GST-related work, or keeping financial records and information in better order.', 3],
            ['services', 'Hero', 'hero_image', 'Hero image', 'image', 'assets/crops/services-hero.jpg', 4],
            ['services', 'Pillars', 'pillar1_text', 'Investment Solutions text', 'textarea', 'Access to a range of investment avenues across mutual funds and other financial products, based on individual requirements and preferences.', 1],
            ['services', 'Pillars', 'pillar1_image', 'Investment Solutions image', 'image', 'assets/crops/services-1.jpg', 2],
            ['services', 'Pillars', 'pillar2_text', 'Taxation & Compliance text', 'textarea', 'Practical support with tax-related responsibilities and compliance requirements, with a focus on keeping the process smooth, timely and easier to manage.', 3],
            ['services', 'Pillars', 'pillar2_image', 'Taxation & Compliance image', 'image', 'assets/crops/services-2.jpg', 4],
            ['services', 'Pillars', 'pillar3_text', 'Financial Organisation text', 'textarea', 'Support with financial records, account-related information and key financial data so that filings, reporting and ongoing financial matters are handled with greater ease and continuity.', 5],
            ['services', 'Pillars', 'pillar3_image', 'Financial Organisation image', 'image', 'assets/crops/services-3.jpg', 6],
            ['services', 'How I Work', 'how_title', 'Section title', 'text', 'How I Work', 1],
            ['services', 'Who I Work With', 'who_title', 'Section title', 'text', 'Who I Work With', 1],
            ['services', 'Closing CTA', 'cta_title', 'CTA heading', 'text', 'Need support with investments, taxation, compliance or the practical side of managing your finances?', 1],
            ['services', 'Closing CTA', 'cta_text', 'CTA text', 'textarea', '', 2],
            ['services', 'Regulatory', 'regulatory', 'Regulatory strip', 'textarea', 'Mitali Mehta is a SEBI-registered Mutual Fund Distributor. Mutual fund investments are subject to market risks; please read all scheme-related documents carefully before investing.', 1],

            // ---------------- INSIGHTS ----------------
            ['insights', 'Hero', 'lead', 'Lead paragraph', 'textarea', 'Articles, explainers and educational content on personal finance, retirement, taxation and related topics.', 1],
            ['insights', 'Hero', 'body', 'Intro paragraph', 'textarea', 'This page brings together my written work — articles, columns and educational pieces created to make financial ideas easier to understand and more relevant to everyday life.', 2],
            ['insights', 'Hero', 'btn_browse', 'Button 1 label', 'text', 'Browse Articles', 3],
            ['insights', 'Hero', 'btn_featured', 'Button 2 label', 'text', 'Read Featured Pieces', 4],
            ['insights', 'Hero', 'hero_image', 'Hero image', 'image', 'assets/crops/insights2-hero.jpg', 5],
            ['insights', 'What Youll Find', 'find_title', 'Section title', 'text', 'WHAT YOU’LL FIND HERE', 1],
            ['insights', 'What Youll Find', 'find_p1', 'Paragraph 1', 'textarea', 'My writing spans retirement planning, investing, taxation, borrowing, insurance, cash flow, financial habits and long-term money decisions.', 2],
            ['insights', 'What Youll Find', 'find_p2', 'Paragraph 2', 'textarea', 'Some pieces are written for newspapers and publications; others appear here in a website-friendly format for easier reading. This page is meant to be a single home for that written work.', 3],
            ['insights', 'What Youll Find', 'find_p3', 'Paragraph 3', 'textarea', 'My articles and columns regularly appear in publications such as Mumbai Samachar, Capital World and Business Guardian.', 4],
            ['insights', 'Topics', 'topics_title', 'Section title', 'text', 'TOPICS I WRITE ABOUT', 1],
            ['insights', 'Topics', 'topics_list', 'Topics list (one topic per line)', 'textarea', "- Retirement planning and retirement preparedness\n- Investing and long-term wealth creation\n- Tax planning and income tax-related topics\n- Insurance, borrowing and other everyday financial decisions\n- Personal finance concepts explained in simple, practical terms", 2],
            ['insights', 'Closing CTA', 'cta_title', 'CTA heading', 'text', 'Prefer to watch or listen instead?', 1],
            ['insights', 'Closing CTA', 'cta_text', 'CTA text', 'textarea', 'For interviews, television appearances, podcasts and other media features, head to Media & Features.', 2],
            ['insights', 'Closing CTA', 'btn_media', 'Button 1 label', 'text', 'Explore Media & Features', 3],
            ['insights', 'Closing CTA', 'btn_contact', 'Button 2 label', 'text', 'Get in Touch', 4],

            // ---------------- MEDIA ----------------
            ['media', 'Hero', 'lead', 'Lead paragraph', 'textarea', 'Television interviews, video series, podcasts and media appearances across personal finance, retirement, taxation and investing.', 1],
            ['media', 'Hero', 'body', 'Intro paragraph', 'textarea', 'This section brings together my television interviews, educational video content, podcasts and selected media features across personal finance, retirement planning, taxation, investing and related financial topics. It is a space for conversations, appearances and educational formats that go beyond written articles.', 2],
            ['media', 'Hero', 'hero_image', 'Hero image', 'image', 'assets/crops/media2-hero.jpg', 3],
            ['media', 'Appearances', 'appearances_title', 'Appearances title', 'text', 'Media Appearances', 1],
            ['media', 'Appearances', 'appearances', 'Appearances body', 'textarea', "My work has also extended into interviews, television segments and platform conversations — covering financial education, retirement planning, investing and current financial topics.\n\nThis page is the home for those appearances across video, audio, and interview formats.", 2],
            ['media', 'Closing CTA', 'cta_title', 'CTA heading', 'text', 'Looking for my written work?', 1],
            ['media', 'Closing CTA', 'cta_text', 'CTA text', 'textarea', 'Head to Insights for articles, columns and educational pieces.', 2],

            // ---------------- BOOKS ----------------
            ['books', 'Hero', 'lead', 'Lead paragraph', 'textarea', 'Long-form financial writing designed to make retirement planning more practical, relatable and easier to navigate.', 1],
            ['books', 'Hero', 'body', 'Intro paragraph', 'textarea', 'This page brings together my long-form writing in personal finance and retirement planning, beginning with my first book — The Second Half of Zindagi! The book reflects the same philosophy that shapes my work across articles, media and client conversations: making financial decisions easier to understand, more grounded in real life, and more meaningful over the long term.', 2],
            ['books', 'Hero', 'hero_image', 'Hero photo', 'image', 'assets/crops/books2-hero.jpg', 3],
            ['books', 'Featured Book', 'featured_title', 'Featured title', 'text', 'The Second Half of Zindagi!', 1],
            ['books', 'Featured Book', 'featured_subtitle', 'Featured subtitle', 'text', 'Your Guide to Financial Freedom, Purpose & Well-being in Your Retirement', 2],
            ['books', 'Featured Book', 'feat_p1', 'Paragraph 1', 'textarea', 'Retirement is often reduced to a number — a corpus target, a calculator output, or a rough estimate of “how much is enough.” But the reality is far more layered than that.', 3],
            ['books', 'Featured Book', 'feat_p2', 'Paragraph 2', 'textarea', 'The Second Half of Zindagi! is a practical and relatable guide to retirement planning that looks beyond formulas and asks the deeper questions retirement really brings with it — financial independence, cash flow, healthcare, longevity, lifestyle, purpose, family dynamics and the emotional shift from earning to living off accumulated wealth.', 4],
            ['books', 'Featured Book', 'feat_p3', 'Paragraph 3', 'textarea', 'Written in an accessible, story-led style, the book combines financial planning with real-life retirement realities to help readers approach this phase of life with greater clarity, confidence and perspective.', 5],
            ['books', 'Featured Book', 'buy_link', 'Buy the Book — link (URL)', 'text', '', 6],
            ['books', 'Featured Book', 'sample_link', 'Read Sample Chapter — link (URL)', 'text', '', 7],
            ['books', 'What the Book Covers', 'cover1_title', 'Card 1 title', 'text', 'Building the Financial Foundation', 1],
            ['books', 'What the Book Covers', 'cover1_text', 'Card 1 text', 'textarea', 'Retirement readiness, setting realistic expectations and beginning with the right groundwork.', 2],
            ['books', 'What the Book Covers', 'cover2_title', 'Card 2 title', 'text', 'Designing Your Ideal Retirement', 3],
            ['books', 'What the Book Covers', 'cover2_text', 'Card 2 text', 'textarea', 'Looking beyond numbers to think about lifestyle, purpose, priorities and what you want the second half of life to look like.', 4],
            ['books', 'What the Book Covers', 'cover3_title', 'Card 3 title', 'text', 'Protection First', 5],
            ['books', 'What the Book Covers', 'cover3_text', 'Card 3 text', 'textarea', 'Health insurance, emergency reserves, debt, risk management and the safeguards retirement planning cannot ignore.', 6],
            ['books', 'What the Book Covers', 'cover4_title', 'Card 4 title', 'text', 'Age-wise Planning', 7],
            ['books', 'What the Book Covers', 'cover4_text', 'Card 4 text', 'textarea', 'What retirement planning looks like in your 20s, 30s, 40s, 50s and 60s — and how priorities shift with time and responsibilities.', 8],
            ['books', 'What the Book Covers', 'cover5_title', 'Card 5 title', 'text', 'When Things Don’t Go According to Plan', 9],
            ['books', 'What the Book Covers', 'cover5_text', 'Card 5 text', 'textarea', 'Late starts, shortfalls, setbacks, unexpected disruptions and the adjustments needed when life moves off-script.', 10],
            ['books', 'What the Book Covers', 'cover6_title', 'Card 6 title', 'text', 'Special Retirement Realities', 11],
            ['books', 'What the Book Covers', 'cover6_text', 'Card 6 text', 'textarea', 'Retirement planning for women, changing family structures, emotional transitions and other realities that don’t fit neatly into a spreadsheet.', 12],
            ['books', 'What the Book Covers', 'cover7_title', 'Card 7 title', 'text', 'Legacy and Life Beyond Money', 13],
            ['books', 'What the Book Covers', 'cover7_text', 'Card 7 text', 'textarea', 'Estate planning, financial organisation and thinking about purpose, fulfilment and impact in the second half of life.', 14],
            ['books', 'Why & Covers', 'why_p1', 'Paragraph 1', 'textarea', 'For many people, retirement is seen only through the lens of investments. But retirement is a life transition shaped by health, inflation, family responsibilities, changing routines, emotional identity, lifestyle choices, financial uncertainty and the question of what life is meant to look like once work is no longer at the centre of it.', 1],
            ['books', 'Why & Covers', 'why_p2', 'Paragraph 2', 'textarea', 'I wrote The Second Half of Zindagi! to make retirement planning more holistic, practical and human — a guide that helps people think through the money side of retirement as well as the real-life decisions and adjustments that come with it.', 2],
            ['books', 'Why & Covers', 'notes_image', 'Sticky notes photo', 'image', 'assets/crops/books2-notes.jpg', 3],
            ['books', 'Why & Covers', 'stack_image', 'Book stack photo', 'image', 'assets/crops/books2-stack.jpg', 4],
            ['books', 'Closing CTA', 'cta_title', 'CTA heading', 'text', 'Explore the second half with greater clarity', 1],
            ['books', 'Closing CTA', 'cta_text', 'CTA text', 'textarea', 'If retirement planning has felt overwhelming, technical or difficult to begin, The Second Half of Zindagi! is designed to make the subject more approachable — one idea, one decision and one chapter at a time.', 2],

            // ---------------- RESOURCES ----------------
            ['resources', 'Hero', 'lead', 'Lead paragraph', 'textarea', 'Practical tools, worksheets and financial calculators designed to help you turn ideas into action.', 1],
            ['resources', 'Hero', 'lead2', 'Paragraph 2', 'textarea', 'Whether you are planning for retirement, reviewing your cash flow, working through a chapter of The Second Half of Zindagi! or simply trying to organise your finances better, this page brings together practical tools that can help you move from concept to clarity.', 2],
            ['resources', 'Hero', 'lead3', 'Paragraph 3', 'textarea', 'Some of these resources are linked directly from the book through QR codes, while others are designed as standalone tools for investors, professionals, families and retirees looking to approach money decisions in a more structured way.', 3],
            ['resources', 'Hero', 'hero_image', 'Hero image', 'image', 'assets/crops/res2-hero.jpg', 4],
            ['resources', 'QR Companion', 'qr_intro', 'Section intro', 'textarea', 'This section is designed as a practical companion to The Second Half of Zindagi!. Use these tools to apply the ideas from the book and strengthen your planning.', 1],
            ['resources', 'What You Will Find', 'find_title', 'Section title', 'text', 'WHAT YOU WILL FIND HERE', 1],
            ['resources', 'What You Will Find', 'find_p1', 'Section text', 'textarea', 'Some tools here help you calculate or estimate numbers. Others help you review information, organise records or work through financial tasks more methodically.', 2],

            // Leave a link field empty to keep the default link.
            ['resources', 'Downloads & Tool Links', 'dl_financial', 'Financial Document Checklist — link', 'text', '', 1],
            ['resources', 'Downloads & Tool Links', 'dl_insurance', 'Insurance Review Checklist — link', 'text', '', 2],
            ['resources', 'Downloads & Tool Links', 'dl_retirement', 'Retirement Readiness Checklist — link', 'text', '', 3],
            ['resources', 'Downloads & Tool Links', 'dl_estate', 'Estate Planning Checklist — link', 'text', '', 4],
            ['resources', 'Downloads & Tool Links', 'dl_networth', 'Net Worth Worksheet — link', 'text', '', 5],
            ['resources', 'Downloads & Tool Links', 'dl_bucket', 'Retirement Bucket Planning Worksheet — link', 'text', '', 6],
            ['resources', 'Downloads & Tool Links', 'link_inflation', 'Retirement Expense Inflation Calculator — link', 'text', '', 7],
            ['resources', 'Downloads & Tool Links', 'link_emergency', 'Emergency Fund Calculator — link', 'text', '', 8],
            ['resources', 'Note', 'note_p1', 'Paragraph 1', 'textarea', 'These calculators, worksheets and checklists are designed to make financial concepts easier to understand and easier to apply. They can help you organise financial information, test assumptions and approach financial questions with more structure.', 1],
            ['resources', 'Note', 'note_p2', 'Paragraph 2', 'textarea', 'At the same time, every financial situation comes with its own context, constraints and trade-offs. Calculator outputs depend on the assumptions used, and real-life decisions often involve factors that no tool can fully capture—such as changing income patterns, taxation, family responsibilities, risk tolerance, liquidity needs and future uncertainty.', 2],
            ['resources', 'Note', 'note_bold', 'Bold closing line', 'text', 'Use these resources as a practical starting point for clarity and preparation.', 3],
            ['resources', 'Note', 'note_image', 'Checklist photo', 'image', 'assets/crops/res2-note.jpg', 4],
            ['resources', 'Note', 'plant_image', 'Plant & calculator photo', 'image', 'assets/crops/res2-plant.jpg', 5],
            ['resources', 'Closing CTA', 'cta_title', 'CTA heading', 'text', '5. NEED HELP PUTTING THE NUMBERS IN CONTEXT?', 1],
            ['resources', 'Closing CTA', 'cta_text', 'CTA text', 'textarea', 'If a calculator has raised new questions, a worksheet has highlighted gaps you want to address, or you’d like to approach your finances in a more organised way, I’m here to help.', 2],
            ['resources', 'Closing CTA', 'cta_articles', 'Articles line', 'text', 'Looking for articles too? Visit Insights for more on financial topics.', 3],

            // ---------------- TESTIMONIALS ----------------
            ['testimonials', 'Hero', 'title', 'Headline', 'textarea', 'What it is like to work together — in clients’ own words.', 1],
            ['testimonials', 'Hero', 'lead', 'Intro paragraph', 'textarea', 'Working with money is rarely just a transaction. It often involves ongoing decisions, sensitive questions and the need for someone dependable on the other side.', 2],
            ['testimonials', 'Experiences', 'exp_title', 'Experiences title', 'text', 'Client Experiences', 1],
            ['testimonials', 'Experiences', 'exp', 'Experiences body', 'textarea', "Every client’s need is different — some come for investment support, some for tax or GST work, some for financial documentation, and many for a mix of these over time.\n\nClient testimonials will be added here soon.", 2],
            ['testimonials', 'Hope', 'hope_title', 'Hope title', 'text', 'What I Hope the Experience Reflects', 1],
            ['testimonials', 'Hope', 'hope', 'Hope body', 'textarea', 'Beyond technical help, I want clients to feel reliability, responsiveness and confidence that their matters are being handled with care. That’s what I hope this page will reflect, once it’s live.', 2],

            // ---------------- CONTACT ----------------
            ['contact', 'Hero', 'title', 'Headline', 'textarea', 'Get in touch about investments, taxation, financial organisation, media enquiries or other professional matters.', 1],
            ['contact', 'Hero', 'lead', 'Intro paragraph', 'textarea', 'Whether you are reaching out for a service-related query, a writing or a media request, or a general professional enquiry, you can use the form below or the contact details on this page.', 2],
            ['contact', 'Office', 'office', 'Office location', 'text', 'Ahmedabad, Gujarat, India', 1],
            ['contact', 'Closing', 'closing', 'Closing note', 'textarea', 'Thank you for visiting. If your query relates to the work I do, I’ll do my best to respond as soon as possible.', 1],
            ['contact', 'Closing', 'btn_services', 'Button 1 label', 'text', 'Explore Services', 2],
            ['contact', 'Closing', 'btn_insights', 'Button 2 label', 'text', 'Read Insights', 3],

            // ---------------- SETTINGS ----------------
            ['settings', 'Contact & Social', 'email', 'Contact email', 'text', 'hello@moneymaze.in', 1],
            ['settings', 'Contact & Social', 'phone', 'Phone number', 'text', '', 2],
            ['settings', 'Contact & Social', 'whatsapp', 'WhatsApp link', 'text', 'https://wa.me/919000000000', 3],
            ['settings', 'Contact & Social', 'linkedin', 'LinkedIn URL', 'text', 'https://www.linkedin.com/', 4],
            ['settings', 'Contact & Social', 'youtube', 'YouTube URL', 'text', 'https://www.youtube.com/', 5],
            ['settings', 'Contact & Social', 'footer_tagline', 'Footer tagline', 'text', 'Clarity today. Freedom tomorrow.', 6],
            ['settings', 'Branding', 'nav_logo', 'Top menu logo', 'image', 'assets/money-maze-logo.png', 1],
            ['settings', 'Branding', 'footer_logo', 'Footer logo', 'image', 'assets/mm-logo.png', 2],
        ];

        foreach ($rows as [$page, $section, $key, $label, $type, $value, $sort]) {
            $existing = SiteContent::query()->where('page', $page)->where('key', $key)->first();

            if ($existing) {
                // Keep whatever value is currently saved (admin edits survive
                // re-seeding); only refresh structure/labels/ordering.
                $existing->update(['section' => $section, 'label' => $label, 'type' => $type, 'sort' => $sort]);
            } else {
                SiteContent::query()->create([
                    'page' => $page, 'section' => $section, 'key' => $key,
                    'label' => $label, 'type' => $type, 'value' => $value, 'sort' => $sort,
                ]);
            }
        }

        // One-time cleanup of legacy rows that no longer map to any section on
        // the website (old home "Service Pillars" module and superseded keys).
        $deprecated = [
            ['books', 'feat_paras'], ['books', 'why_paras'],
            ['services', 'invest_body'], ['services', 'tax_body'], ['services', 'finorg_body'],
            ['home', 'roles'],
            ['home', 'pillar1_title'], ['home', 'pillar1_text'],
            ['home', 'pillar2_title'], ['home', 'pillar2_text'],
            ['home', 'pillar3_title'], ['home', 'pillar3_text'],
            ['resources', 'body'],
        ];

        foreach ($deprecated as [$page, $key]) {
            SiteContent::query()->where('page', $page)->where('key', $key)->delete();
        }
    }
}

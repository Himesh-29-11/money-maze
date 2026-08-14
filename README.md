# Money Maze — Mitali Mehta website

A production-structured Laravel 11 website for Money Maze, based on the supplied Website Content document, brand guide, calculator workbooks, checklist documents and the **original** visual mockup set (Home, About, Services, Insights, Media & Features, Books and Resources).

> **Team workflow:** see [WORKFLOW.md](WORKFLOW.md) for how changes flow between `main` and the agent's `arena/019feb5d-money-maze` branch.

## Included

- Laravel MVC routes, controllers, Blade layouts and reusable Blade components.
- Responsive design system using the supplied forest green, sage, antique gold, warm beige, ivory and charcoal palette.
- Home, About, Services, Insights, Media & Features, Books, Testimonials, Resources and Contact pages.
- Insights archive is data-driven (seeded `Article` model with a curated fallback list), with working topic filters, search and per-article detail pages at `/insights/{slug}`.
- Interactive SIP, Life Insurance, Retirement Corpus and SWP calculators.
- SQLite-ready contact message model/migration and seeded article model/migration.
- Downloadable checklist documents from the supplied Drive resources.
- `preview/` static client-side build for viewing the design without PHP installed in the sandbox.

## Run the Laravel application

```bash
composer install
cp .env.example .env
php artisan key:generate
mkdir -p database
php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite');"
php artisan migrate --seed
npm install
npm run build
php artisan serve
```

## Run the static preview

The sandbox used for this build does not have PHP installed. To preview the working UI immediately:

```bash
node server.mjs
```

Then open the live preview at the port printed by the server. The preview supports all routes, responsive navigation, insight filtering/search, the four calculators and a demo contact form confirmation.

## Notes

- Calculator outputs are indicative educational estimates and should not be treated as personalised financial or insurance advice.
- Actual email/phone details were not supplied in the source content, so the contact page intentionally asks visitors to use the form and lists Ahmedabad, Gujarat, India.
- Article and media entries are structured placeholder content based on the supplied mockups and can be replaced with the final URLs/content in the database.

## Admin panel

A Shopify-style admin lives at `/admin` (sign in with `admin@moneymaze.in` and the
password from `ADMIN_PASSWORD` in `.env`, default `admin123` after seeding).

```bash
php artisan migrate --seed   # creates tables + seeds admin & default content
php artisan serve            # then open http://localhost:8000/admin
```

From the admin you can edit page copy (Home/About/Services/Books/Contact), manage
articles, media & features entries, books, testimonials, navigation links and read
contact messages. All changes render on the public pages immediately. The admin UI
uses the same forest-green / antique-gold brand theme as the website.

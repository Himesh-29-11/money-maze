# Deploy Money Maze on Hostinger Cloud Hosting (shared)

Guide for **Hostinger Cloud / Web Hosting** (hPanel) — **not VPS**.  
The web server only serves files from `public_html`, so Laravel needs a small folder setup.

---

## What you need

- Hostinger **Cloud Hosting** plan (Business or Cloud Startup+ recommended for SSH)
- Your **domain** added in hPanel
- **SSH access** enabled: hPanel → **Advanced → SSH Access** (strongly recommended)
- **PHP 8.2 or 8.3**: hPanel → **Advanced → PHP Configuration** → select 8.2+

---

## Folder layout (recommended)

Hostinger serves the site from `public_html`. Keep Laravel code **outside** that folder:

```
/home/YOUR_USERNAME/
├── money-maze/              ← full Laravel project (private)
│   ├── app/
│   ├── bootstrap/
│   ├── config/
│   ├── public/              ← Laravel public folder
│   ├── storage/
│   ├── vendor/
│   ├── .env
│   └── artisan
└── domains/yourdomain.com/
    └── public_html  →  symlink to ~/money-maze/public
```

Visitors only see `public/`. Your `.env`, `app/`, and `vendor/` stay private.

---

## Method A — SSH + symlink (best)

### Step 1: Connect via SSH

hPanel → **SSH Access** → copy host, port (often **65002**), username.

```bash
ssh -p 65002 YOUR_USERNAME@YOUR_SERVER_IP
```

### Step 2: Upload the project

**Option 1 — Git (if SSH available):**
```bash
cd ~
git clone https://github.com/Himesh-29-11/money-maze.git
cd money-maze
```

**Option 2 — Upload ZIP via hPanel File Manager:**
1. On your PC: zip the project (exclude `node_modules`, `.git`, `database/*.sqlite`)
2. Upload to `/home/YOUR_USERNAME/`
3. Extract → folder should be `money-maze/`

### Step 3: Install dependencies

On your **local PC** (easier if server has no Composer):

```bash
composer install --no-dev --optimize-autoloader
npm ci && npm run build
```

Then upload the whole folder including `vendor/` and `public/build/`.

**Or on the server via SSH:**
```bash
cd ~/money-maze
composer install --no-dev --optimize-autoloader
npm ci && npm run build   # if Node is available
```

### Step 4: Create MySQL database (hPanel)

hPanel → **Databases → MySQL Databases**:

1. Create database: e.g. `u123456789_moneymaze`
2. Create user + strong password
3. Assign user to database (All privileges)

Note the **host** (usually `localhost`), database name, username, password.

### Step 5: Configure `.env`

```bash
cd ~/money-maze
cp deploy/.env.production.example .env
nano .env
```

Set these values:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=u123456789_moneymaze
DB_USERNAME=u123456789_mazeuser
DB_PASSWORD=your_db_password

ADMIN_PASSWORD=YourStrongAdminPassword123!
```

Generate app key:
```bash
php artisan key:generate
```

### Step 6: Storage folders & migrate

```bash
mkdir -p storage/framework/{cache/data,sessions,views} storage/logs bootstrap/cache
chmod -R 775 storage bootstrap/cache

php artisan migrate --force --seed
php artisan storage:link
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Step 7: Link public_html → Laravel public

```bash
# Go to your domain folder (path may vary — check hPanel File Manager)
cd ~/domains/yourdomain.com

# Back up default public_html if it has files
mv public_html public_html_backup

# Create symlink
ln -s ~/money-maze/public public_html
```

If your account uses root-level `public_html`:
```bash
cd ~
mv public_html public_html_backup
ln -s ~/money-maze/public public_html
```

### Step 8: SSL (HTTPS)

hPanel → **Security → SSL** → install free SSL for your domain.

Then update `.env`: `APP_URL=https://yourdomain.com`

---

## Method B — No SSH (File Manager only)

Use this if your plan has **no SSH**.

### On your PC

```bash
composer install --no-dev --optimize-autoloader
npm ci && npm run build
php artisan key:generate   # copy the key from .env
```

Create `.env` with production values (MySQL from hPanel, `APP_DEBUG=false`, strong `ADMIN_PASSWORD`).

Zip the project (exclude `node_modules`, `.git`).

### On Hostinger (File Manager)

1. Upload & extract zip to `/home/YOUR_USERNAME/money-maze/`
2. Create MySQL database in hPanel (same as Step 4 above)
3. Edit `.env` in File Manager with DB credentials

4. **Symlink via hPanel** (if available): link `public_html` → `money-maze/public`  
   **If symlinks are not allowed**, use the split layout below.

### Split layout (no symlink)

```
/home/YOUR_USERNAME/
├── money-maze/          ← app code + vendor + .env (NOT web-accessible)
└── public_html/         ← only web-facing files
    ├── index.php        ← modified (see deploy/public_html-index.php.example)
    ├── .htaccess
    ├── assets/
    └── build/
```

1. Copy everything from `money-maze/public/` into `public_html/`
2. Replace `public_html/index.php` with `deploy/public_html-index.php.example`  
   (paths point to `../money-maze/`)

3. Run migrations via **Cron Job** in hPanel:
   - hPanel → **Advanced → Cron Jobs**
   - Command: `cd /home/YOUR_USERNAME/money-maze && php artisan migrate --force --seed`
   - Run once

---

## After deploy — verify

| URL | Expected |
|-----|----------|
| `https://yourdomain.com` | Homepage loads |
| `https://yourdomain.com/admin` | Admin login page |
| `https://yourdomain.com/admin/login` | Login works |

**Admin login:** `admin@moneymaze.in` + your `ADMIN_PASSWORD`

---

## Updating the site later

**With SSH:**
```bash
cd ~/money-maze
git pull origin main
composer install --no-dev --optimize-autoloader
npm ci && npm run build
php artisan migrate --force
php artisan config:cache && php artisan route:cache && php artisan view:cache
```

**Without SSH:** rebuild locally, re-upload changed files via File Manager/SFTP.

---

## Production checklist

- [ ] `APP_DEBUG=false`
- [ ] Strong `ADMIN_PASSWORD` (not `admin123`)
- [ ] SSL/HTTPS enabled in hPanel
- [ ] PHP 8.2+ selected in hPanel
- [ ] `storage/` and `bootstrap/cache/` writable (775)
- [ ] MySQL database created and connected

---

## Troubleshooting

| Problem | Fix |
|---------|-----|
| **500 error** | hPanel → **Metrics → Error logs** or read `storage/logs/laravel.log` via File Manager |
| **/public in URL** | `public_html` must symlink to `money-maze/public`, not contain the whole project |
| **CSS/JS missing** | Run `npm run build` locally; upload `public/build/` folder |
| **Permission denied** | `chmod -R 775 storage bootstrap/cache` via SSH |
| **Composer not found** | Run `composer install` on your PC; upload `vendor/` folder |
| **PHP version error** | hPanel → PHP Configuration → set **8.2** or **8.3** |

---

## Why not VPS steps?

VPS gives you root access, Nginx, and full server control. **Cloud hosting** uses hPanel + `public_html` + shared Apache/LiteSpeed. The symlink method above is the standard Laravel approach for Hostinger shared/cloud plans.

For VPS deployment, see `deploy/hostinger-nginx.conf` (different setup).

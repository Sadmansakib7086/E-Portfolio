# Sadman Sakib – Portfolio (HTML / CSS / JavaScript / PHP)

Plain-web version of the original React + Vite + Tailwind project. No build step, no Node.

## Run on XAMPP
1. Copy this folder into `C:\xampp\htdocs\portfolio`
2. Start **Apache** in the XAMPP control panel
3. Open http://localhost/portfolio/

(Or from this folder: `php -S localhost:8000`)

## Structure
- `index.php` – the page (sections rendered from data in `includes/config.php`)
- `contact.php` – contact form handler (CSRF, honeypot, validation, rate limit; saves to `storage/messages.log`, also tries `mail()`)
- `includes/config.php` – **edit your text, links, projects, skills here**
- `includes/header.php`, `footer.php`, `icons.php` – shared layout + SVG icons
- `assets/css/style.css`, `assets/js/main.js` – styles and behaviour
- `assets/images`, `assets/docs` – photos, certificates, résumé

## To do before publishing
- Set real `URL_GITHUB`, `URL_LINKEDIN` and per-project repo URLs in `includes/config.php`
- For email delivery on a real host, configure `mail()`; on local XAMPP messages are saved to `storage/messages.log`

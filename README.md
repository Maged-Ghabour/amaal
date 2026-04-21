# Amal Malki Legal – Custom WordPress Theme

Custom WordPress theme for **أمال المالكي للمحاماة والاستشارات القانونية**

---

## Requirements

- WordPress 6.0+
- PHP 8.0+
- **ACF Free** (Advanced Custom Fields) — for editable homepage sections
- Optional: **Polylang** — for Arabic + English multilingual support

---

## Installation

1. Upload the `amal-malki-theme` folder to `/wp-content/themes/`
2. Activate via **Appearance → Themes**
3. Install **ACF** plugin
4. Go to **Settings → Reading** and set a static front page
5. Assign the **Front Page** template to your homepage

---

## Homepage Setup

After activation:

1. Create a page titled **الرئيسية** (or any name)
2. Set template to **Front Page**
3. Go to **Settings → Reading → Your homepage displays** → select that page
4. Edit the page in wp-admin and fill in the ACF fields for Hero, Vision, Mission

---

## Services (Custom Post Type)

1. Go to **الخدمات** in the sidebar
2. Add each service as a post with:
   - Title (اسم الخدمة)
   - Content (تفاصيل الخدمة)
   - Featured Image (صورة الخدمة)
   - Excerpt (وصف مختصر)

---

## Customizer Options

Go to **Appearance → Customize → إعدادات الثيم**:

- **روابط التواصل الاجتماعي** — Instagram, TikTok, Twitter, Facebook, Snapchat
- **بيانات التذييل** — Address, Phone, Email
- **Custom Logo** — Upload your logo

---

## File Structure

```
amal-malki-theme/
├── style.css                    # Theme header (required by WP)
├── functions.php                # Core theme setup
├── index.php                    # Blog archive fallback
├── front-page.php               # Homepage template
├── single.php                   # Single blog post
├── single-service.php           # Single service page
├── 404.php                      # 404 error page
├── header.php                   # Site header
├── footer.php                   # Site footer
│
├── assets/
│   ├── css/
│   │   ├── main.css             # Main stylesheet (Design System + all sections)
│   │   ├── inner-pages.css      # Blog, single, 404 styles
│   │   └── rtl.css              # RTL overrides
│   └── js/
│       └── main.js              # Vanilla JS interactions
│
├── template-parts/
│   ├── sections/
│   │   ├── hero.php             # Hero section
│   │   ├── about.php            # Vision & Mission
│   │   ├── services.php         # Services grid
│   │   ├── why-us.php           # Why Us features
│   │   ├── articles.php         # Latest articles
│   │   └── contact-cta.php      # Contact form
│   └── components/
│       └── service-card.php     # Service card component
│
├── inc/
│   ├── template-tags.php        # Helper functions (SVG icons etc.)
│   ├── customizer.php           # WordPress Customizer settings
│   └── contact-form.php         # AJAX contact form handler
│
└── languages/                   # Translation files (.pot, .po, .mo)
```

---

## Multilingual (Future)

The theme is i18n-ready:
- All strings use `__()` / `_e()` with `'amal-malki'` text domain
- Install **Polylang** and add English when ready
- URL structure will be `/ar/` and `/en/`

---

## Colors

| Variable | Value | Usage |
|----------|-------|-------|
| `--color-gold` | `#C9A84C` | Primary brand color |
| `--color-dark` | `#1A0E05` | Dark backgrounds |
| `--color-white` | `#FFFFFF` | Light sections |
| `--color-off-white` | `#F8F5F0` | Alt section BG |

---

## Browser Support

Chrome 90+, Firefox 88+, Safari 14+, Edge 90+

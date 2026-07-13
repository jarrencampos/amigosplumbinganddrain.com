# Amigos Plumbing & Drain Cleaning — Design System

This file is loaded automatically at the start of every Claude Code session. **Check this before building any new page, section, or component.**

---

## Brand Identity

- **Company:** Amigos Plumbing & Drain Cleaning Inc
- **Owner:** Jesse Vera
- **Phone:** (916) 598-3162 | `tel:+19165983162`
- **Email:** jesse@amigosplumbinganddrain.com
- **Address:** 7816 Rockhurst Way, Sacramento, CA 95828
- **License:** CA Lic. #1150558
- **Hours:** Mon–Sun, 24 Hours
- **GTM ID:** GTM-N6VW9PMR
- **GA4 ID:** G-NEXPPDH0B2

---

## Colors

| Role | Hex |
|---|---|
| Primary navy | `#0B2D5E` |
| Medium navy (hover) | `#1B4B8A` |
| Brand cyan / accent | `#29ABE2` |
| Cyan hover | `#1a96ce` |
| Dark navy (emergency bar) | `#071f42` |
| Page background (light) | `#f5f8ff` |
| Border / divider | `#dde8f7` |
| Body text | `#444` |
| Muted text | `#555` |
| Meta / timestamps | `#aaa` / `#999` |
| Sticky bar pink (book/text) | `#ff2973` |

---

## Typography

- **Font family:** `Poppins` (300, 400, 500, 600, 700) via Google Fonts
- **Headings:** `color: #0B2D5E` — never black
- **Body text:** `color: #444` or `#555`
- **Section eyebrow labels:** `font-size: .75rem; font-weight: 700; color: #29ABE2; text-transform: uppercase; letter-spacing: .1em`
- **H1 pages:** `clamp(2rem, 5vw, 3rem)`
- **H2 sections:** `clamp(1.6rem, 3vw, 2.2rem)`
- **Card headings (h3):** `1.05rem, font-weight: 700`
- **Body copy:** `font-size: .88rem–1rem; line-height: 1.65–1.8`

---

## Writing Rules

- **No em dashes** anywhere in copy. Use a comma, period, or rewrite the sentence instead.
- **No Oxford em dashes** in attribution lines. Use "Jesse Vera, Owner & Founder" not "— Jesse Vera".
- **No exclamation marks** in headings.
- **Sentence case** for body copy; **Title Case** for h1/h2 headings; **ALL CAPS** only for nav items or badge labels.

---

## CSS / HTML Conventions

- All pages use the existing `css/bootstrap.css`, `css/style.css`, `css/fonts.css` (prefix `../` from subdirectories).
- The default RD Navbar is hidden: `.rd-navbar-wrap, .rd-navbar-fixed, .rd-navbar-static, .rd-navbar-default { display: none !important; }`
- `body { padding-bottom: 54px !important; }` — always, to clear the sticky call bar.
- `.ui-to-top { display: none !important; }` — always hide the scroll-to-top button.
- `.page { margin-top: 0 !important; padding-top: 0 !important; overflow-x: clip !important; }`
- Nav height is set dynamically via JS: `document.body.style.paddingTop = nav.offsetHeight + 'px'`
- Copyright year is set dynamically via JS: `new Date().getFullYear()`

---

## Navigation (`.apc-nav`)

Copy this exact structure for every new page. Adjust `../` paths based on directory depth.

```
position: fixed; top: 0; background: #fff; border-bottom: 3px solid #29ABE2
Grid: 1fr auto 1fr  (stars | logo | right)
Min-height: 148px desktop / 110px mobile
Logo height: 140px desktop / 100px mobile
```

- **Left:** Stars block — `#29ABE2` stars, `#0B2D5E` label "5-Star Rated Service"
- **Center:** Logo linked to `/` — `../images/logo.png`
- **Right:** Language selector (EN/ES) + hamburger dropdown
- Hamburger dropdown always includes: Call link (dark navy bg), Home, About Us, Specials & Coupons, Blog
- Active page link in dropdown uses `color: #29ABE2; font-weight: 700`

---

## Sticky Call Bar

Two-button bar pinned to bottom. Always present on every page. **Always identical across all pages — never improvise.**

```
Left button (pink #ff2973):  Book Online — opens HCPWidget modal
Right button (cyan #29ABE2): (916) 598-3162 — tel:+19165983162
```

```html
<div class="sticky-call-bar">
  <a href="#" class="sticky-btn--text" onclick="HCPWidget.openModal();gtag('event','click',{event_category:'book_online',event_label:'sticky_bar'});return false;">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19 3h-1V1h-2v2H8V1H6v2H5a2 2 0 00-2 2v16a2 2 0 002 2h14a2 2 0 002-2V5a2 2 0 00-2-2zm0 18H5V9h14v12zm0-14H5V5h14v2zM7 11h2v2H7zm4 0h2v2h-2zm4 0h2v2h-2zm-8 4h2v2H7zm4 0h2v2h-2z"/></svg>
    Book Online
  </a>
  <a href="tel:+19165983162" class="sticky-btn--call" onclick="gtag('event', 'phone_click', {event_category: 'phone_click', event_label: 'sticky_bar'})">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M6.62 10.79a15.45 15.45 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24 11.47 11.47 0 003.58.57 1 1 0 011 1V21a1 1 0 01-1 1A17 17 0 013 5a1 1 0 011-1h3.5a1 1 0 011 1 11.47 11.47 0 00.57 3.58 1 1 0 01-.25 1.01l-2.2 2.2z"/></svg>
    (916) 598-3162
  </a>
</div>
```

---

## Cards

- **Border style:** `border: 2px solid #29ABE2` on all four sides. Never `border-top` only (no "toenail" borders).
- **Background:** `#fff` (white)
- **Border radius:** `10px`
- **Hover:** `transform: translateY(-4px); box-shadow: 0 8px 30px rgba(11,45,94,.14)`
- **Tag/badge inside card:** `background: #e8f4fc; color: #0B2D5E`

**Blog post share bar** — always included in the post hero, below the date meta line:
```css
.share-bar { display:flex; align-items:center; gap:.5rem; margin-top:1.1rem; flex-wrap:wrap; }
.share-label { font-size:.8rem; color:rgba(255,255,255,.75); font-weight:600; letter-spacing:.04em; text-transform:uppercase; margin-right:.25rem; }
.share-btn { display:inline-flex; align-items:center; justify-content:center; width:38px; height:38px; border-radius:50%; text-decoration:none; transition:transform .15s,opacity .15s; }
.share-btn:hover { transform:scale(1.1); opacity:.9; }
.share-facebook{background:#1877F2;} .share-x{background:#000;} .share-threads{background:#000;}
.share-reddit{background:#FF4500;} .share-flipboard{background:#E12828;} .share-email{background:#4A5568;}
```
Platforms: Facebook, X, Threads, Reddit, Flipboard, Email — all use `encodeURIComponent(window.location.href)` + `encodeURIComponent(document.title)` in popup `onclick`.

**Blog cards** specifically:
```
.blog-card img: height 210px, object-fit: cover
.blog-read-more: background #29ABE2, border-radius 4px
```

---

## Buttons & CTAs

| Variant | Background | Text | Use |
|---|---|---|---|
| Primary | `#0B2D5E` | `#fff` | Final CTAs, hero secondary |
| Cyan | `#29ABE2` | `#fff` | Inline CTAs, read more, call buttons |
| Navy pill | `#0B2D5E` | `#fff` | Dropdown call link |

- Border-radius for inline CTAs: `4px`
- Border-radius for hero call buttons: `4px`
- Always include `text-decoration: none !important` on anchor CTAs
- Always include a phone SVG icon on call-to-action phone links

---

## Section Backgrounds (alternating pattern)

| Section | Background |
|---|---|
| Hero | `#0B2D5E` gradient or dark overlay on photo |
| Trust bar | `#f5f8ff` with bottom border `#dde8f7` |
| Values / pillars | `#fff` |
| Story / dark feature | `#0B2D5E` |
| CTA strip | `#1B4B8A` |
| Principles / secondary | `#f5f8ff` |
| Reviews | `#fff` |
| Final CTA | `#f5f8ff` |
| Pre-footer | `#0B2D5E` |
| Footer bar | `.bg-gray-darkest` (from style.css) |

---

## Pre-Footer

Four columns: Logo + blurb | Contact info | Service areas (2-col list) | Google Maps embed

- Background: `#0B2D5E`
- All text: `color: #e8eef8`
- Links: `color: #29ABE2`, hover `#fff`
- H6 labels: `color: #29ABE2; font-weight: 700`
- Map embed: `width: 100%; height: 220px; border-radius: 8px`

Maps embed src (same on all pages):
```
https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3318.118649501198!2d-121.4146353238706!3d38.489137171814065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b9a7e1eea89a47f%3A0xc992e50f3fe34619!2sAmigos%20Plumbing%20and%20Drain%20Cleaning!5e1!3m2!1sen!2sus!4v1782803156055!5m2!1sen!2sus
```

---

## Footer Bar

```html
<footer class="footer-corporate bg-gray-darkest" style="padding:1rem 2rem 2.75rem;">
  Site by Goldmark Digital | © [year] Amigos Plumbing & Drain Cleaning Inc.
  Privacy Policy | Terms of Service | Sitemap
</footer>
```

- `../images/goldmark.png` for the Goldmark logo
- Copyright year set via `.copyright-year` span + JS

---

## Service Areas (canonical list)

Sacramento, Elk Grove, Rancho Cordova, Roseville, Citrus Heights, Carmichael, Fair Oaks, Orangevale, Antelope, North Highlands, West Sacramento, Davis, Woodland

URL pattern: `/{city-slug}-plumber/` (except Sacramento = `/`)

---

## Reviews Carousel

Auto-scrolling horizontal track. Copy the pattern from `index.html` or `about/index.html`.

- Cards: `flex: 0 0 320px; background: #f5f8ff; border: 1px solid #dde8f7`
- Avatar circles: 42px, colored by reviewer
- Stars: `#FBBC04`
- Auto-scroll speed: `0.6px/frame`
- Infinite loop via JS cloneNode
- Read-more toggle via `.expanded` class

---

## Analytics & Tracking

Every `<a href="tel:...">` click link must include:
```
onclick="gtag('event', 'phone_click', {event_category: 'phone_click', event_label: '[location]'})"
```

Label values used: `hero`, `mobile_menu`, `footer`, `sticky_bar`, `about_hero`, `about_cta_strip`, `about_final_cta`, `emergency_banner`

---

## File Structure

```
/                        homepage (index.html)
/about/                  About page
/blog/                   Blog index
/blog/[slug].html        Individual blog posts
/sacramento/             Sacramento service pages
/{city}-plumber/         City landing pages
/es/                     Spanish versions
/specials/               Specials & coupons
/images/                 All images
/css/                    bootstrap.css, style.css, fonts.css
/js/                     core.min.js, script.js
```

Blog post images live in `images/blog/` — referenced as `../images/blog/[filename]` from the `/blog/` directory.

Key images available:
- `plumber-sacramento.jpg` — hero/story photo
- `water-heater.jpg` — water heater content
- `drain-services.jpeg` — drain content
- `emergency.jpeg` — emergency content
- `leak-detection.jpeg` — leak detection
- `maintenance.jpeg` — maintenance content
- `faucet-install.jpeg` — fixture/install content
- `logo.png` — main logo
- `goldmark.png` — footer agency credit

---

## Related Blog Posts System

**How it works:**
- `blog/posts.json` is the single source of truth for all blog posts
- Each entry has a `cities` array (e.g. `["Sacramento"]`, `["Elk Grove"]`, `["Sacramento","Elk Grove"]`)
- Location pages include a `<section id="relatedPosts" data-city="[City]">` + the loader JS
- The JS fetches `posts.json`, filters by `data-city`, renders up to 3 cards, and shows the section only if matches exist
- No manual HTML updates needed on location pages — just add to `posts.json`

**posts.json entry shape:**
```json
{
  "title": "...",
  "url": "/blog/[slug].html",
  "image": "/images/blog/[image].jpeg",
  "imageAlt": "...",
  "tag": "Local Community",
  "date": "Month DD, YYYY",
  "summary": "One sentence.",
  "cities": ["Sacramento"]
}
```

**Location page wiring (add to every city/location page):**

CSS — add to `<style>` block:
```css
.related-posts-section{padding:4rem 0;background:#fff;display:none;}
.related-posts-section.has-posts{display:block;}
.related-posts-section .section-eyebrow{font-size:.75rem;font-weight:700;color:#29ABE2;text-transform:uppercase;letter-spacing:.1em;margin-bottom:.5rem;}
.related-posts-section h2{font-size:clamp(1.5rem,3vw,2rem);margin-bottom:2rem;}
.rp-card{background:#fff;border-radius:10px;overflow:hidden;border:2px solid #29ABE2;transition:transform .2s,box-shadow .2s;height:100%;display:flex;flex-direction:column;margin-bottom:1.5rem;}
.rp-card:hover{transform:translateY(-4px);box-shadow:0 8px 30px rgba(11,45,94,.14);}
.rp-card img{width:100%;height:190px;object-fit:cover;display:block;}
.rp-card-body{padding:1.25rem;flex:1;display:flex;flex-direction:column;}
.rp-tag{display:inline-block;background:#e8f4fc;color:#0B2D5E;font-size:.72rem;font-weight:700;text-transform:uppercase;letter-spacing:.05em;padding:.2rem .55rem;border-radius:4px;margin-bottom:.5rem;}
.rp-date{font-size:.75rem;color:#999;margin-bottom:.5rem;}
.rp-card-body h3{font-size:.97rem;font-weight:700;color:#0B2D5E;line-height:1.4;margin-bottom:.5rem;flex:1;}
.rp-card-body h3 a{color:inherit;text-decoration:none;}
.rp-card-body h3 a:hover{color:#29ABE2;}
.rp-read-more{display:inline-block;margin-top:.85rem;padding:.4rem .9rem;background:#29ABE2;color:#fff;border-radius:4px;font-size:.82rem;font-weight:600;text-decoration:none;}
.rp-read-more:hover{background:#1a96ce;color:#fff;}
.rp-view-all{display:inline-flex;align-items:center;gap:.4rem;color:#0B2D5E;font-weight:700;font-size:.88rem;text-decoration:none;margin-top:1.5rem;}
.rp-view-all:hover{color:#29ABE2;}
```

Section HTML — place just before `<!-- Pre-Footer -->`. Change the `data-city` and heading to match the page:
```html
<section class="related-posts-section" id="relatedPosts" data-city="[City Name]">
  <div class="container">
    <p class="section-eyebrow">From the Blog</p>
    <h2>Plumbing Tips &amp; Local Guides for [City Name]</h2>
    <div class="row" id="relatedPostsGrid"></div>
    <div>
      <a href="/blog/" class="rp-view-all">
        View all posts
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </a>
    </div>
  </div>
</section>
```

Loader JS — add before `</body>` (path to posts.json is always `/blog/posts.json` regardless of page depth):
```html
<script>
(function(){
  var section = document.getElementById('relatedPosts');
  var grid    = document.getElementById('relatedPostsGrid');
  if(!section || !grid) return;
  var city = section.getAttribute('data-city');
  fetch('/blog/posts.json')
    .then(function(r){ return r.json(); })
    .then(function(posts){
      var matches = posts.filter(function(p){
        return p.cities && p.cities.indexOf(city) !== -1;
      }).slice(0, 3);
      if(!matches.length) return;
      matches.forEach(function(p){
        var col = document.createElement('div');
        col.className = 'col-sm-6 col-lg-4';
        col.innerHTML =
          '<div class="rp-card">' +
            '<a href="' + p.url + '">' +
              '<img src="' + p.image + '" alt="' + p.imageAlt + '" loading="lazy">' +
            '</a>' +
            '<div class="rp-card-body">' +
              '<span class="rp-tag">' + p.tag + '</span>' +
              '<div class="rp-date">' + p.date + '</div>' +
              '<h3><a href="' + p.url + '">' + p.title + '</a></h3>' +
              '<a href="' + p.url + '" class="rp-read-more">Read More</a>' +
            '</div>' +
          '</div>';
        grid.appendChild(col);
      });
      section.classList.add('has-posts');
    })
    .catch(function(){});
})();
</script>
```

**When adding a new blog post:**
1. Create the HTML file under `/blog/`
2. Add one entry to `/blog/posts.json` with the correct `cities` array
3. That's it — every location page tagged with that city auto-updates

**City name values must exactly match** what's in `posts.json` cities arrays:
Sacramento, Elk Grove, Rancho Cordova, Roseville, Citrus Heights, Carmichael, Fair Oaks, Orangevale, Antelope, North Highlands, West Sacramento, Davis, Woodland

---

## Pages Built So Far

- `index.html` — Homepage
- `about/index.html` — About Jesse Vera & Amigos
- `blog/index.html` — Blog index
- `blog/army-depot-park-ballfields-plumber-95828.html` — Local landmark post, Fruitridge Broadway / 95828
- `sacramento/water-heater-install/` — Water heater install landing page
- `{city}-plumber/index.html` — City pages (13 cities)
- `es/index.html` — Spanish homepage
- `specials/index.html` — Specials page

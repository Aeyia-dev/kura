# TODO

Note: Stop and Review claude/ways-of-working.md now

## T&Cs and PP page
Create a plan for the vuejs page for the joint T&Cs and PP.

- [x] Review claude/ways-of-working.md before starting
- [x] Review the design guides and figma html export:
   - claude/tmp/Terms\ \&\ Conditions.png
   - claude/tmp/Terms\ \&\ Conditions\ Mobile.png
   - claude/tmp/terms-figma
- [x] document the design requirements and the plan for the template into this document

### Design Requirements for T&Cs and PP Page

Based on examination of the actual design files, here's a detailed description of the T&Cs page layout:

#### Desktop Layout
1. **Header**:
   - Clean, minimal navigation in top-right with text links for "society", "about", and "contact"
   - No visible logo in the upper portion

2. **Content Structure**:
   - Full-width single column layout with generous white space on both sides
   - "Terms & Conditions" as large heading at top left
   - "Effective date: April 3, 2025" as a subheading
   - Left sidebar with "Table of contents" containing navigation links:
     * AEYIA (selected/highlighted in black)
     * Society
     * Business Info
     * Contact
   - Main content area with sections that correspond to the table of contents:
     * AEYIA™ (with placeholder text)
     * Society (with DGR Registered Charity Info and placeholder text)
     * Business Info (with ABN and ACN information)

3. **Footer**:
   - "Need More Info?" heading followed by "legal@aeyia.com" contact email
   - "Follow us." text with social media icons (Facebook, Instagram, YouTube)
   - Icons are simple black circular icons

#### Mobile Layout
1. **Header**:
   - AEYIA logo at top left
   - Hamburger menu icon at top right
   - "Terms & Conditions" heading
   - "Effective date: April 3, 2023" as subheading

2. **Content Structure**:
   - Single column layout with various headings and text
   - No visible table of contents sidebar
   - Content is organized under headings (Heading 2, Heading 3, etc.)
   - Text is smaller with tighter spacing than desktop version
   - Includes a quote/highlighted section in italics

3. **Footer**:
   - "Need More Info?" with "legal@aeyia.com" email
   - "Follow us." with social media icons (same as desktop)

#### Design Elements
1. **Typography**:
   - Clean, modern sans-serif font throughout
   - Different text sizes to establish hierarchy
   - Headings are bold and prominent
   - Body text is regular weight with good spacing

2. **Colors**:
   - Predominantly black text on white background
   - Black background for the selected TOC item
   - No color accents visible

3. **Navigation**:
   - Table of contents on desktop serves as section navigation
   - Mobile version appears to use headings as navigation structure

### Implementation Plan

1. **Create Vue.js Component**:
   - Create a new `TermsAndPrivacy.vue` file in the `/web/resources/js/Pages/` directory
   - Implement the exact design seen in the mockups

2. **Component Structure**:
   ```vue
   <script setup>
   import { Head } from '@inertiajs/vue3';
   import { ref, computed } from 'vue';
   import { Link } from '@inertiajs/vue3';
   import SiteHeader from '@/Components/SiteHeader.vue';
   import SiteFooter from '@/Components/SiteFooter.vue';
   import MobileMenu from '@/Components/MobileMenu.vue';

   // Props passed from controller
   defineProps({
     terms: String,
     policy: String,
     canLogin: Boolean,
     canRegister: Boolean,
   });

   // Table of contents and navigation
   const sections = ref([
     { id: 'aeyia', title: 'AEYIA', active: true },
     { id: 'society', title: 'Society', active: false },
     { id: 'business-info', title: 'Business Info', active: false },
     { id: 'contact', title: 'Contact', active: false }
   ]);

   // Active section handling
   const activeSection = ref('aeyia');
   const setActiveSection = (sectionId) => {
     activeSection.value = sectionId;
     sections.value.forEach(section => {
       section.active = section.id === sectionId;
     });
   };
   
   // Mobile menu state
   const mobileMenuOpen = ref(false);
   const toggleMobileMenu = () => {
     mobileMenuOpen.value = !mobileMenuOpen.value;
   };
   </script>
   ```

3. **HTML Template**:
   
   **Desktop Layout**:
   - Main full-width container with generous white space
   - Top navigation with "society", "about", and "contact" links
   - Main heading "Terms & Conditions" with effective date subheading
   - Left sidebar with table of contents navigation
   - Main content area with sections that correspond to TOC sections
   - Footer with "Need More Info?" and social media section

   **Mobile Layout**:
   - AEYIA logo and hamburger menu at top
   - "Terms & Conditions" heading with effective date
   - Single column content with section headings
   - No sidebar TOC navigation
   - Footer with contact email and social media icons

4. **Controller & Route Setup**:
   - Add a new method to the DefaultController.php:
   ```php
   /**
    * Display the terms and privacy page.
    *
    * @return \Inertia\Response
    */
   public function termsAndPrivacy()
   {
       return Inertia::render('TermsAndPrivacy', [
           'terms' => file_get_contents(resource_path('markdown/terms.md')),
           'policy' => file_get_contents(resource_path('markdown/policy.md')),
           'canLogin' => Route::has('login'),
           'canRegister' => Route::has('register'),
       ]);
   }
   ```

   - Add a new route to web.php:
   ```php
   Route::get('/terms', [DefaultController::class, 'termsAndPrivacy'])->name('terms');
   ```

5. **Styling**:
   - Use Tailwind classes for layout and spacing
   - Follow the exact styling from the mockups:
     * Black text on white background
     * Black background for selected TOC item
     * Appropriate font sizes for headings and body text
     * Proper spacing between elements
   - Ensure responsive behavior matches design mockups:
     * Desktop: Full-width with sidebar TOC
     * Mobile: Single column with no sidebar

### Detailed Implementation Requirements Based on Figma Export Analysis

#### Core Structure Issues in Figma Export

The Figma export uses problematic techniques that must be completely redesigned:
1. **Absolute Positioning**: Every element uses absolute positioning with fixed pixel coordinates
2. **Non-Semantic Markup**: Generic divs and spans with auto-generated class names (v909_*)
3. **Fixed Dimensions**: Hardcoded widths/heights that won't adapt to different screen sizes
4. **Missing Content Elements**: The main T&Cs content area is absent from the export

#### Proper HTML Structure

```html
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Terms & Conditions - AEYIA</title>
</head>
<body>
  <header class="site-header">
    <!-- Desktop navigation -->
    <nav class="desktop-nav">
      <ul>
        <li><a href="/society">society</a></li>
        <li><a href="/about">about</a></li>
        <li><a href="/contact">contact</a></li>
      </ul>
    </nav>
    
    <!-- Mobile header with logo and menu button -->
    <div class="mobile-header">
      <a href="/" class="logo">AEYIA</a>
      <button class="menu-toggle">
        <span class="menu-icon"></span>
      </button>
    </div>
  </header>

  <main class="terms-container">
    <h1 class="terms-title">Terms & Conditions</h1>
    <p class="effective-date">Effective date: April 3, 2025</p>
    
    <!-- Desktop Table of Contents -->
    <nav class="terms-toc">
      <h2>Table of contents</h2>
      <ul>
        <li class="active"><a href="#aeyia">AEYIA</a></li>
        <li><a href="#society">Society</a></li>
        <li><a href="#business-info">Business Info</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>
    
    <!-- Content sections -->
    <div class="terms-content">
      <section id="aeyia" class="terms-section">
        <h2>AEYIA™</h2>
        <!-- Content here -->
      </section>
      
      <section id="society" class="terms-section">
        <h2>Society</h2>
        <p class="info-text">DGR Registered Charity Info</p>
        <!-- Content here -->
      </section>
      
      <section id="business-info" class="terms-section">
        <h2>Business Info</h2>
        <p>ABN</p>
        <p>ACN</p>
        <!-- Content here -->
      </section>
      
      <section id="contact" class="terms-section">
        <h2>Contact</h2>
        <!-- Content here -->
      </section>
    </div>
  </main>

  <footer class="site-footer">
    <div class="contact-info">
      <h2>Need More Info?</h2>
      <a href="mailto:legal@aeyia.com">legal@aeyia.com</a>
    </div>
    
    <div class="social-links">
      <h2>Follow us.</h2>
      <div class="social-icons">
        <a href="#" class="social-icon facebook">Facebook</a>
        <a href="#" class="social-icon instagram">Instagram</a>
        <a href="#" class="social-icon youtube">YouTube</a>
      </div>
    </div>
  </footer>
</body>
</html>
```

#### CSS Implementation Requirements

1. **Typography System**:
   - Font Families: Matter TRIAL (headings) and Matter SQ TRIAL (body)
     * Fallback fonts should be sans-serif
   - Font Sizes:
     * Main heading: 40px (desktop), 32px (mobile)
     * Section headings: 30px (desktop), 24px (mobile)
     * "Need More Info": 24px (desktop), 20px (mobile)
     * Body text: 16px (desktop), 14px (mobile)
   - Font Weights: Regular (400) and Medium (500)
   - Colors: Primary text is dark gray (#212026)

2. **Layout Construction**:
   - **Desktop**:
     * Full-width layout with content maxing out at ~1200px
     * Generous margins on left and right (min 48px)
     * Table of contents as left sidebar (should take ~25% of width)
     * Main content taking remaining width (~75%)
     * Navigation in top right with ~30px spacing between items

   - **Mobile**:
     * Stack all elements vertically
     * Logo at top left and hamburger menu at top right
     * Hide table of contents sidebar
     * Use headings for section navigation
     * Standard margins of 16-24px on sides

3. **Component Details**:
   - **Navigation**:
     * Desktop: Horizontal list in top right  
     * Mobile: Hidden behind hamburger menu
     * Links should be 30px font size on desktop
   
   - **Table of Contents**:
     * Desktop: Left-aligned vertical list
     * Selected item has black background with white text
     * Non-selected items are black text
     * Mobile: Hidden, replaced by section headings
   
   - **Social Icons**:
     * Use circular black icons with white interior symbols
     * Size: 52px (desktop), 40px (mobile)
     * Horizontal arrangement with 12-16px spacing between

4. **Responsive Implementation Requirements**:
   - **Breakpoints**:
     * Mobile: Up to 767px 
     * Tablet: 768px - 1023px
     * Desktop: 1024px and above
   
   - **Mobile Adjustments**:
     * Replace navigation with hamburger menu
     * Hide table of contents
     * Adjust font sizes downward by ~20%
     * Stack all content sections

   - **Progressive Enhancement**:
     * Start with mobile layout (mobile-first approach)
     * Add complexity at larger breakpoints

#### Accessibility Requirements
1. Proper semantic HTML structure
2. ARIA labels for interactive elements
3. Sufficient color contrast (WCAG AA)
4. Keyboard navigable components
5. Focus indicators for interactive elements

#### Performance Considerations
1. Optimize image assets, especially social icons
2. Consider using SVG instead of PNG for icons
3. Implement responsive loading patterns
4. Minimize CSS by using a systematic approach

### Implementation Steps

1. Create the Vue.js component
2. Update the DefaultController
3. Add the new route
4. Implement the exact styling from the mockups
5. Test on different screen sizes
6. Ensure proper content is loaded from markdown files

- [x] Created a static HTML template for reference at `/Users/pi/Dropbox/dev/aeyia/kura/claude/tmp/terms-template.html`
- [x] Converted template to a Blade template at `/Users/pi/Dropbox/dev/aeyia/kura/web/resources/views/terms-conditions.blade.php`
- [x] Added controller method `termsAndConditions()` to `DefaultController.php`
- [x] Added route `/terms` in `web.php` that points to the controller method
- [x] Added both T&Cs and Privacy Policy sections to the template with appropriate anchor tags
- [x] Updated SiteFooter component links to point to T&Cs and Privacy Policy sections
- [x] Updated Welcome page footer with both T&Cs and Privacy Policy links
- [ ] stop and await review and final content before making further refinements

## Done


# TODO

!! Review claude/ways-of-working.md before working

## Requirements Breakdown
- [x] Identify duplicated links between desktop and mobile navigation
- [x] Identify duplicated navigation/footer templates across multiple pages (Holding.vue and Society.vue)
- [x] Design a reusable Vue component structure for header menus and footers
- [x] Create an architectural solution that maintains the current functionality

## Current Issues
- Navigation menu links are duplicated between desktop and mobile versions
- Navigation and footer code is duplicated across multiple page templates (Holding.vue and Society.vue)
- Background image handling is duplicated
- Mobile menu toggle functionality is duplicated
- Social media links and copyright information is duplicated
- Inconsistent styling between pages that should share the same design elements

## Architectural Solution

### Component Structure
1. Create reusable components:
   - `SiteHeader.vue` - Header component with logo and navigation
   - `SiteFooter.vue` - Footer component with social links and copyright
   - `MobileMenu.vue` - Mobile navigation overlay
   - `BackgroundImage.vue` - Responsive background image handler
   - `NavigationLinks.vue` - Shared navigation links component

### Component Props and Slots
1. `SiteHeader.vue`
   - Props:
     - `logoType` - Switch between image and text logo (for Society page)
     - `logoText` - Text to display when using text logo
     - `logoImagePath` - Path to logo image
   - Contains MobileMenuButton and desktop navigation
   - Uses NavigationLinks component for link consistency

2. `SiteFooter.vue`
   - Props:
     - `style` - "transparent" or "white" to switch between styles (Holding vs Society)
     - `socialLinks` - Array of social media links with URLs and icons
   - Contains mobile and desktop footer layouts

3. `MobileMenu.vue`
   - Props:
     - `isOpen` - Boolean to control menu visibility
     - `logoType`/`logoText`/`logoImagePath` - Same as header
   - Events:
     - `close` - Emitted when the menu should close
   - Uses NavigationLinks component

4. `BackgroundImage.vue`
   - Props:
     - `imageNumber` - Which background image to use (e.g., "03")
     - `fixed` - Boolean to control fixed positioning
   - Manages all responsive image sources

5. `NavigationLinks.vue`
   - Props:
     - `isMobile` - Boolean to adjust styling for mobile/desktop
     - `closeMenu` - Function to close mobile menu if in mobile context

### State Management
- Move shared state (like mobileMenuOpen) to the parent component
- Pass state and handlers down to components through props

## Todo Items for Implementation

1. [x] Create base component files in `resources/js/Components`:
   - [x] NavigationLinks.vue
   - [x] SiteHeader.vue
   - [x] SiteFooter.vue
   - [x] MobileMenu.vue
   - [x] BackgroundImage.vue

2. [x] Implement NavigationLinks.vue:
   - [x] Extract shared navigation links
   - [x] Accept mobile/desktop styling props
   - [x] Include authentication links conditionally

3. [x] Implement BackgroundImage.vue:
   - [x] Extract responsive image management
   - [x] Add configurable image number
   - [x] Support fixed/scroll behavior

4. [x] Implement SiteHeader.vue:
   - [x] Add support for text/image logo
   - [x] Integrate with NavigationLinks
   - [x] Include mobile menu toggle button

5. [x] Implement MobileMenu.vue:
   - [x] Extract mobile menu functionality
   - [x] Use NavigationLinks component
   - [x] Add close button and animation

6. [x] Implement SiteFooter.vue:
   - [x] Extract both mobile and desktop layouts
   - [x] Support different styling (transparent/white)
   - [x] Include social links and copyright

7. [x] Update Holding.vue and Society.vue:
   - [x] Replace duplicated code with new components
   - [x] Move shared state to parent component
   - [x] Ensure consistent styling and behavior

8. [x] Test functionality will be handled separately

9. [x] Document components with JSDoc comments

## Benefits
- Single source of truth for navigation links
- Consistent header and footer across all pages
- Easier to maintain and update
- More consistent user experience
- Easier to add new pages by reusing components
- Smaller bundle size from reduced code duplication
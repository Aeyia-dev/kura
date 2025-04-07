# Static HTML Wellness Marketplace Landing Page Brief

## Overview
This brief outlines a modern, responsive landing page for a wellness marketplace built with static HTML, CSS, and minimal JavaScript, emphasizing progressive enhancement principles to ensure functionality across all devices while providing an enhanced experience for more capable browsers.

## Technical Requirements
- Built with semantic HTML5
- Progressive enhancement approach
- Mobile-first responsive design
- Optimized for performance and accessibility
- Cross-browser compatibility

## CSS Framework Alternatives to Tailwind

Instead of Tailwind, which can lead to verbose HTML and styling concerns directly in markup, use this better alternatives that provide UI components while maintaining separation of concerns:

**Pico.css** - Minimal CSS framework that provides beautiful designs with semantic HTML

## Key Sections & UI Elements

### 1. Hero Section
- **Layout Type**: Full-width hero banner
- **Content**: 
  - Looped background video (with static fallback image for slower connections)
  - Prominent headline that clearly communicates value proposition
  - Concise subheading explaining the marketplace concept
  - Primary CTA button ("Explore Offerings" or "Join Our Community")
  - Secondary CTA ("Learn More")
- **Behavior**: Subtle parallax effect as user scrolls
- **Progressive Enhancement**: Video should be optional with graceful fallback to static image

### 2. Value Proposition Section
- **Layout Type**: Three-column feature grid (stacks to single column on mobile)
- **Content**: 
  - Three key benefits with corresponding icons
  - Brief explanatory text for each benefit
- **Animation**: Subtle fade-in animations as elements enter viewport

### 3. Featured Wellness Categories
- **Layout Type**: Carousel/slider with card components
- **Content**: 
  - Horizontally scrollable cards representing different wellness categories
  - Each card features category image, title, and brief description
- **Behavior**:
  - Touch-enabled swipe on mobile
  - Arrow navigation on desktop
  - Automatically advances with pause on hover
- **Progressive Enhancement**: Degrades to scrollable horizontal container without JS

### 4. Testimonials Section
- **Layout Type**: Fixed background parallax section
- **Content**: 
  - Full-width high-quality photograph as background
  - Overlaid testimonial quotes that rotate through a carousel
  - Customer photos and names
- **Behavior**: Background image remains fixed while content scrolls (vertical sliding window effect)
- **Progressive Enhancement**: Fallback to standard scrolling for browsers that don't support fixed positioning

### 5. Featured Practitioners
- **Layout Type**: Masonry grid gallery
- **Content**: 
  - Featured wellness practitioners with images
  - Brief bio and specialties
  - Rating indicators
- **Behavior**: 
  - Gentle hover effects on desktop
  - Lazy-loading images as user scrolls

### 6. How It Works
- **Layout Type**: Vertical timeline/process steps
- **Content**: 
  - Step-by-step explanation of marketplace process
  - Numbered steps with icons and brief explanations
- **Animation**: Sequential fade-in as user scrolls down the page

### 7. App Download Section
- **Layout Type**: Split-screen layout
- **Content**: 
  - Device mockup showing the mobile app
  - App store badges
  - Brief feature highlights
- **Behavior**: Subtle floating animation for device mockup

### 8. Newsletter & Community Section
- **Layout Type**: Call-to-action banner
- **Content**: 
  - Email signup form
  - Social media links
  - Community stat counters (members, practitioners, etc.)
- **Behavior**: Form validation with helpful error messages

### 9. Footer
- **Layout Type**: Multi-column footer grid
- **Content**: 
  - Navigation links organized by category
  - Contact information
  - Legal links
  - Social media icons
- **Behavior**: Sticky on desktop, standard on mobile

## Responsive Design Specifications

### Mobile (< 768px)
- Single column layouts
- Collapsed navigation with hamburger menu
- Stacked content blocks
- Simplified animations
- Touch-optimized interaction elements

### Tablet (768px - 1024px)
- Two-column layouts where appropriate
- Expanded navigation
- Optimized spacing and typography

### Desktop (> 1024px)
- Full layout with multi-column sections
- Enhanced animations and transitions
- Hover states and desktop-specific interactions
- Fixed-position elements (parallax sections)

## Progressive Enhancement Strategy
1. **Core Content**: Ensure all content is accessible without JavaScript
2. **Enhanced Layout**: Apply advanced CSS layout techniques with appropriate fallbacks
3. **Interactive Elements**: Add JavaScript interactions as enhancement, not requirement
4. **Media Optimization**: Provide appropriate media based on connection speed and device capabilities
5. **Performance Budget**: Establish loading time targets for various network speeds

## JavaScript Libraries for Interactive Elements
For the carousel, parallax effects, and other interactive elements, consider these lightweight options:
- Swiper.js for carousels
- Simple-parallax.js for parallax effects
- Vanilla JavaScript where possible to reduce dependencies

## Design System Guidelines
- Use consistent spacing scale based on 8px increments
- Maintain a clear visual hierarchy with defined heading styles
- Implement an accessible color palette with sufficient contrast ratios
- Use web-safe font stacks with fallbacks
- Optimize all images and videos for web delivery

## Animation Guidelines
- Use subtle, purpose-driven animations
- Ensure all animations can be disabled for users with motion sensitivity
- Implement performance-optimized animations using CSS transitions
- Keep animation duration between 200-500ms for optimal user experience

This brief provides a comprehensive foundation for designing a modern wellness marketplace landing page using semantic HTML and clean CSS architecture instead of Vue.js, which would be unnecessary for a primarily static brochure site.
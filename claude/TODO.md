# TODO

!! Review claude/ways-of-working.md before working

in the claude folder are the designs for teh about us page - png design guide and html exports out of figma.

$ tree claude
...
claude
├── tmp
│   ├── About Us - Mobile.png
│   ├── about us.png
│   ├── about-figma
│   ├── about-mobile-figma
...

## QA review - About.vue
- [x] the about us page is loading great and has all the assets and components
- [x] design updates are implemented with a single background image covering the entire page
- [x] About us content is retained and properly displayed

## Done
- Updated About.vue to use a single background image like the other pages
- Simplified the layout by rolling back the split background approach
- Maintained the About us content and email signup form
- Ensured responsive design for mobile and desktop displays
- Centered the hero content in a column while keeping text left-aligned
- Used a max-width container to control the width of the content area
- Fixed background image positioning to always show the top of the image at the top of the screen
- Added 'object-top' class to the BackgroundImage component to ensure consistent alignment across all viewports
- Enhanced the BackgroundImage component with a new offsetPx property to move images further up
- Used fixed pixel values instead of percentage-based offsets for consistent appearance across viewport sizes
- Dynamically increased container height using calc(100% + offsetPx) to account for the offset
- Fixed overzoomed background images by using object-position: top center
- Improved object-cover behavior to maintain proper aspect ratio and prevent sides from being cut off
- Removed overflow:hidden to ensure full image width is displayed
- Added better fixed position handling for full viewport coverage
- Fixed issues with gaps at the bottom of the viewport on narrow screens
- Added 5rem (mt-20) top margin to social media links in both mobile and desktop layouts
- Improved spacing in the footer for better visual balance
- Created BackgroundImage60 component for split-screen background (60% image/40% color)
- Added responsive mobile support with stacked layout (color on top, image below)
- Made background color customizable with a prop
- Set CharcoalAeyia (#212026) as the default background color
- Updated About page to use the BackgroundImage60 component with the CharcoalAeyia color
- Removed unnecessary overlay from About page
- Adjusted hero section content to align with the 60% background image portion
- Added appropriate margin (lg:ml-[30%]) to position content within the image section
- Fixed duplicate margin-left declaration in the CSS classes
- Improved responsive handling with proper centering on mobile and alignment on desktop
- Fixed BackgroundImage60 component to act as a true background and not affect document flow
- Changed background positioning to allow scrolling with page content rather than fixed
- Removed inappropriate text from the component
- Fixed the left background image to extend fully to match content height
- Ensured footer appears over the background properly positioned at the bottom of the content
- Improved the layout with proper relative/absolute positioning
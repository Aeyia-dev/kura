# TODO

!! Review claude/ways-of-working.md before working

in the claude folder are the designs for the contact us page - png design guide and html exports out of figma for desktop and mobile.

$ tree claude
...
claude
├── tmp
├── contact-figma/
├── contact-mobile-figma/
├── Contact - Mobile.png
├── Contact.png
...

- [x] dotpoint the soltuion for the contact up page using the design files as rerquirments docs. reverence the existing vuejs pages (Holding, About, Society)
   - note the different left/right layout of the contact page
- [x] Contact page implementation
  - Created Contact.vue component in web/resources/js/Pages/
  - Implemented left/right layout for desktop view according to design
  - Added form with validation (Full Name, Email, Phone, Message fields)
  - Created responsive mobile view with stacked layout
  - Added contact information section and social media links
  - Updated routes in web.php and added controller method
  - Followed patterns from existing pages (Holding, About, Society)
- [x] Fixed contact page layout issues
  - Fixed the layout - contact form is now on the right side, background image on the left
  - Fixed the background image not displaying properly by using the BackgroundImage component
  - Used the BackgroundImage component for responsive images on both desktop and mobile
  - Properly implemented overflow handling to ensure image displays correctly
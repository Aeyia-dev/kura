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
- [x] the layout for this page is different
   - [x] the backgound image should only be on the LHS. the RHS is a grey backgrond
   - [x] in respnsive mode the hero copy is over teh grey background and the image is below with the email signup over it.
   - [x] please review "about us.png" and "About Us - Mobile.png" and confirm you understand the layout / design changes

## Done
- Updated About.vue to match the design requirements:
  - Split the background layout on desktop: image on the left, grey background on the right
  - For mobile: grey background at the top with text, image below with email signup overlaid
  - Created separate desktop and mobile sections to optimize layout for both views
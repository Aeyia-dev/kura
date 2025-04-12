# AEYIA Landing Page Analysis and Responsive Plan

!! Review claude/ways-of-working.md before working

### Current Actions

### Done Items for Latest Update

### Done
- [x] Fix mobile menu not showing when hamburger button is clicked
   - Added debug logging to troubleshoot toggle function
   - Changed menu from v-if to v-show for smoother transitions
   - Improved positioning with fixed position on mobile
   - Added min-width to ensure menu is properly sized
   - Added CSS transitions for smooth animation effects
- [x] add login and register to the hamburger menu and main navigation
   - Removed the separate top-right authentication nav
   - Added auth links (login/register/dashboard) to the mobile hamburger menu
   - Integrated auth links into the desktop navigation with proper styling
   - Made the dashboard and email signatures links accessible for logged-in users
   - Ensured consistent styling across all navigation elements
- [x] reduce the body content across the board to fix overflow issues
   - Reduced "Elevate well" heading size
   - Decreased "coming soon" text size to prevent wrapping
   - Reduced email input and button sizes
   - Made social icons smaller and more appropriately sized
- [x] Move the /email-signatures-popup iframe from a modal to its own new page
   - [x] make a new page called web/resources/js/Pages/EmailSignaturesIframe.vue
   - [x] use welcome.vue as the basis - we want the top nav etc
   - [x] add this new signatures page to the nav for auth'd users
   - [x] make the body of EmailSignaturesIframe an iframe just like in Welcome and load /email-signatures-popup
   - [x] edit the welcome and remove the modal and change the link to go to the new page
- the register page is not templated
   - [x] copy the style guide to web/resources/js/Pages/Auth/Register.vue
- [x] Restore Jetstream authentication nav that was removed during landing page redesign:
   - The complete authentication section was replaced (lines 16-38 in old file)
   - Added back the authentication navigation to the top of the page
   - Styled with a modern translucent look to match the landing page design
   - Positioned with absolute positioning to not interfere with existing layout
- [-] Remove custom "society", "about", "contact" links (or make them real links)
   - Keep the placeholders do not touch them
- [-] Ensure all Laravel/Inertia routing is properly preserved
   - Dont do this
- [x] The placeholder text "Email" appears to be too bright instead of a more subdued/transparent white
- [x] In the Vue template (Landing.vue), the email input has a rectangular border instead of a rounded input field
- [x] elevate well / coming soon / email signup needs to be centered
- [x] the social icons are too close to the edge
- [x] the email form round corners border is super jagged
   - class="flex flex-col sm:flex-row border border-white rounded-full overflow-hidden"
   - see landing/email form round border.png
- [x] in responsive mode the email form needs redesign
   - see landing-responsive.png
- [x] responsive - review landing-figma.png and the current landing-responsive.png
- [x] desktop - join button has wrapped text
- [x] update web/resources/js/Pages/Landing.vue with the new designs
   - rename the assets to useful naming convention eg the logos etc
   - changes will be nessesary and sufficient
   - dont make changes outside this task

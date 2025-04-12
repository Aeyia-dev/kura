# AEYIA Landing Page Analysis and Responsive Plan

### Current Problems
- [ ] I need the login / nav from jetstream on the landing page - look and see what else went missing
   - git diff web/resources/js/Pages/Landing.vue
   - applying the template has wiped out the laravel nav.
   - quantify the changes and add the soluiton to the Implementation Plan checklist below:

### Implementation Plan



### Done
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



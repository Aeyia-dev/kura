# Work Log

## Next
- Holding site
- ✅ signatures
- project app (clickup)
  - find the good bits and share how we can use it with Mia
- ✅ framework online
- video tech spike
- society.aeyia.com <- do we start using this now?
  - talk to Leah about this
    - what day? Friday (Michael allocated time)
    - set up a regular fortnightly catch up (project tracking)
    - with Michael & Sarah
  - lets have an onsite next week now that we have kicked off
  - bad for seo if we then move to aeyia.com/society
  - [Society Implimentation](https://docs.google.com/document/d/1LKft_wHPVuzz1ZAs5rVwFLoMfmgrG4AB67R5EJnjSrs/edit?tab=t.0)

## Wed May 14 11:10:29

Current action:
- Email signatures
  - dark mode transparency fix
    - ✅ fix social icons with https://www.photopea.com/
    - [ ] contact icons dont work well in dark mode, need a different design
  - ✅ Mac Mail solution
- Holding site QA
- sitewide
  - [ ] All buttons charcoal
  - ✅ only medium fonts (500) - no heavier
  - [ ] GA4
  - [ ] Meta Pixel
  - [ ] Klavio tracking
  - [ ] Hubspot tracking?
- Landing page
  - ✅ Remove email subscribe from dev
  - ✅ email subscribe replace modal with byline message under input
  - ✅ drop the hero text to match figma
- T&Cs
  - ✅ nav box edges rounded 15px
  - ✅ All buttons charcoal
  - ✅ only medium fonts (500) - no heavier
  - ✅ fix mobile menu
  - ✅ add logo so we can get back
- Society
  - ✅ Contact box Dust #e9e3db 35%
  - ✅ push text down below chin
  - ✅ push image up - widen x
  - ✅ check "stay in the loop" is medium weight
  - ✅ push ABN down to baseline of Contact Us - use line height etc
  - ✅ tighten responsive padding esp below signup form
  - ✅ 1024 breakpoint logo to large
  - ✅ widen the hero font but keep on one line
  - ✅ test the society klavio list
- About
  - ✅ side by side layout - use fixed LHS width, flexible grey bar
  - ✅ keep face on screen when resizing responive view
  - ✅ move hero text over to right and down - see whatsapp image guide.
  - ✅ responsive mode for ipad and down (portrait?)
  - ✅ sticky footer - too low on decktop, too high on mobile
- Contact
  - ✅ tighten up form input spacing
  - ✅ 15px radius buttons
  - ✅ check "contact us" font is medium
  - ✅ hamburger too low
  - ✅ hamburger too small
  - ✅ logo too big
  - ✅ footer not finished - sticky, full width, social icons separate, float down on responive
  - ✅ fixed RHS width, flexible image bar
  - [ ] footer should be across the entire page


## Mon May 12 13:08:52

Current action:

- [ ] get a prod holding site online
  - ✅ aeyia.com and society.aeyia.com DNS
    - ✅ Test
    - [ ] Move DNS to AWS
  - ✅ klavio signups
  - ✅ Tidy up build and deploy issues
  - [ ] git track build files? Another deploy method?
  - ✅ Hubspot integration
  - [ ] Pixel and GA
  - ✅ QA physical devices on staging
    - ✅ Holding page
      - email signup
        - ✅ border RED after success.
        - [ ] modal is not designed
    - ✅ Society page view
    - ✅ social links
    - ✅ page links / contact us / T&Cs
    - ✅ About us page
    - ✅ T&C / PP
    - ✅ Contact page
  - [ ] add qr to account verification email

## Thu May 01 11:11:19

Current action:

- ✅ round favicons
- ✅ rename images for SEO
- [ ] get a prod holding site online
  - ✅ aeyia.com and society.aeyia.com vhosts
  - [ ] aeyia.com and society.aeyia.com DNS
    - ✅ request
    - [ ] test
  - ✅ Add Holding page view
  - ✅ Add Society page view
  - ✅ social links
  - ✅ update page links / contact us / T&Cs
  - ✅ About us page
  - ✅ T&C / PP
  - ✅ Contact page
  - [ ] klavio signups
  - [ ] Hubspot integration
  - [ ] Pixel and GA
- ✅ All Aeyia emails in Signature generator

## Thu Apr 10 13:59:13

0. Tailwind is injecting it styles into the css only email signature that deliberatley has no tailwind attrs
0. The --tw- styles is not an option as the styles are applied as the ctrl-copy occurs, not before
1. I need WYSIWYG-ready rendered code that looks exactly like your email signature
2. It must be clean HTML without any extraneous Tailwind styles
3. It needs to work properly when pasted into Gmail's WYSIWYG editor
4. We havent solved copy via an iframe, this is an optiuon if we can resolve this
5. Regex stripping doesnt work
6. dont do any coding until an option is approved

- thicker, vertical line + less transparancy
- tighten up teh logos

Temp site rollout
- https://docs.google.com/spreadsheets/d/1FhvOERixrZCEtIlnRmE7fn91mwwGQ20W_O3zihFxklE/edit?gid=1537162004#gid=1537162004
- connect domain to webflow
  - https://aeyia.com/lander
- test login
  - required
  - add a new user?
- test figma export
- get temp site up before easter break
- klavio connect
- GA / FB pixel connect
- mia sending stock images
- and icons are in figma

once the temp site is online we will send out the email signature

## Landing site
- production file, in accounts set up tab
- webflow account is set up
- mia working on style guide via placeholder page
- meta pixel and GA all set up

- work off the figma file
- create static html verion
- publish from figma to webflow - test this
  - may need to be a protoype first
  - what is involved in this?
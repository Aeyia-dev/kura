# Society Free Session Application - User Journey

## Title: Society Free Session Application

## Design Notes & Questions
- Are we using mentwell or own system...
- Are sessions completely free or do they get x amount of points - how does this work with varying practitioner fees?
- Are sessions completely free or do they get x amount of points
- How does gift card get delivered? Is this a HTML? Can this be embedded in our AEYIA email in response to sign up?
- Do gift cards work on stripe or does this need any customisation?

## Entry Points
- **Society** - Organization initiating free session program

## User Journey

### Gift Card Issuance
1. **Society**
   - Organization starts free session program
   - Leads to gift card creation

2. **Gift Card Issued**
   - Free session credit generated
   - Two parallel paths:
     - Direct to application form
     - Optional email with session code

### Application Process
1. **AEYIA Society Application Form**
   - User completes society-specific application
   - Provides necessary information for free session

2. **Email With Free Session Code**
   - Optional path where user receives code via email
   - Code grants access to free session

### Booking Completion
1. **Complete Booking**
   - User finalizes free session booking
   - Session reserved with selected practitioner

## Sequence Flow
```
       ┌─────────────┐
       │Society      │
       └──────┬──────┘
              │
              ↓
       ┌─────────────┐
       │Gift Card    │
       │Issued       │
       └──────┬──────┘
              │
      ┌───────┴───────┐
      │               │
      ↓               ↓
┌─────────────┐    ┌─────────────┐
│AEYIA Society│    │Email With   │
│Application  │    │Free Session │
│Form         │    │Code         │
└──────┬──────┘    └──────┬──────┘
       │                  │
       └──────────────────┘
                │
                ↓
       ┌─────────────────┐
       │Complete Booking │
       └─────────────────┘
```

## Business Rules
1. Societies can establish free session programs for their members
2. Gift cards are issued to provide free session access
3. Users must complete an AEYIA society application form
4. Free session codes can be delivered via email
5. The system must accommodate varying practitioner fees
6. Free sessions may be completely free or use a points-based system
7. Completed applications lead to finalized bookings

## Integration Points
- Society management system
- Gift card generation system
- Application form processing
- Email delivery system
- Free session code management
- Booking system
- Practitioner fee reconciliation system
- Stripe integration for gift card processing (if applicable)

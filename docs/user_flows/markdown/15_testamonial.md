# Testimonial Flow - User Journey

## Title: Testimonial Flow

## Design Notes & Questions
- Only previously booked practitioners appear in the list
- AEYIA reviews via 3rd party review platform e.g. Judge.me to build trust
- Feedback to Practitioner
- Users receive credit for reviews/testimonials

## Entry Points
Multiple entry points for testimonial submission:
- **Email Invite**
- **Practitioner Page**
- **Testimonial Page**
- **Post Session**
- **Account Dashboard 'Previous Bookings And Reviews'**

## Main Flow

### Review Selection
Two primary review paths:
1. **Review Practitioner**
   - User chooses to review specific practitioner
   
2. **Review AEYIA**
   - User chooses to review the platform itself

### Practitioner Review Path
1. **Approve by AEYIA**
   - Review is submitted for moderation
   - Decision point: Yes/No
   
   - **If Approved (Yes)**:
     - **Publish On Profile**
       - Review appears on practitioner profile
       - **Notify Practitioner** of new review
       - **Publish In Testimonial Library**
       - User receives credits (per design note)
   
   - **If Not Approved (No)**:
     - **Customer Service Contact**
       - Support team contacts user to address issues
       - May lead to **Problem Solving with Client & Practitioner Manual Publishing**
       - May ultimately lead to **Publish In Testimonial Library** after resolution

### AEYIA Platform Review Path
Two format options:

1. **Video Testimonial**
   - User records video testimonial
   - **Publish Profile**
     - Video testimonial added to appropriate profiles

2. **Text Testimonial**
   - User writes text testimonial
   - **Automatically Publish To Google**
     - Review published to Google listings
   - **Automatically Publish To Profile**
     - Review published to platform profiles

## Sequence Flow
```
┌───────────┬────────────────┬───────────────┬─────────────┬──────────────────────────┐
│           │                │               │             │                          │
│Email      │Practitioner    │Testimonial    │Post Session │Account Dashboard         │
│Invite     │Page            │Page           │             │'Previous Bookings And    │
│           │                │               │             │Reviews'                  │
└─────┬─────┴────────┬───────┴───────┬───────┴──────┬──────┴─────────────┬────────────┘
      │              │               │              │                    │
      └──────────────┴───────────────┴──────────────┴────────────────────┘
                                     │
                      ┌──────────────┴───────────────┐
                      ↓                              ↓
             ┌──────────────────┐           ┌──────────────────┐
             │                  │           │                  │
             │Review Practitioner│           │Review AEYIA      │
             │                  │           │                  │
             └────────┬─────────┘           └────────┬─────────┘
                      │                              │
                      ↓                    ┌─────────┴──────────┐
             ┌──────────────────┐          ↓                   ↓
             │                  │  ┌──────────────┐    ┌──────────────┐
             │Approve by AEYIA  │  │              │    │              │
             │                  │  │Video         │    │Text          │
             └────────┬─────────┘  │              │    │              │
                      │            └──────┬───────┘    └──────┬───────┘
              ┌───────┴───────┐           │                   │
              ↓               ↓           ↓                   ↓
         ┌────────┐      ┌────────┐ ┌────────────┐    ┌──────────────┐┌──────────────┐
         │        │      │        │ │            │    │              ││              │
         │Yes     │      │No      │ │Publish     │    │Automatically ││Automatically │
         │        │      │        │ │Profile     │    │Publish To    ││Publish To    │
         └────┬───┘      └────┬───┘ │            │    │Google        ││Profile       │
              │               │     └────────────┘    │              ││              │
              ↓               ↓                       └──────────────┘└──────────────┘
    ┌──────────────────┐ ┌───────────────────┐
    │                  │ │                   │
    │Publish On Profile│ │Customer Service   │
    │                  │ │Contact            │
    └────────┬─────────┘ └────────┬──────────┘
      ↓                           │              ┌────────────────────────────────┐
┌────────────────┐                │              │                                │
│                │                └──────────────→Problem Solving with Client &   │
│Notify          │                               │Practitioner Manual Publishing  │
│Practitioner    │                               │                                │
│                │                               └─────────────────┬──────────────┘
└────────────────┘                                                 │
      │                                                            │
      ↓                                                            ↓
┌─────────────────────┐                                  ┌──────────────────┐
│                     │                                  │                  │
│Publish In           │◀─────────────────────────────────│                  │
│Testimonial Library  │                                  │                  │
│                     │                                  │                  │
└─────────────────────┘                                  └──────────────────┘
```

## Business Rules
1. Only users who have booked with a practitioner can leave reviews for that practitioner
2. All practitioner reviews must be approved by AEYIA before publication
3. Users receive credit rewards for submitting reviews/testimonials
4. Negative reviews trigger customer service intervention
5. Platform reviews are published through third-party services like Judge.me
6. Video testimonials have a different publication process than text testimonials
7. Practitioners must be notified when new reviews are published

## Integration Points
- Third-party review platforms (e.g., Judge.me)
- Google review API
- Credit/rewards system
- Practitioner notification system
- Content moderation system
- Video hosting service

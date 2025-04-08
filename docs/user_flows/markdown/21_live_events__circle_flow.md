# Live Events / Circle Flow - User Journey

## Title: Live Events / Circle Flow

## Design Notes & Questions
- Events are handled through Circle Integration
- Tech: Can you RSVP through Circle? Is the button click enough to RSVP? Can events show up on practitioner dashboard?
- If I cancel, is this a one click on button or do I have to sign into circle?
- Capacity for live streams & live rooms?
- Business procedure: What if someone RSVPs and doesn't join? Penalty fee? How does this get managed
- How far in advance do I need to cancel?
- What if they just show up for 2 min?
- Expert talks can be added to library in x days after the event... how long after & what are the requirements?
- Are certain expert talks ticketed differently?
- What happens if event is sold out? Can we automatically update the event banner?
- Are events facilitated on Circle or via our website through headless?
- Can practitioners and clients use same circle without seeing each others content
- Can API be used for course
- Can live sessions be recorded?
- How would penalty fee be charged?

## Entry Points
Three primary entry points:
- **Direct Link** - From social media, EDM, or shared link
- **Website Event Page or Banner** - From the platform website
- **Account Dashboard** - Client and practitioner access point

## User Journey

### Initial Access
1. **RSVP Process**
   - Click button to toggle attendance
   - Triggers two parallel actions:
     - **Email Reminder For Event & Before Cancellation Deadline**
     - **Create Calendar Invite**

2. **Calendar Reminder Path**
   - User receives calendar reminder
   - **Authenticated** check
     - Decision point: Yes/No
     
     - **If No** (Not authenticated)
       - **Sign In Popup**
       - User must sign in to proceed
       
     - **If Yes** (Successfully authenticated)
       - Continue to scheduled event

3. **Client Account/Dashboard Path**
   - Alternative path for users accessing via dashboard
   - Leads directly to scheduled event

### Event Management
1. **Cancel Session Via Button Toggle Or Dashboard**
   - Option to cancel attendance
   - Related rule: **Failed Attendance Fees**
     - Penalty fee when user doesn't cancel 24 hours before and doesn't show up

2. **Scheduled Event - Website & App?**
   - The actual event participation
   - Two post-event paths:
     - **Thank You Email & Rebook Option & Replay On Circle**
     - **Expert Talks: Add Replay To Library In X Days**
       - Followed by **Email Notification: New Expert Talk Live**

## Circle Platform Capacity Notes
- **Live Streams**: Broadcast to up to 1,000 attendees
- **Live Rooms**: Capacity varies based on subscription plan
  - Professional Plan: Up to 30 participants can join on camera
  - Enterprise Plan: Up to 50 participants can join on camera

## Sequence Flow
```
┌────────────────┐ ┌────────────────┐ ┌────────────────┐
│Direct Link     │ │Website Event   │ │Account Dashboard│
│(Social Media,  │ │Page or Banner  │ │Client And      │
│EDM, Shared Link)│ │                │ │Practitioner    │
└───────┬────────┘ └───────┬────────┘ └───────┬────────┘
        │                  │                  │
        └──────────────────┼──────────────────┘
                          ↓
            ┌────────────────────────┐
            │RSVP: Click button to   │
            │toggle attendance       │──────────────────┐
            └───────────┬────────────┘                  │
                        │                               ↓
┌───────────────────────┼───────────────┐    ┌───────────────────┐
│                       │               │    │Email Reminder For │
↓                       ↓               │    │Event & Before     │
┌────────────────┐ ┌────────────────┐   │    │Cancellation      │
│Calendar        │ │Client Account/  │   │    │Deadline          │
│Reminder        │ │Dashboard        │   │    └───────────────────┘
└───────┬────────┘ └───────┬────────┘   │
        │                  │            │
        ↓                  │            ↓
┌────────────────┐         │     ┌────────────────┐
│Authenticated   │         │     │Create Calendar │
└───────┬────────┘         │     │Invite          │
        │                  │     └───────┬────────┘
    ┌───┴───┐              │             │
    ↓       ↓              │             │
   No      Yes             │             │
    │       │              │             │
    ↓       └──────────────┼─────────────┼─────┐
┌────────────────┐         │             │     │
│Sign In Popup   │         │             │     │
└───────┬────────┘         │             │     │
        │                  │             │     │
        └──────────────────┼─────────────┘     │
                          ↓                    ↓
           ┌────────────────────────┐  ┌────────────────┐
           │Scheduled Event -       │  │Cancel Session  │
           │Website & App?          │◀─┤Via Button      │
           └───────────┬────────────┘  │Toggle Or       │
                       │               │Dashboard       │
                       │               └───────┬────────┘
                       │                       │
          ┌────────────┴────────────┐          │
          ↓                         ↓          │
┌───────────────────┐  ┌───────────────────┐   │
│Thank You Email &  │  │Expert Talks: Add  │   │
│Rebook Option &    │  │Replay To Library  │   │
│Replay On Circle   │  │In X Days          │   │
└───────────────────┘  └───────┬───────────┘   │
                               │               │
                               ↓               │
                      ┌───────────────────┐    │
                      │Email Notification:│    │
                      │New Expert Talk    │    │
                      │Live               │    │
                      └───────────────────┘    │
                                               │
                                               ↓
                               ┌───────────────────────┐
                               │Failed Attendance Fees:│
                               │Penalty Fee When User  │
                               │Doesn't Cancel 24      │
                               │Hours Before And       │
                               │Doesn't Show Up        │
                               └───────────────────────┘
```

## Business Rules
1. Events are managed through Circle integration
2. RSVP is done via button toggle
3. Authentication is required for event participation
4. Users receive email reminders and calendar invites
5. Penalty fees apply for no-shows without cancellation (24-hour policy)
6. Expert talks can be recorded and added to the library
7. Event replays are available on Circle
8. Live stream capacity varies based on subscription plan

## Integration Points
- Circle platform integration
- Calendar system for event reminders
- Email notification system
- Authentication system
- Content library for expert talk replays
- Payment system for penalty fees

# Cancel OR Reschedule Booking - User Flow

## Title: Cancel OR Reschedule Booking

## Design Questions & Notes
- Cancellation Policy
- Booking change rules e.g. change window
- Refund Policy
- Does practitioner get deposit fee if client cancels?
- How do refunds get processed?

## Entry Points
User can access booking management through multiple channels:
- **Booking Details Email**
- **Booking Details SMS**
- **Calendar Invite**
- **Account Login**

## User Journey

### Booking Management
1. **Customer Account - View Active Bookings**
   - User accesses their bookings dashboard
   - Optional: Can access **Help Center** for assistance

2. **Cancellation Window Check**
   - System checks if request is **Within Cancellation Window**
   - Decision Point: Yes/No

### If Outside Cancellation Window (No)
Two options are presented:
- **Cancel Without Refund**
  - User can cancel but will not receive refund
- **Contact Customer Support**
  - User directed to support for special circumstances

### If Within Cancellation Window (Yes)
User has two primary options:

#### Option 1: Cancel
1. **Cancel**
   - User selects to cancel appointment
2. **Refund Business Process Dependent**
   - System processes refund according to business rules
   - Refund amount may vary based on notice period

#### Option 2: Reschedule
1. **Reschedule**
   - User selects to reschedule appointment
2. **Calendar Select Time & Date**
   - User selects new available time slot
3. **Confirmation**
   - System confirms new booking details
   - Two parallel processes:
     - **Adjust Practitioner Booking**
       - Updates practitioner's calendar
     - **Email Notification For Practitioner**
       - Notifies practitioner of changes
     - **Booking Confirmation Email With Session Details, Calendar Link, Intake Form, Informed Consent, Waiver**
       - Sends updated booking confirmation to client

4. **Reminders**
   - **Session Reminder SMS**
   - **Session Reminder Email**
   - Both lead to **Scheduled Session Flow**

## Sequence Flow
```
┌─────────────┬─────────────┬─────────────┬─────────────┐
│             │             │             │             │
│  Booking    │  Booking    │  Calendar   │  Account    │
│  Details    │  Details    │  Invite     │  Login      │
│  Email      │  SMS        │             │             │
└──────┬──────┴──────┬──────┴──────┬──────┴──────┬──────┘
       │             │             │             │
       └─────────────┴─────────────┴─────────────┘
                             │
                             ↓
                ┌────────────────────────┐
                │                        │
                │  Customer Account -    │←──────┐
                │  View Active Bookings  │       │
                │                        │       │
                └────────────┬───────────┘       │
                             │                   │
                             ↓                   │
                ┌────────────────────────┐       │
                │                        │       │
                │  Within Cancellation   │←──────┤
                │  Window                │       │
                │                        │       │
                └────────────┬───────────┘       │
                             │                   │
               ┌─────────────┴──────────┐        │
               │                        │        │
              Yes                       No       │
               │                        │        │
               │                        │        │  Help Center
        ┌──────┴───────┐         ┌──────┴───────┴──────────────┐
        │              │         │                             │
        │              │         │                             │
    ┌───┴────┐    ┌────┴───┐ ┌───┴───────────┐ ┌───────────────┴────┐
    │        │    │        │ │               │ │                    │
    │ Cancel │    │Reschedule│ │Cancel Without│ │Contact Customer    │
    │        │    │        │ │Refund         │ │Support             │
    └───┬────┘    └────┬───┘ └───────────────┘ └────────────────────┘
        │              │
        ↓              ↓
┌───────────────┐ ┌────────────────┐
│               │ │                │
│Refund Business│ │Calendar Select │
│Process        │ │Time & Date     │
│Dependent      │ │                │
└───────────────┘ └────────┬───────┘
                           │
                           ↓
                  ┌────────────────┐
                  │                │
                  │  Confirmation  │
                  │                │
                  └────────┬───────┘
                           │
        ┌──────────────────┼─────────────────┐
        ↓                  ↓                 ↓
┌───────────────┐ ┌────────────────┐ ┌───────────────────┐
│               │ │                │ │                   │
│Adjust         │ │Email           │ │Booking            │
│Practitioner   │ │Notification    │ │Confirmation Email │
│Booking        │ │For Practitioner│ │With Session       │
│               │ │                │ │Details...         │
└───────────────┘ └────────────────┘ └─────────┬─────────┘
                                               │
                                               │
                           ┌──────────────────┘
                           │
                           ↓
          ┌────────────────┴────────────────┐
          ↓                                 ↓
┌──────────────────┐               ┌──────────────────┐
│                  │               │                  │
│Session Reminder  │               │Session Reminder  │
│SMS               │               │Email             │
│                  │               │                  │
└─────────┬────────┘               └────────┬─────────┘
          │                                 │
          └─────────────┬──────────────────┘
                        ↓
               ┌──────────────────┐
               │                  │
               │Scheduled Session │
               │Flow              │
               │                  │
               └──────────────────┘
```

## Business Rules
1. Refund eligibility depends on cancellation window timeframe
2. Practitioners may receive deposit fees for late cancellations
3. Reschedule options may be restricted based on practitioner availability
4. Multiple notifications must be sent for any booking changes
5. All booking changes must be reflected in practitioner calendars
6. System must retain record of original and modified bookings for reporting

## Integration Points
- Calendar system
- Payment processing/refund system
- Email notification system
- SMS notification system
- Practitioner scheduling system
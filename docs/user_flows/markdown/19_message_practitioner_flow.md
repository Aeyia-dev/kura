# Message Practitioner Flow - User Journey

## Title: Message Practitioner Flow

## Entry Points
Three primary entry points:
- **Existing Member** - Users who already have accounts
- **Non Member** - Users without accounts
- **Practitioner** - Service providers on the platform

## User Journey

### Existing Member Path
1. **Account Dashboard**
   - Members can access their dashboard
   - Navigate to messaging functionality
   
2. **Practitioner Profile**
   - Members can view practitioner profiles
   - Access messaging from profile
   
3. **Message Practitioner Button**
   - Initiate conversation with practitioner
   - Leads to security message

4. **Security Message**
   - "Please note these messages are monitored for training purposes"
   - Notification of monitoring practices
   - Leads to notification for practitioner

5. **Practitioner Existing Client Notification**
   - Practitioner is notified of message from existing client

### Non Member Path
1. **New Member | Enter Name & Email**
   - ZenDesk integration for non-members
   - Collects basic contact information

2. **ZenDesk Flow**
   - "Thank you for contacting the practitioner through our help portal. We have added your practitioner and you will receive a response via email"
   - Initial acknowledgment message
   
3. **Welcome Email Flow**
   - System sends welcome email to new user

4. **Conversation Forwarded**
   - "New Customer Enquiry" on Dashboard
   - Message routed to appropriate practitioner
   - Triggers two notifications:
     - **Practitioner Email Notification**
     - **Email Reminder if Unanswered Messages**

### Practitioner Path
1. **Active Client**
   - Practitioner views active client list
   - Decision point: Yes/No

2. **If Yes** (Is an active client)
   - Inhouse messaging system
   - Three possible actions:
     - **Upcoming Booking** - View scheduled sessions
     - **Clients & Bookings** - View client information
     - **Inbox** - Access messaging system
   - Leads to **Message Client**

3. **Message Client**
   - Practitioner responds to client message
   - Triggers **Email Notification Client**

4. **If No** (Not an active client)
   - ZenDesk support system
   - Routes to **Contact Practitioner Support**

## Sequence Flow
```
Existing Member          Non Member                Practitioner
       │                      │                         │
       ↓                      ↓                         ↓
┌─────────────┐    ┌─────────────────────┐      ┌─────────────┐
│Account      │    │New Member | Enter   │      │Active Client│
│Dashboard    │    │Name & Email         │      └──────┬──────┘
└──────┬──────┘    │(ZenDesk Integration)│             │
       │           └──────────┬──────────┘        ┌────┴────┐
┌──────┴──────┐              │                    ↓         ↓
│Practitioner │              ↓              ┌─────────┐ ┌─────────┐
│Profile      │    ┌─────────────────────┐  │Yes      │ │No       │
└──────┬──────┘    │ZenDesk "Thank you   │  │         │ │         │
       │           │for contacting the   │  └────┬────┘ └────┬────┘
       │           │practitioner through │       │           │
       │           │our help portal. We  │       │           ↓
       ↓           │have added your      │       │     ┌─────────────┐
┌─────────────┐    │practitioner and you │       │     │Contact      │
│Message      │    │will receive a       │       │     │Practitioner │
│Practitioner │    │response via email"  │       │     │Support      │
│Button       │    └──────────┬──────────┘       │     └─────────────┘
└──────┬──────┘               │                  │
       │         ┌────────────┘                  │
       │         │      ┌───────────────┐        │
       │         │      │Welcome Email  │        │
       │         │      │Flow           │        │
       │         │      └───────────────┘        │
       ↓         ↓                               │
┌─────────────┐ ┌────────────────────┐           │
│Security     │ │Conversation        │           │
│Message      │ │Forwarded "New      │           │
│"Please note │ │Customer Enquiry"   │           │
│these        │ │on Dashboard        │           │
│messages are │ └─────────┬──────────┘           │
│monitored for│           │                      │
│training     │  ┌────────┴────────┐             │
│purposes"    │  ↓                 ↓             │
└──────┬──────┘ ┌─────────────┐ ┌─────────────┐  │
       │        │Practitioner │ │Email        │  │
       │        │Email        │ │Reminder if  │  │
       │        │Notification │ │Unanswered   │  │
       │        │             │ │Messages     │  │
       │        └─────────────┘ └─────────────┘  │
       ↓                                         │
┌──────────────────┐                             │
│Practitioner      │                             │
│Existing Client   │                             │
│Notification      │                             │
└──────────────────┘                             │
                                   ┌─────────────┴─────────────┐
                                   ↓             ↓             ↓
                            ┌─────────────┐┌─────────────┐┌─────────┐
                            │Upcoming     ││Clients &    ││Inbox    │
                            │Booking     ││Bookings     ││         │
                            └──────┬──────┘└──────┬──────┘└────┬────┘
                                   └───────┬──────┘         │
                                           ↓                │
                                   ┌───────────────┐        │
                                   │Message Client │◀───────┘
                                   └───────┬───────┘
                                           ↓
                                   ┌───────────────┐
                                   │Email          │
                                   │Notification   │
                                   │Client         │
                                   └───────────────┘
```

## Business Rules
1. Messages are monitored for training purposes (security/compliance)
2. Non-members must provide contact information before messaging
3. Different messaging systems are used for active clients vs. non-clients
4. Unanswered messages trigger email reminders to practitioners
5. Client messages trigger notifications to practitioners
6. Practitioners' responses trigger notifications to clients

## Integration Points
- Inhouse messaging system for existing members and active clients
- ZenDesk integration for non-members and non-active clients
- Email notification system
- Dashboard notification system
- Booking system integration

# Start Session - User Flow

## Title: Start Session

## Design Notes
- Screen Functionality: End session/record/turn video on-off/text chat/document and image share/report problem (emergency button - don't call it that)/share screen/Attachments/access client file/timer

## Entry Points
Multiple entry points for accessing session:
- **Email Confirmation**
- **Email Reminder** 
- **SMS Confirmation**
- **SMS Reminder**
- **Calendar**
- **Account Login Upcoming Booking**

## Main Session Flow

### Pre-Session
1. **Session Link**
   - User accesses session via provided link
   - Connects to **Authorization** for identity verification

2. **Informed Consent**
   - User reviews informed consent with video
   - Must click "I agree" checkbox to proceed

3. **Session Waiting Room**
   - Features:
     - Video + Audio Testing
     - Background Blur options
   - Parallel processes:
     - **Practitioner Email Client Is waiting** notification sent
     - **Notification On Dashboard For Practitioner** displayed

4. **Consent Video Recording**
   - If available through practitioner
   - User must provide consent for recording

### Session Execution
Two possible paths:

#### Path 1: Normal Session
1. **Practitioner Starts Session**
   - Practitioner initiates the video call
   
2. **End Session With Star Rating And Link To Contact Support, Leave Review**
   - End of session messaging: "Just checking in, be gentle to yourself, drink water..."
   - Rating options presented to user:
     - **4-5 stars** → "Thank you Notification & Option To Rebook"
     - **3 or less stars** → "What Went Wrong? | Contact Help Center"

3. **Post-Session Resources** (parallel options)
   - **Contact Help Center**
   - **View Files & Download via account**
   - **Session After Care**
   - **Leave Review via Testimonial Page**

#### Path 2: Failed Session
1. **Practitioner Misses Session**
   - Practitioner doesn't show up
   
2. **Sorry Your Session Has Been Cancelled**
   - System notifies user of cancellation
   
3. **Refund Email Confirmation**
   - Confirmation that payment will be refunded

### Rebooking Flow
1. **Rebook Session**
   - From "Thank you" notification
   - Or from "New Practitioner - Booking Flow"
     - Via **Discovery Call** or **Directory**

2. **Practitioner information Auto Fill**
   - System pre-fills practitioner information

3. **Calendar: Select Time & Date**
   - User selects new appointment time

4. **Payment**
   - Two payment options:
     - **Credit** (existing credits)
     - **$$$** (direct payment)

5. **Booking Confirmation**
   - Confirmation provided through multiple channels:
     - Booking confirmation in app
     - **Confirmation Email**
     - **Confirmation SMS**

6. **Scheduled Session**
   - New session scheduled and added to calendar

### Follow-up
1. **Testimonial Email Reminders**
   - System sends reminder to leave testimonial

## Sequence Flow
```
┌──────────┬──────────┬──────────┬──────────┬──────────┬──────────────┐
│          │          │          │          │          │              │
│Email     │Email     │SMS       │SMS       │Calendar  │Account Login │
│Confirmation│Reminder │Confirmation│Reminder │          │Upcoming      │
│          │          │          │          │          │Booking       │
└────┬─────┴────┬─────┴────┬─────┴────┬─────┴────┬─────┴──────┬───────┘
     │          │          │          │          │            │
     └──────────┴──────────┴──────────┴──────────┴────────────┘
                                   │
                                   ↓
                            ┌─────────────┐
                            │             │───→┌───────────┐
                            │Session Link │    │           │
                            │             │←───│Authorization│
                            └──────┬──────┘    │           │
                                   │           └───────────┘
                                   ↓
                      ┌────────────────────────┐
                      │Informed Consent with   │
                      │Video and 'I agree'     │
                      │Tickbox                 │
                      └────────────┬───────────┘
                                   │
                                   ↓
┌───────────────┐           ┌─────────────────────┐
│               │           │Session Waiting Room │
│Message        │←──────────│for Video + Audio    │───→┌───────────────────┐
│Practitioner   │           │Testing + Background │    │Practitioner Email  │
│               │           │Blur                 │    │Client Is waiting   │
└───────────────┘           └─────────┬───────────┘    └─────────┬─────────┘
                                      │                          │
┌───────────────┐                     │                          ↓
│               │                     │                ┌───────────────────┐
│Report A       │←────────────────────┘                │Notification On    │
│Problem        │                                      │Dashboard For      │
│               │                                      │Practitioner       │
└───────────────┘                                      └───────────────────┘
                                      │
                                      ↓
                      ┌────────────────────────┐
                      │Consent Video Recording │
                      │If Available Through    │
                      │Practitioner            │
                      └────────────┬───────────┘
                                   │
                  ┌────────────────┴─────────────────┐
                  ↓                                  ↓
        ┌───────────────────┐             ┌───────────────────┐
        │Practitioner Misses│             │Practitioner Starts│
        │Session            │             │Session            │
        └─────────┬─────────┘             └─────────┬─────────┘
                  │                                 │
                  ↓                                 ↓
        ┌───────────────────┐             ┌───────────────────────────────────┐
        │Sorry Your Session │             │End Session With Star Rating And    │
        │Has Been Cancelled │             │Link To Contact Support, Leave Review│
        └─────────┬─────────┘             │"Just checking in, be gentle to     │
                  │                       │yourself, drink water..."           │
                  │                       └───────────────┬───────────────────┘
                  │                                       │
                  ↓                        ┌──────────────┴───────────────────┐
        ┌───────────────────┐              ↓                                  ↓
        │Refund Email       │          ┌───────┐                          ┌───────┐
        │Confirmation       │          │4-5    │                          │3 or   │
        └───────────────────┘          │stars  │                          │less   │
                                       └───┬───┘                          │stars  │
                                           │                              └───┬───┘
                                           ↓                                  ↓
                                   ┌───────────────────┐             ┌───────────────────┐
                                   │Thank you          │             │What Went Wrong? | │
                                   │Notification &     │             │Contact Help Center│
                                   │Option To Rebook   │             └───────────────────┘
                                   └─────────┬─────────┘
                                             │
          ┌───────────────────────────┐      │      ┌───────────────────────────────────┐
          ↓                           ↓      │      ↓                                   ↓
┌───────────────────┐      ┌───────────────────┐   ┌───────────────────┐      ┌───────────────────┐
│Contact Help Center│      │View Files &       │   │Session After Care │      │Leave Review via   │
│                   │      │Download via account│   │                   │      │Testimonial Page   │
└───────────────────┘      └───────────────────┘   └───────────────────┘      └─────────┬─────────┘
                                                                                        │
        ┌─────────────────────────────────────────────────────────────────────────────┘
        │
        ↓
┌───────────────────┐
│Testimonial Email  │
│Reminders          │
└───────────────────┘

                                           │
                                           ↓
                                   ┌───────────────────┐
                                   │Rebook Session     │
                                   └─────────┬─────────┘
                                             │
 ┌───────────────────────────────────────────┴──────────────────────────┐
 ↓                                                                      ↓
┌───────────────────┐                                         ┌───────────────────┐
│New Practitioner - │                                         │Practitioner       │
│Booking Flow       │                                         │information Auto   │
└─────────┬─────────┘                                         │Fill               │
          │                                                   └─────────┬─────────┘
┌─────────┴─────────┐                                                   │
↓                   ↓                                                   ↓
┌───────┐      ┌────────┐                                     ┌───────────────────┐
│       │      │        │                                     │Calendar: Select    │
│Discovery│      │Directory│                                     │Time & Date        │
│Call    │      │        │                                     └─────────┬─────────┘
└───────┘      └────────┘                                               │
                                                                        ↓
                                                               ┌───────────────────┐
                                                               │Payment            │
                                                               └─────────┬─────────┘
                                                         ┌───────────────┴───────────────┐
                                                         ↓                               ↓
                                                    ┌────────┐                      ┌────────┐
                                                    │        │                      │        │
                                                    │Credit  │                      │$$$     │
                                                    │        │                      │        │
                                                    └────┬───┘                      └────┬───┘
                                                         └───────────────┬─────────────┘
                                                                         │
                                                               ┌───────────────────┐
                                                               │Booking Confirmation│
                                                               └─────────┬─────────┘
                                                 ┌───────────────────────┼───────────────────────┐
                                                 ↓                       ↓                       ↓
                                        ┌───────────────────┐   ┌───────────────────┐   ┌───────────────────┐
                                        │Booking Confirmation│   │Confirmation Email │   │Confirmation SMS   │
                                        └─────────┬─────────┘   └─────────┬─────────┘   └─────────┬─────────┘
                                                  └───────────────────────┴─────────────────────┘
                                                                         │
                                                                         ↓
                                                               ┌───────────────────┐
                                                               │Scheduled Session  │
                                                               └───────────────────┘
```

## Business Rules
1. User must accept informed consent before entering waiting room
2. Both audio and video testing must be available in waiting room
3. Practitioner must be notified when client enters waiting room
4. Video recording requires explicit consent
5. Sessions that practitioners miss must trigger automatic refund process
6. Rating system determines follow-up experience
7. Rebooking should preserve practitioner information for convenience
8. Multiple confirmation methods (in-app, email, SMS) must be used for bookings

## Security and Technical Requirements
1. Secure video connection with proper encryption
2. Emergency reporting functionality for urgent issues
3. Document and image sharing capabilities with privacy controls
4. Screen sharing functionality with appropriate permissions
5. Client file access within session environment
6. Session timer for tracking duration
7. Background blur option for privacy

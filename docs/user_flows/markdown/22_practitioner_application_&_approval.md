# Practitioner Application & Approval - User Journey

## Title: Practitioner Application & Approval

## Entry Points
- **Sign Up Page with Form** - Initial application entry point for prospective practitioners

## User Journey

### Application Submission
1. **Sign Up Page with Form**
   - Prospective practitioner completes application form
   - Submits initial information for review

2. **Email We Are Reviewing Your Application**
   - Automated email notification sent to applicant
   - Informs that application is under review
   - Decision point: Yes/No

3. **If No** (Application rejected)
   - Process ends here
   - No further steps provided in the diagram

### Initial Approval Process
1. **Your Application Has Been Approved – Submit Video**
   - Notification that initial application has been accepted
   - Instructions to submit video for further evaluation

2. **Video Application Page**
   - Interface for practitioner to upload required videos
   - Submission platform for video content

3. **Your Videos Are In Review**
   - Notification that submitted videos are being evaluated
   - Decision point: Yes/No

4. **If No** (Videos not approved)
   - **You are on a waitlist**
   - Applicant placed in waiting status
   - May be reconsidered later

### Vetting Process
1. **Invitation for Vetting Session**
   - Successful video review leads to vetting invitation
   - Next step in approval process

2. **Calendar - Select Time & Date**
   - Scheduling interface for vetting session
   - Applicant selects preferred time slot

3. **Booking Confirmation**
   - Confirmation of scheduled vetting session
   - Triggers two parallel notifications:
     - **Email Confirmation**
     - **SMS Confirmation**

4. **Scheduled Vetting Session**
   - The actual vetting interview/evaluation
   - Decision point: Yes/No

5. **If No** (Vetting session unsuccessful)
   - Applicant routed to **You are on a waitlist**
   - No immediate approval

### Final Approval
1. **Email Confirmation**
   - Final approval notification
   - Confirmation of successful application process

2. **Practitioner Onboarding Flow**
   - Transition to onboarding process
   - Beginning of practitioner setup on the platform

## Sequence Flow
```
                  ┌────────────────┐
                  │Sign Up Page    │
                  │with Form       │
                  └───────┬────────┘
                          │
                          ↓
            ┌────────────────────────┐
            │Email We Are Reviewing  │
            │Your Application        │
            └───────────┬────────────┘
                        │
                    ┌───┴───┐
                    ↓       ↓
                   Yes      No
                    │
                    ↓
            ┌────────────────────────┐
            │Your Application Has    │
            │Been Approved – Submit  │
            │Video                   │
            └───────────┬────────────┘
                        │
                        ↓
              ┌───────────────────┐
              │Video Application  │
              │Page               │
              └─────────┬─────────┘
                        │
                        ↓
            ┌────────────────────────┐
            │Your Videos Are In      │
            │Review                  │
            └───────────┬────────────┘
                        │
                    ┌───┴───┐
                    ↓       ↓
                   Yes      No
                    │       │
                    │       ↓
                    │   ┌────────────────┐
                    │   │You are on a    │
                    │   │waitlist        │
                    │   └────────┬───────┘
                    │            ^
                    ↓            │
            ┌────────────────────────┐
            │Invitation for Vetting  │
            │Session                 │
            └───────────┬────────────┘
                        │
                        ↓
              ┌───────────────────┐
              │Calendar - Select  │
              │Time & Date        │
              └─────────┬─────────┘
                        │
                        ↓
              ┌───────────────────┐
              │Booking            │────────┐
              │Confirmation       │        │
              └─────────┬─────────┘        │
                        │           ┌──────┴──────┐
                        │           ↓             ↓
                        │  ┌────────────────┐┌────────────────┐
                        │  │Email           ││SMS             │
                        │  │Confirmation    ││Confirmation    │
                        │  └────────────────┘└────────────────┘
                        │
                        ↓
              ┌───────────────────┐
              │Scheduled Vetting  │
              │Session            │
              └─────────┬─────────┘
                        │
                    ┌───┴───┐
                    ↓       ↓
                   Yes      No
                    │       │
                    │       └───────────────┐
                    ↓                       │
              ┌────────────────┐            │
              │Email           │            │
              │Confirmation    │            │
              └────────┬───────┘            │
                       │                    │
                       ↓                    │
            ┌───────────────────┐           │
            │Practitioner       │           │
            │Onboarding Flow    │           │
            └───────────────────┘           │
                                           │
                                           └─────┐
                                                 │
                                                 │
                                                 │
                                                 ↓
                                          ┌────────────────┐
                                          │You are on a    │
                                          │waitlist        │
                                          └────────────────┘
```

## Business Rules
1. All practitioners must complete an initial application form
2. Applications undergo a two-stage approval process:
   - Initial application review
   - Video submission review
3. Rejected applicants at any stage may be placed on a waitlist
4. Approved video submissions lead to a vetting session
5. Practitioners must schedule and attend a vetting session
6. Both email and SMS confirmations are sent for scheduled sessions
7. Final approval leads to practitioner onboarding
8. Unsuccessful vetting sessions result in waitlist placement

## Integration Points
- Form submission system
- Email notification system
- Video submission platform
- Review management system
- Calendar scheduling system
- SMS notification system
- Waitlist management system
- Onboarding process connection

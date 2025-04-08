# Booking Flow - User Journey

## Title: Booking Flow

## Entry Points
- **Referral Link** - User clicks a referral link
- **Directory** - User navigates from practitioner directory
- **Direct Link** - User accesses booking via direct link

## Design Questions & Notes
- POTENTIALLY CHANGE THIS & review ZenDesk
- Understand repeat booking requirements for multi-treatment sessions. How do they block out multiple session preferably at different times/dates? - MVP: can we stick with fixed time for MVP
- If deposit is required, how much and when do customers get billed for each session? Pay deposit - charged every week for multi-session services
- Potentially add prescreener depending on practitioner category/depending on insurance level
- Discuss and map credit/token system
- If form has been previously filled out, this comes pre-filled, any changes are saved in the aeyla backend as log
- What happens if someone wants to book a service with multiple sessions? How are they charged? Deposit for first session and charged by appointment?
- Request Health Fund integration requirements
- Practitioner specific sensitive information that needs to be restricted?

## Main Flow

1. **Practitioner Selection**
   - User arrives at Practitioner Profile via one of the entry points
   - User can optionally initiate Message Practitioner Flow

2. **Service Selection**
   - User Selects Service
   - Dropdown automatically changes depending on selection

3. **Booking Details**
   - User Selects Time & Date
     - Optional branch: Repeat Booking Schedule (Varying Scheduling Requirements)
     - Optional branch: Log In Existing Account Page or Popup (if not already logged in)
   
4. **Booking Information**
   - Fill in Booking Details including Health Fund Details
     - Optional branch: Health Fund Flow
   
5. **Payment**
   - Payment - Take Credit Card & Charge Deposit
     - Alternative: Pay With Credit Flow
   
6. **Confirmation**
   - Two possible confirmation paths:
     - Booking Confirmation Email With Session Details, Calendar Link, Intake Form, Informed Consent, Waiver
     - Booking Confirmation Page & Informed Consent, Waiver & Terms
       - Leads to Email with Intake Form, Informed Consent Information

7. **Intake Process**
   - User completes Intake Form
   - Fill Form & Signature

8. **Post-Booking Flow**
   - Decision point: Yes/No branch (appears to be related to form completion)
   
   - **If Yes**:
     - Session Reminder SMS
     - Session Reminder Email
     - User may enter Cancel or Reschedule Booking Flow
     - Proceeds to Session Flow
   
   - **If No**:
     - Email Reminder Intake Series
       - If user completes intake (Yes): Proceeds to Session Flow
       - If user doesn't complete intake (No): Session Cancellation

9. **Cancellation Process**
   - Session Cancellation
     - Email Cancellation Client
     - Adjust Practitioner Calendar & Dashboard
     - Email Cancellation Practitioner

## Sequence Flow
```
   Referral Link       Directory        Direct Link
        ↓                  ↓                 ↓
                  Practitioner Profile
                           ↓                  ←→  Message Practitioner Flow
                    Select Service
                           ↓
              Dropdown automatically 
              changes depending on selection
                           ↓                  →   Repeat Booking Schedule
                 Select Time & Date
                           ↓                  →   Log In Existing Account
   Fill in Booking Details including Health Fund Details
        ↓                                     →   Health Fund Flow
   Payment - Take Credit Card & Charge Deposit
        ↓                                     →   Pay With Credit Flow
        ↓                                     
┌───────────────────────┐   ┌───────────────────────────────┐
│ Booking Confirmation  │   │ Booking Confirmation Page &   │
│ Email With Session    │   │ Informed Consent, Waiver      │ →  Email with Intake
│ Details, Calendar     │   │ & Terms                       │    Form, Informed
│ Link, Intake Form,    │   └───────────────────────────────┘    Consent Information
│ Informed Consent,     │                   ↓
│ Waiver                │           
└─────────┬─────────────┘           Intake Form
          │                              ↓
          └──────────────→      Fill Form & Signature
                                         ↓
                                  ┌──────┴──────┐
                                  ↓             ↓
                                 Yes            No
                                  ↓             ↓
              ┌──────────────────┐│             Email Reminder Intake Series
              ↓                  ↓│                    ↓
     Session Reminder   Session Reminder     ┌─────────┴─────────┐
           SMS              Email            ↓                   ↓
              └────────┬─────┘              Yes                  No
                       ↓                     ↓                   ↓
         Cancel or Reschedule          Session Flow       Session Cancellation
            Booking Flow                                         ↓
                                                  ┌──────────────┴───────────────┐
                                                  ↓                              ↓
                                    Email Cancellation       Adjust Practitioner  Email Cancellation
                                          Client             Calendar & Dashboard    Practitioner
```

## Business Rules
1. Payment deposit may be required for booking completion
2. Multi-session bookings may have special billing requirements
3. Health fund integration affects booking flow
4. Previously completed forms should be pre-filled
5. Intake form completion is required for session attendance
6. Reminders are sent through multiple channels (email, SMS)
7. Missed intake form completion may trigger cancellation
8. Cancellation notifications go to both client and practitioner
9. Practitioner calendar and dashboard must be updated on cancellations

## System Integration Points
- Practitioner calendar system
- Payment processing system
- Health fund verification system
- Email and SMS notification systems
- User account system
- Form management system
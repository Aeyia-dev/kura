# Practitioner Identity, Training & Onboarding Flow - User Journey

## Title: Practitioner Identity, Training & Onboarding Flow

## Design Notes & Questions
- Onboarding Wizard
- What documents need to be submitted when?
- How does health fund work?
- Does Health Fund information also need to be added on Service level?

## Entry Points
- **Practitioner Onboarding Flow** - Initial starting point for newly approved practitioners

## User Journey

### Initial Onboarding
1. **Practitioner Onboarding Flow**
   - Entry point from practitioner approval process
   - Two parallel paths:
     - Email invitation for profile creation
     - Invitation to practitioner course

2. **Email Invitation For Profile Creation**
   - Practitioner receives email to begin profile setup
   - Leads to onboarding page

3. **Invitation To Practitioner Course**
   - Practitioner receives training course invitation
   - Leads to onboarding course

### Training Path
1. **Practitioner Onboarding Course**
   - Required training for all practitioners
   - Decision point: Yes/No (completion status)
   
   - **If Yes** (Course completed)
     - **Course Completion Email With Training Badge**
     - Recognition of completed training
     - Connects back to onboarding page
   
   - **If No** (Course not completed)
     - **Email Course Reminder**
     - Prompts practitioner to complete course

### Profile Creation Path
1. **Practitioner Onboarding Page**
   - Central hub for all onboarding activities
   - Beginning of multi-step process

2. **Account Identity**
   - First step in profile setup
   - Leads to identity verification

3. **Verify Identity**
   - Identity confirmation process
   - Leads to KYC (Know Your Customer)

4. **KYC**
   - Know Your Customer verification
   - Leads to business details

5. **Business Details**
   - Business information collection
   - Leads to health fund setup

6. **Health Fund**
   - Health fund participation details
   - Leads to billing setup

7. **Billing & Bank Details**
   - Payment information collection
   - Final step in account identity path

### Profile Development
1. **Create Profile**
   - Parallel path from onboarding page
   - Leads to qualifications documentation

2. **Qualification & Certificates (Create Profile)**
   - Professional credentials verification
   - Leads to profile review

### Service Setup
1. **Create Service**
   - Parallel path from onboarding page
   - Service offerings configuration
   - Leads to profile and document verification

### Verification & Publishing
1. **Profile Review & Document Verification**
   - Final review of all submitted information
   - Decision point: Yes/No
   
   - **If Yes** (Verification successful)
     - **Publish Profile**
     - Profile made available on platform
   
   - **If No** (Verification unsuccessful)
     - **Practitioner Support Email With Changes through ZenDesk**
     - Support guidance on required changes
     - Leads to implementation process

2. **Implement Changes Via Dashboard**
   - Practitioner makes required corrections
   - Decision point: Yes/No
   
   - **If Yes** (Changes successfully implemented)
     - Loops back to **Publish Profile**
   
   - **If No** (Changes not implemented)
     - **Email Reminder**
     - Additional prompting to complete changes

## Sequence Flow
```
┌────────────────────┐
│Practitioner        │
│Onboarding Flow     │
└─────────┬──────────┘
          │
          ├────────────────────────┐
          │                        │
          ↓                        ↓
┌────────────────────┐   ┌────────────────────┐
│Email Invitation For│   │Invitation To       │
│Profile Creation    │   │Practitioner Course │
└─────────┬──────────┘   └─────────┬──────────┘
          │                        │
          ↓                        ↓
┌────────────────────┐   ┌────────────────────┐
│Practitioner        │   │Practitioner        │
│Onboarding Page     │   │Onboarding Course   │
└─────────┬──────────┘   └─────────┬──────────┘
          │                        │
    ┌─────┼─────┐             ┌───┴───┐
    │     │     │             ↓       ↓
    ↓     ↓     ↓            Yes      No
┌────────┐ │ ┌────────┐       │       │
│Account │ │ │Create  │       │       │
│Identity│ │ │Profile │       │       │
└────┬───┘ │ └────┬───┘       │       │
     │     │      │           │       │
     ↓     │      ↓           ↓       ↓
┌────────┐ │ ┌────────────┐ ┌────────────┐ ┌────────────┐
│Verify  │ │ │Qualification│ │Course      │ │Email       │
│Identity│ │ │& Certificates│ │Completion  │ │Course      │
└────┬───┘ │ │(Create     │ │Email With   │ │Reminder    │
     │     │ │Profile)    │ │Training     │ └─────┬──────┘
     ↓     │ └────┬───────┘ │Badge        │       │
┌────────┐ │      │         └──────┬──────┘       │
│KYC     │ │      │                │              │
└────┬───┘ │      │                │              │
     │     │      │                │              │
     ↓     │      │                │              │
┌────────┐ │      │                │              │
│Business│ │      │                │              │
│Details │ │      │                │              │
└────┬───┘ │      │                │              │
     │     │      │                │              │
     ↓     │      │                │              │
┌────────┐ │      │                │              │
│Health  │ │      │                │              │
│Fund    │ │      │                │              │
└────┬───┘ │      │                │              │
     │     │      │                │              │
     ↓     │      │                │              │
┌────────┐ │      │                │              │
│Billing │ │      │                │              │
│& Bank  │ │      │                │              │
│Details │ │      │                │              │
└────────┘ │      │                │              │
          ↓       │                │              │
    ┌────────┐    │                │              │
    │Create  │    │                │              │
    │Service │    │                │              │
    └────┬───┘    │                │              │
         │        │                │              │
         ↓        ↓                │              │
    ┌────────────────────┐         │              │
    │Profile Review &    │         │              │
    │Document            │←────────┘              │
    │Verification        │←─────────────────────────
    └─────────┬──────────┘
              │
          ┌───┴───┐
          ↓       ↓
         Yes      No
          │       │
          │       ↓
          │    ┌────────────────────┐
          │    │Practitioner Support│
          │    │Email With Changes  │
          │    │through ZenDesk     │
          │    └─────────┬──────────┘
          │              │
          │              ↓
          │    ┌────────────────────┐
          │    │Implement Changes   │
          │    │Via Dashboard       │
          │    └─────────┬──────────┘
          │              │
          │          ┌───┴───┐
          │          ↓       ↓
          │         Yes      No
          │          │       │
          │          │       ↓
          │          │    ┌────────────┐
          │          │    │Email       │
          │          │    │Reminder    │
          ↓          │    └────────────┘
    ┌────────────────┐    
    │Publish Profile │←───┘
    └────────────────┘    
```

## Business Rules
1. Practitioners must complete mandatory onboarding course
2. Profile creation requires identity verification including KYC
3. Practitioners must provide business, health fund, and banking details
4. Professional qualifications and certificates must be verified
5. All profile information undergoes review before publishing
6. Failed verification requires changes based on support guidance
7. Profile can only be published after successful verification
8. Non-responsive practitioners receive email reminders

## Integration Points
- Email notification system
- Course management platform
- Identity verification system
- KYC verification service
- Document verification system
- ZenDesk support integration
- Dashboard change implementation tool
- Profile publishing system

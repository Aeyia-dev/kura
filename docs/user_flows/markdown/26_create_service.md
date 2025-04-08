# Create Service - User Journey

## Title: Create Service

## Entry Points
Two primary entry points:
- **Onboarding Wizard** - For new practitioners setting up services
- **Dashboard** - For existing practitioners managing services

## User Journey

### Initial Access
1. **Onboarding Wizard**
   - New practitioners are guided through service creation
   - Leads directly to adding a service

2. **Dashboard**
   - Existing practitioners access service management
   - Leads to profile and marketing section

### Service Setup
1. **Profile & Marketing**
   - Dashboard users navigate to profile section
   - Provides options for service management
   - Two possible paths:
     - **Add Service With Questionnaire & Availability Slots**
     - **Edit Service Including Questionnaire & Availability Slots**

2. **Add Service With Questionnaire & Availability Slots**
   - Create new service offering
   - Configure associated questionnaire
   - Set up availability calendar slots
   - Leads to review and approval request

3. **Edit Service Including Questionnaire & Availability Slots**
   - Modify existing service details
   - Update questionnaire content
   - Adjust availability calendar slots
   - Leads to review and approval request

### Review & Approval
1. **Request Review & Approval**
   - Service details submitted for platform review
   - Decision point: Yes/No

2. **If Yes** (Approval granted)
   - **Practitioner Email Notification**
   - Confirmation sent via email
   - **Practitioner Dashboard Notification**
   - Alert appears on practitioner dashboard
   - **Available For Bookings In Calendar**
   - Service becomes available for client bookings

3. **If No** (Approval denied)
   - Routes back to edit service
   - Practitioner must make requested changes
   - Resubmit for approval

## Sequence Flow
```
┌────────────────┐    ┌────────────────┐
│Onboarding      │    │Dashboard       │
│Wizard          │    │                │
└───────┬────────┘    └───────┬────────┘
        │                     │
        │                     ↓
        │             ┌────────────────┐
        │             │Profile &       │
        │             │Marketing       │
        │             └───────┬────────┘
        │                     │
        │             ┌───────┴───────┐
        │             ↓               ↓
        │    ┌────────────────┐ ┌────────────────┐
        └────→Add Service     │ │Edit Service    │
             │With            │ │Including       │
             │Questionnaire & │ │Questionnaire & │
             │Availability    │ │Availability    │
             │Slots           │ │Slots           │
             └───────┬────────┘ └───────┬────────┘
                     │                  │
                     └────────┬─────────┘
                              ↓
                    ┌────────────────────┐
                    │Request Review &    │
                    │Approval            │
                    └─────────┬──────────┘
                              │
                        ┌─────┴─────┐
                        ↓           ↓
                       Yes          No
                        │           │
            ┌───────────┘           └────────┐
            ↓                                │
┌────────────────────┐                       │
│Practitioner Email  │                       │
│Notification        │                       │
└─────────┬──────────┘                       │
          │                                  │
          ↓                                  │
┌────────────────────┐                       │
│Practitioner        │                       │
│Dashboard           │                       │
│Notification        │                       │
└─────────┬──────────┘                       │
          │                                  │
          ↓                                  │
┌────────────────────┐                       │
│Available For       │                       │
│Bookings In         │                       │
│Calendar            │                       │
└────────────────────┘                       │
                                             │
                                             └───┐
                                                 │
                                                 ↓
                                      ┌────────────────┐
                                      │Edit Service    │
                                      │Including       │
                                      │Questionnaire & │
                                      │Availability    │
                                      │Slots           │
                                      └────────────────┘
```

## Business Rules
1. Services can be created during initial onboarding or later via dashboard
2. All services require a questionnaire configuration
3. All services require availability slots configuration
4. Every service must undergo platform review and approval
5. Rejected services must be modified and resubmitted
6. Practitioners receive both email and dashboard notifications upon approval
7. Services only become available for bookings after approval
8. Existing services can be edited and must be re-approved

## Integration Points
- Onboarding wizard system
- Practitioner dashboard
- Profile and marketing management system
- Questionnaire configuration system
- Availability calendar system
- Service review and approval system
- Email notification system
- Dashboard notification system
- Booking calendar system

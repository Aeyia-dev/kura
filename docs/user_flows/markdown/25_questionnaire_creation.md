# Questionnaire Creation - User Journey

## Title: Questionnaire Creation

## Design Notes & Questions
- What information do we share with practitioner? Name, email, address etc?
- How does this get affected if Health Fund documentation is required
- Potential changes for regulated practitioners for example pyschotherapists
- What happens with confidential information service/practitioner specific... does this still get shared with AEYIA
- Changes Require 2FA

## Entry Points
- **Customer Intake Form** - Initial entry point for customer information collection

## User Journey

### Intake Process
1. **Customer Intake Form**
   - Client completes initial intake information
   - Leads to a series of questionnaires

2. **Questionnaire Series**
   - Three types of questionnaires presented sequentially:
     - **AEYIA Global Questionnaire** - Platform-wide standard questions
     - **AEYIA Modality Questionnaire** - Questions specific to service type
     - **Practitioner Questionnaire On Service Level** - Practitioner-specific questions

3. **Waiver with eSignature**
   - Client acknowledges terms and provides electronic signature
   - Completes the intake form process

4. **Thank You For Completing Intake Form**
   - Confirmation message displayed in client account
   - Triggers email confirmation

5. **Email Confirmation**
   - "Thank You For Completing Intake Form & Changes Through Client Account"
   - Email receipt of completed process

### Data Management
1. **Automatic Data Matching**
   - System verifies if information is still accurate
   - "Is your information still accurate?"
   - Decision point: Yes/No

2. **If Yes** (Information is accurate)
   - Data proceeds to file creation process

3. **If No** (Information needs updating)
   - **Customer Update Information**
   - Client updates their details
   - Changes recorded in **Change Log**
   - Updated information stored in **AEYIA Client Files**

### File Creation Process
1. **Create Copy For AEYIA Without Restricted Practitioner Specific Questions**
   - Platform retains copy with limited information
   - Respects privacy boundaries

2. **Create Copy Without Sensitive Information Captured By AEYIA To Practitioner Client File**
   - Practitioner receives version with appropriate information
   - Sensitive data filtered according to privacy rules

## Sequence Flow
```
                                   ┌────────────────────┐
                                   │Customer Intake Form│
                                   └──────────┬─────────┘
                                              │
                                              ↓
                                   ┌────────────────────┐
                                   │AEYIA Global        │
                                   │Questionnaire       │
                                   └──────────┬─────────┘
                                              │
                                              ↓
                                   ┌────────────────────┐
                                   │AEYIA Modality      │
                                   │Questionnaire       │
                                   └──────────┬─────────┘
                                              │
                                              ↓
                                   ┌────────────────────┐
                                   │Practitioner        │
                                   │Questionnaire On    │
                                   │Service Level       │
                                   └──────────┬─────────┘
                                              │
                                              ↓
                                   ┌────────────────────┐
                                   │Waiver with         │
                                   │eSignature          │
                                   └──────────┬─────────┘
                                              │
                                              ↓
                                   ┌────────────────────┐
                                   │"Thank You For      │
                                   │Completing Intake   │
                                   │Form & Changes      │
                                   │Through Client      │
                                   │Account"            │
                                   └──────────┬─────────┘
                                              │
                                              ↓
                                   ┌────────────────────┐
                                   │Email:"Thank You For│
                                   │Completing Intake   │
                                   │Form & Changes      │
                                   │Through Client      │
                                   │Account"            │
                                   └──────────┬─────────┘
                                              │
              ┌───────────────────────────────┘
              │
              ↓
     ┌────────────────────┐
     │Automatic Data      │
     │Matching            │
     │"Is your information│
     │still accurate?"    │
     └──────────┬─────────┘
                │
        ┌───────┴───────┐
        ↓               ↓
       Yes             No
        │               │
        │               ↓
        │     ┌────────────────────┐
        │     │Customer Update     │
        │     │Information         │
        │     └──────────┬─────────┘
        │                │
        │                ↓
        │     ┌────────────────────┐
        │     │Change Log          │
        │     └──────────┬─────────┘
        │                │
        │                ↓
        │     ┌────────────────────┐
        │     │AEYIA Client Files  │
        │     └──────────┬─────────┘
        │                │
┌───────┴────────────────┼───────────────────────────┐
│                        │                           │
↓                        ↓                           ↓
┌────────────────────┐   ┌────────────────────┐
│Create Copy For     │   │Create Copy Without │
│AEYIA Without       │   │Sensitive Information│
│Restricted          │   │Captured By AEYIA   │
│Practitioner Specific│   │To Practitioner    │
│Questions           │   │Client File         │
└────────────────────┘   └────────────────────┘
```

## Business Rules
1. Multiple questionnaire types are used to collect comprehensive client information
2. Electronic signature is required for waiver acceptance
3. Client receives confirmation both on-screen and via email
4. System performs automatic data matching to check for accuracy
5. Changes to client information are tracked in a change log
6. Two different file versions are created:
   - AEYIA version without practitioner-specific questions
   - Practitioner version without sensitive platform information
7. Privacy boundaries are maintained between platform and practitioners
8. Changes to sensitive information may require 2FA (two-factor authentication)
9. Special handling may be required for regulated practitioners (e.g., psychotherapists)

## Integration Points
- Customer intake form system
- Questionnaire management system
- Electronic signature system
- Email notification system
- Data matching system
- Change tracking system
- Client file management system
- Privacy filtering system
- Two-factor authentication system

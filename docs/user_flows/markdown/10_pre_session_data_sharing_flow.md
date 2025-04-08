# Pre Session Data Sharing Flow - User Journey

## Title: Pre Session Data Sharing Flow

## Entry Point
- Book Session (after session has been booked)

## User Journey

### Authentication
- **Two Factor Identification**
  - User completes two-factor authentication to secure data sharing process

### Data Sharing Options
The user has two parallel options for sharing data:

#### Option 1: Sharing Existing Files
- **Choose File From Previous Session & Attach To Booking**
  - User selects relevant files from previous sessions
  - System attaches files to current booking
- **Share with Practitioner**
  - Files are securely shared with assigned practitioner

#### Option 2: Adding New Information
- **Add Requested Information Or Attachment To Questionnaire**
  - User provides additional information requested by practitioner
  - User may complete questionnaire with required information
  - User may upload new attachments

### Completion
- **Add Information To Booking**
  - All provided information (files and/or new data) is associated with the booking
  - System confirms successful data attachment to booking

## Sequence Flow
```
                Book Session
                     ↓
        ┌────────────┴────────────┐
        ↓                         ↓
Two Factor Identification    Add Requested Information
        ↓                    Or Attachment To
Choose File From             Questionnaire
Previous Session &
Attach To Booking
        ↓
  Share with
  Practitioner
        └────────────┬────────────┘
                     ↓
         Add Information To Booking
```

## Security Considerations
- Two-factor authentication ensures secure access to sensitive information
- Data sharing should follow healthcare privacy regulations
- Practitioner access should be logged and tracked
- Secure transmission protocols should be implemented

## Business Rules
- Only relevant previous session files should be selectable
- Files must be in approved formats and under size limits
- Questionnaire responses must be securely stored
- All shared information must be archived with the booking record
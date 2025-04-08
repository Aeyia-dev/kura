# Book Discovery Call - User Flow

## Main Flow

1. **Entry Points**
   - Homepage → Discovery Call Popup/Wizard
   - Discovery Call Page/Wizard (Direct Access)

2. **Calendar Selection**
   - Calendar Book Time & Date
   - User selects available time slot for discovery call

3. **User Information**
   - Fill Out Contact Details
   - User provides name, email, phone number, etc.

4. **Confirmation**
   - Scheduled Session
   - Confirmation of booking details shown to user

5. **Follow-up**
   - Email Follow Up with Recommendations
   - System sends confirmation email with additional resources/next steps

## Development Notes

### MVP Approach
- **Manual Process**: Manual recommendation sending via email
- Recommendations will be curated by staff and sent personally rather than automated in the MVP stage

### Future Enhancement
- **Create real world application**
- Full automation of the recommendation process
- Integration with practitioner matching algorithm

## Sequence Flow
```
Homepage or Direct Access Page
        ↓
Discovery Call Popup/Wizard
        ↓
Calendar Book Time & Date
        ↓
Fill Out Contact Details
        ↓
Scheduled Session Confirmation
        ↓
Email Follow Up with Recommendations
```

## User Experience Considerations
- The flow should be simple and intuitive with minimal steps
- Calendar should show available times clearly
- Contact form should be as minimal as possible while collecting necessary information
- Confirmation should reassure the user their booking was successful
- Follow-up email should arrive promptly with clear next steps

/Users/pi/Dropbox/work/Aeyia/5. Project Deliverables Working/Wireframes/rag_system/06_book_discovery_call.md
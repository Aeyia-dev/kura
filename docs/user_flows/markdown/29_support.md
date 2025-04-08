# Customer Support - User Journey

## Title: Customer Support

## Design Notes & Questions
- Zendesk features & managed content

## Entry Points
Multiple entry points for support access:
- **Landing Page** - Main website entry point
- **Gives Low Rating** - Triggered by customer feedback
- **Problem Reported** - Direct issue reporting
- **Missing Client Information** - Incomplete profile triggers
- **Unsuccessful Prescreening** - Failed screening process
- **Flagged Review** - Review monitoring system
- **Custom Request** - Specialized support needs

## User Journey

### Initial Access
1. **Landing Page**
   - Users can access support from main website
   - Two possible routes:
     - Direct to chat support
     - To help center for more options

2. **Help Center**
   - Central support hub
   - Provides multiple contact options:
     - **Chat** - Real-time messaging support
     - **Email** - Asynchronous communication
     - **Phone** - Direct voice support

### Issue-Triggered Support
Various scenarios automatically trigger support:

1. **Gives Low Rating**
   - Poor feedback score initiates support contact
   - Routes to email support

2. **Problem Reported**
   - User-reported issues
   - Routes to appropriate support channel

3. **Missing Client Information**
   - System detects incomplete profiles
   - Proactive support outreach

4. **Unsuccessful Prescreening**
   - Failed qualification checks
   - Support intervention required

5. **Flagged Review**
   - System or manual flagging of reviews
   - Support team assessment

6. **Custom Request**
   - Specialized or complex support needs
   - May route to specialized support agents

## Sequence Flow
```
┌─────────────┐
│Landing Page │
└──────┬──────┘
       │
       ├─────────────────┐
       │                 ↓
       │         ┌─────────────┐
       │         │Help Center  │
       │         └──────┬──────┘
       │                │
       │      ┌─────────┼─────────┐
       │      │         │         │
       ↓      ↓         ↓         ↓
┌─────────┐┌─────────┐┌─────────┐
│Chat     ││Email    ││Phone    │
└─────────┘└────┬────┘└─────────┘
                ↑
                │
┌───────────────┴───────────────────────────────────────────────────┐
│                                                                   │
↓                   ↓                   ↓                   ↓       │
┌─────────────┐┌─────────────┐┌─────────────┐┌─────────────┐       │
│Gives Low    ││Problem      ││Missing Client││Unsuccessful │       │
│Rating       ││Reported     ││Information   ││Prescreening │       │
└─────────────┘└─────────────┘└─────────────┘└─────────────┘       │
                                                                    │
                        ↓                   ↓                       │
                  ┌─────────────┐┌─────────────┐                   │
                  │Flagged      ││Custom       │                   │
                  │Review       ││Request      │                   │
                  └──────────────┘└─────────────────────────────────┘
```

## Business Rules
1. Multiple entry points available for customer support access
2. Support can be customer-initiated or system-triggered
3. Three main communication channels: chat, email, and phone
4. Low ratings automatically trigger support follow-up
5. Incomplete client information prompts proactive outreach
6. Support system integrated with review monitoring
7. Custom requests can be accommodated through the system
8. Zendesk platform used for support management and content

## Integration Points
- Website landing page
- Help center system
- Chat support platform
- Email management system
- Phone support system
- Rating and feedback system
- Client information tracking system
- Prescreening process
- Review monitoring system
- Custom request handling
- Zendesk integration for support management

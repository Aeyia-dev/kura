# Digital Library - User Journey

## Title: Digital Library

## Entry Points
Three primary entry points:
- **Non Member** - Users without accounts
- **Free Member** - Users with free basic accounts
- **Member** - Users with paid membership accounts

## User Journey

### Non Member Path
1. **Content Teaser Sections On Blog**
   - Non-members can view limited preview content
   - Encourages sign-up for full access
   
2. **Sign Up Or Free Trial**
   - Decision point for non-members
   - Options to create account or start trial

### Free Member Path
1. **Authenticated**
   - User logs in with free member credentials
   - Decision point: Yes/No

2. **If Yes** (Has free member access)
   - **Taken Trial Before**
     - System checks if user has previously used a trial
     - Decision point: Yes/No
     
     - **If Yes** (Has taken trial before)
       - **Pop Up - Become a Member**
       - Prompts user to upgrade to paid membership
       - Leads to **Payment View**
       
     - **If No** (Has not taken trial before)
       - **Pop Up - Start Trial**
       - Offers trial access option
       - Leads to **Sign Up Page With 3 Days Free Membership And After xxx$ Per Month**
       - Continues to **Trial Payment View**

3. **If No** (No free member access)
   - **Pop Up - Start Trial or sign in**
   - Offers trial or sign-in options
   - Two possible paths:
     - **Trial** - Start trial access
     - **Sign In** - Login with existing credentials

### Member Path
1. **Authenticated**
   - User logs in with member credentials
   - Decision point: Yes/No
   
   - **If Yes** (Valid paid membership)
     - **Access Library**
     - Full access to digital library content
     
   - **If No** (Invalid or expired membership)
     - **Sign In Popup**
     - Prompts for valid credentials
     - Can lead back to **Access Library** if successful

### All Paths Converge
- All successful paths eventually lead to **Access Library**
- Library access varies based on membership level

## Sequence Flow
```
Non Member                Free Member                 Member
    │                         │                         │
    ↓                         ↓                         ↓
┌──────────────┐         ┌──────────┐             ┌──────────┐
│Content Teaser│         │          │             │          │
│Sections On   │         │Authenticated           │Authenticated
│Blog          │         │          │             │          │
└──────┬───────┘         └────┬─────┘             └────┬─────┘
       │                      │                        │
       ↓                  ┌───┴───┐                ┌───┴───┐
┌──────────────┐          ↓       ↓                ↓       ↓
│Sign Up Or    │        Yes       No              Yes      No
│Free Trial    │         │        │                │       │
└──────────────┘         │        │                │       │
                         ↓        ↓                ↓       ↓
                  ┌────────────┐  │         ┌────────────┐ │
                  │Taken Trial │  │         │Access      │ │
                  │Before      │  │         │Library     │ │
                  └─────┬──────┘  │         └────────────┘ │
                        │         │                        │
                    ┌───┴───┐     │                        ↓
                    ↓       ↓     │                 ┌────────────┐
                   Yes      No    │                 │Sign In     │
                    │       │     │                 │Popup       │
                    │       │     │                 └─────┬──────┘
                    ↓       ↓     ↓                       │
             ┌────────────┐ │ ┌────────────┐              │
             │Pop Up -    │ │ │Pop Up -    │              │
             │Become a    │ │ │Start Trial │              │
             │Member      │ │ │or sign in  │              │
             └─────┬──────┘ │ └─────┬──────┘              │
                   │        │       │                      │
                   │        │   ┌───┴───┐                  │
                   │        │   ↓       ↓                  │
                   │        │ Trial    Sign In             │
                   ↓        │   │       │                  │
             ┌────────────┐ │   │       │                  │
             │Payment View│ │   │       │                  │
             └─────┬──────┘ │   │       │                  │
                   │        ↓   │       │                  │
                   │ ┌────────────────┐ │                  │
                   │ │Sign Up Page With│ │                  │
                   │ │3 Days Free     │ │                  │
                   │ │Membership And  │ │                  │
                   │ │After xxx$ Per  │ │                  │
                   │ │Month           │ │                  │
                   │ └────────┬───────┘ │                  │
                   │          │         │                  │
                   │          ↓         │                  │
                   │  ┌────────────────┐│                  │
                   │  │Trial Payment   ││                  │
                   │  │View            ││                  │
                   │  └────────┬───────┘│                  │
                   │          │         │                  │
                   └──────┐   │   ┌─────┘                  │
                          ↓   ↓   ↓                        │
                      ┌────────────────┐                   │
                      │Access Library  │◀──────────────────┘
                      └────────────────┘
```

## Business Rules
1. Non-members have limited access to content teasers only
2. Free trial is only available to users who haven't used it before
3. Previous trial users are prompted to become paid members
4. Membership requires payment information
5. Access to library content varies based on membership level
6. All successful authentication paths lead to library access
7. Members with expired accounts must sign in again or renew

## Integration Points
- Authentication system
- Payment processing system
- Membership management system
- Content access control system
- Trial eligibility tracking system

# Authenticated Member Booking - User Flow

## Title: Authenticated Member Booking

## Entry Points
- **Book Practitioner** - Initial entry point for member seeking to book a session

## User Journey

### Initial Navigation
1. **Book Practitioner**
   - Member initiates booking process
   - Leads to **Account Dashboard** for account verification

2. **Account Dashboard**
   - Three possible navigation paths:
     - Continue to **Directory & Practitioner Profile** to browse practitioners
     - Access **View Credits** to check available credits
     - View **Previous Bookings** to see past sessions

### Credit Management (Optional)
1. **View Credits**
   - Member can view current credit balance
   - Option to **Buy Extra Credits** if needed
   - Return to **Directory & Practitioner Profile** after credit management

### Practitioner Selection
1. **Directory & Practitioner Profile**
   - Browse practitioner directory
   - View detailed practitioner profiles
   - Select desired practitioner

2. **Previous Bookings**
   - View history of past sessions
   - Option to quickly rebook with same practitioner
   - Leads to **Select Times/Date**

### Booking Process
1. **Select Times/Date**
   - Choose available appointment time
   - System shows practitioner availability

2. **Payment**
   - Proceed to payment options
   - Three payment methods available:
     - **Pay with Credit** - Use existing credits only
     - **Pay With Credit & Cash** - Combination payment method
     - **Buy Extra Credits** - Purchase credits for current and future bookings

3. **Booking Confirmation Flow**
   - All payment paths lead to booking confirmation
   - Confirmation details and next steps provided

## Sequence Flow
```
             Book Practitioner
                    ↓
             Account Dashboard
                    ↓
       ┌────────────┼────────────┐
       ↓            ↓            ↓
Directory &     View Credits  Previous Bookings
Practitioner                        ↓
Profile         ↓                   │
       ↑        │                   │
       │        ↓                   │
       │   Buy Extra Credits        │
       │        │                   │
       └────────┘                   │
       ↓                            │
Select Times/Date ←─────────────────┘
       ↓
     Payment
       ↓
┌──────────┬─────────────┬─────────────┐
↓          ↓             ↓             
Pay with   Pay With      Buy Extra
Credit     Credit & Cash Credits
└──────────┴─────────────┴─────────────┘
                 ↓
        Booking Confirmation
               Flow
```

## Business Rules
1. Member must be authenticated to access this booking flow
2. Credit balance is checked before payment options are presented
3. Multiple payment options must be available
4. Previous booking history is accessible to facilitate easy rebooking
5. Full practitioner profiles are available for review before booking
6. Members can purchase additional credits at multiple points in the flow

## Integration Points
- Account authentication system
- Credits management system
- Payment processing system
- Practitioner availability calendar
- Booking confirmation system

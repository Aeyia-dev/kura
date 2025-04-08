# Assign, Buy & Earn Credit Flow - User Journey

## Title: Assign, Buy & Earn Credit Flow

## Entry Points
Two primary entry points:
- **New User** - First-time users entering the system
- **Existing User** - Users who already have accounts

## User Journey

### New User Path
1. **Create Account**
   - New users begin by creating an account
   - Four possible account types after creation:
     - **Free Member** - Basic account with limited access
     - **Digital Trial** - Trial account with temporary benefits
     - **Membership I** - First tier of paid membership
     - **Membership II** - Second tier of paid membership

### Credit Acquisition Methods

1. **Buy Credit**
   - Available to Free Members and Digital Trial users
   - Different pricing options available
   - Leads to **Issue Credit In Account**

2. **Earn Credit**
   - Available to Free Members and Digital Trial users
   - Users earn credits through platform activities
   - Leads to **Issue Credit In Account**

3. **Monthly Credit Issued**
   - Available to Membership I and Membership II users
   - Credits automatically issued on a monthly basis
   - Leads to **Issue Credit In Account**

### Credit Management

1. **Issue Credit In Account**
   - All credit acquisition methods lead here
   - Credits added to user's account balance
   - Triggers two types of notifications:
     - **Email Notification** - Immediate alert of credit addition
     - **Statement Email** - Periodic summary at set frequency (Weekly, Monthly, etc.)

## Sequence Flow
```
   New User                              Existing User
       ↓                                       
  Create Account
       ↓
┌─────────┬─────────────┬────────────┬─────────────┐
↓         ↓             ↓            ↓             
Free    Digital    Membership I  Membership II
Member   Trial
└───┬────┴─────┬───┘     └──────┬────┴─────────┐
    │          │                │              │
    ↓          ↓                └──────────────┘
┌─────────────────────┐                ↓
│Buy Credit (Different│           Monthly Credit
│Options Available)   │              Issued
└──────────┬──────────┘                │
           │                           │
┌──────────┴──────────┐                │
│                     │                │
│     Earn Credit     │                │
│                     │                │
└──────────┬──────────┘                │
           │                           │
           └─────────────┐             │
                         ↓             ↓
              ┌─────────────────────────┐
              │Issue Credit In Account  │
              └─────────┬───────────────┘
                        │
          ┌─────────────┴────────────┐
          ↓                          ↓
┌───────────────────┐   ┌────────────────────────┐
│Email Notification │   │Statement Email at x    │
│                   │   │Frequency (Weekly,      │
│                   │   │Monthly Etc.)           │
└───────────────────┘   └────────────────────────┘
```

## Business Rules
1. Credits can be accessed via Account Dashboard
2. Account Details and credits show up automatically at checkout
3. Credits can be used for shop purchases and gift cards

## Integration Points
- Account creation system
- Credit management system
- Email notification system
- Periodic statement generation
- Checkout system

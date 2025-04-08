# Login - User Flow

## Title: Login

## Design Notes
- Single Sign On implementation
- Currently users can log in with Google, FB etc.
- Question: do we keep that? What's required?

## User Journey

### Entry Point
- Account Access Request

### Account Verification
1. **Decision Point**: Does user have an account?
   - Yes → Continue to login options
   - No → Redirect to signup (not shown in diagram)

### Login Options (for users with accounts)
Users can initiate login from multiple entry points:
1. **Login Page** - Dedicated login page
2. **Login PopUp** - Overlay login form
3. **Booking** - Login during booking flow
4. **Digital Library** - Login to access library content
5. **Circle** - Login to access community features

### Security Verification
After login credentials are provided:

1. **Two Factor Identification**
   - System initiates 2FA process

2. **Verification Method** (user can choose one):
   - Email verification
   - SMS verification

3. **Security Code**
   - User enters security code received via selected method
   - System validates code and grants access

## Sequence Flow
```
                 Account
                    ↓
            ┌───────┴───────┐
            ↓               ↓
           Yes             No
            ↓
┌───────┬───────┬───────┬───────┬───────┐
↓       ↓       ↓       ↓       ↓       
Login   Login   Booking Digital Circle
Page    PopUp           Library        
└───────┴───────┴───────┴───────┴───────┘
                    ↓
            Two Factor Identification
                    ↓
            ┌───────┴───────┐
            ↓               ↓
          Email            SMS
            └───────┬───────┘
                    ↓
              Security Code
```

## Security Requirements
- Secure credential handling
- Limited login attempts
- Session timeout management
- Password reset option (not shown in diagram)
- Two-factor authentication via email or SMS

## Integration Points
- SSO providers (Google, Facebook, etc.)
- Email service for verification codes
- SMS gateway for verification codes
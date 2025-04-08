# Access Client Files - User Flow

## Title: Access Client Files

## Design Questions & Notes
- Request rules for Practitioner accessing client files after/between engagements
- What makes client active client?

## Two Main User Journeys

### 1. Client Journey: Responding to File Request

#### Entry Points
- **Practitioner Requests File**
  - Practitioner initiates file request
- **Show Access Request Notification On Client Dashboard**
  - Client receives notification of request

#### Authentication & Access
1. **Authenticated Client User**
   - Client must be authenticated to access system
2. **Dashboard**
   - Client navigates to their dashboard
3. **Client Files**
   - Client accesses file management section
4. **Two Factor Identification**
   - Client verifies identity via:
     - Email Code
     - SMS Code
5. **Security Code & Questions**
   - Client completes additional security verification

#### File Actions
After verification, client can:
- **View** - View files within platform
- **Download** - Download files locally
- **Share & revoke with practitioner** - Grant or revoke practitioner access
- **Delete?** - Potentially delete files (shown as option)

### 2. Practitioner Journey: Accessing Client Files

#### Entry Point
- **Authenticated Practitioner User**
  - Practitioner must be authenticated to access system

#### Navigation
1. **Dashboard**
   - Practitioner accesses their dashboard
2. **Navigation Options**
   - **Upcoming Booking** - View scheduled sessions
   - **Bookings & Clients** - View all client relationships

#### Client Access Flow
1. **Search Client**
   - Practitioner searches for specific client
2. **Active Client (Defined By Time Frame?)**
   - System checks if client is active based on timeframe
   - Decision Point: Yes/No

3. **If Active Client = Yes**
   - **Access File** - Direct access to client files
   - File action options:
     - **View** - View files within platform
     - **Download** - Download files locally
     - **Add Note** - Annotate files with notes

4. **If Active Client = No**
   - **Request Access** - Must request permission
   - Request methods:
     - **Email Client Access Request**
     - **Show Access Request Notification On Client Dashboard**
   - Decision Point: Does client approve? Yes/No
   
   - **If Request Approved = Yes**
     - **Email Notification With Access Link**
     - Practitioner gains temporary access to files

   - **If Request Approved = No**
     - **Email Notification Access Denied - Contact Practitioner Support For More Info**
     - Practitioner directed to support for assistance

## Sequence Flow
```
Client Journey:
--------------
Practitioner Requests File
        ↓
Show Access Request Notification On Client Dashboard
        ↓
Authenticated Client User
        ↓
    Dashboard
        ↓
   Client Files
        ↓
Two Factor Identification (Email Code or SMS Code)
        ↓
Security Code & Questions
        ↓
┌───────┬────────┬────────────────┬────────┐
↓       ↓        ↓                ↓        
View  Download  Share & revoke   Delete?
                with practitioner

Practitioner Journey:
-------------------
Authenticated Practitioner User
           ↓
       Dashboard
           ↓
┌──────────────┴───────────────┐
↓                              ↓
Upcoming Booking         Bookings & Clients
                                ↓
                         Search Client
                                ↓
                  Active Client (Defined By Time Frame?)
                                ↓
              ┌────────────────┴────────────────┐
              ↓                                 ↓
             Yes                                No
              ↓                                 ↓
         Access File                      Request Access
         ┌────┬────────┬────────┐        ┌──────────┴──────────┐
         ↓    ↓        ↓        ↓        ↓                     ↓
        View Download Add Note          Email Client      Show Access Request
                                       Access Request     Notification On Client
                                                          Dashboard
                                                                ↓
                                                       ┌────────┴────────┐
                                                       ↓                 ↓
                                                      Yes                No
                                                       ↓                 ↓
                                            Email Notification    Email Notification
                                            With Access Link      Access Denied - 
                                                                 Contact Practitioner
                                                                 Support For More Info
```

## Security Requirements
- Two-factor authentication for sensitive file access
- Time-limited access controls for practitioners
- Client approval required for non-active client files
- Audit logs for all file access attempts
- Secure transmission of files
- Ability to revoke access previously granted

## Business Rules
- Client activity status determines direct access privileges
- File access requires appropriate authentication
- Practitioners must request permission for inactive clients
- System must notify clients of access requests
- Practitioners must have justification for accessing files
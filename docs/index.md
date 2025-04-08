# Aeyia Platform Documentation

Welcome to the Aeyia platform documentation. This documentation covers the system architecture, technical aspects, development plans, and integration strategies for the Aeyia wellness marketplace platform.

## Project Scope & Planning

* [System Architecture](1.1%20system-architecture.md) - Comprehensive overview of the Aeyia platform's system architecture, including components, data architecture, integration points, security, and deployment considerations.

* [Key Technical Spikes](1.2.1%20key-technical-spikes.md) - Detailed breakdown of the most uncertain technical integrations and features that require targeted investigation through technical spikes.

* [Development Epics](1.3%20development-epics.md) - Structured approach to implementation planning, organizing the platform's user flows into logical development epics with dependencies and prioritization framework.

* [Integration Strategy](1.4%20integration-strategy.md) - Comprehensive integration strategy for third-party services, including evaluation criteria, approaches, and implementation considerations.

* [User Journey and Technical Spikes](1.5%20user-journey-and-technical-spikes.md) - Mapping of the complete user journey through the platform, highlighting areas where technical spikes focus on resolving key uncertainties.

## User Flows

### Client Experience

* [Limit Practitioners Viewed](user_flows/markdown/05_limit_number_practitioners_viewed.md) - User flow for limiting the number of practitioners visible to free/unauthenticated users.
* [Book Discovery Call](user_flows/markdown/06_book_discovery_call.md) - User flow for booking an initial discovery call with a practitioner.
* [Login](user_flows/markdown/07_login.md) - Authentication flow for users.
* [Booking Flow](user_flows/markdown/08_booking_flow.md) - Complete flow for booking a session with a practitioner.
* [Pre-Session Data Sharing](user_flows/markdown/10_pre_session_data_sharing_flow.md) - Flow for sharing client data before a session.
* [Access Client Files](user_flows/markdown/11_access_client_files.md) - Flow for practitioners to access client files.
* [Cancel or Reschedule](user_flows/markdown/12_cancel_or_reschedule_booking.md) - Flow for cancelling or rescheduling a booking.
* [Session Experience](user_flows/markdown/14_session.md) - Flow for the actual therapy/wellness session.
* [Testimonial](user_flows/markdown/15_testamonial.md) - Flow for leaving testimonials after a session.
* [Authenticated Member Booking](user_flows/markdown/16_authenticated_member_booking.md) - Booking flow for authenticated members.

### Membership & Community

* [Credits System](user_flows/markdown/18_credits.md) - Flow for the platform's credit system.
* [Message Practitioner](user_flows/markdown/19_message_practitioner_flow.md) - Flow for messaging between clients and practitioners.
* [Digital Library](user_flows/markdown/20_digital_library.md) - Flow for accessing digital content library.
* [Live Events & Circle](user_flows/markdown/21_live_events__circle_flow.md) - Flow for live events and community features.

### Practitioner Experience

* [Practitioner Application](user_flows/markdown/22_practitioner_application_&_approval.md) - Flow for practitioner application and approval process.
* [Practitioner Onboarding](user_flows/markdown/24_practitioner_identity,_training_&_onboarding_flow.md) - Flow for practitioner identity verification, training, and onboarding.
* [Questionnaire Creation](user_flows/markdown/25_questionnaire_creation.md) - Flow for practitioners to create questionnaires.
* [Create Service](user_flows/markdown/26_create_service.md) - Flow for practitioners to create services.

### Support & Special Programs

* [Support](user_flows/markdown/29_support.md) - User flow for customer support.
* [Free Session Application](user_flows/markdown/31_free_session_application.md) - Flow for applying to the society-sponsored free session program.

## Additional Resources

* [Laravel Setup](Laravel-setup.md) - Instructions for setting up the Laravel development environment.
* [Landing Page](Landing-page.md) - Information about the marketing landing page.
* [Documentation Guide](Documentation.md) - Guidelines for maintaining this documentation.
* [Project IT0-IT1](Project-IT0-IT1.md) - Project iteration details.
* [Diagram Guide](diagrams/HOWTO-DIAGRAM.md) - Guide for creating and maintaining diagrams.

## MkDocs Commands

* `mkdocs serve` - Start the live-reloading docs server.
  * `venv` to get the python env ready
* `mkdocs build` - Build the documentation site.
* `mkdocs -h` - Print help message and exit.

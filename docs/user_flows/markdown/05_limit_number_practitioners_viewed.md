# Free User/Unauthenticated User - User Flow

## Title: Limit Number Practitioners viewed

## Main Entry Point
- Free User / Unauthenticated User

## User Journey Paths

### Path 1: Search Bar Access
1. **Start**: Free User / Unauthenticated User
2. **Action**: User accesses Search Bar
3. **System Response**: Shows X Practitioners & Rest Blurred Out
4. **Paywall Trigger**: Pop up or overlay that prompts to sign up before seeing more practitioners

### Path 2: Library Navigation
1. **Start**: Free User / Unauthenticated User
2. **Action**: User Navigates Library
3. **System Response**: Restrict x Amount Of Content
4. **Paywall Trigger**: Pop up or overlay that prompts to sign up before seeing more practitioners

### Path 3: Practitioner Profile
1. **Start**: Free User / Unauthenticated User
2. **Action**: User views Practitioner Profile
3. **System Response**: Restrict Profile
4. **Paywall Trigger**: Pop up or overlay that prompts to sign up before seeing all content

## Access Limitations
- Limited number of practitioners visible
- Partial content access in library
- Restricted profile information
- All paths lead to sign-up prompts

## Sequence Flow
```
Free User / Unauthenticated User
        ↓
    ┌───────────┼───────────┐
    ↓           ↓           ↓
Search Bar  Navigates   Practitioner
              Library     Profile
    ↓           ↓           ↓
Shows X     Restrict    Restrict
Practitioners Amount Of   Profile
& Rest      Content
Blurred Out
    ↓           ↓           ↓
Paywall     Paywall     Paywall
Prompt      Prompt      Prompt
```

## Business Rules
- System must determine optimal number of practitioners to show before paywall
- System must track which practitioners have been viewed
- Paywall messaging should be consistent across different access points
- Clear value proposition should be presented at paywall points
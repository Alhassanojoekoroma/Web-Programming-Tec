# Product Requirements Document (PRD)
## Football Agent Sierra Leone Web Application

---

## 1. PRODUCT OVERVIEW

### 1.1 Product Vision
Football Agent Sierra Leone is a comprehensive web platform that connects street football talent with professional opportunities. The platform manages relationships between players, agents, clubs, and administrators while showcasing the vibrant street football culture of Sierra Leone.

### 1.2 Target Users
- **Players**: Street football athletes seeking professional representation
- **Agents**: Professional football agents managing player portfolios
- **Club Managers**: Scouts and club representatives seeking talent
- **Administrators**: Platform managers overseeing operations

### 1.3 Core Value Proposition
"Transforming street football legends into professional powerhouses through technology-driven agent management and talent discovery."

---

## 2. FUNCTIONAL REQUIREMENTS

### 2.1 User Management

#### Authentication
- **Registration**: Email-based registration with role selection
- **Login**: Secure authentication with session management
- **Password Recovery**: Email-based password reset
- **Profile Management**: Edit personal information, upload photos

#### Role-Based Access Control
| Role | Permissions |
|------|-------------|
| **Admin** | Full system access, user management, analytics |
| **Agent** | View/manage assigned players, update contracts |
| **Player** | View/edit own profile, view assigned agent |
| **Club Manager** | Browse players, contact agents, view statistics |

### 2.2 Player Management

#### Player Profiles (CRUD)
- **Create**: Add new players with complete profile
- **Read**: Browse players, filter by position/club/availability
- **Update**: Edit player information, statistics, photos
- **Delete**: Remove players (admin only, with confirmation)

#### Player Information Fields
- Personal: Full name, date of birth, nationality, photo
- Physical: Height, weight, preferred foot
- Football: Position(s), current club, experience level
- Career: Career highlights, statistics, video highlights (optional)
- Status: Available/Signed, contract expiry date

### 2.3 Agent-Player Assignment
- Assign agents to players (admin function)
- View all assigned players (agent dashboard)
- Track assignment history
- Unassign functionality with audit trail

### 2.4 Dashboard Features

#### Admin Dashboard
- Total users by role (cards/stats)
- Recent registrations
- Player-agent assignment overview
- System activity log

#### Agent Dashboard
- Assigned players grid/list
- Contract expiry notifications
- Player performance summary
- Quick actions (add player, update contract)

#### Player Dashboard
- Personal profile overview
- Assigned agent information
- Career statistics
- Upload highlights/documents

#### Club Manager Dashboard
- Browse available players
- Saved/favorited players
- Contact agent functionality
- Search and filter tools

### 2.5 Search & Filter
- Search players by name, position, club
- Filter by availability, age range, position
- Sort by rating, experience, date added
- Advanced filter combinations

### 2.6 Reports & Analytics
- Players per agent (table/chart)
- Total players, agents, clubs (KPI cards)
- Contract expiry timeline
- New registrations trend (optional)

---

## 3. DESIGN SYSTEM

### 3.1 Brand Identity

#### Brand Name
**Street Bull** - Football Agent Sierra Leone

#### Brand Personality
- **Energetic**: Captures the dynamism of street football
- **Professional**: Serious about career development
- **Bold**: Confident and ambitious
- **Accessible**: Welcoming to all talent levels

### 3.2 Color Palette

#### Primary Colors
```
Navy Blue (Primary)
HEX: #0A1128
RGB: 10, 17, 40
Usage: Headers, navigation, dark sections, text

Electric Blue (Accent)
HEX: #1E3A8A
RGB: 30, 58, 138
Usage: Interactive elements, hover states, highlights

Vibrant Orange (CTA)
HEX: #FF5722
RGB: 255, 87, 34
Usage: Buttons, alerts, important actions
```

#### Secondary Colors
```
White
HEX: #FFFFFF
Usage: Backgrounds, text on dark surfaces

Light Gray
HEX: #F5F5F5
RGB: 245, 245, 245
Usage: Alternate backgrounds, subtle borders

Medium Gray
HEX: #9CA3AF
RGB: 156, 163, 175
Usage: Secondary text, disabled states

Success Green
HEX: #10B981
Usage: Success messages, positive indicators

Warning Yellow
HEX: #F59E0B
Usage: Warnings, pending states

Error Red
HEX: #EF4444
Usage: Errors, destructive actions
```

### 3.3 Typography

#### Font Stack
```css
/* Primary Font - Modern Sans-Serif */
font-family: 'Inter', 'Segoe UI', -apple-system, BlinkMacSystemFont, sans-serif;

/* Alternative: Poppins */
font-family: 'Poppins', sans-serif;
```

#### Type Scale
```
Hero Heading (H1)
Size: 48px - 64px
Weight: 700 (Bold)
Line Height: 1.1
Letter Spacing: -1px

Section Heading (H2)
Size: 36px - 42px
Weight: 700 (Bold)
Line Height: 1.2

Subsection Heading (H3)
Size: 24px - 28px
Weight: 600 (Semi-bold)
Line Height: 1.3

Card Title (H4)
Size: 18px - 20px
Weight: 600 (Semi-bold)
Line Height: 1.4

Body Large
Size: 18px
Weight: 400 (Regular)
Line Height: 1.6

Body Regular
Size: 16px
Weight: 400 (Regular)
Line Height: 1.6

Body Small
Size: 14px
Weight: 400 (Regular)
Line Height: 1.5

Caption
Size: 12px
Weight: 400 (Regular)
Line Height: 1.4
Color: Medium Gray
```

### 3.4 Component Library

#### Buttons
```css
/* Primary Button (CTA) */
Background: #FF5722 (Orange)
Text: #FFFFFF
Padding: 12px 24px
Border Radius: 6px
Font Weight: 600
Hover: Darken 10%
Active: Darken 15%

/* Secondary Button */
Background: Transparent
Border: 2px solid #1E3A8A
Text: #1E3A8A
Padding: 10px 22px
Border Radius: 6px
Font Weight: 600
Hover: Background #1E3A8A, Text #FFFFFF

/* Ghost Button */
Background: Transparent
Text: #FFFFFF (on dark) or #0A1128 (on light)
Padding: 10px 22px
Border Radius: 6px
Font Weight: 600
Hover: Background rgba(255, 255, 255, 0.1)
```

#### Cards
```css
/* Standard Card */
Background: #FFFFFF
Border: 1px solid #E5E7EB
Border Radius: 12px
Padding: 24px
Box Shadow: 0 1px 3px rgba(0, 0, 0, 0.1)
Hover: Box Shadow: 0 4px 12px rgba(0, 0, 0, 0.15)

/* Image Card (Player/Game) */
Background: #0A1128
Border: 3px solid #0A1128
Border Radius: 16px
Overflow: hidden
Image: Border Radius 12px (inner)
Orange Accent: Top or side strip
```

#### Form Elements
```css
/* Input Fields */
Background: #FFFFFF
Border: 1px solid #D1D5DB
Border Radius: 6px
Padding: 12px 16px
Font Size: 16px
Focus: Border #1E3A8A, Box Shadow: 0 0 0 3px rgba(30, 58, 138, 0.1)

/* Textarea */
Same as input, min-height: 120px

/* Select Dropdown */
Same as input with dropdown arrow

/* Checkbox/Radio */
Accent Color: #FF5722
Size: 20px
```

#### Navigation
```css
/* Header Navigation */
Background: #FFFFFF
Height: 70px
Box Shadow: 0 2px 4px rgba(0, 0, 0, 0.08)
Logo: Height 40px
Links: Font Weight 500, Color #0A1128
Active Link: Color #FF5722
CTA Button: Orange, positioned right

/* Mobile Menu */
Full screen overlay
Background: #0A1128
Links: Stacked, centered, white text
```

### 3.5 Layout Grid

#### Desktop (1200px+)
- Container max-width: 1200px
- Columns: 12 column grid
- Gutter: 24px
- Side margins: 48px

#### Tablet (768px - 1199px)
- Container max-width: 960px
- Columns: 12 column grid
- Gutter: 20px
- Side margins: 32px

#### Mobile (< 768px)
- Container max-width: 100%
- Columns: 4 column grid
- Gutter: 16px
- Side margins: 16px

### 3.6 Spacing System
```
xs: 4px
sm: 8px
md: 16px
lg: 24px
xl: 32px
2xl: 48px
3xl: 64px
4xl: 96px
```

### 3.7 Imagery Guidelines

#### Photography Style
- **Dynamic Action Shots**: Players in motion, energetic poses
- **High Contrast**: Dramatic lighting, bold shadows
- **Urban Settings**: Street courts, concrete backgrounds
- **Authentic Moments**: Real street football culture
- **Color Overlay**: Blue tint or orange accents on some images

#### Image Specifications
- Hero Images: 1920x1080px, WebP format
- Player Photos: 800x800px, square crop
- Card Thumbnails: 600x400px, 3:2 ratio
- Logos/Icons: SVG format preferred

### 3.8 Iconography
- **Style**: Line icons with 2px stroke
- **Size**: 20px, 24px, 32px standard sizes
- **Color**: Inherit from context or use #0A1128, #FF5722
- **Library**: Font Awesome, Heroicons, or custom SVG

### 3.9 Animation & Interactions

#### Hover States
- Buttons: Scale 1.02, darken color
- Cards: Lift (translateY: -4px), increase shadow
- Links: Color transition 0.2s

#### Transitions
- Standard: 0.2s ease-in-out
- Long: 0.3s ease-in-out
- Page Transitions: Fade 0.15s

#### Loading States
- Skeleton screens for content loading
- Spinner: Orange (#FF5722) circular animation
- Progress bars: Blue to orange gradient

---

## 4. PAGE SPECIFICATIONS

### 4.1 Homepage
**Sections:**
1. Hero: Large heading, CTA, player image with blue electric effect
2. About/Energy Section: Two-column layout, image + text
3. Features: "Community Challenges" and "Build Your Legend" cards
4. Types of Games: 3-card grid with images
5. Newsletter Signup: Purple gradient background
6. Footer: Links, contact, social icons

### 4.2 Dashboard Pages
**Layout:**
- Left Sidebar: Navigation menu with icons
- Top Bar: Search, notifications, profile dropdown
- Main Content: Cards grid for stats, tables for data
- Responsive: Sidebar collapses to hamburger on mobile

### 4.3 Player Profile Page
**Layout:**
- Hero Section: Large photo, name, position, key stats
- Info Tabs: About, Statistics, Career, Videos
- Sidebar: Quick actions (contact agent, save player)
- Gallery: Photo/video carousel

### 4.4 Forms (Login/Register)
**Layout:**
- Centered card, max-width 400px
- Logo at top
- Form fields stacked
- CTA button full-width
- Alternative actions at bottom (sign up/login link)

---

## 5. TECHNICAL SPECIFICATIONS

### 5.1 Performance Requirements
- Page Load: < 3 seconds on 3G
- Images: Optimized WebP, lazy loading
- Responsive: All devices 320px+
- Accessibility: WCAG 2.1 AA compliance

### 5.2 Browser Support
- Chrome (last 2 versions)
- Firefox (last 2 versions)
- Safari (last 2 versions)
- Edge (last 2 versions)

### 5.3 Security
- HTTPS only
- Password hashing (bcrypt)
- SQL injection prevention
- CSRF protection
- XSS prevention

---

## 6. SUCCESS METRICS

### 6.1 KPIs
- User registrations (target: 100+ in first 3 months)
- Active players with complete profiles (target: 80%)
- Agent-player assignments (target: 50+ in first 3 months)
- Page load speed (target: < 2s)
- Mobile responsiveness score (target: 95+)

### 6.2 User Satisfaction
- Easy registration process (< 2 minutes)
- Intuitive navigation (< 3 clicks to any page)
- Clear role-based dashboards
- Positive user feedback

---

## 7. FUTURE ENHANCEMENTS (Phase 2)

- Video highlight uploads and streaming
- Real-time chat between players and agents
- Advanced analytics and player comparison tools
- Mobile app (iOS/Android)
- Payment integration for agent fees
- Multi-language support
- Social media integration
- Public player marketplace

---

## 8. APPENDIX

### 8.1 Design Assets Checklist
- [ ] Logo (SVG, PNG variants)
- [ ] Favicon set (16x16, 32x32, 180x180)
- [ ] Hero images (1920x1080)
- [ ] Stock player photos (20+)
- [ ] Icon set (30+ icons)
- [ ] Color palette swatches
- [ ] Font files (if custom)

### 8.2 Development Assets Checklist
- [ ] HTML templates for each page
- [ ] CSS stylesheet (organized)
- [ ] JavaScript for interactions
- [ ] Database schema SQL files
- [ ] Sample data SQL inserts
- [ ] README with setup instructions
- [ ] Environment configuration template

---

**Document Version:** 1.0  
**Last Updated:** December 2025  
**Status:** Ready for Development
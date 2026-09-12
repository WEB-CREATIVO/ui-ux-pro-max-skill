# CRISBAPRO - Figma Design System
**Complete Component Library & Design Tokens**

---

## 📋 ESTRUCTURA DEL ARCHIVO FIGMA

```
CRISBAPRO Design System
├── 📑 Cover Page
├── 🎨 Design Tokens
│   ├── Colors
│   ├── Typography
│   ├── Spacing
│   ├── Shadows
│   └── Radius
├── 🧩 Components
│   ├── Buttons
│   ├── Forms
│   ├── Cards
│   ├── Navigation
│   └── Etc.
├── 📄 Page Templates
│   ├── Home
│   ├── Service Page
│   ├── Project Single
│   └── Contact
└── 📱 Responsive Breakpoints
    ├── Mobile (375px)
    ├── Tablet (768px)
    ├── Desktop (1024px)
    └── Large (1440px)
```

---

## 🎨 DESIGN TOKENS

### COLOR PALETTE

#### Primary Colors

| Color Name | Hex | RGB | Usage |
|-----------|-----|-----|-------|
| **Navy 900** | #0F172A | 15, 23, 42 | Text primary |
| **Navy 800** | #1E293B | 30, 41, 59 | Borders |
| **Navy 700** | #334155 | 51, 65, 85 | Text secondary |
| **Primary 900** | #1E3A8A | 30, 58, 138 | Headers, accents |
| **Primary 500** | #3B82F6 | 59, 130, 246 | Links, highlights |
| **Accent 500** | #F97316 | 249, 115, 22 | Secondary CTA |
| **Error 500** | #EF4444 | 239, 68, 68 | **Primary CTA** |
| **Success 500** | #10B981 | 16, 185, 129 | Confirmations |

#### Neutral Colors

| Color Name | Hex | RGB | Usage |
|-----------|-----|-----|-------|
| **Background** | #FFFFFF | 255, 255, 255 | Page background |
| **Surface 50** | #F8FAFC | 248, 250, 252 | Section background |
| **Surface 100** | #F1F5F9 | 241, 245, 249 | Card background alt |
| **Surface 200** | #E2E8F0 | 226, 232, 240 | Borders, dividers |
| **Text Primary** | #0F172A | 15, 23, 42 | Body text |
| **Text Secondary** | #475569 | 71, 85, 105 | Muted text |
| **Text Tertiary** | #94A3B8 | 148, 163, 184 | Placeholder text |

### CSS Variables

```css
:root {
  /* Primary */
  --color-primary-900: #1E3A8A;
  --color-primary-500: #3B82F6;

  /* Error/CTA */
  --color-error-500: #EF4444;
  --color-error-700: #DC2626;

  /* Text */
  --color-text-primary: #0F172A;
  --color-text-secondary: #475569;

  /* Background */
  --color-background: #FFFFFF;
  --color-surface-50: #F8FAFC;
  --color-surface-200: #E2E8F0;
}
```

---

## 🔤 TYPOGRAPHY

### Type Scale

| Heading | Desktop | Mobile | Weight | Usage |
|---------|---------|--------|--------|-------|
| **H1** | 48px | 32px | 700 | Page title |
| **H2** | 36px | 24px | 700 | Section title |
| **H3** | 24px | 20px | 600 | Card/subsection |
| **H4** | 20px | 18px | 600 | List item |
| **Body** | 16px | 16px | 400 | Normal text |
| **Small** | 14px | 14px | 400 | Labels, captions |
| **Tiny** | 12px | 12px | 500 | Helper text |

### Font Stack

```css
/* Primary */
font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto;

/* Weight scale */
400: Regular
500: Medium
600: Semibold
700: Bold
```

### Line Heights

- **Headings**: 1.2 (compact)
- **Body**: 1.6 (readable)
- **Form labels**: 1.5

---

## 📏 SPACING SYSTEM

### 8px Base Grid

| Scale | Value | CSS Variable | Usage |
|-------|-------|--------------|-------|
| xs | 4px | --spacing-xs | Micro gaps |
| sm | 8px | --spacing-sm | Small margins |
| md | 16px | --spacing-md | Standard |
| lg | 24px | --spacing-lg | Comfortable |
| xl | 32px | --spacing-xl | Large sections |
| 2xl | 48px | --spacing-2xl | Between sections |
| 3xl | 64px | --spacing-3xl | Major sections |

### Application

```
Padding: 
  - Cards: 24px (lg)
  - Forms: 32px (xl)
  - Containers: 40px desktop / 16px mobile

Margins:
  - Between sections: 48px-64px
  - Between components: 24px-32px
  - Between text elements: 16px
```

---

## 🧩 COMPONENT LIBRARY

### Button Component

#### Primary Button
- **Background**: #EF4444 (Error Red)
- **Color**: White
- **Padding**: 14px 32px
- **Height**: 48px (touch-friendly)
- **Border Radius**: 6px
- **Font**: 16px bold Inter

**States:**
- **Default**: Solid red
- **Hover**: #DC2626 (darker) + translateY(-2px)
- **Active**: scale(0.98)
- **Disabled**: opacity 0.5 + cursor-not-allowed
- **Focus**: 2px outline #3B82F6

#### Secondary Button
- **Background**: Transparent
- **Border**: 2px solid white
- **Color**: White
- **Hover**: background rgba(255,255,255,0.1)

#### Sizes
- **sm**: 8px 16px, 40px height
- **md**: 10px 20px, 44px height
- **lg**: 14px 32px, 48px height

### Card Component

- **Background**: White (#FFFFFF)
- **Border**: 1px solid #E2E8F0
- **Border Radius**: 8px
- **Padding**: 24px
- **Box Shadow**: 0 1px 3px rgba(0,0,0,0.1)

**Hover State:**
- **Transform**: translateY(-4px)
- **Box Shadow**: 0 10px 25px rgba(0,0,0,0.1)
- **Transition**: 200ms ease-out

### Form Input

- **Background**: White
- **Border**: 1px solid #E2E8F0
- **Padding**: 12px 16px
- **Height**: 44px minimum (touch target)
- **Font Size**: 16px (prevents iOS zoom)
- **Border Radius**: 6px

**Focus State:**
- **Border Color**: #3B82F6
- **Box Shadow**: 0 0 0 3px #DBEAFE
- **Transition**: 150ms ease-out

### Navigation / Header

- **Height**: 64px desktop / 56px mobile
- **Background**: White (#FFFFFF)
- **Border Bottom**: 1px solid #E2E8F0
- **Position**: Fixed top
- **Z-index**: 100

**Logo:**
- **Font Size**: 20px
- **Font Weight**: 700
- **Color**: #1E3A8A
- **Letter Spacing**: 1px

**Nav Links:**
- **Font Size**: 14px
- **Weight**: 500
- **Color**: #334155
- **Hover**: #1E3A8A + underline

---

## 📐 SHADOWS SYSTEM

| Level | Value | Usage |
|-------|-------|-------|
| **xs** | 0 1px 2px 0 rgba(0,0,0,0.05) | Subtle elevation |
| **sm** | 0 1px 3px 0 rgba(0,0,0,0.1) | Default cards |
| **md** | 0 4px 6px rgba(0,0,0,0.1) | Hovered states |
| **lg** | 0 10px 15px rgba(0,0,0,0.1) | Modals, dropdowns |
| **xl** | 0 20px 25px rgba(0,0,0,0.1) | Deep elevation |

---

## 🔄 TRANSITIONS & ANIMATIONS

### Timing

```
--transition-fast: 150ms ease-out      // Feedback
--transition-medium: 200ms ease-out    // Normal
--transition-slow: 300ms ease-out      // Entrance
```

### Keyframe Animations

```css
@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

@keyframes slideInUp {
  from { 
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes scaleIn {
  from {
    opacity: 0;
    transform: scale(0.95);
  }
  to {
    opacity: 1;
    transform: scale(1);
  }
}
```

### Duration Guidelines

- **Micro-interactions**: 150ms
- **Component transitions**: 200ms
- **Page transitions**: 300-500ms
- **Avoid**: Anything > 500ms (feels sluggish)

---

## 📱 RESPONSIVE BREAKPOINTS

| Breakpoint | Device | Width | Grid Cols | H1 Size |
|-----------|--------|-------|-----------|---------|
| **Mobile** | Phone | ≤375px | 1 | 32px |
| **Tablet** | iPad | 768px+ | 2 | 40px |
| **Desktop** | Desktop | 1024px+ | 3 | 48px |
| **Large** | 4K | 1440px+ | Centered max-width |  56px |

### Layout Rules

- **Mobile**: 16px side padding, 1-column grid
- **Tablet**: 24px padding, 2-column grid
- **Desktop**: 40px padding, 3-column grid
- **Max width**: 1280px (centered on large screens)

---

## ♿ ACCESSIBILITY

### Color Contrast

All text must meet **WCAG AA (4.5:1)** minimum:

```
✓ #0F172A text on #FFFFFF bg = 19:1 (AAA)
✓ #475569 text on #FFFFFF bg = 4.5:1 (AA)
✗ #94A3B8 text on #FFFFFF bg = 2.8:1 (FAIL)
```

### Focus States

```css
/* All interactive elements must have visible focus */
:focus {
  outline: 2px solid #3B82F6;
  outline-offset: 2px;
}
```

### Keyboard Navigation

- Tab order: Logical flow (left→right, top→bottom)
- Skip links: "Ir al contenido principal"
- No keyboard traps
- All interactions available via keyboard

### Screen Reader

- Semantic HTML: `<button>`, `<nav>`, `<main>`, `<footer>`
- ARIA labels: For icon-only buttons
- Alt text: All images must have meaningful alt text

---

## 🖼️ IMAGE SPECIFICATIONS

### Formats
- **Hero images**: WebP + JPG fallback
- **Cards**: WebP 300x200px
- **Thumbnails**: WebP 150x150px

### Optimization
- Max size: Hero 100KB, Cards 30KB
- Compression: 70-80% quality
- Tools: TinyPNG, ShortPixel

### Aspect Ratios
- **Hero**: 16:9 or 21:9
- **Cards**: 4:3
- **Thumbnails**: 1:1

---

## 📋 EXPORT RULES

### Naming Convention

```
ComponentName/Variant/State

Examples:
- Button/Primary/Default
- Button/Primary/Hover
- Card/Service/Default
- Input/Text/Focus
```

### Measurements

- **Always use px** (not em, rem)
- **Round to whole numbers**
- **Document in comments**

### For Developers

```
Component Specs (Copy-Paste Ready):

Button Primary:
- Width: 100% or min 48px
- Height: 48px
- Padding: 14px 32px
- Background: #EF4444
- Border-radius: 6px
- Font: 16px bold Inter
- Gap between elements: 16px
```

---

## 🎯 HANDOFF CHECKLIST

- [ ] All colors defined as variables
- [ ] Typography has CSS values
- [ ] Components have states documented
- [ ] Spacing uses 8px grid
- [ ] Shadows have CSS values
- [ ] Transitions defined
- [ ] Responsive breakpoints documented
- [ ] Accessibility notes added
- [ ] Export settings configured
- [ ] Link to live CSS file added

---

## 🔗 INTEGRATION WITH CODE

### Link Figma → Code

Use Figma's **Code Connect** feature:

```javascript
// In Figma Code Connect
Button.figma = "https://figma.com/...";
Card.figma = "https://figma.com/...";
```

This links components in Figma directly to:
- CSS class definitions
- React component implementations
- Documentation URLs

### Maintenance

- **Design changes**: Update Figma first
- **Code changes**: Update Figma components
- **Quarterly reviews**: Audit token values

---

## 📊 DESIGN TOKENS JSON

Exportable para sincronizar con código:

```json
{
  "colors": {
    "primary": {
      "900": "#1E3A8A",
      "500": "#3B82F6"
    },
    "error": {
      "500": "#EF4444",
      "700": "#DC2626"
    }
  },
  "typography": {
    "h1": {
      "size": 48,
      "weight": 700,
      "lineHeight": 1.2
    }
  },
  "spacing": {
    "md": 16,
    "lg": 24,
    "xl": 32
  },
  "shadows": {
    "md": "0 4px 6px rgba(0, 0, 0, 0.1)"
  }
}
```

---

**Figma File Link:** [Will be provided after creation]
**Last Updated:** 2026-09-12
**Status:** Ready for Implementation

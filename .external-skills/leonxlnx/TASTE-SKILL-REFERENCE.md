# Leonxlnx - Taste-Skill

**Source:** https://github.com/Leonxlnx/taste-skill  
**Author:** Leonxlnx  
**License:** MIT  
**Stars:** 86,358 ⭐  
**Description:** Anti-Slop Frontend Framework for AI Agents

## Overview

**Taste-Skill** is a design philosophy + skill collection that prevents AI from generating templated, generic, "slop" interfaces. It teaches AI agents to:
- Read the brief and infer the right design direction
- Avoid AI defaults (purple gradients, Inter everywhere, generic cards)
- Apply specific aesthetic systems (brutalist, minimalist, soft, etc.)
- Generate design references and convert images to code

## Core Philosophy: The 3 Dials

All design decisions are controlled by **3 configurable variables:**

### The Three Dials

```
DESIGN_VARIANCE: 8    (1 = Perfect Symmetry → 10 = Artsy Chaos)
MOTION_INTENSITY: 6   (1 = Static → 10 = Cinematic / Physics)
VISUAL_DENSITY: 4     (1 = Art Gallery / Airy → 10 = Cockpit / Packed Data)
```

These dials control every layout, motion, and spacing decision below.

### Dial Presets by Use Case

| Use Case | VARIANCE | MOTION | DENSITY |
|----------|----------|--------|---------|
| **SaaS Landing** (mainstream) | 7 | 6 | 4 |
| **Agency / Creative Landing** | 9 | 8 | 3 |
| **Premium Consumer Landing** | 7 | 6 | 3 |
| **Designer Portfolio** | 8 | 7 | 3 |
| **Developer Portfolio** | 6 | 5 | 4 |
| **Editorial / Blog** | 6 | 4 | 3 |
| **Public-Sector Service** | 3 | 2 | 5 |
| **Redesign - Preserve Existing** | match | match+1 | match |
| **Redesign - Overhaul** | +2 | +2 | match |

---

## Step 0: Brief Inference (Read Before Code)

**Never jump to defaults.** Read the brief first and infer the right direction.

### 0.A Signals to Read

1. **Page Kind** - SaaS / consumer / agency landing? Portfolio? Redesign? Editorial?
2. **Vibe Words** - "minimalist", "Linear-style", "Awwwards", "brutalist", "Apple-y", "playful"
3. **References** - URLs linked, screenshots shared, competing products named
4. **Audience** - B2B procurement vs design-conscious consumer vs hiring manager
5. **Existing Brand Assets** - Logo, color, type, photography (for redesigns, these are starting material)
6. **Quiet Constraints** - Accessibility-first, public-sector, regulated, trust-first commerce

### 0.B Design Read (Output Before Coding)

**State in one line before any code:**

> "Reading this as: \<page kind> for \<audience>, with a \<vibe> language, leaning toward \<design system>."

**Examples:**
- "Reading this as: B2B SaaS landing for technical buyers, with Linear-style minimalist, leaning Tailwind + Geist + restrained motion."
- "Reading this as: solo designer portfolio for hiring managers, with editorial/kinetic-type language, leaning native CSS + scroll-driven animation."
- "Reading this as: public-sector service redesign, trust-first language, leaning GOV.UK Frontend."

### 0.C Anti-Default Discipline

**Never default to:**
- AI-purple gradients + centered hero over dark mesh
- Three equal-width feature cards
- Generic glassmorphism on everything
- Infinite-loop micro-animations everywhere
- Inter + slate-900 on everything

Reach past these deliberately based on the design read.

---

## Skills Included (7 Core)

### 1. **design-taste-frontend** ⭐ PRIMARY
**Purpose:** Anti-slop philosophy for landing pages, portfolios, redesigns

Key features:
- Brief → design direction inference
- 3 Dials system (variance, motion, density)
- Design system mapping
- Layout principles
- Typography rules
- Color strategies
- Motion guidelines
- Accessibility-first thinking

**Use when:** Starting any frontend project, need design direction

### 2. **brutalist-skill**
**Purpose:** Brutalist aesthetic (stark, raw, minimalist geometry)

**Characteristics:**
- Heavy sans-serif typography
- Monochromatic or 2-3 colors
- Grid-based layouts
- Minimal decoration
- Raw HTML feel
- High contrast

**Use when:** Client wants "raw", "honest", "technical" feel

### 3. **minimalist-skill**
**Purpose:** Clean, restrained, essential-only design

**Characteristics:**
- Lots of whitespace
- Single accent color
- Geometric simplicity
- Subtle micro-interactions
- Focus on content
- Calm, readable

**Use when:** Professional, tech-forward, or editorial projects

### 4. **soft-skill**
**Purpose:** Organic, approachable, warm design

**Characteristics:**
- Rounded corners, curves
- Warm color palette
- Illustrative elements
- Playful but not juvenile
- Gestural motion
- Human-centered

**Use when:** Consumer products, wellness, lifestyle brands

### 5. **redesign-skill**
**Purpose:** Systematic approach to redesigning existing projects

**Process:**
- Audit existing design
- Identify what works
- Strategic overhaul or refinement
- Preserve brand when appropriate
- Plan → implement → verify

**Use when:** Improving existing projects ($10k redesigns)

### 6. **imagegen-frontend-web**
**Purpose:** Generate reference boards and design inspiration

**Capabilities:**
- Create mood boards
- Generate layout variations
- Visual direction exploration
- Brand kit generation
- Reference imagery

**Use when:** Need visual references before coding

### 7. **imagegen-frontend-mobile**
**Purpose:** Mobile-specific design references and exploration

**Capabilities:**
- Mobile layout variations
- App UI concepts
- Mobile-specific patterns
- Responsive exploration

**Use when:** Mobile-first or responsive design projects

---

## Design System Mapping

**When to use which framework:**

| Brief Reads As | Reach For | Why |
|---|---|---|
| Microsoft / Enterprise SaaS | `@fluentui/react-components` | Official Fluent UI |
| Google-ish / Material UI | `@material/web` + Material 3 | Official tokens |
| IBM-style B2B Analytics | `@carbon/react` | Official Carbon |
| Shopify App | `polaris.js` | Required for Shopify |
| Atlassian-style Product | `@atlaskit/*` | Official Atlassian |
| GitHub-style Dev Tool | `@primer/react` | Official Primer |
| UK Public-Sector | `govuk-frontend` | Legally expected |
| US Public-Sector | `uswds` | Trust-first standard |
| Fast Bootstrap MVP | Bootstrap 5.3 | Boring, works |
| React Foundation | `@radix-ui/themes` | Polished primitives |
| SaaS with Custom Components | `shadcn/ui` | You own the code |
| Modern Tailwind SaaS | Tailwind v4 | Industry standard |

---

## Layout Principles (Driven by Dials)

### High Variance (8-10)
- Asymmetric layouts
- Dynamic whitespace
- Visual interest through composition
- Rules exist to be broken strategically

### Low Variance (3-5)
- Symmetric layouts
- Predictable grid
- Trust through consistency
- Rules are guidelines

### Motion by Intensity

| Intensity | Approach |
|-----------|----------|
| 1-2 | No motion, static only |
| 3-4 | Fade, subtle entrance only |
| 5-6 | Transitions + scroll reveals |
| 7-8 | Gesture-driven + physics |
| 9-10 | Cinematic, coordinated sequences |

---

## Typography Strategy

### By Density

**Low Density (1-3):** Large, generous sizing
- Display: 48-64px
- Heading: 32-40px
- Body: 18-20px

**High Density (7-10):** Compact sizing
- Display: 28-36px
- Heading: 20-24px
- Body: 14-16px

### Anti-Slop Type

**Never:**
- Mix serif + sans in every heading (pick a system)
- Use Inter for everything (it's fine, but consider intentionality)
- Underline body text for links (use color/weight/background)

**Do:**
- Pair one display + one reading typeface
- Use font-weight as visual hierarchy
- Letter-spacing for elegance (0.5-1% for display)

---

## Color Strategy

### By Variance

**Low (3-5):** 1-2 colors + neutrals
- Monochromatic + accent
- Trust through restraint

**High (8-10):** 3-4 strategic colors
- Primary + secondary + accent
- Harmony through intentional contrast

### Anti-Slop Color

**Never:**
- Purple-to-blue gradients on hero
- Gray text on colored background (WCAG failure)
- All accent colors, no neutrals

**Do:**
- OKLCH for perceptual uniformity
- 4.5:1 minimum contrast
- Color with purpose (not decoration)

---

## How It Complements Your Stack

```
Your Complete Toolkit:

Impeccable          Taste-Skill        Emil            Combined
─────────────────────────────────────────────────────────────────
Audit UI            Anti-slop          Motion          Complete
Quality gate        Direction          Microinteraction Premium
Performance         Inference          Purposeful      Quality
A11y                Aesthetics         Smooth          $10k
─────────────────────────────────────────────────────────────────
"Is this good?"     "This doesn't     "This moves     "This is
                     look templated"   right"          exceptional"
```

**No overlap:**
- Taste-Skill: Inference + anti-defaults
- Impeccable: Audit + polish
- Emil: Motion + review
- Together: Complete premium toolkit

---

## Workflow: Using Taste-Skill + Impeccable + Emil

### Phase 1: Discovery (Taste-Skill)
```
1. Read the brief deeply
2. State your "Design Read" in one line
3. Set the 3 Dials based on use case
4. Choose design system
```

### Phase 2: Plan (Impeccable)
```
5. /impeccable shape [feature]
   (UX/IA planning)
```

### Phase 3: References (Taste-Skill)
```
6. /imagegen-frontend-web
   (Generate mood boards)

7. Or use one of the aesthetic skills:
   /brutalist-skill [landing]
   /minimalist-skill [landing]
   /soft-skill [landing]
```

### Phase 4: Build (Impeccable)
```
8. /impeccable craft [feature]
   (Build with visual iteration)
```

### Phase 5: Animate (Emil)
```
9. /find-animation-opportunities [target]
10. /animate [component]
```

### Phase 6: Audit & Polish (Impeccable)
```
11. /impeccable audit [target]
12. /review-animations [code]
13. /impeccable polish [target]
```

---

## Quick Reference: Anti-Slop Checklist

Before shipping, verify:

- [ ] Design Read stated (one line)
- [ ] 3 Dials explicitly set or inferred
- [ ] Design system chosen (not invented)
- [ ] No AI defaults (check for purple gradients, Inter everywhere, etc.)
- [ ] Motion serves a purpose (not infinite loops)
- [ ] Typography hierarchy clear (3 sizes max)
- [ ] Color palette 2-4 colors + neutrals
- [ ] Whitespace intentional (not accidental)
- [ ] Accessibility check passed (Impeccable audit)
- [ ] References actually used (not vague)

---

## Resources

- **Official Site:** https://tasteskill.dev
- **GitHub:** https://github.com/Leonxlnx/taste-skill
- **License:** MIT
- **Community:** Active on GitHub discussions

---

## Next Steps

1. Review `.external-skills/leonxlnx/` for specific aesthetic skills
2. Start with `design-taste-frontend` for direction
3. Use aesthetic skills (`brutalist-skill`, `minimalist-skill`, etc.) for specific looks
4. Generate references with `imagegen-frontend-web`
5. Combine with Impeccable + Emil for complete toolkit

---

**Status:** Ready for production use on premium $10k projects ✅

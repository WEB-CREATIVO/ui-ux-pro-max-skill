# Leonxlnx - Taste-Skill Installation Report

**Installation Date:** September 12, 2026  
**Status:** ✅ COMPLETE  
**Version:** Latest  
**Stars:** 86,358 ⭐  

## Installation Details

**Location:** `~/.claude/skills/taste-skill-leonxlnx/`  
**Backup Location:** `.external-skills/leonxlnx/`  
**Installation Method:** Direct Git clone from Leonxlnx/taste-skill  
**License:** MIT  

---

## 7 Skills Installed

### Core Skills

1. **design-taste-frontend** ⭐ PRIMARY
   - Anti-slop philosophy
   - Brief inference
   - 3 Dials system (variance, motion, density)
   - Design system mapping
   - Typography, color, motion strategies

2. **brutalist-skill**
   - Stark, raw, minimalist geometry
   - Heavy sans-serif, monochromatic
   - High contrast, grid-based

3. **minimalist-skill**
   - Clean, restrained design
   - Lots of whitespace
   - Subtle microinteractions
   - Calm and readable

4. **soft-skill**
   - Organic, approachable, warm
   - Rounded corners, curves
   - Warm palette, illustrative
   - Playful and human-centered

5. **redesign-skill**
   - Systematic redesign approach
   - Audit → plan → implement
   - Preserve or overhaul strategically

### Image Generation Skills

6. **imagegen-frontend-web**
   - Generate reference boards
   - Mood board creation
   - Layout exploration
   - Brand kit generation

7. **imagegen-frontend-mobile**
   - Mobile-specific references
   - App UI concepts
   - Responsive exploration

---

## The 3 Dials System

Every design decision is controlled by 3 variables:

```
DESIGN_VARIANCE: 8    (1 = Symmetry → 10 = Chaos)
MOTION_INTENSITY: 6   (1 = Static → 10 = Cinematic)
VISUAL_DENSITY: 4     (1 = Airy → 10 = Packed)
```

### Dial Presets

| Use Case | VAR | MOT | DEN |
|----------|-----|-----|-----|
| SaaS Landing | 7 | 6 | 4 |
| Agency Creative | 9 | 8 | 3 |
| Premium Consumer | 7 | 6 | 3 |
| Portfolio Designer | 8 | 7 | 3 |
| Portfolio Dev | 6 | 5 | 4 |
| Editorial | 6 | 4 | 3 |
| Public-Sector | 3 | 2 | 5 |

---

## Core Workflow

### Step 0: Brief Inference (Read the Room)

**Before ANY code:**

1. Read page kind (SaaS landing? Portfolio? Redesign?)
2. Note vibe words ("minimalist", "Linear-style", "brutalist", etc.)
3. Check references (URLs, screenshots, competitors)
4. Understand audience (B2B vs consumer vs hiring manager)
5. List existing brand assets
6. Note quiet constraints (a11y-first? regulated? trust-critical?)

### Step 0.B: State Your Design Read

**One-line statement:**
> "Reading this as: \<page kind> for \<audience>, with a \<vibe> language, leaning toward \<design system>."

**Examples:**
- "Reading this as: B2B SaaS landing for technical buyers, with Linear-style minimalist, leaning Tailwind + Geist."
- "Reading this as: designer portfolio for hiring managers, with editorial/kinetic language, leaning native CSS + scroll animation."
- "Reading this as: public-sector service, trust-first, leaning GOV.UK Frontend."

### Step 1: Set the 3 Dials

Based on design read, set:
- DESIGN_VARIANCE (1-10)
- MOTION_INTENSITY (1-10)
- VISUAL_DENSITY (1-10)

Or use preset from table above.

### Step 2: Pick Design System

Never invent CSS. Reach for:
- shadcn/ui (modern SaaS + custom)
- Tailwind v4 (indie + AI marketing)
- @radix-ui/themes (React foundation)
- Bootstrap 5.3 (fast MVP)
- Material Web (Google-ish)
- Fluent UI (Microsoft/Enterprise)
- Carbon (IBM/Analytics)
- GOV.UK Frontend (UK public-sector)
- etc.

---

## Anti-Slop Discipline

**Never default to:**

❌ AI-purple gradients + centered hero over dark mesh  
❌ Three equal-width feature cards  
❌ Generic glassmorphism on everything  
❌ Infinite-loop micro-animations  
❌ Inter + slate-900 everywhere  

**Instead:**
- Infer from the brief
- Reach past defaults deliberately
- Use Dials to control consistency

---

## Typography Anti-Slop

**Never:**
- Mix serif + sans in every heading
- Use Inter for everything (it's fine, but be intentional)
- Underline body text links (use color/weight/background)

**Do:**
- Pair one display + one reading typeface
- Use font-weight for hierarchy
- Letter-spacing for elegance (0.5-1% for display)

---

## Color Anti-Slop

**Never:**
- Purple-to-blue gradients on hero
- Gray text on colored background (WCAG fail)
- All accent colors, no neutrals

**Do:**
- OKLCH for perceptual uniformity
- 4.5:1 minimum contrast
- Color with purpose, not decoration

---

## Quick Start Workflow

### For Landing Page ($10k)

```bash
# 1. Read and infer
Design read: "B2B SaaS landing for technical buyers, minimalist + Linear, Tailwind"

# 2. Set dials
DESIGN_VARIANCE=6  MOTION_INTENSITY=4  VISUAL_DENSITY=3

# 3. Plan UX
/impeccable shape landing

# 4. Generate references (optional)
/imagegen-frontend-web [landing references]

# 5. Build with direction
/impeccable craft landing

# 6. Use aesthetic if needed
/minimalist-skill landing

# 7. Add motion
/find-animation-opportunities landing
/animate [component]

# 8. Audit
/impeccable audit landing

# 9. Polish
/impeccable polish landing
```

### For Redesign ($10k)

```bash
# 1. Design read from existing
Analyze current design + audience

# 2. Decide: preserve or overhaul?
/redesign-skill landing

# 3. If overhaul:
Set new dials (+2 variance, +2 motion, keep density)

# 4. Generate new direction
/imagegen-frontend-web [new references]

# 5. Build
/impeccable craft landing

# 6. Full pipeline
/impeccable audit → /animate → /impeccable polish
```

---

## How It Works Together

### Your Complete Toolkit

```
Taste-Skill         Impeccable         Emil              Result
──────────────────────────────────────────────────────────────────
Anti-slop           Audit              Motion            Premium
Direction           Quality            Smooth            Exceptional
Inference           Performance        Purpose           $10k
Aesthetics          A11y              Delight           Quality
```

**Non-overlapping roles:**
- **Taste-Skill:** "What direction? How to avoid defaults?"
- **Impeccable:** "Is this good? Does it pass audit?"
- **Emil:** "Does this move well? Purposeful motion?"

---

## Aesthetic Skills Quick Reference

### Brutalist-Skill
**Use for:**
- Tech startups (raw, honest feel)
- Developer tools (stark, technical)
- Architecture/design portfolios (geometric purity)
- B2B transparency (no fluff)

**Characteristics:**
- Heavy typefaces (IBM Plex Mono, Courier)
- Black + white or 1 accent
- Grid-based ruthlessly
- No decoration, all purpose

### Minimalist-Skill
**Use for:**
- Premium/luxury brands (restrained)
- Professional services (trustworthy)
- Focus on content (editorial, docs)
- Modern tech (clean efficiency)

**Characteristics:**
- Lots of whitespace
- Single accent color
- Geometric simplicity
- Subtle interactions

### Soft-Skill
**Use for:**
- Consumer products (approachable)
- Wellness/lifestyle (warm)
- Creative agencies (human-centered)
- Family-friendly brands (playful)

**Characteristics:**
- Rounded corners, curves
- Warm palette (peachy, sage, cream)
- Illustrated elements
- Gestural motion

---

## Redesign-Skill Details

### Redesign Decision Tree

```
Current design exists?
├─ Yes, preserve → Keep identity, tweak aesthetics
│  └─ Tweak: +1 motion, keep variance + density
│
└─ Yes, overhaul → Replace visual world, keep function
   └─ Overhaul: +2 variance, +2 motion, keep density
```

### Process

1. **Audit existing** - What works? Brand equity? Trust signals?
2. **Decide scope** - Preserve identity or overhaul?
3. **Plan strategically** - Set new Dials
4. **Implement** - Build per Dials
5. **Verify** - Audit with Impeccable

---

## Image Generation Skills

### imagegen-frontend-web

**Generates:**
- Mood boards (5-10 reference layouts)
- Brand kits (color + type + mood)
- Layout variations (3 directions)
- Visual direction exploration

**Use before coding:** Feed AI with real references instead of letting it invent

### imagegen-frontend-mobile

**Generates:**
- Mobile layouts (app-like)
- Responsive concepts
- Mobile-first thinking
- Touch-friendly patterns

**Use for:** Mobile-first or responsive projects

---

## Pre-Ship Checklist

- [ ] Design Read stated (one line)
- [ ] 3 Dials explicitly set
- [ ] Design system chosen
- [ ] No AI defaults (search for purple, check for templates)
- [ ] Motion serves purpose (not infinite loops)
- [ ] Typography hierarchy (≤3 sizes)
- [ ] Color palette (2-4 + neutrals)
- [ ] Whitespace intentional
- [ ] Impeccable audit passed
- [ ] References actually used
- [ ] Redesign: strategy clear (preserve vs overhaul)

---

## Resources

- **Official:** https://tasteskill.dev
- **GitHub:** https://github.com/Leonxlnx/taste-skill
- **Reference:** `.external-skills/leonxlnx/TASTE-SKILL-REFERENCE.md`
- **License:** MIT
- **Community:** GitHub discussions active

---

## Next Steps

1. Read TASTE-SKILL-REFERENCE.md for deep dive
2. Try design-taste-frontend on your next project
3. Use aesthetic skills (brutalist, minimalist, soft) for specific vibes
4. Generate references before coding with imagegen skills
5. Combine with Impeccable + Emil for complete $10k toolkit

---

**Status:** Ready for production use on premium $10k projects ✅

**You now have the anti-slop design toolkit.** Combined with Impeccable (quality) and Emil (motion), you have everything needed for exceptional $10k web projects.

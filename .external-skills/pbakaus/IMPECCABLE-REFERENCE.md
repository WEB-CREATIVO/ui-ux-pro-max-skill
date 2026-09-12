# Paul Bakaus - Impeccable Skill

**Source:** https://github.com/pbakaus/impeccable  
**Version:** 4.0.4  
**License:** Apache 2.0  
**Author:** Paul Bakaus  

## Overview

**Impeccable** is a comprehensive design guidance skill for AI coding agents. It provides 23 commands to design, critique, audit, polish, and ship production-grade frontend interfaces.

**Purpose:** Turn every design task into award-winning, out-of-distribution craft with clear POV, deep UX understanding, and exceptional execution.

## When to Use This Skill

- Building new features with design considerations
- Auditing existing interfaces (accessibility, performance, responsive)
- Improving UX/UI (layout, typography, color, spacing)
- Final quality pass before shipping
- Hardening for production (error states, i18n, edge cases)
- Adding visual personality and delight
- Creating documentation from code

## Core Philosophy

1. **Go all out** - No hedging, no shortcuts. Complete deliverables.
2. **Dream big and bold** - Distinct, beautiful, outstanding, inspiring work.
3. **Verify in bounded passes** - Screenshot, scan, fix once, confirm. Stop polishing.
4. **Honor the brief** - Visual authority is evidence, not taste.

## The 23 Commands

### Build & Setup
- **`/impeccable init`** - One-time setup: write PRODUCT.md and DESIGN.md with design context
- **`/impeccable shape`** - Plan UX/UI before coding
- **`/impeccable craft`** - Full shape-then-build flow with visual iteration
- **`/impeccable document`** - Generate DESIGN.md from existing code
- **`/impeccable extract`** - Pull reusable components and tokens into design system

### Evaluate
- **`/impeccable critique`** - UX design review (hierarchy, clarity, emotional resonance)
- **`/impeccable audit`** - Technical QA (accessibility, performance, responsive)

### Refine
- **`/impeccable polish`** - Final quality pass, design system alignment, shipping readiness
- **`/impeccable bolder`** - Amplify safe or bland designs
- **`/impeccable quieter`** - Tone down overstimulating or aggressive designs
- **`/impeccable distill`** - Strip to essence, remove complexity
- **`/impeccable clarify`** - Improve UX copy, labels, error messages
- **`/impeccable adapt`** - Adapt for different devices and screen sizes
- **`/impeccable optimize`** - Diagnose and fix UI performance

### Enhance
- **`/impeccable harden`** - Production-ready: errors, i18n, edge cases, text overflow
- **`/impeccable onboard`** - Design first-run flows, empty states, activation paths
- **`/impeccable animate`** - Add purposeful animations and motion
- **`/impeccable colorize`** - Introduce strategic color to monochromatic UIs
- **`/impeccable typeset`** - Improve typography hierarchy and font choices
- **`/impeccable layout`** - Fix spacing, rhythm, and visual hierarchy
- **`/impeccable delight`** - Add personality and memorable moments
- **`/impeccable overdrive`** - Push past conventional limits for technical effects

### Iterate
- **`/impeccable live`** - Visual variant mode: pick elements in browser, generate alternatives

### Utilities
- **`/impeccable hooks`** - Manage design detector hook (auto-runs after UI edits)
- **`/impeccable doctor`** - Report and repair drift in Impeccable artifacts
- **`/impeccable pin <command>`** - Create standalone shortcuts (e.g., `/audit`)

## Design Modes

Choose based on the surface's purpose:

| Mode | Purpose | Examples |
|------|---------|----------|
| **Persuade** | Visitor decides and acts | Landing pages, marketing, pricing |
| **Operate** | Visitor completes a task | App UI, dashboards, tools, admin |
| **Read** | Visitor understands something | Docs, articles, guides, changelogs |
| **Experience** | Visitor is inside the work | Portfolios, galleries, showcases |

## Key Differentiators

### Breaks AI Template Patterns
Avoids the SaaS template tropes:
- ❌ Inter for everything
- ❌ Purple-to-blue gradients
- ❌ Cards nested in cards
- ❌ Gray text on colored backgrounds
- ❌ Rounded-square icon tiles

### Quality Floor
- 59 deterministic detector rules (no API key needed)
- Production-grade code requirements
- Clear POV and visual authority
- Deep UX understanding

### Durable Context
- `PRODUCT.md` - Brand, audience, voice, anti-references
- `DESIGN.md` - Color palette, typography, components, visual world
- Surface briefs - Specific guidance per page/feature

## Workflow Example: Landing Page ($10k)

```
1. /impeccable init                    → Define product context
   (Creates PRODUCT.md + DESIGN.md)

2. /impeccable shape landing           → Plan UX before coding

3. /impeccable craft landing           → Build with visual iteration

4. /animate [hero-section]             → Emil: Add purposeful motion
   (Use Emil's animate skill)

5. /impeccable audit landing           → QA: a11y, perf, responsive

6. /impeccable harden landing          → Add error handling, edge cases

7. /impeccable polish landing          → Final pass before shipping

8. /impeccable critique landing        → UX review (if needed)

Deploy with confidence ✅
```

## Workflow Example: Product Dashboard ($10k)

```
1. /impeccable init                    → Define product context

2. /impeccable document                → If project already exists, extract design

3. /impeccable audit settings          → Technical QA

4. /impeccable harden checkout         → Production-ready

5. /animate [transitions]              → Emil: Motion for clarity

6. /impeccable polish                  → Final quality

Ship ✅
```

## Detector Rules

59 deterministic rules catch:
- Accessibility violations (WCAG)
- Performance issues (Lighthouse)
- Responsive design problems
- Typography inconsistencies
- Color contrast issues
- Spacing/rhythm violations
- Common UI anti-patterns

Can run without LLM via CLI or browser extension.

## How It Complements Emil's Skills

| Impeccable | Emil's Skills |
|-----------|---------------|
| Layout, spacing, rhythm | Motion, animation |
| Typography, color | Microinteractions |
| UX hierarchy, clarity | Visual feedback |
| Performance audit | Smooth transitions |
| Accessibility | Delightful effects |

**Together:** Complete design toolkit for $10k-quality pages

## Resources

- **Official Site:** https://impeccable.style
- **GitHub:** https://github.com/pbakaus/impeccable
- **License:** Apache 2.0
- **Author:** Paul Bakaus

## Setup Instructions

### For This Project

1. **Already installed at:** `~/.claude/skills/impeccable/`
2. **Reference copy at:** `.external-skills/pbakaus/impeccable/`

### To Use in Claude Code

```bash
/impeccable init                  # First time only
/impeccable audit <target>        # Common audit
/impeccable polish <target>       # Before shipping
```

### Creating Custom Shortcuts

```bash
node ~/.claude/skills/impeccable/scripts/pin.mjs pin audit
# Now use: /audit <target>
```

## Never Do

- Split the difference between old and new designs (replace, don't polish discarded work)
- Repair drift as a side effect of design work
- Ignore the brief for your own taste
- Use undefined or invented color/spacing values
- Ship without running audit
- Skip harden on production features

## Next Steps

1. Read the reference documentation in `.external-skills/pbakaus/impeccable/reference/`
2. Start with `/impeccable init` on your first project
3. Follow the workflow examples above
4. Use Emil's skills for animation integration
5. Combine both skills for complete $10k quality

---

**Status:** Ready for production use on premium projects ✅

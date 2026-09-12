# Paul Bakaus - Impeccable Installation Report

**Installation Date:** September 12, 2026  
**Status:** ✅ COMPLETE  
**Version:** 4.0.4  

## Installation Details

**Location:** `~/.claude/skills/impeccable/`  
**Backup Location:** `.external-skills/pbakaus/impeccable/`  
**Installation Method:** Direct Git clone from pbakaus/impeccable  
**License:** Apache 2.0  

---

## Available Commands (23 Total)

### 🏗️ Build & Setup (5)
- `/impeccable init` - One-time setup (PRODUCT.md, DESIGN.md)
- `/impeccable shape` - Plan UX/UI before coding
- `/impeccable craft` - Full shape-then-build with visual iteration
- `/impeccable document` - Generate DESIGN.md from existing code
- `/impeccable extract` - Pull components/tokens into design system

### 🔍 Evaluate (2)
- `/impeccable critique` - UX design review
- `/impeccable audit` - Technical QA (a11y, perf, responsive)

### ✨ Refine (8)
- `/impeccable polish` - Final quality pass
- `/impeccable bolder` - Amplify bland designs
- `/impeccable quieter` - Tone down overstimulating designs
- `/impeccable distill` - Strip to essence
- `/impeccable clarify` - Improve UX copy
- `/impeccable adapt` - Responsive design fixes
- `/impeccable optimize` - Performance improvements
- `/impeccable harden` - Production-ready (errors, i18n, edge cases)

### 🎨 Enhance (8)
- `/impeccable onboard` - First-run flows, empty states
- `/impeccable animate` - Add purposeful motion
- `/impeccable colorize` - Strategic color introduction
- `/impeccable typeset` - Typography improvements
- `/impeccable layout` - Spacing and visual rhythm
- `/impeccable delight` - Add personality and joy
- `/impeccable overdrive` - Technically extraordinary effects
- `/impeccable live` - Visual iteration in browser

---

## Quick Start Workflow

### For a New Landing Page ($10k project)

```bash
# 1. Initialize project context
/impeccable init

# 2. Plan before coding
/impeccable shape landing

# 3. Build with iteration
/impeccable craft landing

# 4. Add motion (Emil's skill)
/animate [hero-section]

# 5. Technical audit
/impeccable audit landing

# 6. Production-ready
/impeccable harden landing

# 7. Final polish
/impeccable polish landing

# 8. Ship! ✅
```

### For Improving Existing UI

```bash
# 1. Document existing design
/impeccable document

# 2. Run audit
/impeccable audit [target]

# 3. Choose refinement
/impeccable polish [target]        # General polish
/impeccable bolder [target]        # Amplify
/impeccable quieter [target]       # Tone down
/impeccable harden [target]        # Production-ready

# 4. Ship ✅
```

---

## How It Complements Emil's Skills

### Emil Kowalski Skills (Animations)
- Purpose: Purposeful motion and microinteractions
- Commands: animate, review-animations, find-animation-opportunities, improve-animations
- Focus: **How things move**

### Impeccable (Design)
- Purpose: Complete visual and UX design
- Commands: 23 commands for design, audit, polish
- Focus: **How things look and work**

### Together (Complete Toolkit)
```
Impeccable Design  +  Emil Animations  =  $10k Quality
Layout             +  Motion           =  Complete Experience
Color              +  Transitions      =  Professional Polish
Typography        +  Microinteractions =  Differentiation
Audit              +  Review           =  Guaranteed Quality
```

---

## Key Features for $10k Projects

✅ **Avoids Template Patterns**
- No generic Inter + purple gradients
- No cards nested in cards
- No gray text on colored backgrounds
- Distinct, beautiful, award-winning work

✅ **Quality Assurance**
- 59 deterministic detector rules
- a11y compliance checks
- Performance audits
- Responsive design verification

✅ **Production-Ready**
- Error state handling
- i18n support
- Text overflow management
- Edge case coverage

✅ **Durable Context**
- PRODUCT.md - Brand, audience, voice
- DESIGN.md - Colors, typography, components
- Surface briefs - Specific per-feature guidance

✅ **Visual Iteration**
- Live mode for browser-based variants
- Pick elements, generate alternatives
- Real-time refinement

---

## Design Modes

Choose based on page purpose:

| Mode | Best For | Examples |
|------|----------|----------|
| **Persuade** | Visitor acts | Landing, marketing, pricing |
| **Operate** | Visitor completes task | Apps, dashboards, tools |
| **Read** | Visitor understands | Docs, articles, guides |
| **Experience** | Visitor is inside work | Portfolios, galleries |

---

## Shortcuts (Optional)

Create standalone commands:

```bash
# Create /audit shortcut
node ~/.claude/skills/impeccable/scripts/pin.mjs pin audit

# Now use: /audit <target>

# Unpin if needed
node ~/.claude/skills/impeccable/scripts/pin.mjs unpin audit
```

---

## Reference Files

Full documentation available in `.external-skills/pbakaus/impeccable/reference/`:

- `craft.md` - Deprecated alias guidance
- `shape.md` - UX planning
- `init.md` - Setup process
- `document.md` - Extract existing design
- `extract.md` - Components & tokens
- `critique.md` - UX review
- `audit.md` - Technical QA
- `audit.native.md` - iOS/Android audit
- `polish.md` - Final pass
- `bolder.md` - Amplify designs
- `quieter.md` - Tone down
- `distill.md` - Strip to essence
- `clarify.md` - UX copy
- `adapt.md` - Responsive fixes
- `adapt.native.md` - Mobile adaptation
- `optimize.md` - Performance
- `harden.md` - Production-ready
- `onboard.md` - First-run flows
- `animate.md` - Add motion
- `colorize.md` - Strategic color
- `typeset.md` - Typography
- `layout.md` - Spacing & rhythm
- `delight.md` - Personality
- `overdrive.md` - Technical effects
- `live.md` - Visual iteration
- `hooks.md` - Design detector hook
- `doctor.md` - Artifact drift repair
- `new-work.md` - Design approach
- `craft-floor.md` - Quality standards
- `routing.md` - Command routing

---

## Updates & Maintenance

To update Impeccable to latest version:

```bash
cd ~/.claude/skills/impeccable
git pull origin main
```

Check official site for breaking changes: https://impeccable.style

---

## Support

- **GitHub Issues:** https://github.com/pbakaus/impeccable/issues
- **Official Site:** https://impeccable.style
- **Author:** Paul Bakaus

---

**Status:** Ready for production use on $10k projects ✅

**Next:** Combine with Emil's animation skills for complete design + motion toolkit.

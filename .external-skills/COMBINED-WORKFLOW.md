# Combined Workflow: Emil + Impeccable for $10k Projects

This document shows how to use Emil Kowalski's animation skills and Paul Bakaus's Impeccable design skill together to create exceptional web pages worth $10,000.

---

## The Complete Toolkit

```
Your Project for $10k
├─ Impeccable (Paul Bakaus)
│  ├─ 23 design commands
│  ├─ Layout, typography, color
│  ├─ Accessibility & performance audit
│  └─ Production-ready polish
│
└─ Emil's Animation Skills
   ├─ animate: Build animations
   ├─ find-animation-opportunities: Identify motion opportunities
   ├─ review-animations: Quality gate
   └─ improve-animations: Optimize motion
```

---

## Workflow 1: Landing Page ($10k)

### Phase 1: Discovery & Setup (1 hour)

```bash
# 1. Initialize project context
/impeccable init

# Follow the prompts:
#   - Brand or Product? → Brand (landing page)
#   - Define audience, voice, anti-references
#   - Choose design mode: Persuade

# Outputs:
#   → PRODUCT.md (durable context)
#   → DESIGN.md (visual world)
```

### Phase 2: UX Planning (1-2 hours)

```bash
# 2. Plan UX/UI structure before coding
/impeccable shape landing

# This will:
#   - Map user journeys
#   - Plan information architecture
#   - Define micro-interactions
#   - Propose layout structure
#
# Creates a blueprint for development
```

### Phase 3: Visual Design & Build (3-4 hours)

```bash
# 3. Design and build with visual iteration
/impeccable craft landing

# This will:
#   - Build hero section
#   - Design feature blocks
#   - Add trust signals (testimonials, logos)
#   - Create CTA sections
#   - Implement call-to-action flows
#   - Live iterate in browser with /impeccable live
```

### Phase 4: Add Strategic Motion (1-2 hours)

```bash
# 4. Identify animation opportunities
/find-animation-opportunities landing

# This analyzes the page and suggests:
#   - Scroll reveals for feature blocks
#   - Entrance animations for hero
#   - Microinteractions on CTAs
#   - Transition effects between sections
#
# Outputs: Specific motion recommendations with values

# 5. Build animations
/animate hero-section
/animate feature-block
/animate cta-buttons

# For each animation:
#   - Frequency check (should it animate?)
#   - Purpose (feedback, spatial, state change?)
#   - Tool selection (CSS, JS, Motion)
#   - Properties (transform, opacity only)
#   - Easing and duration
#   - Interruption handling
#   - Reduced motion support
```

### Phase 5: Quality Assurance (1-2 hours)

```bash
# 6. Technical audit
/impeccable audit landing

# Checks:
#   - ♿ Accessibility (WCAG compliance)
#   - ⚡ Performance (Lighthouse metrics)
#   - 📱 Responsive design
#   - 🎨 Color contrast
#   - 🔤 Typography consistency

# 7. Review animations against standards
/review-animations [hero-animation.js]
/review-animations [cta-animation.css]

# This ensures:
#   - No animate on keyboard shortcuts
#   - Proper easing curves
#   - Appropriate durations
#   - Accessibility gating
```

### Phase 6: Production-Ready (1-2 hours)

```bash
# 8. Harden for production
/impeccable harden landing

# Adds:
#   - Error state designs
#   - International text support (i18n)
#   - Text overflow handling
#   - Edge cases
#   - Fallback designs

# 9. Final polish
/impeccable polish landing

# Delivers:
#   - Final pixel-perfect pass
#   - Design system alignment
#   - Brand consistency check
#   - Shipping readiness verification
```

### Phase 7: Final Review (optional)

```bash
# 10. UX critique (if desired)
/impeccable critique landing

# Provides:
#   - Hierarchy evaluation
#   - Clarity assessment
#   - Emotional resonance check
#   - Comparative analysis
```

### Estimated Timeline
- Discovery & Setup: 1 hour
- UX Planning: 1-2 hours
- Design & Build: 3-4 hours
- Add Motion: 1-2 hours
- QA: 1-2 hours
- Production-Ready: 1-2 hours
- **Total: 8-13 hours of focused work**

### Deliverable
✅ **Complete, award-winning landing page with:**
- Strategic visual design
- Purposeful animations
- Full accessibility
- Production-ready code
- $10k-quality deliverable

---

## Workflow 2: Product Dashboard ($10k)

### Phase 1: Document Existing Design (1 hour)

```bash
# If project already exists:
/impeccable document

# If starting from scratch:
/impeccable init
# (Choose "Product" mode instead of "Brand")
```

### Phase 2: Audit Current State (1 hour)

```bash
/impeccable audit dashboard

# Identifies issues in:
#   - Accessibility
#   - Performance
#   - Responsive design
#   - Visual consistency
```

### Phase 3: Production-Ready Pass (2-3 hours)

```bash
/impeccable harden dashboard

# Ensures:
#   - Error states designed
#   - Loading states
#   - Empty states
#   - i18n support
#   - Edge cases handled
```

### Phase 4: Animation Opportunities (1-2 hours)

```bash
# Find where motion helps
/find-animation-opportunities dashboard

# Typical dashboard animations:
#   - Loading transitions
#   - Data refreshes
#   - Chart animations
#   - Modal opens/closes
#   - State changes

# Build animations
/animate data-refresh
/animate modal-enter
/animate chart-build
```

### Phase 5: Motion Quality Gate (1 hour)

```bash
/review-animations [transitions.js]
/improve-animations dashboard

# Ensures animations:
#   - Add clarity, not distraction
#   - Perform smoothly under load
#   - Support reduced motion
#   - Fit the operating mode
```

### Phase 6: Final Polish (1-2 hours)

```bash
/impeccable polish dashboard

# Last-minute refinements:
#   - Visual hierarchy
#   - Spacing adjustments
#   - Color balancing
#   - Typography tuning
```

### Estimated Timeline
- Document/Setup: 1 hour
- Audit: 1 hour
- Production-Ready: 2-3 hours
- Animation: 1-2 hours
- Review: 1 hour
- Polish: 1-2 hours
- **Total: 7-10 hours**

### Deliverable
✅ **Production-grade dashboard with:**
- Accessible, performant interface
- Strategic microinteractions
- Error and edge case handling
- Purposeful animations
- Ready for shipping

---

## Workflow 3: Iterative Refinement (For Existing Projects)

If you're improving an existing page:

```bash
# 1. Audit for issues
/impeccable audit [target]

# 2. Choose refinement path
/impeccable bolder [target]       # Make it pop
/impeccable quieter [target]      # Tone it down
/impeccable distill [target]      # Simplify
/impeccable clarify [target]      # Fix copy

# 3. Find animation opportunities
/find-animation-opportunities [target]

# 4. Add motion
/animate [component]

# 5. Final review
/impeccable polish [target]
/review-animations [code]

# 6. Optimize
/impeccable optimize [target]
/improve-animations [target]
```

---

## Key Decisions by Command

### When to Use Emil's Skills

**Use `/animate` when:**
- You've identified a specific animation need
- You want to add motion to a component
- You need to follow strict animation standards

**Use `/find-animation-opportunities` when:**
- Page feels static and needs life
- You want to identify all motion needs at once
- Client wants "more movement" (before overloading)

**Use `/review-animations` when:**
- You've built animations and want QA
- Before delivering to client
- To ensure production-quality motion

**Use `/improve-animations` when:**
- Auditing existing motion code
- Page has animations but feels off
- Need a prioritized improvement roadmap

### When to Use Impeccable Commands

**Use `/init` when:**
- Starting a new project
- First time with a client
- Need to establish design context

**Use `/shape` when:**
- Have requirements, no design yet
- Want to plan UX before coding
- Need to validate structure with client

**Use `/craft` when:**
- Ready to build
- Combining design + implementation
- Want visual iteration in browser

**Use `/audit` when:**
- Before shipping
- For QA checklist
- To find accessibility issues

**Use `/polish` when:**
- Final pass before delivery
- Everything works, needs refinement
- Last minute tweaks

**Use `/harden` when:**
- Adding error states
- Preparing for production
- Supporting i18n or edge cases

---

## Command Chaining: Complete Flow

### For Maximum Impact ($10k Guarantee)

```mermaid
graph TD
    A[/impeccable init] -->|Define context| B[PRODUCT.md + DESIGN.md]
    B --> C[/impeccable shape]
    C -->|UX plan| D[/impeccable craft]
    D -->|Visual design| E[/find-animation-opportunities]
    E -->|Motion plan| F[/animate components]
    F -->|Add motion| G[/impeccable audit]
    G -->|QA: a11y, perf| H[/review-animations]
    H -->|Motion QA| I[/impeccable harden]
    I -->|Production prep| J[/impeccable polish]
    J -->|Final pass| K[✅ Ship]
```

---

## Pro Tips for $10k Quality

### 1. Always Start with Init
```bash
/impeccable init
# Don't skip this. It's 20 minutes that saves hours.
```

### 2. Shape Before Craft
```bash
/impeccable shape [feature]
# Plan to code saves iteration cycles.
```

### 3. Find Animations Strategically
```bash
/find-animation-opportunities [target]
# Don't animate everything. Be surgical.
```

### 4. Audit Before Harden
```bash
/impeccable audit [target]
# Find problems first, then fix with harden.
```

### 5. Polish at the End
```bash
/impeccable polish [target]
# Not at the beginning. Build, then refine.
```

### 6. Review Animations Always
```bash
/review-animations [code]
# Quality gate before delivery.
```

### 7. Use Live Mode for Iteration
```bash
/impeccable live
# Real-time browser-based refinement.
```

### 8. Create Shortcuts for Favorites
```bash
# Create /audit shortcut
node ~/.claude/skills/impeccable/scripts/pin.mjs pin audit

# Now: /audit instead of /impeccable audit
```

---

## Performance & Accessibility Checklist

Before delivering a $10k project:

### Impeccable Audit Outputs
- [ ] ♿ All interactive elements keyboard-accessible
- [ ] 🔊 Color contrast > 4.5:1
- [ ] 📱 Responsive on all breakpoints
- [ ] ⚡ Lighthouse Performance > 90
- [ ] 🎯 Lighthouse Accessibility > 95
- [ ] 📊 Lighthouse Best Practices > 90
- [ ] 🔒 Lighthouse SEO > 90

### Emil Animation Standards
- [ ] No animations on keyboard shortcuts
- [ ] Reduced motion support included
- [ ] Hover gating for touch devices
- [ ] Appropriate easing curves used
- [ ] Duration < 300ms for UI animations
- [ ] Transform/opacity only (no layout shift)
- [ ] Graceful degradation without motion

### Production Readiness
- [ ] Error states designed
- [ ] Loading states designed
- [ ] Empty states designed
- [ ] i18n text overflow handled
- [ ] Edge cases covered
- [ ] All copy reviewed and approved

---

## Troubleshooting

### Animation Feels Off
```bash
/improve-animations [target]
# Get optimization suggestions

/review-animations [code]
# Check against standards
```

### Design Looks Generic
```bash
/impeccable bolder [target]
# Amplify and differentiate

/impeccable delight [target]
# Add personality
```

### Performance Slow
```bash
/impeccable optimize [target]
# Identify and fix performance bottlenecks
```

### Accessibility Issues
```bash
/impeccable audit [target]
# Full a11y audit with recommendations
```

---

## Final Checklist for $10k Delivery

- [ ] `/impeccable init` completed
- [ ] `/impeccable shape` reviewed
- [ ] `/impeccable craft` finished
- [ ] `/find-animation-opportunities` analyzed
- [ ] `/animate` applied to key components
- [ ] `/impeccable audit` all checks passing
- [ ] `/review-animations` approved
- [ ] `/impeccable harden` production-ready
- [ ] `/impeccable polish` final pass done
- [ ] Client requirements met
- [ ] Budget/timeline on track
- [ ] Ready to deploy ✅

---

## Resources

- **Emil's Animate Skill:** `.external-skills/emil-kowalski/ANIMATE-REFERENCE.md`
- **Impeccable Guide:** `.external-skills/pbakaus/IMPECCABLE-REFERENCE.md`
- **Emil's GitHub:** https://github.com/emilkowalski/skills
- **Impeccable GitHub:** https://github.com/pbakaus/impeccable

---

**Your toolkit for creating $10,000-quality web pages is now complete.** 🚀

Start with `/impeccable init` on your next project!

# Emil Kowalski - Animate Skill

**Source:** https://github.com/emilkowalski/skills/tree/main/skills/animate

## Overview

The `animate` skill is a construction-focused skill for building production-grade animations from scratch. It follows Emil Kowalski's strict animation philosophy and decision framework.

**Purpose:** Turn a request for motion into an implementation that would survive strict code review.

## When to Use This Skill

- Building an animation from scratch
- Adding motion to a component
- Making a UI element feel "alive"
- Constructing transitions
- Need guidance on animation decisions

## Key Philosophy

The skill operates on a **structured 7-step decision sequence** that ensures animations are:
- ✓ Purposeful (not decorative on high-frequency actions)
- ✓ Performant (GPU-accelerated transforms only)
- ✓ Accessible (reduced-motion support built-in)
- ✓ Consistent (predefined easing curves and durations)

## Quick Reference: The 7-Step Build Sequence

1. **Should this animate at all?** → Gate by frequency
2. **What is the purpose?** → Name it (feedback, spatial, state, prevent jarring, explanation, delight)
3. **Pick the tool** → CSS transition → @starting-style → CSS animation → WAAPI → Motion library
4. **Pick the properties** → `transform` + `opacity` only
5. **Easing and duration** → Use predefined curves, keep UI under 300ms
6. **Interruption and exit** → Symmetric paths, springs for gestures
7. **Reduced motion and hover gating** → Always included

## Critical Rules (Never Violate)

| Never | Instead |
| --- | --- |
| `scale(0)` entrance | `scale(0.95)` + `opacity: 0` |
| `ease-in` on UI | `ease-out` or strong custom curve |
| `transition: all` | Name exact properties |
| Animation on keyboard shortcuts | No animation |
| Keyframes on toasts/toggles | CSS transitions |
| Animate `width`/`height`/`margin`/`padding` | Use `transform` / `opacity` |

## Predefined Easing Curves

```css
--ease-out: cubic-bezier(0.23, 1, 0.32, 1);        /* entrance/exit */
--ease-in-out: cubic-bezier(0.77, 0, 0.175, 1);    /* on-screen movement */
--ease-drawer: cubic-bezier(0.32, 0.72, 0, 1);     /* iOS-like drawer */
```

## Duration Guidelines

| Element | Duration |
| --- | --- |
| Button press feedback | 100–160ms |
| Tooltips, small popovers | 125–200ms |
| Dropdowns, selects | 150–250ms |
| Modals, drawers | 200–500ms |

**Rule:** UI animations stay under 300ms.

## Companion Skills

- **review-animations** - Critique existing animations against Emil's standards
- **improve-animations** - Audit an entire codebase for animation improvements
- **find-animation-opportunities** - Identify where animations should be added
- **animate-expo** - Animation patterns for React Native/Expo

## Resources

- **RECIPES.md** in the animate skill folder contains ready-to-build implementations for:
  - Button press feedback
  - Dropdown, tooltip, modal, drawer animations
  - Toast, accordion, stagger patterns
  - Scroll reveal, drag-to-dismiss
  - Hold-to-confirm, tab indicator

## How to Invoke

In Claude Code, invoke with:
```
/animate [your animation request]
```

Or reference this skill when needing animation guidance: "Use Emil's animate skill philosophy..."

## External References

- **GitHub:** https://github.com/emilkowalski/skills/tree/main/skills/animate
- **Author:** Emil Kowalski
- **License:** Check the repository for license details

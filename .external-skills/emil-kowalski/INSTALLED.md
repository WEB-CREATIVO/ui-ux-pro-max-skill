# Emil Kowalski Animation Skills - Installation Report

**Installation Date:** September 12, 2026  
**Status:** ✅ COMPLETE  

## Installed Skills

### 1. **animate** ⭐
**Location:** `~/.claude/skills/animate/`  
**Purpose:** Build animations from scratch with structured decision-making  
**Invoke:** `/animate [request]`

Build production-grade animations following Emil's 7-step sequence. Use when creating animations that need to pass strict quality review.

### 2. **find-animation-opportunities** 🎯
**Location:** `~/.claude/skills/find-animation-opportunities/`  
**Purpose:** Identify where animations should be used in code/UI  
**Invoke:** `/find-animation-opportunities [request]`

Audit codebases to find motion opportunities. Proposes improvements without implementing them. Essential for $10k-quality work.

### 3. **review-animations** 🔍
**Location:** `~/.claude/skills/review-animations/`  
**Purpose:** Review animation code against Emil's high craft standards  
**Invoke:** `/review-animations [code]`

Quality gate for animations. Ensures every animation serves a purpose and follows best practices. Use before delivering to clients.

### 4. **improve-animations** 🚀
**Location:** `~/.claude/skills/improve-animations/`  
**Purpose:** Audit and create implementation plans for animation improvements  
**Invoke:** `/improve-animations [request]`

Senior motion advisor. Surveys animation code and produces prioritized audit with implementation plans.

---

## How to Use in Your Workflow

### Scenario 1: Building a New Animated Component
```
1. Use /find-animation-opportunities → Find where animation adds value
2. Use /animate → Build the animation
3. Use /review-animations → Verify quality
4. Deploy with confidence
```

### Scenario 2: Improving Existing Pages
```
1. Use /improve-animations → Get audit and plan
2. Use /animate → Implement improvements
3. Use /review-animations → Final check
```

### Scenario 3: Quality Assurance Before Client Delivery
```
1. Use /review-animations → Catch issues
2. Use /improve-animations → Get optimization ideas
3. Refine and deliver
```

---

## Directory Structure

```
.external-skills/
├── README.md                                # Main index
├── INSTALLATION.md                          # Installation steps
├── INSTALLED.md                            # THIS FILE - Installation report
└── emil-kowalski/
    ├── ANIMATE-REFERENCE.md                # Complete animate skill reference
    ├── animate/                            # animate skill files
    ├── find-animation-opportunities/       # find-animation-opportunities skill files
    ├── review-animations/                  # review-animations skill files
    └── improve-animations/                 # improve-animations skill files
```

---

## Key Features for $10k Projects

These skills enable you to deliver:

✅ **Purposeful Motion** - Every animation serves a function  
✅ **High Performance** - GPU-accelerated transforms only  
✅ **Accessibility** - Reduced-motion and hover-gating built-in  
✅ **Professional Quality** - Passes strict review standards  
✅ **Strategic Additions** - Animation opportunities identified strategically  

---

## What's NOT Installed

- **animate-expo** - Not needed for web projects
- **animation-vocabulary** - Reference in ANIMATE-REFERENCE.md is sufficient
- **write-swift** - iOS development (not relevant to web)
- **prototype** - Not in core workflow
- Others - Not needed for initial $10k project delivery

---

## Quick Reference: Easing Curves

```css
--ease-out: cubic-bezier(0.23, 1, 0.32, 1);        /* entrance/exit */
--ease-in-out: cubic-bezier(0.77, 0, 0.175, 1);    /* on-screen movement */
--ease-drawer: cubic-bezier(0.32, 0.72, 0, 1);     /* iOS drawer style */
```

**Duration Rules:**
- Button feedback: 100–160ms
- Tooltips/popovers: 125–200ms
- Dropdowns: 150–250ms
- Modals/drawers: 200–500ms
- **MAX for UI: 300ms**

---

## Next Steps

1. Read ANIMATE-REFERENCE.md for complete animate skill documentation
2. Start with `/find-animation-opportunities` on your first project
3. Use `/animate` to build animations
4. Use `/review-animations` before delivery
5. Iterate and refine

---

## Support & Updates

- **Skills Repository:** https://github.com/emilkowalski/skills
- **Original Author:** Emil Kowalski
- **License:** Check repository for details

To update skills to latest:
```bash
git -C ~/.claude/skills/animate pull
git -C ~/.claude/skills/find-animation-opportunities pull
git -C ~/.claude/skills/review-animations pull
git -C ~/.claude/skills/improve-animations pull
```

---

**Status:** Ready for production use on $10k projects ✅

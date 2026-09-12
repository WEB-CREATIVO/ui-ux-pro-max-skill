# Installing External Skills

This document explains how to install and use external skills from the `.external-skills/` reference folder.

## Emil Kowalski - Animation Skills

**Source Repository:** https://github.com/emilkowalski/skills

### Installation Steps

✅ **INSTALLATION COMPLETE** - All 4 core animation skills successfully installed.

**Date Installed:** September 12, 2026  
**Installation Method:** Direct cloning to `~/.claude/skills/`  
**Storage:** Also backed up in `.external-skills/emil-kowalski/` for project reference

### Skills Installed ✅

#### Emil Kowalski (Animation)
- [x] **animate** - Core animation construction skill
- [x] **find-animation-opportunities** - Animation audit and discovery  
- [x] **review-animations** - Animation code review
- [x] **improve-animations** - Codebase animation improvements

#### Paul Bakaus (Design)
- [x] **impeccable** - 23 commands for design, audit, polish, and shipping

**Not Installed:**
- animate-expo (React Native/Expo - not needed for web projects)
- animation-vocabulary (Reference available in ANIMATE-REFERENCE.md)

### Post-Installation

Once installed, skills can be invoked in:
1. Claude Code sessions
2. IDE integrations
3. CLI workflows
4. Multi-environment setups

### Verification

After installation, verify with:
```bash
# Check if skills are accessible
ls -la ~/.claude/skills/ | grep animate
```

### Update Process

To update skills to the latest version from Emil Kowalski's repository:
```bash
git pull https://github.com/emilkowalski/skills main
# Follow the same installation steps above
```

---

**Status:** ⏳ Awaiting user's installation prompt for analysis and validation.

# Fictional University Theme - Quick Setup Summary

## 🚀 Immediate Actions Required

### 1. Install ACF Pro Plugin
- **Download**: https://www.advancedcustomfields.com/pro/
- **Install**: WP Admin → Plugins → Add New → Upload Plugin
- **Activate** the plugin

### 2. Create Field Groups
Go to **Custom Fields → Field Groups → Add New** and create these 4 groups:

#### Campus Fields
- **Field Name**: Map Location
- **Field Type**: Google Map
- **Field Name**: `map_location`
- **Location**: Post Type is equal to Campus

#### Program Fields
- **Field Name**: Main Body Content
- **Field Type**: WYSIWYG Editor
- **Field Name**: `main_body_content`
- **Location**: Post Type is equal to Program

#### Event Fields
- **Field Name**: Event Date
- **Field Type**: Date Picker
- **Field Name**: `event_date`
- **Return Format**: Ymd
- **Field Name**: Related Programs
- **Field Type**: Relationship
- **Field Name**: `related_programs`
- **Post Types**: Program
- **Location**: Post Type is equal to Event

#### Professor Fields
- **Field Name**: Related Programs
- **Field Type**: Relationship
- **Field Name**: `related_programs`
- **Post Types**: Program
- **Location**: Post Type is equal to Professor

### 3. Create Essential Content
- **Pages**: About Us
- **Posts**: 
  - 3-5 Campuses (with map locations)
  - 3-5 Programs (with descriptions)
  - 3-5 Events (with dates and related programs)
  - 3-5 Professors (with related programs)

### 4. Build Assets
```bash
npm install
npm run start   # Development
# or
npm run build   # Production
```

### 5. Final Steps
- Settings → Permalinks → "Post name" → Save Changes
- Test all navbar links
- Verify note system works (login required)
- Check mobile menu functionality

## 📁 Files I've Created for You:
- `inc/acf-setup/` - Contains JSON field group definitions
- `inc/acf-init.php` - ACF initialization script
- `functions.php` - Updated to include ACF init
- `SETUP-GUIDE.md` - Complete detailed instructions
- `README-SETUP.md` - This quick summary

## ⚠️ Important Notes:
- The theme's custom post types (note, campus, program, event, professor) are **already registered**
- REST API endpoints are **already working**
- JavaScript modules are **already implemented**
- Only ACF fields and content creation are needed

You should be able to get this working in 15-20 minutes following these steps!
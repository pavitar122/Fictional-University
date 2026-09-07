# Fictional University Theme Setup Guide

## Required Plugins for Admin Installation

To make the Fictional University theme work properly, you need to install and activate the following plugins in your WordPress admin dashboard:

### 1. Advanced Custom Fields PRO (ACF Pro)
- **Purpose**: Provides the custom fields functionality used throughout the theme
- **Required Fields**:
  - Campus: Map Location (Google Map field)
  - Program: Main Body Content (WYSIWYG editor)
  - Event: Event Date (Date Picker), Related Programs (Relationship)
  - Professor: Related Programs (Relationship to Programs)

### 2. Optional but Recommended Plugins
- **WP Super Cache** or similar caching plugin (for performance)
- **Yoast SEO** or **Rank Math** (for SEO optimization)
- **Contact Form 7** or **WPForms** (for contact forms)
- **Smush** or **ShortPixel** (for image optimization)

## Database Setup Instructions

Since I cannot directly access your WordPress database, here are the SQL queries you would need to run to set up initial data. You can execute these via phpMyAdmin or a similar database management tool.

### 1. Create Sample Campus Data
```sql
-- Insert sample campuses
INSERT INTO wp_posts (post_author, post_date, post_content, post_title, post_excerpt, post_status, post_type, comment_status, ping_status, post_name, post_modified, post_modified_gmt, post_parent, menu_order, post_type, post_mime_type, comment_count)
VALUES 
(1, NOW(), 'Main campus with modern facilities', 'Main Campus', 'Our primary campus location', 'publish', 'campus', 'closed', 'closed', 'main-campus', NOW(), NOW(), 0, 0, 'campus', '', 0),
(1, NOW(), 'North campus with specialized labs', 'North Campus', 'Science and technology focus', 'publish', 'campus', 'closed', 'closed', 'north-campus', NOW(), NOW(), 0, 0, 'campus', '', 0),
(1, NOW(), 'South campus for arts', 'South Campus', 'Creative arts and humanities', 'publish', 'campus', 'closed', 'closed', 'south-campus', NOW(), NOW(), 0, 0, 'campus', '', 0);

-- Add ACF map location data for campuses (post_meta)
-- Note: You'll need to get the actual post IDs from the above inserts
-- Example format (replace XXX with actual post ID):
INSERT INTO wp_postmeta (post_id, meta_key, meta_value) VALUES 
(XXX, 'map_location', 'a:3:{s:3:"lat";d:40.7128;s:3:"lng";d:-74.0060;s:7:"address";s:32:"123 University Ave, New York, NY";}');
```

### 2. Create Sample Program Data
```sql
-- Insert sample programs
INSERT INTO wp_posts (post_author, post_date, post_content, post_title, post_excerpt, post_status, post_type, comment_status, ping_status, post_name, post_modified, post_modified_gmt, post_parent, menu_order, post_type, post_mime_type, comment_count)
VALUES 
(1, NOW(), 'Computer Science program focusing on software development and AI', 'Computer Science', 'BS in Computer Science', 'publish', 'program', 'closed', 'closed', 'computer-science', NOW(), NOW(), 0, 0, 'program', '', 0),
(1, NOW(), 'Business Administration with focus on entrepreneurship', 'Business Administration', 'MBA Program', 'publish', 'program', 'closed', 'closed', 'business-administration', NOW(), NOW(), 0, 0, 'program', '', 0),
(1, NOW(), 'English Literature and Creative Writing', 'English Literature', 'BA in English Literature', 'publish', 'program', 'closed', 'closed', 'english-literature', NOW(), NOW(), 0, 0, 'program', '', 0);

-- Add ACF main body content for programs
-- Example format (replace XXX with actual post ID):
INSERT INTO wp_postmeta (post_id, meta_key, meta_value) VALUES 
(XXX, 'main_body_content', '<p>Welcome to our Computer Science program...</p>');
```

### 3. Create Sample Event Data
```sql
-- Insert sample events
INSERT INTO wp_posts (post_author, post_date, post_content, post_title, post_excerpt, post_status, post_type, comment_status, ping_status, post_name, post_modified, post_modified_gmt, post_parent, menu_order, post_type, post_mime_type, comment_count)
VALUES 
(1, NOW(), 'Join us for our annual tech conference featuring industry leaders', 'Annual Tech Conference', 'Technology conference', 'publish', 'event', 'closed', 'closed', 'annual-tech-conference', NOW(), NOW(), 0, 0, 'event', '', 0),
(1, NOW(), 'Spring career fair with top employers', 'Spring Career Fair', 'Career networking event', 'publish', 'event', 'closed', 'closed', 'spring-career-fair', NOW(), NOW(), 0, 0, 'event', '', 0);

-- Add ACF event date and related programs for events
-- Example format (replace XXX with actual post ID):
INSERT INTO wp_postmeta (post_id, meta_key, meta_value) VALUES 
(XXX, 'event_date', '20261215'),  -- Ymd format
(XXX, 'related_programs', 'a:1:{i:0;a:3:{s:4:"post_type";s:7:"program";s:2:"ID";s:1:"1";s:10:"relationship";s:1:"1";}}');
```

### 4. Create Sample Professor Data
```sql
-- Insert sample professors
INSERT INTO wp_posts (post_author, post_date, post_content, post_title, post_excerpt, post_status, post_type, comment_status, ping_status, post_name, post_modified, post_modified_gmt, post_parent, menu_order, post_type, post_mime_type, comment_count)
VALUES 
(1, NOW(), 'Dr. Smith is a renowned expert in artificial intelligence and machine learning', 'Dr. John Smith', 'Professor of Computer Science', 'publish', 'professor', 'closed', 'closed', 'dr-john-smith', NOW(), NOW(), 0, 0, 'professor', '', 0),
(1, NOW(), 'Professor Johnson specializes in international business and marketing', 'Prof. Emily Johnson', 'Professor of Business', 'publish', 'professor', 'closed', 'closed', 'prof-emily-johnson', NOW(), NOW(), 0, 0, 'professor', '', 0);

-- Add ACF related programs for professors
-- Example format (replace XXX with actual post ID):
INSERT INTO wp_postmeta (post_id, meta_key, meta_value) VALUES 
(XXX, 'related_programs', 'a:1:{i:0;a:3:{s:4:"post_type";s:7:"program";s:2:"ID";s:1:"1";s:10:"relationship";s:1:"1";}}');
```

### 5. Create About Us Page
```sql
-- Insert About Us page
INSERT INTO wp_posts (post_author, post_date, post_content, post_title, post_excerpt, post_status, post_type, comment_status, ping_status, post_name, post_modified, post_modified_gmt, post_parent, menu_order, post_type, post_mime_type, comment_count)
VALUES 
(1, NOW(), '<p>Welcome to Fictional University, where education meets innovation...</p>', 'About Us', 'Learn about our mission and history', 'publish', 'page', 'closed', 'closed', 'about-us', NOW(), NOW(), 0, 0, 'page', '', 0);
```

## Manual Setup via WordPress Admin (Recommended)

### Step 1: Install ACF Pro
1. Log in to WordPress Admin (`/wp-admin`)
2. Go to Plugins → Add New
3. Upload ACF Pro ZIP file (if you have it) or purchase/download from ACF website
4. Install and activate the plugin

### Step 2: Create Field Groups
1. Go to Custom Fields → Field Groups → Add New
2. Create field groups matching the JSON files provided:
   - **Campus Fields**: Add Google Map field named `map_location`
   - **Program Fields**: Add WYSIWYG field named `main_body_content`
   - **Event Fields**: Add Date Picker field named `event_date` (format: Ymd) and Relationship field named `related_programs` (related to programs)
   - **Professor Fields**: Add Relationship field named `related_programs` (related to programs)

### Step 3: Create Sample Content
1. **Pages**: Create "About Us" page
2. **Posts**: Create sample entries for each custom post type:
   - Campuses: Add 3-5 sample campuses with map locations
   - Programs: Add 3-5 sample programs with detailed descriptions
   - Events: Add upcoming and past events with dates and related programs
   - Professors: Add faculty members with their related programs

### Step 4: Set Up Menu
1. Go to Appearance → Menus
2. Create a new menu or edit existing one
3. Add links to:
   - Home (Custom Link: site URL)
   - About Us (Page: About Us)
   - Programs (Post Type Archive: Programs)
   - Events (Post Type Archive: Events)
   - Campuses (Post Type Archive: Campuses)
   - Blog (Category: Blog or custom link to /blog)

### Step 5: Configure Permalinks
1. Go to Settings → Permalinks
2. Select "Post name" option
3. Click Save Changes

## Verification Steps

After setup, verify these functionalities work:

1. **Navbar Links**: All navbar links should load corresponding archive pages
2. **Single Pages**: Clicking on individual items should show detailed views
3. **Note System**: Logged-in users should be able to create/delete notes (limit: 5)
4. **Like System**: Users should be able to like/unlike professors
5. **Search**: Search functionality should return results across all post types
6. **Mobile Menu**: Hamburger menu should toggle mobile navigation

## Troubleshooting

If you encounter issues:

1. **PHP Errors**: Enable WP_DEBUG in wp-config.php to see detailed errors
2. **Missing Styles**: Ensure you've run `npm run build` or `npm run start` in the theme directory
3. **JavaScript Errors**: Check browser console for errors and ensure all dependencies are installed
4. **ACF Fields Not Showing**: Verify field groups are set to show on correct post types
5. **404 Errors**: Re-save permalinks (Settings → Permalinks → Save Changes)

## Theme Build Instructions

To compile assets for development or production:

```bash
# Install Node.js dependencies (run once)
npm install

# For development (watches for changes)
npm run start

# For production (creates optimized build)
npm run build
```

The theme is now ready to use with all required data types and functionality implemented!
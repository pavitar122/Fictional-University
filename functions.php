<?php

require get_theme_file_path('/inc/like-route.php');
require get_theme_file_path('/inc/search-route.php');
require get_theme_file_path('/inc/acf-init.php');

// Register custom post types
function university_custom_post_types() {
    // Register Note post type
    $note_args = array(
        'label' => __('Notes'),
        'labels' => array(
            'name' => __('Notes'),
            'singular_name' => __('Note'),
            'add_new' => __('Add New'),
            'add_new_item' => __('Add New Note'),
            'edit_item' => __('Edit Note'),
            'new_item' => __('New Note'),
            'view_item' => __('View Note'),
            'search_items' => __('Search Notes'),
            'not_found' => __('No Notes Found'),
            'not_found_in_trash' => __('No Notes Found in Trash'),
            'parent_item_colon' => __('Parent Note:'),
        ),
        'public' => false,
        'show_ui' => false,
        'show_in_rest' => true,
        'capability_type' => array('note', 'notes'),
        'map_meta_cap' => true,
        'supports' => array('title', 'editor'),
        'has_archive' => false,
        'show_in_menu' => false,
    );
    register_post_type('note', $note_args);

    // Register Campus post type
    $campus_args = array(
        'label' => __('Campuses'),
        'labels' => array(
            'name' => __('Campuses'),
            'singular_name' => __('Campus'),
            'add_new' => __('Add New'),
            'add_new_item' => __('Add New Campus'),
            'edit_item' => __('Edit Campus'),
            'new_item' => __('New Campus'),
            'view_item' => __('View Campus'),
            'search_items' => __('Search Campuses'),
            'not_found' => __('No Campuses Found'),
            'not_found_in_trash' => __('No Campuses Found in Trash'),
            'parent_item_colon' => __('Parent Campus:'),
        ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'has_archive' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'campuses'),
    );
    register_post_type('campus', $campus_args);

    // Register Program post type
    $program_args = array(
        'label' => __('Programs'),
        'labels' => array(
            'name' => __('Programs'),
            'singular_name' => __('Program'),
            'add_new' => __('Add New'),
            'add_new_item' => __('Add New Program'),
            'edit_item' => __('Edit Program'),
            'new_item' => __('New Program'),
            'view_item' => __('View Program'),
            'search_items' => __('Search Programs'),
            'not_found' => __('No Programs Found'),
            'not_found_in_trash' => __('No Programs Found in Trash'),
            'parent_item_colon' => __('Parent Program:'),
        ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'has_archive' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'programs'),
    );
    register_post_type('program', $program_args);

    // Register Event post type
    $event_args = array(
        'label' => __('Events'),
        'labels' => array(
            'name' => __('Events'),
            'singular_name' => __('Event'),
            'add_new' => __('Add New'),
            'add_new_item' => __('Add New Event'),
            'edit_item' => __('Edit Event'),
            'new_item' => __('New Event'),
            'view_item' => __('View Event'),
            'search_items' => __('Search Events'),
            'not_found' => __('No Events Found'),
            'not_found_in_trash' => __('No Events Found in Trash'),
            'parent_item_colon' => __('Parent Event:'),
        ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'has_archive' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'events'),
    );
    register_post_type('event', $event_args);

    // Register Professor post type
    $professor_args = array(
        'label' => __('Professors'),
        'labels' => array(
            'name' => __('Professors'),
            'singular_name' => __('Professor'),
            'add_new' => __('Add New'),
            'add_new_item' => __('Add New Professor'),
            'edit_item' => __('Edit Professor'),
            'new_item' => __('New Professor'),
            'view_item' => __('View Professor'),
            'search_items' => __('Search Professors'),
            'not_found' => __('No Professors Found'),
            'not_found_in_trash' => __('No Professors Found in Trash'),
            'parent_item_colon' => __('Parent Professor:'),
        ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'has_archive' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'professors'),
    );
    register_post_type('professor', $professor_args);
}
add_action('init', 'university_custom_post_types');

// Give the roles that use the private-notes feature the custom note
// capabilities (notes use their own capability type so subscribers get
// no broader post permissions). Notes are forced private server-side.
function university_note_caps() {
  $caps = array(
    'read_notes', 'edit_notes', 'delete_notes', 'publish_notes',
    'edit_published_notes', 'delete_published_notes',
    'edit_private_notes', 'delete_private_notes', 'read_private_notes',
  );
  foreach (array('administrator', 'editor', 'subscriber') as $roleName) {
    $role = get_role($roleName);
    if (!$role) continue;
    foreach ($caps as $cap) {
      $role->add_cap($cap);
    }
  }
}
add_action('init', 'university_note_caps');

function university_custom_rest() {
  register_rest_field('post', 'authorName', array(
    'get_callback' => function() {return get_the_author();}
  ));

  register_rest_field('note', 'userNoteCount', array(
    'get_callback' => function() {return count_user_posts(get_current_user_id(), 'note');}
  ));
}

add_action('rest_api_init', 'university_custom_rest');

function pageBanner($args = NULL) {

  if (!isset($args['title'])) {
    $args['title'] = get_the_title();
  }

  if (!isset($args['subtitle'])) {
    $args['subtitle'] = get_field('page_banner_subtitle');
  }

  if (!isset($args['eyebrow'])) {
    $args['eyebrow'] = '';
    if (is_singular('program')) $args['eyebrow'] = 'Academic Program';
    elseif (is_singular('campus')) $args['eyebrow'] = 'Our Campuses';
    elseif (is_singular('event')) $args['eyebrow'] = 'University Event';
    elseif (is_singular('post')) $args['eyebrow'] = 'University Blog';
    elseif (is_singular('professor')) $args['eyebrow'] = 'Our Faculty';
    elseif (is_post_type_archive('program')) $args['eyebrow'] = 'Academics';
    elseif (is_post_type_archive('campus')) $args['eyebrow'] = 'Our Campuses';
    elseif (is_post_type_archive('event')) $args['eyebrow'] = 'What’s On';
    elseif (is_post_type_archive('professor')) $args['eyebrow'] = 'Our Faculty';
    elseif (is_home()) $args['eyebrow'] = 'University Blog';
    elseif (is_page()) $args['eyebrow'] = 'Fictional University';
  }

  // Unique, relevant hero per section — used when a page provides no
  // banner image of its own (via ACF or $args).
  if (!isset($args['photo'])) {
    $heroMap = array(
      'post'    => '/images/banner-blog.jpg',
      'program' => '/images/banner-programs.jpg',
      'campus'  => '/images/banner-campuses.jpg',
      'event'   => '/images/banner-events.jpg',
      'page'    => '/images/banner-about.jpg',
    );

    if (get_field('page_banner_background_image') AND !is_archive() AND !is_home()) {
      $args['photo'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
    } elseif (is_home()) {
      // Blog posts index
      $args['photo'] = get_theme_file_uri('/images/banner-blog.jpg');
    } elseif (is_archive()) {
      $ptype = get_queried_object()->name ?? 'post';
      $args['photo'] = get_theme_file_uri($heroMap[$ptype] ?? '/images/banner-about.jpg');
    } else {
      $ptype = get_post_type() ?: 'page';
      // Blog posts page (a page that displays posts) keeps the blog hero.
      if (is_page('past-events')) {
        $ptype = 'event';
      } elseif (is_page() && get_option('page_for_posts') == get_queried_object_id()) {
        $ptype = 'post';
      }
      // A single post leads with its own featured image when it has one.
      if (is_singular('post') && has_post_thumbnail()) {
        $args['photo'] = get_the_post_thumbnail_url(get_the_ID(), 'pageBanner');
      } else {
        $args['photo'] = get_theme_file_uri($heroMap[$ptype] ?? '/images/banner-about.jpg');
      }
    }
  }

  ?>
  <section class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo']; ?>);"></div>
    <div class="page-banner__content container">
      <?php if (!empty($args['eyebrow'])): ?>
        <p class="page-banner__eyebrow"><?php echo esc_html($args['eyebrow']); ?></p>
      <?php endif; ?>
      <h1 class="page-banner__title"><?php echo $args['title'] ?></h1>
      <?php if (!empty($args['subtitle'])): ?>
      <div class="page-banner__intro">
        <p><?php echo $args['subtitle']; ?></p>
      </div>
      <?php endif; ?>
    </div>
  </section>
<?php }

function university_files() {
  wp_enqueue_script('main-university-js', get_theme_file_uri('/build/index.js'), array('jquery'), '3.0.5', true);
  wp_enqueue_script('university-interactive-js', get_theme_file_uri('/build/interactive.js'), array('jquery'), '3.0.5', true);
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&family=Inter:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap', array(), NULL);
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), NULL);
  wp_enqueue_style('university_extra_styles', get_theme_file_uri('/build/index.css'));
  wp_enqueue_style('university_modern_theme', get_theme_file_uri('/build/theme-modern.css'), array('university_extra_styles'), '3.0.5');

  wp_localize_script('main-university-js', 'universityData', array(
    'root_url' => get_site_url(),
    'nonce' => wp_create_nonce('wp_rest')
  ));

}

add_action('wp_enqueue_scripts', 'university_files');

function university_features() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_image_size('professorLandscape', 400, 260, true);
  add_image_size('professorPortrait', 480, 650, true);
  add_image_size('pageBanner', 1500, 350, true);
}

add_action('after_setup_theme', 'university_features');

function university_adjust_queries($query) {
  if (!is_admin() AND is_post_type_archive('campus') AND $query->is_main_query()) {
    $query->set('posts_per_page', -1);
  }

  if (!is_admin() AND is_post_type_archive('program') AND $query->is_main_query()) {
    $query->set('orderby', 'title');
    $query->set('order', 'ASC');
    $query->set('posts_per_page', -1);
  }

  if (!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()) {
    $today = date('Ymd');
    $query->set('meta_key', 'event_date');
    $query->set('orderby', 'meta_value_num');
    $query->set('order', 'ASC');
    $query->set('meta_query', array(
              array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => $today,
                'type' => 'numeric'
              )
            ));
  }
}

add_action('pre_get_posts', 'university_adjust_queries');

// Redirect subscriber accounts out of admin and onto homepage
add_action('admin_init', 'redirectSubsToFrontend');

function redirectSubsToFrontend() {
  $ourCurrentUser = wp_get_current_user();

  if (count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber') {
    wp_redirect(site_url('/'));
    exit;
  }
}

add_action('wp_loaded', 'noSubsAdminBar');

function noSubsAdminBar() {
  $ourCurrentUser = wp_get_current_user();

  if (count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber') {
    show_admin_bar(false);
  }
}

// Customize Login Screen
add_filter('login_headerurl', 'ourHeaderUrl');

function ourHeaderUrl() {
  return esc_url(site_url('/'));
}

add_action('login_enqueue_scripts', 'ourLoginCSS');

function ourLoginCSS() {
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&family=Inter:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap', array(), NULL);
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), NULL);
  wp_enqueue_style('university_extra_styles', get_theme_file_uri('/build/index.css'));
  wp_enqueue_style('university_modern_theme', get_theme_file_uri('/build/theme-modern.css'), array('university_extra_styles'), '3.0.5');
}

add_filter('login_headertitle', 'ourLoginTitle');

function ourLoginTitle() {
  return get_bloginfo('name');
}

// Force note posts to be private
add_filter('wp_insert_post_data', 'makeNotePrivate', 10, 2);

function makeNotePrivate($data, $postarr) {
  if ($data['post_type'] == 'note') {
    if(count_user_posts(get_current_user_id(), 'note') > 4 AND !$postarr['ID']) {
      die("You have reached your note limit.");
    }

    $data['post_content'] = sanitize_textarea_field($data['post_content']);
    $data['post_title'] = sanitize_text_field($data['post_title']);
  }

  if($data['post_type'] == 'note' AND $data['post_status'] != 'trash') {
    $data['post_status'] = "private";
  }
  
  return $data;
}
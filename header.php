<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div class="page-transition-overlay" aria-hidden="true"></div>
    <div class="progress-container" aria-hidden="true">
      <div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"></div>
    </div>
    <header class="site-header" role="banner">
      <div class="container site-header__inner">
        <a href="<?php echo site_url() ?>" class="site-brand no-transition" aria-label="Fictional University — home">
          <span class="site-brand__mark" aria-hidden="true">FU</span>
          <span class="site-brand__text"><strong>Fictional</strong> University</span>
        </a>

        <nav class="main-navigation" aria-label="Primary navigation">
          <ul class="site-header__menu group" id="site-header-menu">
            <li <?php if (!is_front_page() AND (is_page('about-us') OR wp_get_post_parent_id(0) == 16)) echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/about-us') ?>">About Us</a></li>
            <li <?php if (get_post_type() == 'program') echo 'class="current-menu-item"' ?>><a href="<?php echo get_post_type_archive_link('program') ?>">Programs</a></li>
            <li <?php if (get_post_type() == 'event' OR is_page('past-events')) echo 'class="current-menu-item"';  ?>><a href="<?php echo get_post_type_archive_link('event'); ?>">Events</a></li>
            <li <?php if (get_post_type() == 'campus') echo 'class="current-menu-item"' ?>><a href="<?php echo get_post_type_archive_link('campus'); ?>">Campuses</a></li>
            <li <?php if (get_post_type() == 'post') echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/blog'); ?>">Blog</a></li>
            <li class="site-header__menu-auth">
              <?php if (is_user_logged_in()) { ?>
                <a href="<?php echo esc_url(site_url('/my-notes')); ?>">My Notes</a>
                <a href="<?php echo wp_logout_url(); ?>">Log Out</a>
              <?php } else { ?>
                <a href="<?php echo wp_login_url(); ?>">Login</a>
                <a href="<?php echo wp_registration_url(); ?>">Sign Up</a>
              <?php } ?>
            </li>
          </ul>
        </nav>

        <div class="site-header__actions">
          <button type="button" class="site-header__search js-search-trigger" aria-label="Open search">
            <i class="fa fa-search" aria-hidden="true"></i>
          </button>
          <span class="site-header__auth group">
            <?php if (is_user_logged_in()) { ?>
              <a href="<?php echo esc_url(site_url('/my-notes')); ?>" class="btn btn--ghost btn--small">My Notes</a>
              <a href="<?php echo wp_logout_url();  ?>" class="btn btn--primary btn--small btn--with-photo">
                <span class="site-header__avatar"><?php echo get_avatar(get_current_user_id(), 60); ?></span>
                <span class="btn__text">Log Out</span>
              </a>
            <?php } else { ?>
              <a href="<?php echo wp_login_url(); ?>" class="btn btn--ghost btn--small">Login</a>
              <a href="<?php echo wp_registration_url(); ?>" class="btn btn--primary btn--small">Apply Now</a>
            <?php } ?>
          </span>
          <button type="button" class="site-header__menu-trigger fa fa-bars" aria-label="Toggle menu" aria-expanded="false" aria-controls="site-header-menu"></button>
        </div>
      </div>
    </header>
    <a href="#main-content" class="skip-link">Skip to content</a>
    <span id="main-content" tabindex="-1"></span>

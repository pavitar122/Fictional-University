<?php
/**
 * 404 template — friendly fallback for unknown URLs.
 */

get_header();
?>

<section class="error-hero">
  <div class="error-hero__bg" style="background-image: url(<?php echo get_theme_file_uri('/images/banner-404.jpg'); ?>);"></div>
  <div class="error-hero__shade" aria-hidden="true"></div>
  <div class="container error-hero__content">
    <p class="error-hero__code">404</p>
    <h1 class="error-hero__title">This Page Took a Different Elective</h1>
    <p class="error-hero__text">The page you are looking for doesn't exist or may have moved. Let's get you back on track.</p>
    <div class="error-hero__actions">
      <a class="btn btn--light" href="<?php echo site_url('/'); ?>">Go Home</a>
      <a class="btn btn--ghost-light" href="<?php echo site_url('/programs'); ?>">Browse Programs</a>
    </div>
  </div>
</section>

<div class="container container--narrow page-section t-center">
  <p class="error-hero__hint">Or try a search:</p>
  <?php get_search_form(); ?>
</div>

<?php get_footer();

<?php
/**
 * Generic archive template (categories, tags, date archives, author).
 */

get_header();
pageBanner(array(
  'title'    => wp_strip_all_tags(get_the_archive_title()),
  'subtitle' => wp_strip_all_tags(get_the_archive_description()),
));
?>

<div class="container page-section">

  <div class="post-grid stagger-children">
    <?php
      while (have_posts()) {
        the_post();
        get_template_part('template-parts/content', 'post-card');
      }
    ?>
  </div>

  <?php $links = paginate_links(); if ($links) : ?>
  <div class="pagination-wrap"><?php echo $links; ?></div>
  <?php endif; ?>

</div>

<?php get_footer(); ?>

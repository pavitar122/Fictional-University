<?php
/**
 * Blog posts index (the /blog page).
 */

get_header();
pageBanner(array(
  'title'    => 'The University Blog',
  'subtitle' => 'Study tips, campus news, and honest stories from the people who live here.',
));
?>

<div class="container page-section">

  <div class="post-grid stagger-children">
    <?php
      if (have_posts()) {
        while (have_posts()) {
          the_post();
          get_template_part('template-parts/content', 'post-card');
        }
      } else {
        echo '<p class="empty-note">No posts yet — the first story is on its way.</p>';
      }
    ?>
  </div>

  <?php $links = paginate_links(); if ($links) : ?>
  <div class="pagination-wrap"><?php echo $links; ?></div>
  <?php endif; ?>

</div>

<?php get_footer(); ?>

<?php
/**
 * Professor archive — faculty grid with a proper banner.
 */

get_header();
pageBanner(array(
  'title'    => 'Our Faculty',
  'subtitle' => 'Working scholars, researchers, and practitioners who teach what they live.',
));
?>

<div class="container page-section">

  <ul class="professor-cards stagger-children">
    <?php
      if (have_posts()) {
        while (have_posts()) {
          the_post();
          get_template_part('template-parts/content', 'professor');
        }
      } else {
        echo '<li><p class="empty-note">Faculty profiles are coming soon.</p></li>';
      }
    ?>
  </ul>

  <?php $links = paginate_links(); if ($links) : ?>
  <div class="pagination-wrap"><?php echo $links; ?></div>
  <?php endif; ?>

</div>

<?php get_footer();

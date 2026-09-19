<?php

get_header();
pageBanner(array(
  'title'    => 'University Events',
  'subtitle' => 'Open days, concerts, career fairs — see what is coming up on campus.',
));
?>

<div class="container page-section">

  <div class="card-grid card-grid--3 stagger-children">
    <?php
      if (have_posts()) {
        while (have_posts()) {
          the_post();
          get_template_part('template-parts/content', 'event');
        }
      } else {
        echo '<p class="empty-note">No upcoming events on the calendar right now — check back soon.</p>';
      }
    ?>
  </div>

  <?php $links = paginate_links(); if ($links) : ?>
  <div class="pagination-wrap"><?php echo $links; ?></div>
  <?php endif; ?>

  <div class="after-grid-note">
    <p>Looking for a recap? <a href="<?php echo site_url('/past-events') ?>">Browse our past events archive</a>.</p>
  </div>

</div>

<?php get_footer();

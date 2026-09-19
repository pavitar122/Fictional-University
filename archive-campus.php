<?php

get_header();
pageBanner(array(
  'title'    => 'Our Campuses',
  'subtitle' => 'Four distinct places to live and learn — each one unmistakably Fictional University.',
));
?>

<div class="container page-section">

  <div class="card-grid card-grid--2 stagger-children">
    <?php
      while (have_posts()) {
        the_post();
        get_template_part('template-parts/content', 'campus');
      }
    ?>
  </div>

</div>

<?php get_footer();

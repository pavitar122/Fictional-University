<?php

get_header();
pageBanner(array(
  'title'    => 'Academic Programs',
  'subtitle' => 'From algorithms to oil paints — explore the majors our students turn into careers.',
));
?>

<div class="container page-section">

  <div class="card-grid card-grid--3 stagger-children">
    <?php
      while (have_posts()) {
        the_post();
        get_template_part('template-parts/content', 'program');
      }
    ?>
  </div>

  <?php $links = paginate_links(); if ($links) : ?>
  <div class="pagination-wrap"><?php echo $links; ?></div>
  <?php endif; ?>

</div>

<?php get_footer();

<?php

get_header();

while (have_posts()) {
  the_post();
  pageBanner();
  ?>

  <div class="container container--narrow page-section">

    <?php
      $theParent = wp_get_post_parent_id(get_the_ID());
      if ($theParent) { ?>
        <nav class="breadcrumbs" aria-label="Breadcrumb">
          <a href="<?php echo get_permalink($theParent); ?>"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back to <?php echo get_the_title($theParent); ?></a>
        </nav>
      <?php }
    ?>

    <div class="generic-content">
      <?php the_content(); ?>
    </div>

    <?php get_search_form(); ?>

  </div>

<?php }

get_footer();

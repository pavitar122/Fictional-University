<?php

get_header();
pageBanner(array(
  'title' => 'Our Campuses',
  'subtitle' => 'We have several conveniently located campuses.'
));
 ?>

<div class="container container--narrow page-section">

<div class="campus-list">
  <?php
    while(have_posts()) {
      the_post();
      $address = get_field('campus_address');
      $description = get_field('campus_description');
     ?>
      <div class="post-item">
        <h2 class="headline headline--medium headline--post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="generic-content">
          <p><strong>Address:</strong> <?php echo esc_html($address); ?></p>
          <?php if ($description): ?>
            <div class="campus-description"><?php echo wp_kses_post($description); ?></div>
          <?php endif; ?>
          <p><a class="btn btn--blue" href="<?php the_permalink(); ?>">View campus &raquo;</a></p>
        </div>
      </div>
    <?php } ?>
  </div>

</div>

<?php get_footer();

?>
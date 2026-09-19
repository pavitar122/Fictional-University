<?php

get_header();

while (have_posts()) {
  the_post();
  pageBanner();
  ?>

  <div class="container page-section">

    <nav class="breadcrumbs" aria-label="Breadcrumb">
      <a href="<?php echo get_post_type_archive_link('campus'); ?>"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> All campuses</a>
    </nav>

    <div class="single-layout">

      <div class="single-layout__main generic-content">
        <?php the_content(); ?>

        <?php
          $address = get_field('campus_address');
          $description = get_field('campus_description');
          if ($description) { ?>
            <div class="campus-description">
              <h3>About This Campus</h3>
              <?php echo wp_kses_post(wpautop($description)); ?>
            </div>
          <?php }
        ?>
      </div>

      <aside class="single-layout__aside">

        <div class="info-card">
          <h3 class="info-card__title"><i class="fa fa-map-marker" aria-hidden="true"></i> Find Us</h3>
          <?php if ($address): ?>
            <p class="info-card__address"><?php echo esc_html($address); ?></p>
          <?php endif; ?>
          <p class="info-card__text">Guided tours run every Saturday — no appointment needed.</p>
          <a href="<?php echo get_post_type_archive_link('event'); ?>" class="btn btn--primary btn--block">Plan a Visit</a>
        </div>

      </aside>

    </div>

    <?php
      $relatedPrograms = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type'      => 'program',
        'orderby'        => 'title',
        'order'          => 'ASC',
        'meta_query'     => array(
          array(
            'key'     => 'related_campus',
            'compare' => 'LIKE',
            'value'   => '"' . get_the_ID() . '"',
          ),
        ),
      ));

      if ($relatedPrograms->have_posts()) { ?>
        <section class="related-block">
          <div class="section-head">
            <div>
              <p class="eyebrow">Academics</p>
              <h2 class="section-head__title">Programs Available at This Campus</h2>
            </div>
          </div>
          <div class="card-grid card-grid--3">
            <?php
              while ($relatedPrograms->have_posts()) {
                $relatedPrograms->the_post();
                get_template_part('template-parts/content', 'program');
              }
            ?>
          </div>
        </section>
      <?php }
      wp_reset_postdata();
    ?>

  </div>

  <?php }

get_footer();

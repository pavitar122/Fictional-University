<?php

get_header();

while (have_posts()) {
  the_post();
  pageBanner();
  ?>

  <div class="container page-section">

    <nav class="breadcrumbs" aria-label="Breadcrumb">
      <a href="<?php echo get_post_type_archive_link('program'); ?>"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> All programs</a>
    </nav>

    <div class="single-layout">

      <div class="single-layout__main generic-content">
        <?php the_field('main_body_content'); ?>
      </div>

      <aside class="single-layout__aside">

        <div class="info-card">
          <h3 class="info-card__title">Study This Program</h3>
          <p class="info-card__text">Taught across our campuses with hands-on coursework from the first semester.</p>
          <a href="<?php echo wp_registration_url(); ?>" class="btn btn--primary btn--block">Apply Now</a>
        </div>

        <?php
          $relatedCampuses = get_field('related_campus');
          if ($relatedCampuses) { ?>
            <div class="info-card">
              <h3 class="info-card__title"><i class="fa fa-map-marker" aria-hidden="true"></i> Available At</h3>
              <ul class="link-list">
                <?php foreach ($relatedCampuses as $campus) { ?>
                  <li><a href="<?php echo get_the_permalink($campus); ?>"><?php echo get_the_title($campus); ?></a></li>
                <?php } ?>
              </ul>
            </div>
          <?php }
      ?>

      </aside>

    </div>

    <?php
      $relatedProfessors = new WP_Query(array(
        'posts_per_page' => -1,
        'post_type'      => 'professor',
        'orderby'        => 'title',
        'order'          => 'ASC',
        'meta_query'     => array(
          array(
            'key'     => 'related_programs',
            'compare' => 'LIKE',
            'value'   => '"' . get_the_ID() . '"',
          ),
        ),
      ));

      if ($relatedProfessors->have_posts()) { ?>
        <section class="related-block">
          <div class="section-head">
            <div>
              <p class="eyebrow">Faculty</p>
              <h2 class="section-head__title"><?php the_title(); ?> Professors</h2>
            </div>
          </div>
          <ul class="professor-cards">
            <?php
              while ($relatedProfessors->have_posts()) {
                $relatedProfessors->the_post();
                get_template_part('template-parts/content', 'professor');
              }
            ?>
          </ul>
        </section>
      <?php }
      wp_reset_postdata();

      $today = date('Ymd');
      $relatedEvents = new WP_Query(array(
        'posts_per_page' => 2,
        'post_type'      => 'event',
        'meta_key'       => 'event_date',
        'orderby'        => 'meta_value_num',
        'order'          => 'ASC',
        'meta_query'     => array(
          array(
            'key'     => 'event_date',
            'compare' => '>=',
            'value'   => $today,
            'type'    => 'numeric',
          ),
          array(
            'key'     => 'related_programs',
            'compare' => 'LIKE',
            'value'   => '"' . get_the_ID() . '"',
          ),
        ),
      ));

      if ($relatedEvents->have_posts()) { ?>
        <section class="related-block">
          <div class="section-head">
            <div>
              <p class="eyebrow">Save the Date</p>
              <h2 class="section-head__title">Upcoming <?php the_title(); ?> Events</h2>
            </div>
          </div>
          <div class="card-grid card-grid--2">
            <?php
              while ($relatedEvents->have_posts()) {
                $relatedEvents->the_post();
                get_template_part('template-parts/content', 'event');
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

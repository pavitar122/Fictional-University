<?php

get_header();

while (have_posts()) {
  the_post();
  pageBanner();
  ?>

  <div class="container container--narrow page-section">

    <nav class="breadcrumbs" aria-label="Breadcrumb">
      <a href="<?php echo get_post_type_archive_link('event'); ?>"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> All events</a>
    </nav>

    <?php
      $eventDate = get_field('event_date') ? new DateTime(get_field('event_date')) : null;
      if ($eventDate) { ?>
        <div class="event-details-bar">
          <div class="event-details-bar__item">
            <i class="fa fa-calendar" aria-hidden="true"></i>
            <span>
              <em>When</em>
              <?php echo $eventDate->format('l, F j, Y'); ?>
            </span>
          </div>
          <div class="event-details-bar__item">
            <i class="fa fa-map-marker" aria-hidden="true"></i>
            <span>
              <em>Where</em>
              Main Campus
            </span>
          </div>
          <div class="event-details-bar__cta">
            <a href="<?php echo wp_registration_url(); ?>" class="btn btn--primary btn--small">Reserve a Spot</a>
          </div>
        </div>
      <?php }
    ?>

    <div class="generic-content"><?php the_content(); ?></div>

    <?php
      $relatedPrograms = get_field('related_programs');
      if ($relatedPrograms) { ?>
        <section class="related-block">
          <h2 class="related-block__title">Related Programs</h2>
          <div class="chip-list">
            <?php foreach ($relatedPrograms as $program) { ?>
              <a class="chip" href="<?php echo get_the_permalink($program); ?>"><?php echo get_the_title($program); ?></a>
            <?php } ?>
          </div>
        </section>
      <?php }
    ?>

  </div>

  <?php }

get_footer();

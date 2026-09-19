<?php
/**
 * Event card — image with an overlapping date badge, title, excerpt.
 * Used on the homepage, event archives and program singles.
 */
$eventDate = new DateTime(get_field('event_date'));
?>
<article class="event-card reveal-up">
  <div class="event-card__media">
    <a href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
      <?php if (has_post_thumbnail()) {
        the_post_thumbnail('medium_large');
      } else { ?>
        <img src="<?php echo esc_url(get_theme_file_uri('/images/banner-events.jpg')); ?>" alt="" loading="lazy">
      <?php } ?>
    </a>
    <a class="event-card__date" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr($eventDate->format('M j, Y')); ?>">
      <span class="event-card__month"><?php echo $eventDate->format('M'); ?></span>
      <span class="event-card__day"><?php echo $eventDate->format('d'); ?></span>
    </a>
  </div>
  <div class="event-card__body">
    <p class="event-card__meta"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $eventDate->format('l, F j, Y'); ?></p>
    <h3 class="event-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <p class="event-card__excerpt">
      <?php
        if (has_excerpt()) {
          echo esc_html(wp_trim_words(get_the_excerpt(), 18));
        } else {
          echo esc_html(wp_trim_words(get_the_content(), 18));
        }
      ?>
    </p>
    <a class="event-card__more" href="<?php the_permalink(); ?>">Event details <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
  </div>
</article>

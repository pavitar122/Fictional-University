<?php
/**
 * Campus card — image, name, address, short description.
 */
$address = get_field('campus_address');
$description = get_field('campus_description');
?>
<article class="campus-card reveal-up">
  <a class="campus-card__media" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
    <?php if (has_post_thumbnail()) {
      the_post_thumbnail('medium_large');
    } else { ?>
      <img src="<?php echo esc_url(get_theme_file_uri('/images/banner-campuses.jpg')); ?>" alt="" loading="lazy">
    <?php } ?>
  </a>
  <div class="campus-card__body">
    <h3 class="campus-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <?php if ($address): ?>
      <p class="campus-card__address"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo esc_html($address); ?></p>
    <?php endif; ?>
    <p class="campus-card__excerpt">
      <?php
        if ($description) {
          echo esc_html(wp_trim_words(wp_strip_all_tags($description), 22));
        } elseif (has_excerpt()) {
          echo esc_html(wp_trim_words(get_the_excerpt(), 22));
        } else {
          echo esc_html(wp_trim_words(get_the_content(), 22));
        }
      ?>
    </p>
    <span class="campus-card__more">Visit campus <i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
  </div>
</article>

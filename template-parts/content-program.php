<?php
/**
 * Program card — image, title, excerpt, arrow link.
 */
?>
<article class="program-card reveal-up">
  <a class="program-card__media" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
    <?php if (has_post_thumbnail()) {
      the_post_thumbnail('medium_large');
    } else { ?>
      <img src="<?php echo esc_url(get_theme_file_uri('/images/banner-programs.jpg')); ?>" alt="" loading="lazy">
    <?php } ?>
  </a>
  <div class="program-card__body">
    <h3 class="program-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <p class="program-card__excerpt">
      <?php
        if (has_excerpt()) {
          echo esc_html(wp_trim_words(get_the_excerpt(), 20));
        } else {
          echo esc_html(wp_trim_words(get_the_content(), 20));
        }
      ?>
    </p>
    <span class="program-card__more">Explore program <i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
  </div>
</article>

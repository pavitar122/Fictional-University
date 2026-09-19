<?php
/**
 * Modern blog post card — featured image, category pill,
 * title, excerpt, and a read-more link.
 */
$categories = get_the_category();
$primaryCategory = $categories ? $categories[0] : null;
?>
<article class="post-card">
  <?php if (has_post_thumbnail()) : ?>
    <a class="post-card__media" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
      <?php the_post_thumbnail('medium_large'); ?>
    </a>
  <?php endif; ?>

  <div class="post-card__body">
    <div class="post-card__meta">
      <?php if ($primaryCategory) : ?>
        <a class="post-card__category" href="<?php echo esc_url(get_category_link($primaryCategory)); ?>">
          <?php echo esc_html($primaryCategory->name); ?>
        </a>
      <?php endif; ?>
      <span class="post-card__date"><?php echo get_the_date('M j, Y'); ?></span>
    </div>

    <h2 class="post-card__title headline headline--smaller headline--post-title">
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h2>

    <p class="post-card__excerpt">
      <?php
        if (has_excerpt()) {
          echo esc_html(wp_trim_words(get_the_excerpt(), 24));
        } else {
          echo esc_html(wp_trim_words(get_the_content(), 24));
        }
      ?>
    </p>

    <a class="post-card__more" href="<?php the_permalink(); ?>">
      Read more <span class="post-card__more-arrow" aria-hidden="true">&rarr;</span>
    </a>
  </div>
</article>

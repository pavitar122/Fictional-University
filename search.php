<?php

get_header();
pageBanner(array(
  'title'    => 'Search Results',
  'subtitle' => 'You searched for &ldquo;' . esc_html(get_search_query(false)) . '&rdquo;',
));
?>

<div class="container container--narrow page-section">

  <?php if (have_posts()) { ?>
    <div class="search-results stagger-children">
      <?php
        while (have_posts()) {
          the_post();
          ?>
          <?php
            // Build a meaningful excerpt per content type (campuses and
            // programs store their descriptions in ACF fields).
            $pt = get_post_type();
            $excerpt = '';
            if ($pt === 'campus') {
              $excerpt = get_field('campus_description') ?: get_the_excerpt();
            } elseif ($pt === 'program') {
              $excerpt = get_field('main_body_content') ?: get_the_excerpt();
            } else {
              $excerpt = get_the_excerpt();
            }
            $excerpt = wp_strip_all_tags($excerpt);
            ?>
          <article class="search-result reveal-up">
            <span class="search-result__type"><?php echo esc_html(ucfirst($pt)); ?></span>
            <h2 class="search-result__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php if ($excerpt) : ?>
              <p class="search-result__excerpt"><?php echo esc_html(wp_trim_words($excerpt, 28)); ?></p>
            <?php endif; ?>
          </article>
          <?php
        }
      ?>
    </div>
    <div class="pagination-wrap">
      <?php echo paginate_links(); ?>
    </div>
  <?php } else { ?>
    <div class="empty-state">
      <i class="fa fa-search empty-state__icon" aria-hidden="true"></i>
      <h2>No results matched your search.</h2>
      <p>Try a different keyword — or search for a program, campus, event, or professor by name.</p>
    </div>
  <?php } ?>

  <?php get_search_form(); ?>

</div>

<?php get_footer();

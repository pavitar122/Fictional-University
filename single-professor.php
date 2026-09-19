<?php

get_header();

while (have_posts()) {
  the_post();
  pageBanner();
  ?>

  <div class="container page-section">

    <nav class="breadcrumbs" aria-label="Breadcrumb">
      <a href="<?php echo get_post_type_archive_link('professor'); ?>"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Our faculty</a>
    </nav>

    <div class="professor-single">

      <figure class="professor-single__photo reveal-left">
        <?php if (has_post_thumbnail()) {
          the_post_thumbnail('professorPortrait');
        } ?>
        <?php
          $likeCount = new WP_Query(array(
            'post_type'  => 'like',
            'meta_query' => array(
              array(
                'key'     => 'liked_professor_id',
                'compare' => '=',
                'value'   => get_the_ID(),
              ),
            ),
          ));

          $existStatus = 'no';
          if (is_user_logged_in()) {
            $existQuery = new WP_Query(array(
              'author'     => get_current_user_id(),
              'post_type'  => 'like',
              'meta_query' => array(
                array(
                  'key'     => 'liked_professor_id',
                  'compare' => '=',
                  'value'   => get_the_ID(),
                ),
              ),
            ));
            if ($existQuery->found_posts) {
              $existStatus = 'yes';
            }
          }
        ?>
        <span class="like-box" data-like="<?php if (isset($existQuery->posts[0]->ID)) echo $existQuery->posts[0]->ID; ?>" data-professor="<?php the_ID(); ?>" data-exists="<?php echo $existStatus; ?>">
          <i class="fa fa-heart-o" aria-hidden="true"></i>
          <i class="fa fa-heart" aria-hidden="true"></i>
          <span class="like-count"><?php echo $likeCount->found_posts; ?></span>
        </span>
      </figure>

      <div class="professor-single__bio generic-content reveal-right">
        <h2 class="professor-single__name"><?php the_title(); ?></h2>
        <?php if (has_excerpt()) { ?>
          <p class="professor-single__role"><?php echo esc_html(get_the_excerpt()); ?></p>
        <?php } ?>
        <?php the_content(); ?>
      </div>

    </div>

    <?php
      $relatedPrograms = get_field('related_programs');
      if ($relatedPrograms) { ?>
        <section class="related-block">
          <h2 class="related-block__title">Subject(s) Taught</h2>
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

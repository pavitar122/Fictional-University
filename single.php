<?php
/**
 * Single blog post.
 */

get_header();

while (have_posts()) {
  the_post();
  // The banner leads with the post's featured image (see pageBanner()).
  pageBanner(array(
    'eyebrow'  => 'University Blog',
    'subtitle' => 'By ' . get_the_author() . ' &middot; ' . get_the_date('F j, Y'),
  ));
  ?>

  <div class="container container--narrow page-section">
    <nav class="breadcrumbs" aria-label="Breadcrumb">
      <a href="<?php echo site_url('/blog'); ?>"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back to the blog</a>
      <?php
        $cats = get_the_category();
        if ($cats) {
          echo ' <span class="breadcrumbs__sep" aria-hidden="true">/</span> <a href="' . esc_url(get_category_link($cats[0])) . '">' . esc_html($cats[0]->name) . '</a>';
        }
      ?>
    </nav>

    <div class="generic-content"><?php the_content(); ?></div>

    <footer class="post-footer">
      <?php if (get_the_category_list()) : ?>
        <p class="post-footer__label">Filed under</p>
        <div class="post-footer__terms"><?php echo get_the_category_list(''); ?></div>
      <?php endif; ?>

      <nav class="post-nav" aria-label="Post navigation">
        <div class="post-nav__prev"><?php previous_post_link('%link', '<span class="post-nav__label">Older post</span><span class="post-nav__title">%title</span>'); ?></div>
        <div class="post-nav__next"><?php next_post_link('%link', '<span class="post-nav__label">Newer post</span><span class="post-nav__title">%title</span>'); ?></div>
      </nav>
    </footer>
  </div>

<?php }

get_footer();

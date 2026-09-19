<?php

get_header();
pageBanner(array(
  'title'    => 'Past Events',
  'subtitle' => 'A look back at the moments that shaped the year on campus.',
));
?>

<div class="container page-section">

  <div class="card-grid card-grid--3 stagger-children">
    <?php
      $today = date('Ymd');
      $pastEvents = new WP_Query(array(
        'paged'     => get_query_var('paged', 1),
        'post_type' => 'event',
        'meta_key'  => 'event_date',
        'orderby'   => 'meta_value_num',
        'order'     => 'DESC',
        'meta_query' => array(
          array(
            'key'     => 'event_date',
            'compare' => '<',
            'value'   => $today,
            'type'    => 'numeric',
          ),
        ),
      ));

      if ($pastEvents->have_posts()) {
        while ($pastEvents->have_posts()) {
          $pastEvents->the_post();
          get_template_part('template-parts/content', 'event');
        }
      } else {
        echo '<p class="empty-note">No past events recorded yet.</p>';
      }
      $links = paginate_links(array('total' => $pastEvents->max_num_pages));
      if ($links) echo '<div class="pagination-wrap">' . $links . '</div>';
      wp_reset_postdata();
    ?>
  </div>

</div>

<?php get_footer();

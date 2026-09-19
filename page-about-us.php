<?php
/**
 * About Us page — dedicated modern layout.
 * Preserves the editor content and elevates it with a split intro,
 * mission/vision/values cards, stats, and a faculty preview.
 */

get_header();

while (have_posts()) {
  the_post();
  pageBanner();
  ?>

  <div class="container page-section">

    <!-- Intro: editor content beside a photo -->
    <div class="split about-intro">
      <figure class="split__media reveal-left">
        <img src="<?php echo get_theme_file_uri('/images/about-mission.jpg'); ?>" alt="Students studying together in the university library" loading="lazy">
        <figcaption class="split__badge">
          <span class="split__badge-number">60+</span>
          <span class="split__badge-text">years of teaching,<br>still curious</span>
        </figcaption>
      </figure>
      <div class="split__content reveal-right">
        <p class="eyebrow">Who We Are</p>
        <div class="generic-content about-intro__content">
          <?php the_content(); ?>
        </div>
      </div>
    </div>

    <!-- Mission / Vision / Values -->
    <section class="section about-mvv" aria-label="Mission, vision, and values">
      <div class="section-head section-head--center">
        <p class="eyebrow">What Guides Us</p>
        <h2 class="section-head__title">Mission, Vision &amp; Values</h2>
      </div>

      <div class="feature-grid stagger-children">
        <div class="feature-card">
          <span class="feature-card__icon" aria-hidden="true"><i class="fa fa-compass"></i></span>
          <h3 class="feature-card__title">Our Mission</h3>
          <p>To make an excellent, practical education accessible to every student willing to work for one — at eighteen or at forty-eight, on campus or downtown.</p>
        </div>
        <div class="feature-card">
          <span class="feature-card__icon" aria-hidden="true"><i class="fa fa-eye"></i></span>
          <h3 class="feature-card__title">Our Vision</h3>
          <p>To be the university our region reaches for first — known for graduates who are ready on day one and citizens who give back for a lifetime.</p>
        </div>
        <div class="feature-card">
          <span class="feature-card__icon" aria-hidden="true"><i class="fa fa-handshake-o"></i></span>
          <h3 class="feature-card__title">Our Values</h3>
          <p>Rigour without coldness. Ambition without arrogance. And the conviction that a university should be measured by what its students go on to do.</p>
        </div>
      </div>
    </section>

    <!-- Numbers -->
    <section class="section section--tint about-stats" aria-label="University facts">
      <div class="stats-grid stagger-children">
        <div class="stat-counter">
          <span class="stat-counter__number" data-target="15000">0</span>
          <span class="stat-counter__label">Students Enrolled</span>
        </div>
        <div class="stat-counter">
          <span class="stat-counter__number" data-target="320" data-suffix="+">0</span>
          <span class="stat-counter__label">Programs of Study</span>
        </div>
        <div class="stat-counter">
          <span class="stat-counter__number" data-target="28">0</span>
          <span class="stat-counter__label">Average Class Size</span>
        </div>
        <div class="stat-counter">
          <span class="stat-counter__number" data-target="98" data-suffix="%">0</span>
          <span class="stat-counter__label">Graduate Satisfaction</span>
        </div>
      </div>
    </section>

    <!-- Faculty preview -->
    <section class="about-faculty" aria-labelledby="about-faculty-title">
      <div class="section-head">
        <div>
          <p class="eyebrow">People</p>
          <h2 class="section-head__title" id="about-faculty-title">Led by People Worth Knowing</h2>
          <p class="section-head__lede">Working scholars and practitioners who bring the field into the classroom every week.</p>
        </div>
      </div>

      <ul class="professor-cards stagger-children">
        <?php
          $aboutProfessors = new WP_Query(array(
            'posts_per_page' => 4,
            'post_type'      => 'professor',
            'orderby'        => 'title',
            'order'          => 'ASC',
          ));
          if ($aboutProfessors->have_posts()) {
            while ($aboutProfessors->have_posts()) {
              $aboutProfessors->the_post();
              get_template_part('template-parts/content', 'professor');
            }
          } else {
            echo '<li><p class="empty-note">Faculty profiles coming soon.</p></li>';
          }
          wp_reset_postdata();
        ?>
      </ul>
    </section>

    <!-- Closing CTA -->
    <section class="cta-band about-cta" aria-labelledby="about-cta-title">
      <div class="cta-band__inner">
        <div class="cta-band__text">
          <p class="eyebrow eyebrow--light">Visit Us</p>
          <h2 class="cta-band__title" id="about-cta-title">The Best Way to Know Us Is to Walk Us</h2>
          <p>Join an open day, sit in on a lecture, or book a campus tour — we would love to show you around.</p>
        </div>
        <div class="cta-band__actions">
          <a href="<?php echo get_post_type_archive_link('event'); ?>" class="btn btn--light btn--large">Find an Open Day</a>
          <a href="<?php echo get_post_type_archive_link('campus'); ?>" class="btn btn--ghost-light btn--large">Explore Campuses</a>
        </div>
      </div>
    </section>

  </div>

<?php }

get_footer();

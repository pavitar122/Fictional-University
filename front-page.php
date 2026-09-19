<?php get_header(); ?>

  <!-- ============================================================
       Hero — full-bleed image slider with serif headlines
  ============================================================ -->
  <section class="hero-slider" aria-label="Highlights">
    <div data-glide-el="track" class="glide__track">
      <ul class="glide__slides">

        <li class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/home-hero-1.jpg'); ?>);">
          <div class="hero-slider__shade" aria-hidden="true"></div>
          <div class="container hero-slider__interior">
            <div class="hero-slider__content">
              <p class="hero-eyebrow reveal-up">Fictional University &middot; Est. 1966</p>
              <h1 class="hero-slider__title reveal-up">Where Ambitious Minds Find Their Path</h1>
              <p class="hero-slider__text reveal-up">Four campuses. Six schools. One community built around practical, career-focused teaching that employers actually notice.</p>
              <div class="hero-slider__actions reveal-up">
                <a href="<?php echo get_post_type_archive_link('program'); ?>" class="btn btn--light btn--large">Explore Programs</a>
                <a href="<?php echo get_post_type_archive_link('event'); ?>" class="btn btn--ghost-light btn--large">Plan a Visit</a>
              </div>
            </div>
          </div>
        </li>

        <li class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/home-hero-2.jpg'); ?>);">
          <div class="hero-slider__shade" aria-hidden="true"></div>
          <div class="container hero-slider__interior">
            <div class="hero-slider__content">
              <p class="hero-eyebrow reveal-up">Learning That Sticks</p>
              <h2 class="hero-slider__title reveal-up">Learn by Doing, From Your First Semester</h2>
              <p class="hero-slider__text reveal-up">Small classes, labs and studios open from year one, and faculty who know your name &mdash; not just your student number.</p>
              <div class="hero-slider__actions reveal-up">
                <a href="<?php echo site_url('/about-us'); ?>" class="btn btn--light btn--large">About the University</a>
                <a href="<?php echo get_post_type_archive_link('campus'); ?>" class="btn btn--ghost-light btn--large">Our Campuses</a>
              </div>
            </div>
          </div>
        </li>

        <li class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/home-hero-3.jpg'); ?>);">
          <div class="hero-slider__shade" aria-hidden="true"></div>
          <div class="container hero-slider__interior">
            <div class="hero-slider__content">
              <p class="hero-eyebrow reveal-up">Graduate With Direction</p>
              <h2 class="hero-slider__title reveal-up">A Degree That Takes You Further</h2>
              <p class="hero-slider__text reveal-up">Internships, research placements and a career centre that sticks with you until the day you walk across the stage.</p>
              <div class="hero-slider__actions reveal-up">
                <a href="<?php echo wp_registration_url(); ?>" class="btn btn--light btn--large">Apply Now</a>
                <a href="<?php echo site_url('/blog'); ?>" class="btn btn--ghost-light btn--large">Student Stories</a>
              </div>
            </div>
          </div>
        </li>

      </ul>
      <div class="slider__bullets glide__bullets" data-glide-el="controls[nav]"></div>
    </div>
  </section>

  <!-- ============================================================
       Statistics strip
  ============================================================ -->
  <section class="section section--stats" aria-label="University at a glance">
    <div class="container">
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
          <span class="stat-counter__number" data-target="4">0</span>
          <span class="stat-counter__label">Distinct Campuses</span>
        </div>
        <div class="stat-counter">
          <span class="stat-counter__number" data-target="98" data-suffix="%">0</span>
          <span class="stat-counter__label">Graduate Satisfaction</span>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       Programs
  ============================================================ -->
  <section class="section section--tint" aria-labelledby="home-programs-title">
    <div class="container">
      <div class="section-head">
        <div>
          <p class="eyebrow">Academics</p>
          <h2 class="section-head__title" id="home-programs-title">Programs Built Around Your Future</h2>
          <p class="section-head__lede">Six schools, dozens of majors, and a course catalogue designed with employers &mdash; not just accreditation committees.</p>
        </div>
        <a href="<?php echo get_post_type_archive_link('program'); ?>" class="section-head__link">View all programs <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
      </div>

      <div class="card-grid card-grid--3 stagger-children">
        <?php
          $homePrograms = new WP_Query(array(
            'posts_per_page' => 6,
            'post_type'      => 'program',
            'orderby'        => 'title',
            'order'          => 'ASC',
          ));
          while ($homePrograms->have_posts()) {
            $homePrograms->the_post();
            get_template_part('template-parts/content', 'program');
          }
          wp_reset_postdata();
        ?>
      </div>

      <div class="section__cta">
        <a href="<?php echo get_post_type_archive_link('program'); ?>" class="btn btn--outline">Browse All Programs</a>
      </div>
    </div>
  </section>

  <!-- ============================================================
       Why Fictional University
  ============================================================ -->
  <section class="section" aria-labelledby="home-why-title">
    <div class="container">
      <div class="section-head section-head--center">
        <p class="eyebrow">Why Fictional University</p>
        <h2 class="section-head__title" id="home-why-title">A University That Works as Hard as You Do</h2>
        <p class="section-head__lede">Everything here &mdash; from class size to career services &mdash; is designed to move you forward.</p>
      </div>

      <div class="feature-grid stagger-children">
        <div class="feature-card">
          <span class="feature-card__icon" aria-hidden="true"><i class="fa fa-users"></i></span>
          <h3 class="feature-card__title">Small Classes, Real Discussion</h3>
          <p>An 12:1 student-to-faculty ratio means seminars, not lecture halls &mdash; and professors who notice when you're gone.</p>
        </div>
        <div class="feature-card">
          <span class="feature-card__icon" aria-hidden="true"><i class="fa fa-graduation-cap"></i></span>
          <h3 class="feature-card__title">Faculty Who Practice</h3>
          <p>Our professors publish, build, exhibit and consult &mdash; and bring that working experience into every syllabus.</p>
        </div>
        <div class="feature-card">
          <span class="feature-card__icon" aria-hidden="true"><i class="fa fa-briefcase"></i></span>
          <h3 class="feature-card__title">Career Outcomes First</h3>
          <p>93% of graduates are employed or in graduate school within six months, backed by a career centre that never closes.</p>
        </div>
        <div class="feature-card">
          <span class="feature-card__icon" aria-hidden="true"><i class="fa fa-globe"></i></span>
          <h3 class="feature-card__title">A Campus That Feels Global</h3>
          <p>Students from more than 40 countries, exchange partnerships on four continents, and a community that expects to learn from each other.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       Campus life split
  ============================================================ -->
  <section class="section section--tint" aria-labelledby="home-life-title">
    <div class="container">
      <div class="split">
        <figure class="split__media reveal-left">
          <img src="<?php echo get_theme_file_uri('/images/campus-life.jpg'); ?>" alt="Students collaborating around laptops in a bright study space" loading="lazy">
          <figcaption class="split__badge">
            <span class="split__badge-number">4</span>
            <span class="split__badge-text">campuses, one<br>shared community</span>
          </figcaption>
        </figure>
        <div class="split__content reveal-right">
          <p class="eyebrow">Campus Life</p>
          <h2 class="section-head__title" id="home-life-title">More Than a Degree</h2>
          <p>The years you spend here should change more than your r&eacute;sum&eacute;. From the first clubs fair to the last midnight study session, campus life is where the real education happens.</p>
          <ul class="checklist">
            <li><i class="fa fa-check" aria-hidden="true"></i> 120+ student societies, clubs and intramural teams</li>
            <li><i class="fa fa-check" aria-hidden="true"></i> Free unlimited transit between all four campuses</li>
            <li><i class="fa fa-check" aria-hidden="true"></i> Residence halls with live-in academic support</li>
            <li><i class="fa fa-check" aria-hidden="true"></i> Free meals programme for students who need it</li>
          </ul>
          <a href="<?php echo get_post_type_archive_link('campus'); ?>" class="btn btn--primary">Explore Our Campuses <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================================================
       Upcoming events
  ============================================================ -->
  <section class="section" aria-labelledby="home-events-title">
    <div class="container">
      <div class="section-head">
        <div>
          <p class="eyebrow">Save the Date</p>
          <h2 class="section-head__title" id="home-events-title">Upcoming Events</h2>
          <p class="section-head__lede">Open days, concerts, career fairs &mdash; there is always something happening on campus.</p>
        </div>
        <a href="<?php echo get_post_type_archive_link('event'); ?>" class="section-head__link">All events <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
      </div>

      <div class="card-grid card-grid--3 stagger-children">
        <?php
          $today = date('Ymd');
          $homeEvents = new WP_Query(array(
            'posts_per_page' => 3,
            'post_type'      => 'event',
            'meta_key'       => 'event_date',
            'orderby'        => 'meta_value_num',
            'order'          => 'ASC',
            'meta_query'     => array(
              array(
                'key'     => 'event_date',
                'compare' => '>=',
                'value'   => $today,
                'type'    => 'numeric',
              ),
            ),
          ));
          if ($homeEvents->have_posts()) {
            while ($homeEvents->have_posts()) {
              $homeEvents->the_post();
              get_template_part('template-parts/content', 'event');
            }
          } else {
            echo '<p class="empty-note">No upcoming events right now &mdash; check back soon, or <a href="' . esc_url(get_post_type_archive_link('event')) . '">browse past events</a>.</p>';
          }
          wp_reset_postdata();
        ?>
      </div>
    </div>
  </section>

  <!-- ============================================================
       Testimonials
  ============================================================ -->
  <section class="section section--dark" aria-labelledby="home-stories-title">
    <div class="container">
      <div class="section-head section-head--center section-head--light">
        <p class="eyebrow eyebrow--light">Student Stories</p>
        <h2 class="section-head__title" id="home-stories-title">In Their Own Words</h2>
        <p class="section-head__lede">Nobody describes a university better than the people studying in it.</p>
      </div>

      <div class="testimonial-grid stagger-children">
        <figure class="testimonial-card">
          <i class="fa fa-quote-left testimonial-card__quote" aria-hidden="true"></i>
          <blockquote>
            <p>&ldquo;I arrived convinced I was just a number. Two weeks in, three professors knew my name and my goals. That still amazes me.&rdquo;</p>
          </blockquote>
          <figcaption class="testimonial-card__person">
            <img class="testimonial-card__avatar" src="<?php echo get_theme_file_uri('/images/avatar-1.jpg'); ?>" alt="Portrait of Daniel Okafor" loading="lazy">
            <span>
              <strong>Daniel Okafor</strong>
              <em>Computer Science, Class of 2027</em>
            </span>
          </figcaption>
        </figure>

        <figure class="testimonial-card">
          <i class="fa fa-quote-left testimonial-card__quote" aria-hidden="true"></i>
          <blockquote>
            <p>&ldquo;The career fair introduced me to my internship, my internship turned into my job, and my job started at this university. The whole pipeline just&hellip; works.&rdquo;</p>
          </blockquote>
          <figcaption class="testimonial-card__person">
            <img class="testimonial-card__avatar" src="<?php echo get_theme_file_uri('/images/avatar-2.jpg'); ?>" alt="Portrait of Maya Jensen" loading="lazy">
            <span>
              <strong>Maya Jensen</strong>
              <em>Business Administration, Class of 2026</em>
            </span>
          </figcaption>
        </figure>

        <figure class="testimonial-card">
          <i class="fa fa-quote-left testimonial-card__quote" aria-hidden="true"></i>
          <blockquote>
            <p>&ldquo;I joined the research lab in my second year expecting to wash beakers. I left having co-authored a paper. That is not unusual here.&rdquo;</p>
          </blockquote>
          <figcaption class="testimonial-card__person">
            <img class="testimonial-card__avatar" src="<?php echo get_theme_file_uri('/images/avatar-3.jpg'); ?>" alt="Portrait of Sofia Reyes" loading="lazy">
            <span>
              <strong>Sofia Reyes</strong>
              <em>Biology &amp; Life Sciences, Class of 2028</em>
            </span>
          </figcaption>
        </figure>
      </div>
    </div>
  </section>

  <!-- ============================================================
       Latest from the blog
  ============================================================ -->
  <section class="section" aria-labelledby="home-blog-title">
    <div class="container">
      <div class="section-head">
        <div>
          <p class="eyebrow">Fresh Perspectives</p>
          <h2 class="section-head__title" id="home-blog-title">Latest From the Blog</h2>
          <p class="section-head__lede">Study tips, campus news and honest student stories, published weekly.</p>
        </div>
        <a href="<?php echo site_url('/blog'); ?>" class="section-head__link">Visit the blog <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
      </div>

      <div class="card-grid card-grid--3 stagger-children">
        <?php
          $homePosts = new WP_Query(array('posts_per_page' => 3));
          if ($homePosts->have_posts()) {
            while ($homePosts->have_posts()) {
              $homePosts->the_post();
              get_template_part('template-parts/content', 'post-card');
            }
          }
          wp_reset_postdata();
        ?>
      </div>

      <div class="section__cta">
        <a href="<?php echo site_url('/blog'); ?>" class="btn btn--outline">View All Blog Posts</a>
      </div>
    </div>
  </section>

  <!-- ============================================================
       Closing call-to-action
  ============================================================ -->
  <section class="cta-band" aria-labelledby="home-cta-title">
    <div class="container cta-band__inner">
      <div class="cta-band__text">
        <p class="eyebrow eyebrow--light">Applications Open</p>
        <h2 class="cta-band__title" id="home-cta-title">Ready to Write Your Chapter?</h2>
        <p>Autumn intake applications close January 15. Visit us, talk to admissions, or start your application today &mdash; it takes less than an hour.</p>
      </div>
      <div class="cta-band__actions">
        <a href="<?php echo wp_registration_url(); ?>" class="btn btn--light btn--large">Apply Now</a>
        <a href="<?php echo get_post_type_archive_link('event'); ?>" class="btn btn--ghost-light btn--large">Book a Campus Tour</a>
      </div>
    </div>
  </section>

  <?php get_footer(); ?>

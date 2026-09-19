<footer class="site-footer" role="contentinfo">
  <div class="container">

    <div class="site-footer__grid">
      <div class="site-footer__brand">
        <a href="<?php echo site_url(); ?>" class="site-footer__logo">
          <span class="site-footer__mark" aria-hidden="true">FU</span>
          <span class="site-footer__logo-text"><strong>Fictional</strong> University</span>
        </a>
        <p class="site-footer__tagline">A modern university where ambitious minds find their path &mdash; and the people to walk it with.</p>
        <ul class="site-footer__contact">
          <li><i class="fa fa-map-marker" aria-hidden="true"></i> 100 University Avenue, New York, NY</li>
          <li><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:5555555555">(555) 555-5555</a></li>
          <li><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:hello@fictional.edu">hello@fictional.edu</a></li>
        </ul>
      </div>

      <nav class="site-footer__col" aria-label="Academics">
        <h3 class="site-footer__heading">Academics</h3>
        <ul class="footer-nav">
          <li><a href="<?php echo get_post_type_archive_link('program'); ?>">Programs</a></li>
          <li><a href="<?php echo get_post_type_archive_link('event'); ?>">Events</a></li>
          <li><a href="<?php echo get_post_type_archive_link('campus'); ?>">Campuses</a></li>
          <li><a href="<?php echo site_url('/blog'); ?>">Blog</a></li>
        </ul>
      </nav>

      <nav class="site-footer__col" aria-label="University">
        <h3 class="site-footer__heading">University</h3>
        <ul class="footer-nav">
          <li><a href="<?php echo site_url('/about-us'); ?>">About Us</a></li>
          <li><a href="<?php echo esc_url(site_url('/past-events')); ?>">Past Events</a></li>
          <li><a href="<?php echo wp_registration_url(); ?>">Apply Now</a></li>
          <li><a href="<?php echo wp_login_url(); ?>">Student Login</a></li>
        </ul>
      </nav>

      <nav class="site-footer__col site-footer__social" aria-label="Connect">
        <h3 class="site-footer__heading">Connect</h3>
        <p class="site-footer__social-copy">Follow campus life in real time, all year round.</p>
        <ul class="social-icons-list">
          <li><a href="#" class="social-icon" aria-label="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
          <li><a href="#" class="social-icon" aria-label="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
          <li><a href="#" class="social-icon" aria-label="YouTube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
          <li><a href="#" class="social-icon" aria-label="LinkedIn"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
          <li><a href="#" class="social-icon" aria-label="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
        </ul>
      </nav>
    </div>

    <div class="site-footer__bottom">
      <p>&copy; <?php echo date('Y'); ?> Fictional University. All rights reserved.</p>
      <ul class="site-footer__legal">
        <li><a href="<?php echo site_url('/privacy-policy'); ?>">Privacy Policy</a></li>
        <li><a href="<?php echo esc_url(site_url('/search')); ?>">Search</a></li>
      </ul>
    </div>

  </div>
</footer>

<button class="back-to-top" aria-label="Back to top"><i class="fa fa-chevron-up" aria-hidden="true"></i></button>

<?php wp_footer(); ?>
</body>
</html>

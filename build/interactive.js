// Interactive JavaScript for Fictional University Theme (v3)

// JS flag: reveal animations only hide content when JS is running.
document.documentElement.classList.add('fu-js');

jQuery(document).ready(function($) {
  'use strict';

  // ===================================================================
  // Page load transition
  // ===================================================================
  $('body').addClass('is-visible');

  // Smooth page transitions for internal links
  $(document).on('click', 'a[href]:not([href^="#"]):not([href^="http"]):not(.no-transition)', function(e) {
    var href = $(this).attr('href');
    if (href && href.indexOf('#') === 0) return;
    var $overlay = $('.page-transition-overlay');
    if (!$overlay.length) {
      $overlay = $('<div class="page-transition-overlay"></div>').appendTo('body');
    }
    $overlay.addClass('is-active');
    setTimeout(function() { window.location.href = href; }, 250);
  });

  // If the browser restores this page from the back/forward cache, any
  // active transition overlay would come back with it and block all
  // clicks — clear it so navigation keeps working.
  $(window).on('pageshow', function(e) {
    $('.page-transition-overlay').removeClass('is-active');
    $('body').addClass('is-visible');
  });

  // ===================================================================
  // Header scroll state + reading progress
  // ===================================================================
  var $header = $('.site-header');

  $(window).on('scroll', function() {
    var scrollTop = $(window).scrollTop();

    if (scrollTop > 16) {
      $header.addClass('scrolled');
    } else {
      $header.removeClass('scrolled');
    }

    var docHeight = $(document).height() - $(window).height();
    var scrollPercent = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
    $('.progress-bar').css('width', scrollPercent + '%');

    var $backToTop = $('.back-to-top');
    if (scrollTop > 600) {
      $backToTop.addClass('is-visible');
    } else {
      $backToTop.removeClass('is-visible');
    }
  });

  // ===================================================================
  // Back to top
  // ===================================================================
  $(document).on('click', '.back-to-top', function() {
    $('html, body').animate({ scrollTop: 0 }, 600);
  });

  // ===================================================================
  // Smooth scroll for anchor links
  // ===================================================================
  $('a[href*="#"]:not([href="#"])').on('click', function() {
    if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html, body').animate({ scrollTop: target.offset().top - 90 }, 800);
        return false;
      }
    }
  });

  // ===================================================================
  // Scroll-reveal (IntersectionObserver, staggered)
  // ===================================================================
  if ('IntersectionObserver' in window) {
    var revealEls = document.querySelectorAll('.reveal-up, .reveal-left, .reveal-right, .card-grid .program-card, .card-grid .event-card, .card-grid .campus-card, .post-grid .post-card, .feature-card, .testimonial-card, .stat-counter, .professor-card__list-item');
    var revealObs = new IntersectionObserver(function(entries, obs) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          obs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.08, rootMargin: '0px 0px -30px 0px' });
    revealEls.forEach(function(el) { revealObs.observe(el); });

    // Stagger children containers
    document.querySelectorAll('.stagger-children').forEach(function(container) {
      var children = container.children;
      Array.prototype.forEach.call(children, function(child, i) {
        child.style.transitionDelay = (i % 4) * 70 + 'ms';
        revealObs.observe(child);
      });
    });
  } else {
    $('.reveal-up, .reveal-left, .reveal-right, .program-card, .event-card, .campus-card, .post-card, .feature-card, .testimonial-card, .stat-counter, .professor-card__list-item').addClass('is-visible');
  }

  // ===================================================================
  // Animated stat counters (instant when reduced motion is preferred)
  // ===================================================================
  if ('IntersectionObserver' in window) {
    var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var counters = document.querySelectorAll('.stat-counter__number[data-target]');
    var counterObs = new IntersectionObserver(function(entries, obs) {
      entries.forEach(function(entry) {
        if (entry.isIntersecting) {
          var el = entry.target;
          var target = parseInt(el.getAttribute('data-target'), 10);
          var suffix = el.getAttribute('data-suffix') || '';

          if (reduceMotion) {
            el.textContent = target.toLocaleString() + suffix;
            obs.unobserve(el);
            return;
          }

          var duration = 1800;
          var startTime = null;

          function step(timestamp) {
            if (!startTime) startTime = timestamp;
            var progress = Math.min((timestamp - startTime) / duration, 1);
            var eased = 1 - Math.pow(1 - progress, 3); // ease-out cubic
            el.textContent = Math.floor(eased * target).toLocaleString() + suffix;
            if (progress < 1) {
              requestAnimationFrame(step);
            } else {
              el.textContent = target.toLocaleString() + suffix;
            }
          }
          requestAnimationFrame(step);
          obs.unobserve(el);
        }
      });
    }, { threshold: 0.5 });
    counters.forEach(function(c) { counterObs.observe(c); });
  }

  // ===================================================================
  // Subtle parallax on page banners
  // ===================================================================
  var $bannerBg = $('.page-banner__bg-image');
  if ($bannerBg.length) {
    $(window).on('scroll', function() {
      var scrollTop = $(window).scrollTop();
      if (scrollTop < 900) {
        $bannerBg.css('transform', 'scale(1.06) translateY(' + scrollTop * 0.18 + 'px)');
      }
    });
  }

  // ===================================================================
  // Mobile menu — Escape / nav click / resize side of the toggle.
  // (The bundled main-university-js owns the trigger toggle itself.)
  // ===================================================================
  var $menuTrigger = $('.site-header__menu-trigger');
  var $menu = $('.site-header__menu');

  function closeMenu() {
    $menu.removeClass('is-visible site-header__menu--active');
    $('.main-navigation').removeClass('is-open');
    $menuTrigger.removeClass('is-active fa-window-close').addClass('fa-bars').attr('aria-expanded', 'false');
  }

  // Mirror the bundle's toggle into an .is-open class on the nav
  // (keeps the CSS mobile dropdown independent of bundle internals).
  $(document).on('click', '.site-header__menu-trigger', function() {
    setTimeout(function() {
      var isOpen = $menu.hasClass('site-header__menu--active');
      $('.main-navigation').toggleClass('is-open', isOpen);
      $menuTrigger.attr('aria-expanded', isOpen ? 'true' : 'false');
    }, 30);
  });

  $('.main-navigation a').on('click', function() {
    if ($(window).width() < 960) {
      closeMenu();
    }
  });

  $(document).on('keydown', function(e) {
    if (e.key === 'Escape') closeMenu();
  });

  $(window).on('resize', function() {
    if ($(window).width() >= 960) closeMenu();
  });

  // ===================================================================
  // Search overlay — focus the field when it opens
  // ===================================================================
  $(document).on('click', '.js-search-trigger', function() {
    setTimeout(function() {
      $('#search-term').trigger('focus');
    }, 120);
  });

  // ===================================================================
  // Form focus states
  // ===================================================================
  $('.search-form .s, .comment-form input, .comment-form textarea').on('focus', function() {
    $(this).addClass('is-focused');
  }).on('blur', function() {
    $(this).removeClass('is-focused');
  });
});

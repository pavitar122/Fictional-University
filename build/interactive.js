// Interactive JavaScript for Fictional University Theme
jQuery(document).ready(function($) {
  // Header scroll effect
  $(window).on('scroll', function() {
    if ($(window).scrollTop() > 50) {
      $('.site-header').addClass('scrolled');
    } else {
      $('.site-header').removeClass('scrolled');
    }
    
    // Progress bar
    const scrollTop = $(window).scrollTop();
    const docHeight = $(document).height() - $(window).height();
    const scrollPercent = (scrollTop / docHeight) * 100;
    $('.progress-bar').width(scrollPercent + '%');
  });

  // Smooth scroll for anchor links
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top - 70 // offset for fixed header
        }, 1000);
        return false;
      }
    }
  });

  // Animated elements on scroll (using Intersection Observer for better performance)
  const animatedElements = document.querySelectorAll('.post-item, .event-summary, .professor-card, .metabox, .page-links, .search-form');
  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('animate-in');
          observer.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.1
    });

    animatedElements.forEach(element => {
      observer.observe(element);
    });
  } else {
    // Fallback for older browsers
    animatedElements.forEach(element => {
      element.classList.add('animate-in');
    });
  }

  // Mobile menu toggle
  $('.site-header__menu-trigger').on('click', function() {
    $('.site-header__menu').toggleClass('is-visible');
    $(this).toggleClass('is-active');
  });

  // Close mobile menu when clicking a link
  $('.main-navigation a').on('click', function() {
    if ($(window).width() < 960) {
      $('.site-header__menu').removeClass('is-visible');
      $('.site-header__menu-trigger').removeClass('is-active');
    }
  });

  // Add interactive hover effects to cards
  $('.post-item, .event-summary, .professor-card').hover(
    function() {
      $(this).addClass('is-hovered');
    },
    function() {
      $(this).removeClass('is-hovered');
    }
  );

  // Add body classes for page transitions
  $('body').addClass('is-visible');

  // Add interactive search form enhancement
  $('.search-form .s').on('focus', function() {
    $(this).parent().addClass('is-focused');
  }).on('blur', function() {
    $(this).parent().removeClass('is-focused');
  });

  // Add interactive elements to footer links
  $('.site-footer .nav-list a').hover(
    function() {
      $(this).css('padding-left', '5px');
    },
    function() {
      $(this).css('padding-left', '0');
    }
  );

  // Add interactive elements to comment form
  $('.comment-form input, .comment-form textarea').on('focus', function() {
    $(this).addClass('is-focused');
  }).on('blur', function() {
    $(this).removeClass('is-focused');
  });

  // Add interactive elements to widgets
  $('.widget').hover(
    function() {
      $(this).css({
        'transform': 'translateY(-2px)',
        'box-shadow': 'var(--u-shadow-md)'
      });
    },
    function() {
      $(this).css({
        'transform': 'translateY(0)',
        'box-shadow': 'var(--u-shadow-sm)'
      });
    }
  );

  // Add interactive elements to pagination
  $('.page-numbers').hover(
    function() {
      $(this).css({
        'background': 'var(--u-gradient-brand)',
        'color': '#fff',
        'transform': 'translateY(-2px)'
      });
    },
    function() {
      if (!$(this).hasClass('current')) {
        $(this).css({
          'background': '',
          'color': '',
          'transform': 'translateY(0)'
        });
      }
    }
  );

  // Keep current page styled
  $('.page-numbers.current').css({
    'background': 'var(--u-gradient-brand)',
    'color': '#fff'
  });

  // Add interactive elements to archive pagination
  $('.archive-pagination a').hover(
    function() {
      $(this).css({
        'background': 'var(--u-gradient-warm)',
        'color': 'var(--u-navy-dark)',
        'transform': 'translateY(-2px)'
      });
    },
    function() {
      $(this).css({
        'background': '',
        'color': '',
        'transform': 'translateY(0)'
      });
    }
  );
});
/**
 * Website SMA Negeri 1 Harapan Bangsa
 * Interactive Modern Animations & Client-side Logic
 */

document.addEventListener('DOMContentLoaded', () => {
  // 1. Mobile Menu Drawer Toggle
  const mobileToggle = document.querySelector('.mobile-toggle');
  const navMenu = document.querySelector('.nav-menu');

  if (mobileToggle && navMenu) {
    mobileToggle.addEventListener('click', (e) => {
      e.stopPropagation();
      navMenu.classList.toggle('active');
    });

    document.addEventListener('click', (e) => {
      if (!mobileToggle.contains(e.target) && !navMenu.contains(e.target)) {
        navMenu.classList.remove('active');
      }
    });
  }

  // 2. Sticky Navbar Blur & Shadow on Scroll
  const navbar = document.querySelector('.navbar');
  const handleScroll = () => {
    if (window.scrollY > 15) {
      navbar?.classList.add('scrolled');
    } else {
      navbar?.classList.remove('scrolled');
    }
  };
  window.addEventListener('scroll', handleScroll, { passive: true });
  handleScroll();

  // 3. Scroll-Triggered Reveal Animations
  const autoRevealElements = document.querySelectorAll(
    '.stat-card, .news-card, .gallery-card, .ekskul-card, .welcome-box, .section-header, .table-responsive, .form-box, .contact-info-card'
  );

  autoRevealElements.forEach((el, index) => {
    el.classList.add('reveal');
    const delay = (index % 4) + 1;
    el.classList.add(`delay-${delay}`);
  });

  const revealObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
        observer.unobserve(entry.target);
      }
    });
  }, {
    threshold: 0.15,
    rootMargin: '0px 0px -40px 0px'
  });

  document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

  // 4. Smooth Easing Counter Animation
  const counters = document.querySelectorAll('.stat-value');
  if (counters.length > 0) {
    const easeOutCubic = (t) => 1 - Math.pow(1 - t, 3);

    const animateCount = (el) => {
      const target = parseInt(el.getAttribute('data-target'), 10);
      if (isNaN(target)) return;

      const duration = 1800; // ms
      let startTime = null;

      const step = (timestamp) => {
        if (!startTime) startTime = timestamp;
        const progress = Math.min((timestamp - startTime) / duration, 1);
        const current = Math.floor(easeOutCubic(progress) * target);

        el.textContent = current.toLocaleString('id-ID');

        if (progress < 1) {
          window.requestAnimationFrame(step);
        } else {
          el.textContent = target.toLocaleString('id-ID');
        }
      };

      window.requestAnimationFrame(step);
    };

    const counterObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          animateCount(entry.target);
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.4 });

    counters.forEach(counter => counterObserver.observe(counter));
  }

  // 5. Gallery Lightbox Modal
  const modal = document.getElementById('galleryModal');
  const modalImg = document.getElementById('modalImage');
  const modalTitle = document.getElementById('modalTitle');
  const modalDesc = document.getElementById('modalDesc');
  const modalClose = document.getElementById('modalClose');

  const galleryCards = document.querySelectorAll('.gallery-card');
  galleryCards.forEach(card => {
    card.addEventListener('click', () => {
      const img = card.getAttribute('data-img');
      const title = card.getAttribute('data-title');
      const desc = card.getAttribute('data-desc');

      if (modal && modalImg && modalTitle) {
        modalImg.src = img;
        modalTitle.textContent = title;
        if (modalDesc) modalDesc.textContent = desc || '';
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
      }
    });
  });

  const closeModal = () => {
    if (modal) {
      modal.classList.remove('active');
      document.body.style.overflow = '';
    }
  };

  if (modalClose) {
    modalClose.addEventListener('click', closeModal);
  }

  if (modal) {
    modal.addEventListener('click', (e) => {
      if (e.target === modal) closeModal();
    });
  }

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeModal();
  });

  // 6. Interactive Profile Tabs with Smooth Switch
  const tabButtons = document.querySelectorAll('.tab-btn');
  const tabPanes = document.querySelectorAll('.tab-pane');

  tabButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      const targetId = btn.getAttribute('data-tab');

      tabButtons.forEach(b => b.classList.remove('active'));
      tabPanes.forEach(p => p.classList.remove('active'));

      btn.classList.add('active');
      const activePane = document.getElementById(targetId);
      if (activePane) {
        activePane.classList.add('active');
      }
    });
  });

  // 7. Auto-dismiss Flash Notification
  const alerts = document.querySelectorAll('.alert');
  alerts.forEach(alert => {
    setTimeout(() => {
      alert.style.opacity = '0';
      alert.style.transform = 'translateY(-10px)';
      alert.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
      setTimeout(() => alert.remove(), 500);
    }, 5000);
  });

  // 8. Navigation Loading Bar & Smooth Page Transition
  const progressBar = document.getElementById('page-progress-bar');
  const mainContent = document.getElementById('main-content');
  let progressTimer = null;
  let progressValue = 0;

  const startProgressBar = () => {
    if (!progressBar) return;
    clearInterval(progressTimer);
    progressValue = 18;
    progressBar.classList.add('is-active');
    progressBar.style.width = `${progressValue}%`;
    progressBar.style.opacity = '1';

    if (mainContent) {
      mainContent.classList.add('is-navigating');
    }

    progressTimer = setInterval(() => {
      if (progressValue < 85) {
        const step = Math.max(1.5, (85 - progressValue) * 0.12);
        progressValue += step;
        progressBar.style.width = `${Math.min(progressValue, 88)}%`;
      }
    }, 100);
  };

  const finishProgressBar = () => {
    if (!progressBar) return;
    clearInterval(progressTimer);
    progressValue = 100;
    progressBar.style.width = '100%';
    setTimeout(() => {
      progressBar.style.opacity = '0';
      if (mainContent) {
        mainContent.classList.remove('is-navigating');
      }
      setTimeout(() => {
        progressBar.style.width = '0%';
        progressBar.classList.remove('is-active');
      }, 300);
    }, 150);
  };

  const resetProgressBar = () => {
    clearInterval(progressTimer);
    if (progressBar) {
      progressBar.style.opacity = '0';
      progressBar.style.width = '0%';
      progressBar.classList.remove('is-active');
    }
    if (mainContent) {
      mainContent.classList.remove('is-navigating');
    }
    document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('nav-loading'));
    document.querySelectorAll('.btn-submitting').forEach(btn => {
      btn.classList.remove('btn-submitting');
      btn.querySelector('.btn-submitting-spinner')?.remove();
    });
  };

  // Complete loading animation on DOM ready
  finishProgressBar();

  // Reset loader when page is restored from browser cache (Back/Forward navigation)
  window.addEventListener('pageshow', (event) => {
    resetProgressBar();
  });

  // Intercept navigation link clicks for immediate tactile feedback
  document.addEventListener('click', (e) => {
    const link = e.target.closest('a');
    if (!link) return;

    // Skip special key combinations (open in new tab/window)
    if (e.metaKey || e.ctrlKey || e.shiftKey || e.altKey || e.button !== 0) return;

    const href = link.getAttribute('href');
    if (!href) return;

    // Ignore page anchor links, protocols, downloads, target="_blank"
    if (href.startsWith('#') || href.startsWith('javascript:') || href.startsWith('mailto:') || href.startsWith('tel:')) {
      return;
    }
    if (link.target && link.target !== '_self') return;
    if (link.hasAttribute('download')) return;

    // Compare with current location
    try {
      const url = new URL(link.href, window.location.origin);
      if (url.origin !== window.location.origin) return;

      // Ignore hash jumps on current URL
      if (url.pathname === window.location.pathname && url.hash) return;
      if (url.href === window.location.href) return;

      // Trigger navigation progress bar and active link state
      startProgressBar();
      if (link.classList.contains('nav-link')) {
        link.classList.add('nav-loading');
      }
    } catch (err) {
      // url parse error fallback
    }
  });

  // Handle Form Submissions (e.g. Contact Form & News Search)
  document.querySelectorAll('form').forEach(form => {
    form.addEventListener('submit', () => {
      if (form.checkValidity && !form.checkValidity()) return;

      const submitBtn = form.querySelector('button[type="submit"]');
      if (submitBtn && !submitBtn.classList.contains('btn-submitting')) {
        submitBtn.classList.add('btn-submitting');
        const spinner = document.createElement('span');
        spinner.className = 'btn-submitting-spinner';
        submitBtn.appendChild(spinner);
      }
      startProgressBar();
    });
  });

  // 7. Swiper Hero Slider Initialization (Concept SMAN 9 Bandung)
  if (typeof Swiper !== 'undefined' && document.querySelector('.hero-swiper')) {
    const heroSwiper = new Swiper('.hero-swiper', {
      loop: true,
      effect: 'fade',
      fadeEffect: {
        crossFade: true
      },
      speed: 1000,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
      },
      navigation: {
        nextEl: '.hero-next',
        prevEl: '.hero-prev',
      },
      pagination: {
        el: '.hero-pagination',
        clickable: true,
      },
    });
  }
});

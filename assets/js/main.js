(function () {
  'use strict';

  var toggle = document.getElementById('menuToggle');
  var menu = document.getElementById('mobileNav');

  function setMenu(open) {
    if (!toggle || !menu) return;
    menu.hidden = !open;
    toggle.setAttribute('aria-expanded', String(open));
  }

  if (toggle && menu) {
    toggle.addEventListener('click', function () {
      setMenu(menu.hidden);
    });
    menu.addEventListener('click', function (e) {
      if (e.target.closest('a')) setMenu(false);
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') setMenu(false);
    });
    document.addEventListener('click', function (e) {
      if (!menu.hidden && !e.target.closest('.nav-shell')) setMenu(false);
    });
    window.matchMedia('(min-width: 901px)').addEventListener('change', function (m) {
      if (m.matches) setMenu(false);
    });
  }

  // Highlight the nav link of the section currently in view
  var links = document.querySelectorAll('.desktop-nav a[data-spy]');
  var map = {};
  links.forEach(function (a) { map[a.dataset.spy] = a; });

  function setActive(id) {
    links.forEach(function (a) { a.classList.remove('active'); });
    if (map[id]) map[id].classList.add('active');
  }

  if ('IntersectionObserver' in window) {
    var sections = Object.keys(map)
      .map(function (id) { return document.getElementById(id); })
      .filter(Boolean);
    var obs = new IntersectionObserver(function (entries) {
      entries.forEach(function (en) {
        if (en.isIntersecting) setActive(en.target.id);
      });
    }, { rootMargin: '-40% 0px -55% 0px' });
    sections.forEach(function (s) { obs.observe(s); });

    var hero = document.getElementById('top');
    if (hero) {
      new IntersectionObserver(function (entries) {
        if (entries[0].isIntersecting) setActive('');
      }, { rootMargin: '-40% 0px -40% 0px' }).observe(hero);
    }
  }

  // Contact form: light client-side validation + double-submit guard
  var form = document.getElementById('contactForm');
  if (form) {
    form.addEventListener('submit', function (e) {
      var name = form.elements.name.value.trim();
      var email = form.elements.email.value.trim();
      var msg = form.elements.message.value.trim();
      var err = '';
      if (!name) err = 'Please enter your name.';
      else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) err = 'Please enter a valid email address.';
      else if (msg.length < 10) err = 'Your message should be at least 10 characters.';

      var box = form.querySelector('.form-alert');
      if (err) {
        e.preventDefault();
        if (!box) {
          box = document.createElement('div');
          box.setAttribute('role', 'alert');
          form.insertBefore(box, form.firstChild);
        }
        box.className = 'form-alert form-alert-error';
        box.textContent = err;
        return;
      }
      var btn = form.querySelector('button[type="submit"]');
      if (btn) { btn.disabled = true; btn.style.opacity = '0.7'; }
    });
  }

  // Remove ?query leftovers / scroll to contact after a form response
  if (document.querySelector('.form-alert') && !location.hash) {
    var c = document.getElementById('contact');
    if (c) c.scrollIntoView();
  }
})();

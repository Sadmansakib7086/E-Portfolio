<?php
require_once __DIR__ . '/includes/header.php';
$flash = flash();
$old   = $_SESSION['old'] ?? [];
unset($_SESSION['old']);
?>

    <!-- Hero -->
    <section class="hero section" id="top">
      <div class="hero-copy">
        <div class="eyebrow"><span>01</span> Hello, I’m Sadman</div>
        <h1>I turn ideas into <em>useful digital experiences.</em></h1>
        <p class="hero-intro">
          Computer Science undergraduate and aspiring Data Science &amp; AI Engineer, building
          thoughtful software through code, data, and curiosity.
        </p>
        <div class="hero-actions">
          <a class="button button-primary" href="#projects">Explore my work <?= icon('arrow') ?></a>
          <a class="text-link" href="mailto:<?= e(SITE_EMAIL) ?>">Let’s talk <span>→</span></a>
        </div>
        <div class="hero-meta">
          <div><strong>Dhaka</strong><span>Bangladesh</span></div>
          <div><strong>CSE</strong><span>AIUB undergraduate</span></div>
          <div><strong>3.10</strong><span>Current CGPA</span></div>
        </div>
      </div>

      <div class="hero-visual">
        <div class="portrait-frame">
          <img src="assets/images/sadman-sakib-portrait.jpg" alt="Sadman Sakib standing on a rooftop" width="900" height="1100" fetchpriority="high">
          <div class="portrait-label">
            <span>Current focus</span>
            <strong>Data Science · AI · Software</strong>
          </div>
        </div>
        <div class="floating-card code-card">
          <?= icon('code', 20) ?>
          <div>
            <span>Always learning</span>
            <strong>Building with purpose</strong>
          </div>
        </div>
      </div>
    </section>

    <!-- Ticker -->
    <div class="ticker" aria-hidden="true">
      <div class="ticker-track">
        <?php for ($g = 0; $g < 2; $g++): ?>
          <div class="ticker-group">
            <?php foreach ($tickerItems as $t): ?>
              <span><?= e($t) ?></span><i>✦</i>
            <?php endforeach; ?>
          </div>
        <?php endfor; ?>
      </div>
    </div>

    <!-- About -->
    <section id="about" class="section about-section">
      <div class="section-heading">
        <div class="eyebrow"><span>02</span> About me</div>
        <h2>Curious by nature.<br>Driven by <em>impact.</em></h2>
      </div>
      <div class="about-grid">
        <div class="about-copy">
          <p class="lead">I’m a Computer Science &amp; Engineering student at American International University-Bangladesh.</p>
          <p>
            My interests sit where technology and real-world problem solving meet—from
            database-driven applications to data analytics, machine learning, and business intelligence.
          </p>
          <p>
            Beyond code, I contribute to visual storytelling as a director and cinematographer
            with the AIUB Film Club, and support environmental initiatives as an executive at Ecorevolution.
          </p>
          <div class="social-row">
            <a href="<?= e(URL_GITHUB) ?>" target="_blank" rel="noopener noreferrer"><?= icon('github', 19) ?> GitHub</a>
            <a href="<?= e(URL_LINKEDIN) ?>" target="_blank" rel="noopener noreferrer"><?= icon('linkedin') ?> LinkedIn</a>
          </div>
        </div>
        <figure class="video-wrap">
          <div class="video-frame">
            <iframe
              src="https://www.youtube-nocookie.com/embed/<?= e(VIDEO_ID) ?>"
              title="About Sadman Sakib"
              loading="lazy"
              referrerpolicy="strict-origin-when-cross-origin"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
              allowfullscreen></iframe>
          </div>
          <figcaption class="video-caption">
            <span>Play introduction</span>
            <strong>Meet Sadman in 60 seconds</strong>
          </figcaption>
        </figure>
      </div>
    </section>

    <!-- Projects -->
    <section id="projects" class="section projects-section">
      <div class="section-heading row-heading">
        <div>
          <div class="eyebrow"><span>03</span> Selected projects</div>
          <h2>Work shaped by<br><em>real needs.</em></h2>
        </div>
        <p>Two practical software projects focused on accessibility, utility, and clear user experience.</p>
      </div>
      <div class="project-grid">
        <?php foreach ($projects as $p): ?>
          <article class="project-card <?= e($p['class']) ?>">
            <div class="project-top">
              <span class="project-number"><?= e($p['number']) ?></span>
              <div class="project-icon"><?= icon($p['icon'], $p['icon'] === 'plus' ? 23 : 20) ?></div>
            </div>
            <div>
              <div class="tags">
                <?php foreach ($p['tags'] as $tag): ?><span><?= e($tag) ?></span><?php endforeach; ?>
              </div>
              <h3><?= e($p['title']) ?></h3>
              <p><?= e($p['text']) ?></p>
            </div>
            <a href="<?= e($p['url']) ?>" target="_blank" rel="noopener noreferrer">View on GitHub <?= icon('arrow') ?></a>
          </article>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- Skills -->
    <section id="skills" class="section skills-section">
      <div class="section-heading">
        <div class="eyebrow"><span>04</span> Capabilities</div>
        <h2>Tools I use to move<br>from <em>idea to outcome.</em></h2>
      </div>
      <div class="skill-grid">
        <?php foreach ($skills as $i => [$name, $list]): ?>
          <div class="skill-card">
            <span class="skill-index"><?= sprintf('%02d', $i + 1) ?></span>
            <h3><?= e($name) ?></h3>
            <p><?= e($list) ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- Journey -->
    <section id="journey" class="section journey-section">
      <div class="section-heading row-heading">
        <div>
          <div class="eyebrow"><span>05</span> Journey</div>
          <h2>Learning beyond<br>the <em>classroom.</em></h2>
        </div>
        <p>A mix of technical education, creative collaboration, and community leadership.</p>
      </div>
      <div class="timeline">
        <?php foreach ($timeline as [$when, $title, $text, $tag]): ?>
          <div class="timeline-item">
            <span><?= e($when) ?></span>
            <div>
              <h3><?= e($title) ?></h3>
              <p><?= e($text) ?></p>
            </div>
            <b><?= e($tag) ?></b>
          </div>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- Credentials -->
    <section id="credentials" class="section credentials-section">
      <div class="section-heading row-heading">
        <div>
          <div class="eyebrow"><span>06</span> Credentials</div>
          <h2>Milestones worth<br><em>remembering.</em></h2>
        </div>
        <p>Recognition for technical learning and active participation beyond university coursework.</p>
      </div>
      <div class="credential-grid">
        <?php foreach ($credentials as $c): ?>
          <a href="<?= e($c['link']) ?>" target="_blank" rel="noopener noreferrer" class="credential-card">
            <div class="credential-image">
              <img src="<?= e($c['image']) ?>" alt="<?= e($c['alt']) ?>" loading="lazy">
            </div>
            <div>
              <span><?= e($c['label']) ?></span>
              <h3><?= e($c['title']) ?></h3>
              <p><?= e($c['text']) ?></p>
            </div>
            <?= icon('arrow') ?>
          </a>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- Contact -->
    <section id="contact" class="section contact-section">
      <div class="contact-orbit orbit-one"></div>
      <div class="contact-orbit orbit-two"></div>
      <div class="eyebrow light"><span>07</span> Get in touch</div>
      <h2>Have an idea?<br>Let’s make it <em>real.</em></h2>
      <p>I’m open to internships, collaborative projects, and opportunities in software, data, and AI.</p>

      <form class="contact-form" id="contactForm" action="contact.php" method="post" novalidate>
        <?php if ($flash): ?>
          <div class="form-alert form-alert-<?= e($flash['type']) ?>" role="alert"><?= e($flash['message']) ?></div>
        <?php endif; ?>
        <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
        <div class="hp" aria-hidden="true">
          <label>Leave this empty <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
        </div>
        <div class="form-row">
          <label>
            <span>Name</span>
            <input type="text" name="name" maxlength="100" required autocomplete="name" value="<?= e($old['name'] ?? '') ?>">
          </label>
          <label>
            <span>Email</span>
            <input type="email" name="email" maxlength="150" required autocomplete="email" value="<?= e($old['email'] ?? '') ?>">
          </label>
        </div>
        <label>
          <span>Message</span>
          <textarea name="message" rows="5" maxlength="3000" required><?= e($old['message'] ?? '') ?></textarea>
        </label>
        <div class="form-footer">
          <button class="button button-light" type="submit"><?= icon('mail') ?> Send message</button>
          <a class="mail-fallback" href="mailto:<?= e(SITE_EMAIL) ?>">or email <?= e(SITE_EMAIL) ?></a>
        </div>
      </form>
    </section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

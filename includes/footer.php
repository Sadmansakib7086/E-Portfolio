  </main>

  <footer>
    <a href="#top" class="footer-brand"><span class="brand-mark">SS</span> Sadman Sakib</a>
    <p>Designed for curiosity. Built with purpose. &copy; <?= date('Y') ?></p>
    <div>
      <a href="mailto:<?= e(SITE_EMAIL) ?>">Email</a>
      <a href="<?= e(URL_GITHUB) ?>" target="_blank" rel="noopener noreferrer">GitHub</a>
      <a href="<?= e(URL_LINKEDIN) ?>" target="_blank" rel="noopener noreferrer">LinkedIn</a>
    </div>
  </footer>
</div>
<script src="assets/js/main.js?v=<?= filemtime(__DIR__ . '/../assets/js/main.js') ?>"></script>
</body>
</html>

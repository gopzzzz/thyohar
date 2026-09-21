<footer class="site-footer">
    <div class="container footer__top">
      <div class="footer__brand">
        <a class="brand brand--footer" href="#home" aria-label="Thyohar home">
          <img src="assets/thyohar-logo.jpg" alt="Thyohar" width="998" height="375" loading="lazy">
        </a>
        <p>Great celebrations begin with the right people.</p>
      </div>
      <div class="footer__links">
        <div>
          <h3>Explore</h3>
          <a href="#home">Home</a>
          <a href="#about">About Us</a>
          <a href="#providers">Professionals</a>
          <a href="planners.html">Planners List</a>
          <a href="login.html" data-auth-link>Login</a>
          <a href="#stories">Success Stories</a>
        </div>
        <div>
          <h3>Services</h3>
          <a href="#services" data-footer-service="photography">Photography</a>
          <a href="#services" data-footer-service="decoration">Decoration</a>
          <a href="#services" data-footer-service="catering">Catering</a>
          <a href="#services" data-footer-service="beauty">Beauty &amp; Makeup</a>
        </div>
        <div>
          <h3>Say hello</h3>
          <a href="mailto:hello@thyohar.in">hello@thyohar.in</a>
          <a href="tel:+919876543210">+91&nbsp;98765&nbsp;43210</a>
          <span>New Delhi, India</span>
        </div>
      </div>
    </div>
    <div class="container footer__bottom">
      <p>© <span id="currentYear">2026</span> Thyohar. Made for joyful moments.</p>
      <p><a href="#">Privacy</a><a href="#">Terms</a><a href="https://unsplash.com" target="_blank" rel="noreferrer">Photography: Unsplash</a></p>
    </div>
  </footer>

  <dialog class="provider-modal" id="providerModal" aria-labelledby="modalProviderName">
    <button class="modal-close" id="modalClose" type="button" aria-label="Close provider profile">×</button>
    <div class="modal__header">
      <img id="modalImage" src="assets/profile-arjun.jpg" alt="" width="600" height="600">
      <div>
        <p id="modalCategory" class="provider-card__category"></p>
        <h2 id="modalProviderName">Provider profile</h2>
        <p id="modalLocation" class="location"></p>
        <div class="provider-card__rating"><span id="modalRating" class="rating-score"></span><span class="stars">★★★★★</span><span id="modalReviews"></span></div>
      </div>
    </div>
    <div class="modal__body">
      <p id="modalDescription"></p>
      <div class="modal__facts">
        <div><small>Experience</small><strong id="modalExperience"></strong></div>
        <div><small>Events completed</small><strong id="modalEvents"></strong></div>
        <div><small>Typical response</small><strong id="modalResponse"></strong></div>
      </div>
      <div>
        <h3>Services included</h3>
        <ul id="modalServices"></ul>
      </div>
      <div class="modal__quote">
        <span aria-hidden="true">“</span>
        <blockquote id="modalQuote"></blockquote>
        <p id="modalQuoteAuthor"></p>
      </div>
    </div>
    <div class="modal__footer">
      <p><small>Packages from</small><strong id="modalPrice"></strong></p>
      <button class="button button--primary" id="modalEnquire" type="button">Request a quote <span aria-hidden="true">→</span></button>
    </div>
  </dialog>

  <div class="toast" id="toast" role="status" aria-live="polite" aria-atomic="true">
    <span class="toast__icon" aria-hidden="true">✓</span>
    <span id="toastMessage">Done</span>
  </div>
<!DOCTYPE html>
<html lang="en">
@include('layouts.webpartials.head')
<body class="account-page">
  <a class="skip-link" href="#registrationForm">Skip to registration form</a>
@include('layouts.webpartials.nav')


  <main class="account-main" data-auth-guest>
    <section class="auth-visual auth-visual--register" aria-label="Plan your celebration with confidence">
      <img src="{{asset('web/assets/story-garden.jpg')}}" alt="An elegant outdoor celebration table" width="1400" height="933">
      <div class="auth-visual__overlay" aria-hidden="true"></div>
      <div class="auth-visual__content">
        <span class="auth-visual__mark" aria-hidden="true">✦</span>
        <p>Made for joyful moments</p>
        <h1>Bring every celebration detail into <em>one happy place.</em></h1>
        <ul class="auth-benefits">
          <li><span aria-hidden="true">✓</span> Save planners you love</li>
          <li><span aria-hidden="true">✓</span> Book packages with clarity</li>
          <li><span aria-hidden="true">✓</span> Keep your requests organised</li>
        </ul>
      </div>
    </section>

    <section class="auth-panel auth-panel--register" aria-labelledby="registerTitle">
      <div class="auth-card">
        <p class="auth-eyebrow">Join Thyohar</p>
        <h2 id="registerTitle">Create your account</h2>
        <p class="auth-intro">A few details and your celebration space is ready.</p>

        <div class="form-alert form-alert--error" id="registrationError" role="alert" hidden>
          <span aria-hidden="true">!</span><p>We couldn’t create your account. Please try again.</p>
        </div>

        <form class="auth-form" id="registrationForm">
          <label class="field-control">
            <span>Full name</span>
            <span class="field-input">
              <svg aria-hidden="true" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 21a8 8 0 0 1 16 0"/></svg>
              <input name="name" type="text" autocomplete="name" placeholder="Your full name" minlength="2" required>
            </span>
          </label>

          <div class="auth-form__row">
            <label class="field-control">
              <span>Email address</span>
              <span class="field-input">
                <svg aria-hidden="true" viewBox="0 0 24 24"><path d="M3 6h18v12H3zM3 7l9 7 9-7"/></svg>
                <input name="email" type="email" autocomplete="email" placeholder="you@example.com" required>
              </span>
            </label>
            <label class="field-control">
              <span>Phone number</span>
              <span class="field-input">
                <svg aria-hidden="true" viewBox="0 0 24 24"><path d="M6.5 3h3l1.3 5-2 1.7a16 16 0 0 0 5.5 5.5l1.7-2 5 1.3v3A3.5 3.5 0 0 1 17.5 21 14.5 14.5 0 0 1 3 6.5 3.5 3.5 0 0 1 6.5 3Z"/></svg>
                <input name="phone" type="tel" autocomplete="tel" inputmode="numeric" placeholder="10-digit number" pattern="[0-9]{10}" required>
              </span>
            </label>
          </div>

          <div class="auth-form__row">
            <label class="field-control">
              <span>Password</span>
              <span class="field-input">
                <svg aria-hidden="true" viewBox="0 0 24 24"><rect x="5" y="10" width="14" height="11" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/></svg>
                <input id="registerPassword" name="password" type="password" autocomplete="new-password" placeholder="At least 8 characters" minlength="8" required>
                <button class="password-toggle" type="button" data-password-toggle="registerPassword" aria-label="Show password">Show</button>
              </span>
            </label>
            <label class="field-control">
              <span>Confirm password</span>
              <span class="field-input">
                <svg aria-hidden="true" viewBox="0 0 24 24"><path d="m7 12 3 3 7-7"/><circle cx="12" cy="12" r="9"/></svg>
                <input id="confirmPassword" name="confirmPassword" type="password" autocomplete="new-password" placeholder="Repeat your password" minlength="8" required>
                <button class="password-toggle" type="button" data-password-toggle="confirmPassword" aria-label="Show password">Show</button>
              </span>
            </label>
          </div>

          <p class="field-error" id="passwordError" role="alert" hidden>Both passwords must match.</p>
          <label class="check-control check-control--terms">
            <input name="terms" type="checkbox" required>
            <span>I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>.</span>
          </label>

          <button class="button button--primary button--full auth-submit" type="submit">Create account <span aria-hidden="true">→</span></button>
        </form>

        <p class="auth-switch">Already have an account? <a href="login.html">Log in</a></p>
      </div>
    </section>
  </main>
   @include('layouts.webpartials.footerscript')
</body>
</html>

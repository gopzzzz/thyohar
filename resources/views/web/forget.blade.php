<!DOCTYPE html>
<html lang="en">
@include('layouts.webpartials.head')
<body class="account-page account-page--compact">
  <a class="skip-link" href="#forgotPasswordForm">Skip to password reset form</a>

@include('layouts.webpartials.nav')

  <main class="account-main">
    <section class="auth-visual auth-visual--reset" aria-label="Helpful support for your planning journey">
      <img src="{{asset('web/assets/service-decoration.jpg')}}" alt="Elegant floral celebration décor" width="1000" height="667">
      <div class="auth-visual__overlay" aria-hidden="true"></div>
      <div class="auth-visual__content">
        <span class="auth-visual__mark" aria-hidden="true">✦</span>
        <p>Here when you need us</p>
        <h1>A small reset, then back to the <em>beautiful plans.</em></h1>
      </div>
    </section>

    <section class="auth-panel" aria-labelledby="forgotTitle">
      <div class="auth-card">
        <div id="resetRequestPanel">
          <span class="auth-heading-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24"><path d="M5 10V8a7 7 0 0 1 13.4-2.8M19 14v2a7 7 0 0 1-13.4 2.8M18 2v4h-4M6 22v-4h4"/></svg>
          </span>
          <p class="auth-eyebrow">Account recovery</p>
          <h2 id="forgotTitle">Forgot your password?</h2>
          <p class="auth-intro">Enter your account email and we’ll prepare reset instructions.</p>

          <form class="auth-form" id="forgotPasswordForm">
            <label class="field-control">
              <span>Email address</span>
              <span class="field-input">
                <svg aria-hidden="true" viewBox="0 0 24 24"><path d="M3 6h18v12H3zM3 7l9 7 9-7"/></svg>
                <input name="email" type="email" autocomplete="email" placeholder="you@example.com" required>
              </span>
            </label>
            <button class="button button--primary button--full auth-submit" type="submit">Send reset instructions <span aria-hidden="true">→</span></button>
          </form>
        </div>

        <div class="reset-success" id="resetSuccess" role="status" hidden>
          <span class="reset-success__icon" aria-hidden="true">✓</span>
          <p class="auth-eyebrow">Request received</p>
          <h2>Check your inbox</h2>
          <p>If an account exists for <strong id="resetEmail"></strong>, password reset instructions will be sent there.</p>
          <a class="button button--primary button--full" href="login.html">Return to login <span aria-hidden="true">→</span></a>
        </div>

        <p class="auth-switch">Remembered it? <a href="login.html">Log in</a></p>
      </div>
    </section>
  </main>
 @include('layouts.webpartials.footerscript')
</body>
</html>

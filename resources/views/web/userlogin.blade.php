<!DOCTYPE html>
<html lang="en">

@include('layouts.webpartials.head')
<body class="account-page">
  <a class="skip-link" href="#loginForm">Skip to login form</a>

@include('layouts.webpartials.nav')
 <main class="account-main">
    <section class="auth-visual" aria-label="Celebrations made beautifully simple">
      <img src="{{asset('web/assets/hero-wedding.jpg')}}" alt="A joyful wedding celebration" width="1920" height="1280">
      <div class="auth-visual__overlay" aria-hidden="true"></div>
      <div class="auth-visual__content">
        <span class="auth-visual__mark" aria-hidden="true">✦</span>
        <p>Welcome back</p>
        <h1>Every beautiful plan starts with the <em>right people.</em></h1>
        <div class="auth-visual__proof"><span aria-hidden="true">★★★★★</span> Trusted by celebration hosts across India</div>
      </div>
    </section>

    <section class="auth-panel" aria-labelledby="loginTitle">
      <div class="auth-card">
        <p class="auth-eyebrow">Your Thyohar account</p>
        <h2 id="loginTitle">Welcome back</h2>
        <p class="auth-intro">Enter your details to continue planning your celebration.</p>

        <div class="form-alert form-alert--success" id="registrationMessage" role="status" hidden>
          <span aria-hidden="true">✓</span><p>Your account is ready. Log in to continue.</p>
        </div>
        <div class="form-alert form-alert--success" id="logoutMessage" role="status" hidden>
          <span aria-hidden="true">✓</span><p>You have been logged out safely.</p>
        </div>
        <div class="form-alert form-alert--error" id="loginError" role="alert" hidden>
          <span aria-hidden="true">!</span><p>The email or password is incorrect.</p>
        </div>

        <form class="auth-form" id="loginForm">
          <label class="field-control">
            <span>Email address</span>
            <span class="field-input">
              <svg aria-hidden="true" viewBox="0 0 24 24"><path d="M3 6h18v12H3zM3 7l9 7 9-7"/></svg>
              <input id="loginEmail" name="email" type="email" autocomplete="email" placeholder="you@example.com" required>
            </span>
          </label>

          <label class="field-control">
            <span>Password</span>
            <span class="field-input">
              <svg aria-hidden="true" viewBox="0 0 24 24"><rect x="5" y="10" width="14" height="11" rx="2"/><path d="M8 10V7a4 4 0 0 1 8 0v3"/></svg>
              <input id="loginPassword" name="password" type="password" autocomplete="current-password" placeholder="Enter your password" minlength="8" required>
              <button class="password-toggle" type="button" data-password-toggle="loginPassword" aria-label="Show password">Show</button>
            </span>
          </label>

          <div class="auth-form__options">
            <label class="check-control"><input name="remember" type="checkbox"><span>Remember me</span></label>
            <a href="forgot-password.html">Forgot password?</a>
          </div>

          <button class="button button--primary button--full auth-submit" type="submit">Log in <span aria-hidden="true">→</span></button>
        </form>

        <p class="auth-switch" data-auth-guest>New to Thyohar? <a href="register.html">Create an account</a></p>
        <p class="auth-privacy">By continuing, you agree to Thyohar’s Terms of Service and Privacy Policy.</p>
      </div>
    </section>
  </main>

    @include('layouts.webpartials.footerscript')

</body>
</html>

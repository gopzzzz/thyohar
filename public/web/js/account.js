(() => {
  "use strict";

  const auth = window.ThyoharAuth;
  if (!auth) return;

  document.querySelectorAll("[data-password-toggle]").forEach((button) => {
    button.addEventListener("click", () => {
      const input = document.getElementById(button.dataset.passwordToggle);
      if (!input) return;
      const show = input.type === "password";
      input.type = show ? "text" : "password";
      button.textContent = show ? "Hide" : "Show";
      button.setAttribute("aria-label", show ? "Hide password" : "Show password");
    });
  });

  const setSubmitting = (form, label) => {
    const button = form.querySelector("button[type='submit']");
    if (!button) return null;
    button.disabled = true;
    button.dataset.originalLabel = button.innerHTML;
    button.textContent = label;
    return button;
  };

  const resetSubmitting = (button) => {
    if (!button) return;
    button.disabled = false;
    if (button.dataset.originalLabel) button.innerHTML = button.dataset.originalLabel;
  };

  const showError = (element, message) => {
    if (!element) return;
    const copy = element.querySelector("p");
    if (copy) copy.textContent = message;
    element.hidden = false;
  };

  const hideError = (element) => {
    if (element) element.hidden = true;
  };

  const registrationForm = document.getElementById("registrationForm");
  if (registrationForm) {
    if (auth.getSession()) {
      window.location.replace("planners.html");
      return;
    }

    const password = registrationForm.elements.password;
    const confirmation = registrationForm.elements.confirmPassword;
    const passwordError = document.getElementById("passwordError");
    const registrationError = document.getElementById("registrationError");

    const validatePasswordMatch = () => {
      const mismatch = confirmation.value && password.value !== confirmation.value;
      confirmation.setCustomValidity(mismatch ? "Passwords do not match." : "");
      passwordError.hidden = !mismatch;
      return !mismatch;
    };

    password.addEventListener("input", validatePasswordMatch);
    confirmation.addEventListener("input", validatePasswordMatch);
    registrationForm.addEventListener("input", () => hideError(registrationError));

    registrationForm.addEventListener("submit", async (event) => {
      event.preventDefault();
      if (!validatePasswordMatch() || !registrationForm.reportValidity()) return;

      const email = auth.normalizeEmail(registrationForm.elements.email.value);
      const submitButton = setSubmitting(registrationForm, "Creating your account…");
      const account = {
        version: 2,
        name: registrationForm.elements.name.value.trim(),
        email,
        phone: registrationForm.elements.phone.value.trim(),
        passwordHash: await auth.hashPassword(password.value, email),
        createdAt: new Date().toISOString()
      };

      auth.clearSession();
      if (!auth.saveAccount(account)) {
        resetSubmitting(submitButton);
        showError(registrationError, "Your browser blocked account storage. Please enable site storage and try again.");
        return;
      }

      window.setTimeout(() => {
        window.location.href = `login.html?registered=1&email=${encodeURIComponent(account.email)}`;
      }, 400);
    });
  }

  const loginForm = document.getElementById("loginForm");
  if (loginForm) {
    const params = new URLSearchParams(window.location.search);
    if (auth.getSession() && params.get("loggedOut") !== "1") {
      window.location.replace("planners.html");
      return;
    }

    const registrationMessage = document.getElementById("registrationMessage");
    const logoutMessage = document.getElementById("logoutMessage");
    const loginError = document.getElementById("loginError");
    const emailFromRegistration = params.get("email");
    const savedAccount = auth.getAccount();

    if (params.get("registered") === "1") registrationMessage.hidden = false;
    if (params.get("loggedOut") === "1") logoutMessage.hidden = false;
    if (emailFromRegistration) loginForm.elements.email.value = emailFromRegistration;
    else if (savedAccount?.email) loginForm.elements.email.value = savedAccount.email;

    loginForm.addEventListener("input", () => {
      hideError(loginError);
      loginForm.elements.email.removeAttribute("aria-invalid");
      loginForm.elements.password.removeAttribute("aria-invalid");
    });

    loginForm.addEventListener("submit", async (event) => {
      event.preventDefault();
      if (!loginForm.reportValidity()) return;

      const email = auth.normalizeEmail(loginForm.elements.email.value);
      const password = loginForm.elements.password.value;
      const account = auth.getAccount();
      const submitButton = setSubmitting(loginForm, "Checking your details…");
      let passwordMatches = false;

      if (account && account.email === email) {
        const submittedHash = await auth.hashPassword(password, email);
        if (account.passwordHash) {
          passwordMatches = submittedHash === account.passwordHash;
        } else {
          account.passwordHash = submittedHash;
          account.version = 2;
          passwordMatches = auth.saveAccount(account);
        }
      }

      if (!account || account.email !== email || !passwordMatches) {
        resetSubmitting(submitButton);
        loginForm.elements.email.setAttribute("aria-invalid", "true");
        loginForm.elements.password.setAttribute("aria-invalid", "true");
        showError(loginError, "The email or password is incorrect. Please check your details or create an account.");
        loginForm.elements.password.focus();
        return;
      }

      if (!auth.saveSession(account, loginForm.elements.remember.checked)) {
        resetSubmitting(submitButton);
        showError(loginError, "Your browser blocked sign-in storage. Please enable site storage and try again.");
        return;
      }

      submitButton.textContent = "Signed in — opening planners…";
      window.setTimeout(() => {
        window.location.href = "planners.html";
      }, 350);
    });
  }

  const forgotPasswordForm = document.getElementById("forgotPasswordForm");
  if (forgotPasswordForm) {
    forgotPasswordForm.addEventListener("submit", (event) => {
      event.preventDefault();
      if (!forgotPasswordForm.reportValidity()) return;
      const email = forgotPasswordForm.elements.email.value.trim();
      setSubmitting(forgotPasswordForm, "Preparing instructions…");

      window.setTimeout(() => {
        document.getElementById("resetEmail").textContent = email;
        document.getElementById("resetRequestPanel").hidden = true;
        document.getElementById("resetSuccess").hidden = false;
      }, 500);
    });
  }
})();

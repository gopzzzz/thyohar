(() => {
  "use strict";

  const ACCOUNT_KEY = "thyoharAccount";
  const SESSION_KEY = "thyoharAuthSession";
  const REMEMBERED_SESSION_KEY = "thyoharRememberedSession";
  const LEGACY_SESSION_KEY = "thyoharSignedInEmail";

  const parseStoredJson = (storage, key) => {
    try {
      return JSON.parse(storage.getItem(key) || "null");
    } catch (error) {
      return null;
    }
  };

  const normalizeEmail = (email) => String(email || "").trim().toLocaleLowerCase();

  const getAccount = () => {
    const account = parseStoredJson(localStorage, ACCOUNT_KEY);
    if (!account?.email) return null;
    return { ...account, email: normalizeEmail(account.email) };
  };

  const clearSession = () => {
    try {
      sessionStorage.removeItem(SESSION_KEY);
      sessionStorage.removeItem(LEGACY_SESSION_KEY);
      localStorage.removeItem(REMEMBERED_SESSION_KEY);
    } catch (error) {
      // Navigation remains usable when browser storage is disabled.
    }
  };

  const saveSession = (account, remember) => {
    const session = {
      email: normalizeEmail(account.email),
      name: account.name || "Thyohar user",
      signedInAt: new Date().toISOString(),
      remembered: Boolean(remember)
    };

    try {
      clearSession();
      const storage = remember ? localStorage : sessionStorage;
      storage.setItem(remember ? REMEMBERED_SESSION_KEY : SESSION_KEY, JSON.stringify(session));
      return true;
    } catch (error) {
      return false;
    }
  };

  const getSession = () => {
    const account = getAccount();
    let session = parseStoredJson(sessionStorage, SESSION_KEY) || parseStoredJson(localStorage, REMEMBERED_SESSION_KEY);

    if (!session && account) {
      try {
        const legacyEmail = normalizeEmail(sessionStorage.getItem(LEGACY_SESSION_KEY));
        if (legacyEmail && legacyEmail === account.email) {
          saveSession(account, false);
          session = parseStoredJson(sessionStorage, SESSION_KEY);
        }
      } catch (error) {
        session = null;
      }
    }

    if (!session || !account || normalizeEmail(session.email) !== account.email) return null;
    return session;
  };

  const saveAccount = (account) => {
    try {
      localStorage.setItem(ACCOUNT_KEY, JSON.stringify(account));
      return true;
    } catch (error) {
      return false;
    }
  };

  const hashPassword = async (password, email) => {
    const value = `thyohar:${normalizeEmail(email)}:${password}`;
    if (window.crypto?.subtle && window.TextEncoder) {
      const digest = await window.crypto.subtle.digest("SHA-256", new TextEncoder().encode(value));
      return [...new Uint8Array(digest)].map((byte) => byte.toString(16).padStart(2, "0")).join("");
    }

    let hash = 2166136261;
    for (let index = 0; index < value.length; index += 1) {
      hash ^= value.charCodeAt(index);
      hash = Math.imul(hash, 16777619);
    }
    return `fallback-${(hash >>> 0).toString(16)}`;
  };

  const updateNavigation = () => {
    const session = getSession();
    document.documentElement.classList.toggle("is-authenticated", Boolean(session));

    document.querySelectorAll("[data-auth-link]").forEach((link) => {
      if (!session) {
        link.textContent = "Login";
        link.href = "login.html";
        link.removeAttribute("aria-label");
        link.classList.remove("is-logout");
        return;
      }

      link.textContent = "Log out";
      link.href = "#logout";
      link.setAttribute("aria-label", `Log out ${session.name}`);
      link.classList.remove("active");
      link.classList.add("is-logout");
      if (link.dataset.logoutBound === "true") return;
      link.dataset.logoutBound = "true";
      link.addEventListener("click", (event) => {
        if (link.getAttribute("href") !== "#logout") return;
        event.preventDefault();
        clearSession();
        window.location.href = "login.html?loggedOut=1";
      });
    });

    document.querySelectorAll("[data-auth-name]").forEach((element) => {
      element.textContent = session?.name?.split(/\s+/)[0] || "";
      element.hidden = !session;
    });

    document.querySelectorAll("[data-auth-guest]").forEach((element) => {
      element.hidden = Boolean(session);
    });
  };

  window.ThyoharAuth = {
    clearSession,
    getAccount,
    getSession,
    hashPassword,
    normalizeEmail,
    saveAccount,
    saveSession,
    updateNavigation
  };

  updateNavigation();
})();

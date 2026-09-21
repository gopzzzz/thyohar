document.documentElement.classList.add("js");

(() => {
  "use strict";

  const body = document.body;
  const header = document.getElementById("siteHeader");
  const menuToggle = document.getElementById("menuToggle");
  const primaryNav = document.getElementById("primaryNav");
  const navLinks = [...document.querySelectorAll(".nav-link")];
  const filterButtons = [...document.querySelectorAll(".filter-button")];
  const providerCards = [...document.querySelectorAll(".provider-card")];
  const providerGrid = document.getElementById("providerGrid");
  const providerEmpty = document.getElementById("providerEmpty");
  const serviceSelect = document.getElementById("serviceSelect");
  const citySelect = document.getElementById("citySelect");
  const eventDate = document.getElementById("eventDate");
  const finderForm = document.getElementById("finderForm");
  const contactForm = document.getElementById("contactForm");
  const contactEvent = document.getElementById("contactEvent");
  const toast = document.getElementById("toast");
  const toastMessage = document.getElementById("toastMessage");
  const storyTrack = document.getElementById("storyTrack");
  const storyPrev = document.getElementById("storyPrev");
  const storyNext = document.getElementById("storyNext");
  const plannerSearch = document.getElementById("plannerSearch");
  const plannerCards = [...document.querySelectorAll(".planner-card")];
  const plannerResultCount = document.getElementById("plannerResultCount");
  const plannerEmpty = document.getElementById("plannerEmpty");
  const clearPlannerSearch = document.getElementById("clearPlannerSearch");
  let toastTimer;
  let activeProvider = null;

  const serviceLabels = {
    all: "all services",
    photography: "photography and film",
    decoration: "decoration and stage setup",
    catering: "catering",
    beauty: "makeup and beauty",
    fashion: "bridal and groom wear"
  };

  const providers = {
    aakriti: {
      name: "Aakriti Frames",
      category: "Photography & Film",
      location: "Jaipur · Travels nationwide",
      rating: "4.9",
      reviews: "(186 reviews)",
      image: "assets/profile-arjun.jpg",
      price: "₹35,000",
      experience: "9 years",
      events: "420+",
      response: "Under 3 hours",
      description: "Led by Arjun Mehta, Aakriti Frames is a close-knit team of photographers and filmmakers known for honest emotion, rich colour, and films that move at the rhythm of the celebration.",
      services: ["Candid photography", "Traditional photography", "Cinematic wedding film", "Drone coverage", "Pre-wedding sessions", "Fine-art albums"],
      quote: "They noticed every little moment without ever making us feel watched. Our film feels like being there all over again.",
      quoteAuthor: "— Kavya & Rohit, Jaipur"
    },
    gulmohar: {
      name: "Gulmohar Gatherings",
      category: "Décor & Styling",
      location: "Delhi NCR",
      rating: "4.8",
      reviews: "(143 reviews)",
      image: "assets/profile-aanya.jpg",
      price: "₹45,000",
      experience: "7 years",
      events: "310+",
      response: "Under 2 hours",
      description: "Gulmohar Gatherings creates expressive celebration spaces with fresh florals, clever lighting, and handcrafted details. Founder Aanya Kapoor begins every design with the people and story at its heart.",
      services: ["Moodboard & concept", "Floral styling", "Stage & mandap", "Entrance décor", "Ambient lighting", "On-site setup"],
      quote: "Aanya turned three reference pictures into something more personal and beautiful than we had imagined.",
      quoteAuthor: "— Naina S., New Delhi"
    },
    saffron: {
      name: "Saffron & Sage",
      category: "Catering & Menus",
      location: "Mumbai · Pune",
      rating: "4.9",
      reviews: "(210 reviews)",
      image: "assets/profile-kabir.jpg",
      price: "₹850 / plate",
      experience: "12 years",
      events: "680+",
      response: "Under 4 hours",
      description: "Saffron & Sage pairs regional Indian flavours with contemporary service. Kabir Khanna and his team build generous, guest-friendly menus around seasonality, dietary needs, and family favourites.",
      services: ["Custom menu tasting", "Regional cuisines", "Live food counters", "Jain & vegan menus", "Dessert studio", "Service staff"],
      quote: "Guests still talk about the live chaat bar and the tiny saffron cheesecakes. Service was warm and seamless.",
      quoteAuthor: "— The Shah family, Mumbai"
    },
    noor: {
      name: "Noor Artistry",
      category: "Makeup & Beauty",
      location: "Lucknow · Delhi",
      rating: "4.9",
      reviews: "(127 reviews)",
      image: "assets/profile-riya.jpg",
      price: "₹18,000",
      experience: "8 years",
      events: "350+",
      response: "Under 2 hours",
      description: "Riya Bansal’s skin-first approach is designed to look luminous up close and effortless on camera. Noor Artistry is known for calm prep rooms, considered trials, and timeless bridal looks.",
      services: ["Bridal makeup", "Engagement look", "Hair styling", "Draping", "Family packages", "Makeup trial"],
      quote: "I looked like myself on my best day. Riya was calm, kind, and somehow got everyone ready ahead of time.",
      quoteAuthor: "— Ira M., Lucknow"
    },
    vastram: {
      name: "Vastram Atelier",
      category: "Bridal & Groom Wear",
      location: "Bengaluru · Online consultations",
      rating: "4.7",
      reviews: "(98 reviews)",
      image: "assets/profile-meera.jpg",
      price: "₹28,000",
      experience: "6 years",
      events: "240+",
      response: "Within a day",
      description: "Vastram Atelier blends modern silhouettes with Indian handwork for brides, grooms, and their families. Meera Iyer’s team offers collaborative fittings in studio and guided consultations online.",
      services: ["Custom bridal wear", "Groom styling", "Family ensembles", "Virtual consultation", "Alterations", "Accessories"],
      quote: "They made outfits for both families feel connected without looking matched. Every fitting was thoughtful and easy.",
      quoteAuthor: "— Sanjana & Aditya, Bengaluru"
    }
  };

  const showToast = (message) => {
    window.clearTimeout(toastTimer);
    toastMessage.textContent = message;
    toast.classList.add("show");
    toastTimer = window.setTimeout(() => toast.classList.remove("show"), 3600);
  };

  const closeMenu = () => {
    menuToggle.setAttribute("aria-expanded", "false");
    menuToggle.setAttribute("aria-label", "Open navigation menu");
    primaryNav.classList.remove("open");
    body.classList.remove("menu-open");
  };

  menuToggle.addEventListener("click", () => {
    const open = menuToggle.getAttribute("aria-expanded") === "true";
    menuToggle.setAttribute("aria-expanded", String(!open));
    menuToggle.setAttribute("aria-label", open ? "Open navigation menu" : "Close navigation menu");
    primaryNav.classList.toggle("open", !open);
    body.classList.toggle("menu-open", !open);
  });

  navLinks.forEach((link) => link.addEventListener("click", closeMenu));

  window.addEventListener("resize", () => {
    if (window.innerWidth > 900) closeMenu();
  });

  window.addEventListener("scroll", () => {
    header.classList.toggle("scrolled", window.scrollY > 18);
  }, { passive: true });

  const sectionObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (!entry.isIntersecting) return;
      navLinks.forEach((link) => {
        link.classList.toggle("active", link.getAttribute("href") === `#${entry.target.id}`);
      });
    });
  }, { rootMargin: "-35% 0px -55% 0px", threshold: 0 });

  ["home", "about", "contact"].forEach((id) => {
    const section = document.getElementById(id);
    if (section) sectionObserver.observe(section);
  });

  const revealItems = [...document.querySelectorAll("[data-reveal]")];
  const revealObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
      if (!entry.isIntersecting) return;
      entry.target.classList.add("is-visible");
      observer.unobserve(entry.target);
    });
  }, { rootMargin: "0px 0px -70px", threshold: 0.08 });

  revealItems.forEach((item, index) => {
    item.style.transitionDelay = `${Math.min(index % 3, 2) * 70}ms`;
    revealObserver.observe(item);
  });

  const setFilter = (filter, announce = false) => {
    let visibleCount = 0;

    filterButtons.forEach((button) => {
      const selected = button.dataset.filter === filter;
      button.classList.toggle("active", selected);
      button.setAttribute("aria-pressed", String(selected));
    });

    providerCards.forEach((card) => {
      const visible = filter === "all" || card.dataset.category === filter;
      card.classList.toggle("is-hidden", !visible);
      if (visible) visibleCount += 1;
    });

    providerEmpty.hidden = visibleCount !== 0;
    if (serviceSelect) serviceSelect.value = filter;
    if (announce) showToast(`Showing ${serviceLabels[filter]} professionals.`);
  };

  filterButtons.forEach((button) => {
    button.addEventListener("click", () => setFilter(button.dataset.filter, false));
  });

  document.querySelectorAll(".service-card").forEach((card) => {
    card.addEventListener("click", () => {
      const filter = card.dataset.service;
      window.location.href = `planners.html?service=${encodeURIComponent(filter)}`;
    });
  });

  document.querySelectorAll("[data-footer-service]").forEach((link) => {
    link.addEventListener("click", (event) => {
      event.preventDefault();
      setFilter(link.dataset.footerService, true);
      document.getElementById("providers").scrollIntoView({ behavior: "smooth", block: "start" });
    });
  });

  const localToday = new Date();
  localToday.setMinutes(localToday.getMinutes() - localToday.getTimezoneOffset());
  eventDate.min = localToday.toISOString().split("T")[0];

  finderForm.addEventListener("submit", (event) => {
    event.preventDefault();
    const searchParams = new URLSearchParams();
    if (serviceSelect.value && serviceSelect.value !== "all") searchParams.set("service", serviceSelect.value);
    if (citySelect.value) searchParams.set("city", citySelect.value);
    if (eventDate.value) searchParams.set("date", eventDate.value);
    const query = searchParams.toString();
    window.location.href = `planners.html${query ? `?${query}` : ""}`;
  });

  const filterPlanners = () => {
    const query = plannerSearch.value.trim().toLocaleLowerCase();
    let visibleCount = 0;

    plannerCards.forEach((card) => {
      const matches = !query || card.dataset.search.toLocaleLowerCase().includes(query);
      card.classList.toggle("is-hidden", !matches);
      if (matches) visibleCount += 1;
    });

    plannerResultCount.innerHTML = `<strong>${visibleCount}</strong> ${visibleCount === 1 ? "verified planner" : "verified planners"}`;
    plannerEmpty.hidden = visibleCount !== 0;
  };

  plannerSearch.addEventListener("input", filterPlanners);
  clearPlannerSearch.addEventListener("click", () => {
    plannerSearch.value = "";
    filterPlanners();
    plannerSearch.focus();
  });

  document.querySelectorAll(".favourite").forEach((button) => {
    button.addEventListener("click", () => {
      const saved = button.getAttribute("aria-pressed") === "true";
      button.setAttribute("aria-pressed", String(!saved));
      const company = button.getAttribute("aria-label").replace("Save ", "");
      button.setAttribute("aria-label", `${saved ? "Save" : "Remove"} ${company}${saved ? "" : " from saved"}`);
      showToast(saved ? "Removed from your shortlist." : "Added to your shortlist.");
    });
  });

  const modal = document.getElementById("providerModal");
  const modalClose = document.getElementById("modalClose");
  const modalEnquire = document.getElementById("modalEnquire");
  const modalFields = {
    image: document.getElementById("modalImage"),
    category: document.getElementById("modalCategory"),
    name: document.getElementById("modalProviderName"),
    location: document.getElementById("modalLocation"),
    rating: document.getElementById("modalRating"),
    reviews: document.getElementById("modalReviews"),
    description: document.getElementById("modalDescription"),
    experience: document.getElementById("modalExperience"),
    events: document.getElementById("modalEvents"),
    response: document.getElementById("modalResponse"),
    services: document.getElementById("modalServices"),
    quote: document.getElementById("modalQuote"),
    quoteAuthor: document.getElementById("modalQuoteAuthor"),
    price: document.getElementById("modalPrice")
  };

  const openProvider = (providerId) => {
    const provider = providers[providerId];
    if (!provider) return;
    activeProvider = provider;

    modalFields.image.src = provider.image;
    modalFields.image.alt = `${provider.name} profile`;
    modalFields.category.textContent = provider.category;
    modalFields.name.textContent = provider.name;
    modalFields.location.textContent = provider.location;
    modalFields.rating.textContent = provider.rating;
    modalFields.reviews.textContent = provider.reviews;
    modalFields.description.textContent = provider.description;
    modalFields.experience.textContent = provider.experience;
    modalFields.events.textContent = provider.events;
    modalFields.response.textContent = provider.response;
    modalFields.quote.textContent = provider.quote;
    modalFields.quoteAuthor.textContent = provider.quoteAuthor;
    modalFields.price.textContent = provider.price;
    modalFields.services.replaceChildren(...provider.services.map((service) => {
      const item = document.createElement("li");
      item.textContent = service;
      return item;
    }));

    if (typeof modal.showModal === "function") {
      modal.showModal();
    } else {
      modal.setAttribute("open", "");
    }
    body.style.overflow = "hidden";
  };

  document.querySelectorAll(".provider-details").forEach((button) => {
    button.addEventListener("click", () => openProvider(button.dataset.provider));
  });

  const closeProvider = () => {
    if (typeof modal.close === "function") modal.close();
    else modal.removeAttribute("open");
    body.style.overflow = "";
  };

  modalClose.addEventListener("click", closeProvider);
  modal.addEventListener("cancel", () => {
    body.style.overflow = "";
  });
  modal.addEventListener("click", (event) => {
    if (event.target === modal) closeProvider();
  });

  modalEnquire.addEventListener("click", () => {
    const providerName = activeProvider?.name || "this professional";
    closeProvider();
    const message = contactForm.elements.message;
    message.value = `I’m interested in receiving a proposal from ${providerName}. `;
    document.getElementById("contact").scrollIntoView({ behavior: "smooth", block: "start" });
    window.setTimeout(() => message.focus({ preventScroll: true }), 650);
  });

  const scrollStories = (direction) => {
    const card = storyTrack.querySelector(".story-card");
    const gap = 20;
    storyTrack.scrollBy({ left: direction * (card.offsetWidth + gap), behavior: "smooth" });
  };

  storyPrev.addEventListener("click", () => scrollStories(-1));
  storyNext.addEventListener("click", () => scrollStories(1));

  contactForm.addEventListener("submit", (event) => {
    event.preventDefault();
    const name = contactForm.elements.name.value.trim().split(" ")[0] || "there";
    const submitButton = contactForm.querySelector("button[type='submit']");
    const originalContent = submitButton.innerHTML;
    submitButton.disabled = true;
    submitButton.textContent = "Sending…";

    window.setTimeout(() => {
      contactForm.reset();
      submitButton.disabled = false;
      submitButton.innerHTML = originalContent;
      showToast(`Thank you, ${name}! Your enquiry is ready for our celebration concierge.`);
    }, 650);
  });

  document.querySelectorAll('.footer__bottom a[href="#"]').forEach((link) => {
    link.addEventListener("click", (event) => {
      event.preventDefault();
      showToast("This policy page can be connected when the site goes live.");
    });
  });

  try {
    const plannerInquiry = sessionStorage.getItem("thyoharPlannerInquiry");
    if (plannerInquiry) {
      contactForm.elements.message.value = `I’m interested in checking ${plannerInquiry}’s availability for my celebration. `;
      sessionStorage.removeItem("thyoharPlannerInquiry");
    }
  } catch (error) {
    // The page remains fully usable when browser privacy settings disable storage.
  }

  document.getElementById("currentYear").textContent = new Date().getFullYear();
})();

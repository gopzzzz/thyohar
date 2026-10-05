(() => {
  "use strict";

  const catalog = window.ThyoharCatalog;
  const params = new URLSearchParams(window.location.search);
  let storedSelection = null;

  try {
    storedSelection = JSON.parse(sessionStorage.getItem("thyoharSelectedPackage") || "null");
  } catch (error) {
    storedSelection = null;
  }

  const plannerSlug = params.get("planner") || storedSelection?.planner?.slug;
  const packageId = params.get("package") || storedSelection?.package?.id;
  const catalogPlanner = catalog?.getPlanner(plannerSlug);
  const catalogPackage = catalog?.getPackages(catalogPlanner).find((item) => item.id === packageId);

  const selection = catalogPlanner && catalogPackage ? {
    planner: {
      slug: catalogPlanner.slug,
      name: catalogPlanner.name,
      studio: catalogPlanner.studio,
      category: catalogPlanner.category,
      location: catalogPlanner.location,
      profile: catalogPlanner.profile
    },
    package: catalogPackage
  } : storedSelection;

  const bookingExperience = document.getElementById("bookingExperience");
  const selectionMissing = document.getElementById("selectionMissing");
  const bookingForm = document.getElementById("bookingForm");

  if (!selection?.planner?.name || !selection?.package?.name) {
    bookingExperience.hidden = true;
    selectionMissing.hidden = false;
    return;
  }

  const setText = (id, value) => {
    const element = document.getElementById(id);
    if (element) element.textContent = value;
  };

  const formatCurrency = catalog?.formatCurrency || ((value) => `₹${Number(value).toLocaleString("en-IN")}`);
  const plannerImage = document.getElementById("bookingPlannerImage");
  plannerImage.src = selection.planner.profile;
  plannerImage.alt = selection.planner.name;
  setText("bookingPlannerName", selection.planner.name);
  setText("bookingPlannerStudio", selection.planner.studio);
  setText("bookingPlannerLocation", selection.planner.location);
  setText("bookingPackageName", selection.package.name);
  setText("bookingPackageBadge", selection.package.featured ? "Most popular" : "Selected");
  setText("bookingOriginalPrice", formatCurrency(selection.package.originalPrice));
  setText("bookingOfferPrice", formatCurrency(selection.package.offerPrice));
  document.title = `Book ${selection.package.name} with ${selection.planner.name} — Thyohar`;

  const backToPlanner = document.getElementById("backToPlanner");
  backToPlanner.href = `planner-details.html?planner=${encodeURIComponent(selection.planner.slug)}#packages`;

  const featureList = document.getElementById("bookingFeatureList");
  featureList.replaceChildren(...selection.package.features.map((feature) => {
    const item = document.createElement("li");
    const check = document.createElement("span");
    check.setAttribute("aria-hidden", "true");
    check.textContent = "✓";
    item.append(check, feature);
    return item;
  }));

  try {
    sessionStorage.setItem("thyoharSelectedPackage", JSON.stringify(selection));
  } catch (error) {
    // The form remains usable when browser storage is unavailable.
  }

  const makeReference = () => {
    const date = new Date();
    const datePart = `${String(date.getFullYear()).slice(-2)}${String(date.getMonth() + 1).padStart(2, "0")}${String(date.getDate()).padStart(2, "0")}`;
    const randomPart = Math.random().toString(36).slice(2, 6).toUpperCase();
    return `THY-${datePart}-${randomPart}`;
  };

  bookingForm.addEventListener("submit", (event) => {
    event.preventDefault();
    if (!bookingForm.reportValidity()) return;

    const submitButton = bookingForm.querySelector("button[type='submit']");
    submitButton.disabled = true;
    submitButton.textContent = "Sending booking request…";

    const booking = {
      reference: makeReference(),
      submittedAt: new Date().toISOString(),
      planner: selection.planner,
      package: selection.package,
      customer: {
        name: bookingForm.elements.customerName.value.trim(),
        address: bookingForm.elements.address.value.trim(),
        state: bookingForm.elements.state.value.trim(),
        district: bookingForm.elements.district.value.trim(),
        pincode: bookingForm.elements.pincode.value.trim()
      }
    };

    try {
      sessionStorage.setItem("thyoharLastBooking", JSON.stringify(booking));
      sessionStorage.removeItem("thyoharSelectedPackage");
    } catch (error) {
      // The success page still opens even when browser storage is unavailable.
    }

    window.setTimeout(() => {
      window.location.href = `booking-success.html?reference=${encodeURIComponent(booking.reference)}`;
    }, 600);
  });
})();

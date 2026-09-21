(() => {
  "use strict";

  let booking = null;
  try {
    booking = JSON.parse(sessionStorage.getItem("thyoharLastBooking") || "null");
  } catch (error) {
    booking = null;
  }

  const referenceFromUrl = new URLSearchParams(window.location.search).get("reference");
  const reference = booking?.reference || referenceFromUrl || "THY-PENDING";
  document.getElementById("successReference").textContent = reference;

  if (!booking) return;

  const firstName = booking.customer?.name?.trim().split(/\s+/)[0];
  if (firstName) {
    document.getElementById("successGreeting").textContent = `Thank you, ${firstName}. Your planner now has the details needed to review your request.`;
  }

  const plannerImage = document.getElementById("successPlannerImage");
  plannerImage.src = booking.planner.profile;
  plannerImage.alt = booking.planner.name;
  document.getElementById("successPlannerName").textContent = booking.planner.name;
  document.getElementById("successPlannerStudio").textContent = booking.planner.studio;
  document.getElementById("successPackageName").textContent = booking.package.name;
  document.getElementById("successPackagePrice").textContent = window.ThyoharCatalog?.formatCurrency(booking.package.offerPrice) || `₹${Number(booking.package.offerPrice).toLocaleString("en-IN")}`;
})();

(() => {
  "use strict";

  const catalog = window.ThyoharCatalog;
  if (!catalog) return;

  const grid = document.getElementById("plannerGrid");
  const search = document.getElementById("plannerSearch");
  const resultCount = document.getElementById("plannerResultCount");
  const emptyState = document.getElementById("plannerEmpty");
  const clearButton = document.getElementById("clearPlannerSearch");
  const typeButtons = [...document.querySelectorAll("[data-type]")];
  const context = document.getElementById("plannerContext");
  const contextText = document.getElementById("plannerContextText");
  const params = new URLSearchParams(window.location.search);
  let activeType = "all";

  const serviceLabels = {
    photography: "photography and film",
    decoration: "décor and stage styling",
    catering: "catering and menu planning",
    beauty: "makeup and beauty coordination",
    fashion: "bridal and groom styling"
  };

  const makeCard = (planner) => {
    const article = document.createElement("article");
    article.className = "planner-card";
    article.dataset.type = planner.type;
    article.dataset.search = [planner.name, planner.studio, planner.location, planner.category, planner.bio, ...planner.tags].join(" ").toLocaleLowerCase();
    article.setAttribute("data-reveal", "");
   article.innerHTML = `
    <div class="planner-card__cover">
        <img src="${planner.banner}" alt="${planner.bannerAlt}" width="1000" height="667" loading="lazy">
        <span>${planner.category}</span>
    </div>

    <div class="planner-card__content">
        <div class="planner-card__identity">
            <img src="${planner.profile}" alt="${planner.name}" width="700" height="700" loading="lazy">

            <div>
                <h3>${planner.name}</h3>
                <p>${planner.studio} · ${planner.location}</p>
            </div>
        </div>

        <div class="planner-card__rating">
            <span role="img" aria-label="${planner.rating} out of 5 stars">★★★★★</span>
            <strong>${planner.rating}</strong>
            <small>${planner.reviews} reviews</small>
        </div>

        <p class="planner-card__bio">${planner.bio}</p>

        <div class="planner-card__tags">
            ${planner.tags.map(tag => `<span>${tag}</span>`).join("")}
        </div>

        <div class="planner-card__footer">
            <span>${planner.experience}</span>

            <a href="${plannerDetailsUrl}?planner=${encodeURIComponent(planner.slug)}">
                More Details <b aria-hidden="true">→</b>
            </a>
        </div>
    </div>
`;

return article;
  };

  const cards = catalog.planners.map(makeCard);
  grid.replaceChildren(...cards);

  const updateResults = () => {
    const query = search.value.trim().toLocaleLowerCase();
    let visibleCount = 0;

    cards.forEach((card) => {
      const matchesText = !query || card.dataset.search.includes(query);
      const matchesType = activeType === "all" || card.dataset.type === activeType;
      const visible = matchesText && matchesType;
      card.classList.toggle("is-hidden", !visible);
      if (visible) visibleCount += 1;
    });

    resultCount.innerHTML = `<strong>${visibleCount}</strong> ${visibleCount === 1 ? "verified planner" : "verified planners"}`;
    emptyState.hidden = visibleCount !== 0;
  };

  typeButtons.forEach((button) => {
    button.addEventListener("click", () => {
      activeType = button.dataset.type;
      typeButtons.forEach((item) => {
        const selected = item === button;
        item.classList.toggle("active", selected);
        item.setAttribute("aria-pressed", String(selected));
      });
      updateResults();
    });
  });

  search.addEventListener("input", updateResults);
  clearButton.addEventListener("click", () => {
    search.value = "";
    activeType = "all";
    typeButtons.forEach((button) => {
      const selected = button.dataset.type === "all";
      button.classList.toggle("active", selected);
      button.setAttribute("aria-pressed", String(selected));
    });
    updateResults();
    search.focus();
  });

  const city = params.get("city");
  const service = params.get("service");
  const eventDate = params.get("date");
  const contextParts = [];

  if (city) {
    search.value = city;
    contextParts.push(`near ${city}`);
  }
  if (service && serviceLabels[service]) contextParts.push(`with ${serviceLabels[service]} expertise`);
  if (eventDate) {
    const parsedDate = new Date(`${eventDate}T00:00:00`);
    if (!Number.isNaN(parsedDate.getTime())) {
      contextParts.push(`for ${parsedDate.toLocaleDateString("en-IN", { day: "numeric", month: "long", year: "numeric" })}`);
    }
  }

  if (contextParts.length) {
    context.hidden = false;
    contextText.textContent = `Showing planners ${contextParts.join(" ")}.`;
  }

  updateResults();
})();

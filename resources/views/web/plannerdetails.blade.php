@extends('layouts.weblayout')

@section('content')
 <main id="plannerContent">
    <section class="detail-hero" aria-labelledby="plannerName">
      <img id="plannerBanner" class="detail-hero__image" src="assets/service-decoration.jpg" alt="Celebration planned by the selected event planner" width="1920" height="900">
      <div class="detail-hero__overlay" aria-hidden="true"></div>
      <div class="container detail-hero__inner">
        <nav class="breadcrumbs" aria-label="Breadcrumb">
          <a href="index.html">Home</a><span aria-hidden="true">/</span><a href="planners.html">Planners List</a><span aria-hidden="true">/</span><span id="breadcrumbName">Planner Profile</span>
        </nav>

        <div class="detail-hero__content">
          <p class="detail-category" id="plannerCategory">Wedding Planner</p>
          <h1 id="plannerName">Event Planner</h1>
          <p class="detail-studio" id="plannerStudio">Thyohar verified professional</p>
          <div class="detail-hero__meta">
            <span>
              <svg aria-hidden="true" viewBox="0 0 20 20"><path d="M10 18s6-5.2 6-10a6 6 0 1 0-12 0c0 4.8 6 10 6 10Z"/><circle cx="10" cy="8" r="2"/></svg>
              <b id="plannerLocation">India</b>
            </span>
            <span class="detail-rating"><i role="img" aria-label="Five stars">★★★★★</i><strong id="plannerRating">5.0</strong><b id="plannerReviewCount">Customer reviews</b></span>
          </div>
        </div>

        <div class="detail-hero__portrait">
          <img id="plannerPortrait" src="assets/profile-aanya.jpg" alt="Selected event planner" width="700" height="700">
          <span><i aria-hidden="true">✓</i> Thyohar verified</span>
        </div>
      </div>
    </section>

    <section class="detail-content">
      <div class="container detail-layout">
        <div class="detail-main">
          <article class="detail-panel detail-about">
            <p class="detail-eyebrow">About the planner</p>
            <h2>Celebrations designed with <em>heart and intention.</em></h2>
            <div id="plannerBio">
              <p>Kabir Khanna plans celebrations around the moments people share at the table. With a background in hospitality, he brings restaurant-level attention to menu design, service choreography, and the rhythm of an event from welcome drinks to the last dessert.

Saffron Soirées is a natural fit for hosts who care deeply about food and guest comfort. Kabir’s team manages the full celebration while giving tastings, kitchen logistics, dietary needs, and service staffing unusual care.</p>
            </div>
          </article>

          <article class="detail-panel detail-services">
            <div class="detail-panel__heading">
              <div><p class="detail-eyebrow">What they do</p><h2>Services offered</h2></div>
              <span id="serviceCount">6 services</span>
            </div>
            <div class="detail-services__grid" id="plannerServices">
                <div class="detail-service">
    <span class="detail-service__number">02</span>

    <div>
        <h3>Menu curation</h3>
        <p>Tastings, regional menus, dietary planning, and presentation.</p>
    </div>
</div>
<div class="detail-service">
    <span class="detail-service__number">02</span>

    <div>
        <h3>Menu curation</h3>
        <p>Tastings, regional menus, dietary planning, and presentation.</p>
    </div>
</div>
<div class="detail-service">
    <span class="detail-service__number">02</span>

    <div>
        <h3>Menu curation</h3>
        <p>Tastings, regional menus, dietary planning, and presentation.</p>
    </div>
</div>
<div class="detail-service">
    <span class="detail-service__number">02</span>

    <div>
        <h3>Menu curation</h3>
        <p>Tastings, regional menus, dietary planning, and presentation.</p>
    </div>
</div>
            </div>
          </article>

          <article class="detail-panel detail-packages" id="packages">
            <div class="detail-panel__heading">
              <div><p class="detail-eyebrow">Choose your experience</p><h2>Our Packages</h2></div>
              <span>Transparent pricing</span>
            </div>
            <p class="detail-packages__intro">Select the level of support that fits your celebration. You can review your choice before continuing to the booking form.</p>
            <div class="package-selection-layout">
              <div class="package-cards" id="plannerPackages" aria-label="Available planning packages">
<div class="planner-packages" id="plannerPackages">
    <article class="package-card" data-package-id="essential">
        <p class="package-card__name-label">Package Name</p>

        <h3>Essential Planning</h3>

        <p class="package-card__summary">
            For one beautifully managed event
        </p>

        <div class="package-card__features">
            <p>Features</p>

            <ul>
                <li>
                    <span aria-hidden="true">✓</span>
                    Full event planning
                </li>

                <li>
                    <span aria-hidden="true">✓</span>
                    Menu curation
                </li>

                <li>
                    <span aria-hidden="true">✓</span>
                    Guest hospitality
                </li>

                <li>
                    <span aria-hidden="true">✓</span>
                    Vendor coordination
                </li>
            </ul>
        </div>

        <div class="package-card__pricing">
            <p>
                <small>Original Price</small>
                <del>₹4,65,000</del>
            </p>

            <p>
                <small>Offer Price</small>
                <strong>₹4,00,000</strong>
            </p>
        </div>

        <button
            class="button button--outline button--full package-select"
            type="button"
            aria-pressed="false"
        >
            Select Package
            <span aria-hidden="true">→</span>
        </button>
    </article>

    
</div>

<div class="planner-packages" id="plannerPackages">
    <article class="package-card" data-package-id="essential">
        <p class="package-card__name-label">Package Name</p>

        <h3>Essential Planning</h3>

        <p class="package-card__summary">
            For one beautifully managed event
        </p>

        <div class="package-card__features">
            <p>Features</p>

            <ul>
                <li>
                    <span aria-hidden="true">✓</span>
                    Full event planning
                </li>

                <li>
                    <span aria-hidden="true">✓</span>
                    Menu curation
                </li>

                <li>
                    <span aria-hidden="true">✓</span>
                    Guest hospitality
                </li>

                <li>
                    <span aria-hidden="true">✓</span>
                    Vendor coordination
                </li>
            </ul>
        </div>

        <div class="package-card__pricing">
            <p>
                <small>Original Price</small>
                <del>₹4,65,000</del>
            </p>

            <p>
                <small>Offer Price</small>
                <strong>₹4,00,000</strong>
            </p>
        </div>

        <button
            class="button button--outline button--full package-select"
            type="button"
            aria-pressed="false"
        >
            Select Package
            <span aria-hidden="true">→</span>
        </button>
    </article>
</div>

              </div>
              <aside class="selected-package-preview" id="selectedPackagePreview" aria-live="polite" aria-label="Selected package preview">
                <div class="selected-package-preview__empty">
                  <span aria-hidden="true">✦</span>
                  <h3>Select a package</h3>
                  <p>Your chosen planner and package details will appear here.</p>
                </div>
              </aside>
            </div>
          </article>

          <article class="detail-panel detail-gallery-section">
            <div class="detail-panel__heading">
              <div><p class="detail-eyebrow">A glimpse of the magic</p><h2>Gallery</h2></div>
              <span>Recent celebrations</span>
            </div>
            <div class="detail-gallery" id="plannerGallery" aria-label="Planner celebration gallery">
                <figure class="gallery-item gallery-item--1">
    <button type="button" aria-label="Open image: Saffron Soirées signature celebration">
        <img
            src="web/assets/service-catering.jpg"
            alt="Saffron Soirées signature celebration"
            width="1000"
            height="667"
            loading="lazy"
        >

        <span>Saffron Soirées signature celebration</span>
    </button>
</figure>
 <figure class="gallery-item gallery-item--2">
    <button type="button" aria-label="Open image: Saffron Soirées signature celebration">
        <img
            src="web/assets/story-engagement.jpg"
            alt="Saffron Soirées signature celebration"
            width="1000"
            height="667"
            loading="lazy"
        >

        <span>Saffron Soirées signature celebration</span>
    </button>
</figure>
 <figure class="gallery-item gallery-item--3">
    <button type="button" aria-label="Open image: Saffron Soirées signature celebration">
        <img
            src="web/assets/story-garden.jpg"
            alt="Saffron Soirées signature celebration"
            width="1000"
            height="667"
            loading="lazy"
        >

        <span>Saffron Soirées signature celebration</span>
    </button>
</figure>
            </div>
          </article>

          <article class="detail-panel detail-reviews">
            <div class="detail-panel__heading">
              <div><p class="detail-eyebrow">Real experiences</p><h2>Customer reviews</h2></div>
              <span id="reviewsSummary">Verified reviews</span>
            </div>

            <div class="rating-overview">
              <div class="rating-overview__score">
                <strong id="largeRating">5.0</strong>
                <span role="img" aria-label="Five stars">★★★★★</span>
                <p id="largeReviewCount">Based on customer reviews</p>
              </div>
              <div class="rating-bars" id="ratingBars" role="group" aria-label="Rating distribution">
                <div class="rating-bars" id="ratingBars" role="group" aria-label="Rating distribution">

    <div class="rating-bar" aria-label="5 stars: 93 percent">
        <span>5 star</span>

        <span class="rating-bar__track">
            <span class="rating-bar__fill" style="width: 93%;"></span>
        </span>

        <b>93%</b>
    </div>

</div>
<div class="rating-bars" id="ratingBars" role="group" aria-label="Rating distribution">

    <div class="rating-bar" aria-label="5 stars: 93 percent">
        <span>4 star</span>

        <span class="rating-bar__track">
            <span class="rating-bar__fill" style="width: 45%;"></span>
        </span>

        <b>45%</b>
    </div>

</div>
<div class="rating-bars" id="ratingBars" role="group" aria-label="Rating distribution">

    <div class="rating-bar" aria-label="5 stars: 93 percent">
        <span>3 star</span>

        <span class="rating-bar__track">
            <span class="rating-bar__fill" style="width: 23%;"></span>
        </span>

        <b>23%</b>
    </div>

</div>
<div class="rating-bars" id="ratingBars" role="group" aria-label="Rating distribution">

    <div class="rating-bar" aria-label="5 stars: 93 percent">
        <span>2 star</span>

        <span class="rating-bar__track">
            <span class="rating-bar__fill" style="width: 13%;"></span>
        </span>

        <b>3%</b>
    </div>

</div>
<div class="rating-bars" id="ratingBars" role="group" aria-label="Rating distribution">

    <div class="rating-bar" aria-label="5 stars: 93 percent">
        <span>1 star</span>

        <span class="rating-bar__track">
            <span class="rating-bar__fill" style="width: 0%;"></span>
        </span>

        <b>0%</b>
    </div>

</div>
              </div>
            </div>

            <div class="review-list" id="plannerReviews">
                <article class="review-card">
    <div class="review-card__top">
        <div class="reviewer">
            <span class="reviewer__avatar" aria-hidden="true">TS</span>

            <div>
                <strong>The Shah Family</strong>
                <small>Anniversary · Mumbai · March 2026</small>
            </div>
        </div>

        <span
            class="review-card__rating"
            role="img"
            aria-label="5 out of 5 stars"
        >★★★★★</span>
    </div>

    <p>
        “Kabir created a menu that travelled through our parents’ favourite
        cities. It was personal, beautifully served, and talked about for
        weeks.”
    </p>
</article>
<article class="review-card">
    <div class="review-card__top">
        <div class="reviewer">
            <span class="reviewer__avatar" aria-hidden="true">TS</span>

            <div>
                <strong>The Shah Family</strong>
                <small>Anniversary · Mumbai · March 2026</small>
            </div>
        </div>

        <span
            class="review-card__rating"
            role="img"
            aria-label="5 out of 5 stars"
        >★★★★★</span>
    </div>

    <p>
        “Kabir created a menu that travelled through our parents’ favourite
        cities. It was personal, beautifully served, and talked about for
        weeks.”
    </p>
</article>
            </div>
          </article>
        </div>

        <aside class="planner-sidebar" aria-label="Planner summary">
          <div class="sidebar-card sidebar-card--facts">
            <div class="sidebar-card__heading">
              <p>At a glance</p>
              <span>Verified <i aria-hidden="true">✓</i></span>
            </div>
            <dl class="planner-facts">
              <div><dt>Experience</dt><dd id="plannerExperience">—</dd></div>
              <div><dt>Events planned</dt><dd id="plannerEvents">—</dd></div>
              <div><dt>Starting budget</dt><dd id="plannerBudget">—</dd></div>
              <div><dt>Languages</dt><dd id="plannerLanguages">—</dd></div>
              <div><dt>Typical response</dt><dd id="plannerResponse">—</dd></div>
            </dl>
            <a class="button button--primary button--full" id="availabilityButton" href="{{url('book-package')}}">Check availability <span aria-hidden="true">→</span></a>
            <p class="sidebar-card__note"><span></span> Usually responds within the stated time</p>
          </div>

          <div class="sidebar-card sidebar-card--promise">
            <span class="promise-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24"><path d="m8.5 12 2.2 2.2 4.8-5M12 3l7 3v5c0 4.6-3 8.1-7 10-4-1.9-7-5.4-7-10V6l7-3Z"/></svg>
            </span>
            <div><h3>The Thyohar promise</h3><p>Reviewed profiles, genuine feedback, and helpful support through your planning journey.</p></div>
          </div>
        </aside>
      </div>
    </section>

    <section class="detail-cta">
      <div class="container detail-cta__inner">
        <div><p>Found someone you love?</p><h2>Turn your ideas into a celebration.</h2></div>
        <a class="button button--primary" href="index.html#contact">Start a conversation <span aria-hidden="true">→</span></a>
      </div>
    </section>
  </main>

@endsection

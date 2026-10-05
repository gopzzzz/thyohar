@extends('layouts.weblayout')

@section('content')

<main>
    <section class="booking-hero" aria-labelledby="bookingTitle">
      <div class="booking-hero__shape" aria-hidden="true"></div>
      <div class="container">
        <nav class="booking-breadcrumbs" aria-label="Breadcrumb"><a href="index.html">Home</a><span>/</span><a href="planners.html">Planners</a><span>/</span><span>Book package</span></nav>
        <p class="booking-eyebrow">Almost celebration time</p>
        <h1 id="bookingTitle">Book your selected package</h1>
        <p>Review your choice, add your contact details, and send the planner your booking request.</p>
      </div>
    </section>

    <section class="booking-content">
      <div class="container">
        <div class="selection-missing" id="selectionMissing" hidden>
          <span aria-hidden="true">✦</span>
          <h2>No package selected yet</h2>
          <p>Choose a planner and select a package before starting your booking.</p>
          <a class="button button--primary" href="planners.html">Browse planners <span aria-hidden="true">→</span></a>
        </div>

        <div id="bookingExperience">
          <section class="booking-reference" aria-labelledby="selectionTitle">
            <div class="booking-reference__heading">
              <div><p class="booking-eyebrow">Your selection</p><h2 id="selectionTitle">Planner &amp; package details</h2></div>
              <span><i aria-hidden="true">✓</i> Selection saved</span>
            </div>

            <div class="booking-reference__grid">
              <div class="booking-planner-summary">
                <img id="bookingPlannerImage" src="assets/profile-aanya.jpg" alt="Selected planner" width="180" height="180">
                <div>
                  <small>Selected planner</small>
                  <h3 id="bookingPlannerName">Event Planner</h3>
                  <p id="bookingPlannerStudio">Thyohar verified professional</p>
                  <span id="bookingPlannerLocation">India</span>
                </div>
              </div>

              <div class="booking-package-summary">
                <div class="booking-package-summary__title">
                  <div><small>Selected package</small><h3 id="bookingPackageName">Planning Package</h3></div>
                  <span id="bookingPackageBadge">Package</span>
                </div>
                <ul id="bookingFeatureList"></ul>
                <div class="booking-package-price">
                  <span><small>Original Price</small><del id="bookingOriginalPrice">—</del></span>
                  <span><small>Offer Price</small><strong id="bookingOfferPrice">—</strong></span>
                </div>
              </div>
            </div>
          </section>

          <div class="booking-form-layout">
            <section class="booking-form-card" aria-labelledby="detailsTitle">
              <div class="booking-form-card__heading">
                <span>2</span>
                <div><p class="booking-eyebrow">Customer details</p><h2 id="detailsTitle">Where can the planner reach you?</h2></div>
              </div>

              <form class="booking-form" id="bookingForm" action="{{url('booking-success')}}">
                <label class="booking-field booking-field--full">
                  <span>Customer Name <b aria-hidden="true">*</b></span>
                  <span class="booking-input">
                    <svg aria-hidden="true" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 21a8 8 0 0 1 16 0"/></svg>
                    <input name="customerName" type="text" autocomplete="name" placeholder="Enter your full name" minlength="2" required>
                  </span>
                </label>

                <label class="booking-field booking-field--full">
                  <span>Address <b aria-hidden="true">*</b></span>
                  <span class="booking-input booking-input--textarea">
                    <svg aria-hidden="true" viewBox="0 0 24 24"><path d="M4 21h16M6 18V8l6-5 6 5v10M9 18v-6h6v6"/></svg>
                    <textarea name="address" autocomplete="street-address" placeholder="House number, street, area, or landmark" rows="4" minlength="8" required></textarea>
                  </span>
                </label>

                <label class="booking-field">
                  <span>State <b aria-hidden="true">*</b></span>
                  <span class="booking-input">
                    <svg aria-hidden="true" viewBox="0 0 24 24"><path d="M4 20h16M6 17h12M8 17V9m4 8V9m4 8V9M5 9h14L12 3 5 9Z"/></svg>
                    <input name="state" type="text" autocomplete="address-level1" placeholder="Enter state" minlength="2" required>
                  </span>
                </label>

                <label class="booking-field">
                  <span>District <b aria-hidden="true">*</b></span>
                  <span class="booking-input">
                    <svg aria-hidden="true" viewBox="0 0 24 24"><path d="M12 21s7-6 7-12a7 7 0 1 0-14 0c0 6 7 12 7 12Z"/><circle cx="12" cy="9" r="2.5"/></svg>
                    <input name="district" type="text" autocomplete="address-level2" placeholder="Enter district" minlength="2" required>
                  </span>
                </label>

                <label class="booking-field">
                  <span>Pincode <b aria-hidden="true">*</b></span>
                  <span class="booking-input">
                    <svg aria-hidden="true" viewBox="0 0 24 24"><path d="M5 5h14v14H5zM9 9h6M9 13h6M9 17h3"/></svg>
                    <input name="pincode" type="text" autocomplete="postal-code" inputmode="numeric" placeholder="6-digit pincode" pattern="[1-9][0-9]{5}" maxlength="6" title="Enter a valid 6-digit Indian pincode" required>
                  </span>
                </label>

                <div class="booking-submit booking-field--full">
                  <p><span aria-hidden="true">◆</span> Your details are only used to process this booking request.</p>
                  <button class="button button--primary" type="submit">Book Service <span aria-hidden="true">→</span></button>
                </div>
              </form>
            </section>

            <aside class="booking-help" aria-label="What happens after booking">
              <span class="booking-help__icon" aria-hidden="true">
                <svg viewBox="0 0 24 24"><path d="m8.5 12 2.2 2.2 4.8-5M12 3l7 3v5c0 4.6-3 8.1-7 10-4-1.9-7-5.4-7-10V6l7-3Z"/></svg>
              </span>
              <p class="booking-eyebrow">The Thyohar promise</p>
              <h2>What happens next?</h2>
              <ol>
                <li><span>1</span><div><strong>Request confirmation</strong><p>You’ll receive a booking reference instantly.</p></div></li>
                <li><span>2</span><div><strong>Planner callback</strong><p>The planner can review your request and connect with you.</p></div></li>
                <li><span>3</span><div><strong>Finalise the details</strong><p>Confirm your date, event scope, and payment directly.</p></div></li>
              </ol>
              <p class="booking-help__note">No online payment is collected on this page.</p>
            </aside>
          </div>
        </div>
      </div>
    </section>
  </main>


@endsection
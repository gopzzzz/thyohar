@extends('layouts.weblayout')

@section('content')
 <main class="success-main" id="successContent">
    <div class="success-shape success-shape--one" aria-hidden="true"></div>
    <div class="success-shape success-shape--two" aria-hidden="true"></div>
    <span class="success-confetti success-confetti--one" aria-hidden="true">✦</span>
    <span class="success-confetti success-confetti--two" aria-hidden="true">●</span>
    <span class="success-confetti success-confetti--three" aria-hidden="true">◆</span>

    <section class="success-card" aria-labelledby="successTitle">
      <div class="success-check" aria-hidden="true"><span>✓</span></div>
      <p class="booking-eyebrow">Booking request received</p>
      <h1 id="successTitle">Your celebration is one step closer!</h1>
      <p class="success-intro" id="successGreeting">Thank you. Your planner now has the details needed to review your request.</p>

      <div class="booking-reference-number">
        <span>Booking reference</span>
        <strong id="successReference">THY-PENDING</strong>
      </div>

      <div class="success-summary" id="successSummary">
        <div class="success-planner">
          <img id="successPlannerImage" src="assets/profile-aanya.jpg" alt="Selected planner" width="150" height="150">
          <div><small>Planner</small><strong id="successPlannerName">Thyohar Planner</strong><span id="successPlannerStudio">Verified professional</span></div>
        </div>
        <div><small>Package</small><strong id="successPackageName">Selected package</strong></div>
        <div><small>Offer Price</small><strong id="successPackagePrice">To be confirmed</strong></div>
      </div>

      <div class="success-next">
        <span aria-hidden="true">i</span>
        <p><strong>What’s next?</strong> The planner will review your request and contact you to confirm availability and final event details.</p>
      </div>

      <div class="success-actions">
        <a class="button button--primary" href="planners.html">Explore more planners <span aria-hidden="true">→</span></a>
        <a class="button button--outline" href="index.html">Return home</a>
      </div>
    </section>
  </main>

@endsection
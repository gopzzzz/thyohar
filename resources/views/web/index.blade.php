
@extends('layouts.weblayout')

@section('content')
<main id="main-content">
    <section class="hero" id="home" aria-labelledby="heroTitle">
      <div class="hero__media" aria-hidden="true">
        <img src="{{asset('web/assets/hero-wedding.jpg')}}" alt="" width="1920" height="1280" fetchpriority="high">
      </div>
      <div class="hero__overlay" aria-hidden="true"></div>
      <div class="hero__glow hero__glow--one" aria-hidden="true"></div>
      <div class="hero__glow hero__glow--two" aria-hidden="true"></div>

      <div class="container hero__content">
        <p class="eyebrow eyebrow--light"><span></span> India’s celebration marketplace</p>
        <h1 id="heroTitle">Your moment.<br><em>Beautifully</em> brought to life.</h1>
        <p class="hero__intro">Discover trusted professionals for every detail of your celebration—from the first moodboard to the final dance.</p>

        <div class="hero__actions">
          <a class="button button--primary" href="{{ route('planners') }}">
    Explore services
    <svg aria-hidden="true" viewBox="0 0 20 20">
        <path d="M4 10h11M11 5l5 5-5 5"/>
    </svg>
</a>
          <a class="text-link text-link--light" href="#stories">
            <span class="play-icon" aria-hidden="true">
              <svg viewBox="0 0 20 20"><path d="m8 6 6 4-6 4V6Z"/></svg>
            </span>
            See celebration stories
          </a>
        </div>

        <div class="hero__proof" role="group" aria-label="Customer rating">
          <div class="proof-avatars" aria-hidden="true">
            <img src="{{ asset('web/assets/profile-aanya.jpg') }}"alt="" width="44" height="44">
            <img src="{{ asset('web/assets/profile-kabir.jpg') }}" alt="" width="44" height="44">
            <img src="{{ asset('web/assets/profile-meera.jpg') }}" alt="" width="44" height="44">
          </div>
          <div>
            <div class="stars" role="img" aria-label="4.9 out of 5 stars">★★★★★</div>
            <p><strong>4.9/5</strong> from happy celebrations</p>
          </div>
        </div>
      </div>

      <a class="hero__scroll" href="#quickFind" aria-label="Scroll to event finder">
        <span>Discover</span>
        <svg aria-hidden="true" viewBox="0 0 20 20"><path d="M10 3v13M5 11l5 5 5-5"/></svg>
      </a>
    </section>

    <section class="quick-find" id="quickFind" aria-label="Find event professionals">
      <div class="container">
        <form class="finder" id="finderForm">
          <div class="finder__heading">
            <span class="finder__icon" aria-hidden="true">
              <svg viewBox="0 0 24 24"><path d="M7 3v3M17 3v3M4 9h16M5 5h14a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z"/></svg>
            </span>
            <span><small>Start here</small>Find your perfect team</span>
          </div>

          <label class="finder__field">
            <span>Service</span>
            <select id="serviceSelect" name="service">
              <option value="all">All services</option>
              @foreach($category as $cat)
              <option value="{{$cat->id}}">{{$cat->category_name}}</option>
              @endforeach
             
            </select>
          </label>

          <label class="finder__field">
            <span>City</span>
            <select id="citySelect" name="city">
              <option value="">Choose a city</option>
              <option>Delhi NCR</option>
              <option>Mumbai</option>
              <option>Jaipur</option>
              <option>Bengaluru</option>
              <option>Hyderabad</option>
              <option>Lucknow</option>
            </select>
          </label>

          <label class="finder__field finder__field--date">
            <span>Event date</span>
            <input id="eventDate" name="date" type="date">
          </label>

         <a class="button button--primary finder__submit" href="{{ route('planners') }}">
    Find providers
    <svg aria-hidden="true" viewBox="0 0 20 20">
        <path d="M4 10h11M11 5l5 5-5 5"/>
    </svg>
</a>
        </form>
      </div>
    </section>

    <section class="section services" id="services" aria-labelledby="servicesTitle">
      <div class="container">
        <div class="section-heading section-heading--split" data-reveal>
          <div>
            <p class="eyebrow"><span></span> Everything your day needs</p>
            <h2 id="servicesTitle">Pick a detail. Find your <em>perfect match.</em></h2>
          </div>
          <p>Browse handpicked professionals across every part of your event, all in one joyful place.</p>
        </div>

        <div class="services-grid">
          <button class="service-card service-card--featured" type="button" data-service="photography" data-reveal>
            <img src="{{ asset('web/assets/service-photography.jpg') }}" alt="Professional camera and lenses" width="1000" height="1250" loading="lazy">
            <span class="service-card__shade" aria-hidden="true"></span>
            <span class="service-card__count">86 professionals</span>
            <span class="service-card__body">
              <span class="service-card__number">01</span>
              <span class="service-card__title">Photography &amp;<br>Videography</span>
              <span class="service-card__action">Explore <span aria-hidden="true">↗</span></span>
            </span>
          </button>

          <button class="service-card" type="button" data-service="decoration" data-reveal>
            <img src="{{ asset('web/assets/service-decoration.jpg') }}" alt="Elegant floral event table setup" width="1000" height="667" loading="lazy">
            <span class="service-card__shade" aria-hidden="true"></span>
            <span class="service-card__count">72 professionals</span>
            <span class="service-card__body">
              <span class="service-card__number">02</span>
              <span class="service-card__title">Decoration &amp;<br>Stage Setup</span>
              <span class="service-card__action">Explore <span aria-hidden="true">↗</span></span>
            </span>
          </button>

          <button class="service-card" type="button" data-service="catering" data-reveal>
            <img src="{{ asset('web/assets/service-catering.jpg') }}" alt="Beautifully presented catering buffet" width="1000" height="667" loading="lazy">
            <span class="service-card__shade" aria-hidden="true"></span>
            <span class="service-card__count">64 professionals</span>
            <span class="service-card__body">
              <span class="service-card__number">03</span>
              <span class="service-card__title">Catering<br>Services</span>
              <span class="service-card__action">Explore <span aria-hidden="true">↗</span></span>
            </span>
          </button>

          <button class="service-card" type="button" data-service="beauty" data-reveal>
            <img src="{{ asset('web/assets/service-makeup.jpg') }}" alt="Professional makeup collection" width="1000" height="667" loading="lazy">
            <span class="service-card__shade" aria-hidden="true"></span>
            <span class="service-card__count">58 professionals</span>
            <span class="service-card__body">
              <span class="service-card__number">04</span>
              <span class="service-card__title">Makeup &amp;<br>Beauty</span>
              <span class="service-card__action">Explore <span aria-hidden="true">↗</span></span>
            </span>
          </button>

          <button class="service-card" type="button" data-service="fashion" data-reveal>
            <img src="{{ asset('web/assets/service-fashion.jpg') }}" alt="Detailed bridal occasion wear" width="1000" height="1500" loading="lazy">
            <span class="service-card__shade" aria-hidden="true"></span>
            <span class="service-card__count">49 professionals</span>
            <span class="service-card__body">
              <span class="service-card__number">05</span>
              <span class="service-card__title">Bridal Wear &amp;<br>Groom Wear</span>
              <span class="service-card__action">Explore <span aria-hidden="true">↗</span></span>
            </span>
          </button>
        </div>
      </div>
    </section>

    <section class="section about" id="about" aria-labelledby="aboutTitle">
      <div class="container about__grid">
        <div class="about__visual" data-reveal>
          <div class="about__image about__image--main">
            <img src="{{ asset('web/assets/story-garden.jpg') }}" alt="Beautifully styled celebration table" width="1400" height="933" loading="lazy">
          </div>
          <div class="about__image about__image--small">
           <img src="{{ asset('web/assets/story-engagement.jpg') }}" alt="Newly married couple holding hands" width="1400" height="933" loading="lazy">
          </div>
          <div class="about__badge">
            <strong>1,200+</strong>
            <span>joyful events<br>and counting</span>
          </div>
          <span class="about__sparkle about__sparkle--one" aria-hidden="true">✦</span>
          <span class="about__sparkle about__sparkle--two" aria-hidden="true">✦</span>
        </div>

        <div class="about__content" data-reveal>
          <p class="eyebrow"><span></span> Why Thyohar</p>
          <h2 id="aboutTitle">Planning should feel as joyful as the <em>celebration.</em></h2>
          <p class="about__lead">Thyohar brings trusted event professionals and inspired hosts together. Compare styles, read real experiences, and build a team that understands your vision.</p>

          <div class="benefit-list">
            <div class="benefit">
              <span class="benefit__icon" aria-hidden="true">
                <svg viewBox="0 0 24 24"><path d="m8.5 12 2.2 2.2 4.8-5M12 3l7 3v5c0 4.6-3 8.1-7 10-4-1.9-7-5.4-7-10V6l7-3Z"/></svg>
              </span>
              <div><h3>Professionals you can trust</h3><p>Every profile is reviewed for quality, reliability, and genuine customer feedback.</p></div>
            </div>
            <div class="benefit">
              <span class="benefit__icon" aria-hidden="true">
                <svg viewBox="0 0 24 24"><path d="M5 7h14M5 12h9M5 17h6M18 15l1.2 2.3L22 18l-2 1.8.5 2.7-2.5-1.3-2.5 1.3.5-2.7-2-1.8 2.8-.7L18 15Z"/></svg>
              </span>
              <div><h3>Choices made simple</h3><p>Shortlist by service, city, style, rating, and budget—without the planning clutter.</p></div>
            </div>
            <div class="benefit">
              <span class="benefit__icon" aria-hidden="true">
                <svg viewBox="0 0 24 24"><path d="M4 12a8 8 0 1 1 16 0v5a2 2 0 0 1-2 2h-2v-6h4M4 13h4v6H6a2 2 0 0 1-2-2v-5Z"/></svg>
              </span>
              <div><h3>Support when it matters</h3><p>From the first enquiry to event day, friendly help is only a message away.</p></div>
            </div>
          </div>

          <a class="button button--outline" href="planners.html">
            Meet our professionals
            <svg aria-hidden="true" viewBox="0 0 20 20"><path d="M4 10h11M11 5l5 5-5 5"/></svg>
          </a>
        </div>
      </div>
    </section>

    <section class="section providers" id="providers" aria-labelledby="providersTitle">
      <div class="container">
        <div class="section-heading section-heading--center" data-reveal>
          <p class="eyebrow"><span></span> Loved by hosts, chosen with confidence <span></span></p>
          <h2 id="providersTitle">Meet the people behind the <em>magic.</em></h2>
          <p>Explore standout event companies known for beautiful work and thoughtful service.</p>
        </div>

        <div class="filter-bar" role="toolbar" aria-label="Filter event professionals" data-reveal>
          <button class="filter-button active" type="button" data-filter="all" aria-pressed="true">All</button>
          <button class="filter-button" type="button" data-filter="photography" aria-pressed="false">Photography</button>
          <button class="filter-button" type="button" data-filter="decoration" aria-pressed="false">Decoration</button>
          <button class="filter-button" type="button" data-filter="catering" aria-pressed="false">Catering</button>
          <button class="filter-button" type="button" data-filter="beauty" aria-pressed="false">Beauty</button>
          <button class="filter-button" type="button" data-filter="fashion" aria-pressed="false">Occasion Wear</button>
        </div>

        <div class="provider-grid" id="providerGrid">
          <article class="provider-card" data-category="photography" data-reveal>
            <div class="provider-card__topline">
              <span class="available"><i></i> Available this month</span>
              <button class="favourite" type="button" aria-label="Save Aakriti Frames" aria-pressed="false">
                <svg aria-hidden="true" viewBox="0 0 24 24"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1.1-1.1a5.5 5.5 0 0 0-7.8 7.8l1.1 1.1L12 21l7.7-7.5 1.1-1.1a5.5 5.5 0 0 0 0-7.8Z"/></svg>
              </button>
            </div>
            <div class="provider-card__identity">
              <img src="{{ asset('web/assets/profile-arjun.jpg') }}" alt="Arjun Mehta of Aakriti Frames" width="600" height="600" loading="lazy">
              <div>
                <p class="provider-card__category">Photography &amp; Film</p>
                <h3>Aakriti Frames <span class="verified" role="img" title="Verified professional" aria-label="Verified professional">✓</span></h3>
                <p class="location"><svg aria-hidden="true" viewBox="0 0 20 20"><path d="M10 18s6-5.2 6-10a6 6 0 1 0-12 0c0 4.8 6 10 6 10Z"/><circle cx="10" cy="8" r="2"/></svg> Jaipur · Travels nationwide</p>
              </div>
            </div>
            <div class="provider-card__rating"><span class="rating-score">4.9</span><span class="stars">★★★★★</span><span>(186 reviews)</span></div>
            <p class="provider-card__bio">Candid wedding films, warm storytelling, and photographs that feel like the day—not a photoshoot.</p>
            <div class="tag-list"><span>Candid</span><span>Drone film</span><span>Albums</span></div>
            <div class="provider-card__footer">
              <p><small>Starting from</small><strong>₹35,000</strong></p>
              <button class="button button--card provider-details" type="button" data-provider="aakriti">View profile <span aria-hidden="true">→</span></button>
            </div>
          </article>

          <article class="provider-card" data-category="decoration" data-reveal>
            <div class="provider-card__topline">
              <span class="available"><i></i> Responds in 2 hours</span>
              <button class="favourite" type="button" aria-label="Save Gulmohar Gatherings" aria-pressed="false">
                <svg aria-hidden="true" viewBox="0 0 24 24"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1.1-1.1a5.5 5.5 0 0 0-7.8 7.8l1.1 1.1L12 21l7.7-7.5 1.1-1.1a5.5 5.5 0 0 0 0-7.8Z"/></svg>
              </button>
            </div>
            <div class="provider-card__identity">
              <img src="{{ asset('web/assets/profile-aanya.jpg') }}" alt="Aanya Kapoor of Gulmohar Gatherings" width="600" height="600" loading="lazy">
              <div>
                <p class="provider-card__category">Décor &amp; Styling</p>
                <h3>Gulmohar Gatherings <span class="verified" role="img" title="Verified professional" aria-label="Verified professional">✓</span></h3>
                <p class="location"><svg aria-hidden="true" viewBox="0 0 20 20"><path d="M10 18s6-5.2 6-10a6 6 0 1 0-12 0c0 4.8 6 10 6 10Z"/><circle cx="10" cy="8" r="2"/></svg> Delhi NCR</p>
              </div>
            </div>
            <div class="provider-card__rating"><span class="rating-score">4.8</span><span class="stars">★★★★★</span><span>(143 reviews)</span></div>
            <p class="provider-card__bio">Immersive floral décor and soulful spaces inspired by Indian craft, colour, and your own story.</p>
            <div class="tag-list"><span>Floral</span><span>Stage design</span><span>Lighting</span></div>
            <div class="provider-card__footer">
              <p><small>Starting from</small><strong>₹45,000</strong></p>
              <button class="button button--card provider-details" type="button" data-provider="gulmohar">View profile <span aria-hidden="true">→</span></button>
            </div>
          </article>

          <article class="provider-card" data-category="catering" data-reveal>
            <div class="provider-card__topline">
              <span class="available"><i></i> Top rated in Mumbai</span>
              <button class="favourite" type="button" aria-label="Save Saffron and Sage" aria-pressed="false">
                <svg aria-hidden="true" viewBox="0 0 24 24"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1.1-1.1a5.5 5.5 0 0 0-7.8 7.8l1.1 1.1L12 21l7.7-7.5 1.1-1.1a5.5 5.5 0 0 0 0-7.8Z"/></svg>
              </button>
            </div>
            <div class="provider-card__identity">
              <img src="{{ asset('web/assets/profile-kabir.jpg') }}" alt="Kabir Khanna of Saffron and Sage" width="600" height="600" loading="lazy">
              <div>
                <p class="provider-card__category">Catering &amp; Menus</p>
                <h3>Saffron &amp; Sage <span class="verified" role="img" title="Verified professional" aria-label="Verified professional">✓</span></h3>
                <p class="location"><svg aria-hidden="true" viewBox="0 0 20 20"><path d="M10 18s6-5.2 6-10a6 6 0 1 0-12 0c0 4.8 6 10 6 10Z"/><circle cx="10" cy="8" r="2"/></svg> Mumbai · Pune</p>
              </div>
            </div>
            <div class="provider-card__rating"><span class="rating-score">4.9</span><span class="stars">★★★★★</span><span>(210 reviews)</span></div>
            <p class="provider-card__bio">Regional favourites, modern presentation, and generous hospitality served plate after plate.</p>
            <div class="tag-list"><span>Custom menus</span><span>Live counters</span><span>Jain</span></div>
            <div class="provider-card__footer">
              <p><small>Starting from</small><strong>₹850 / plate</strong></p>
              <button class="button button--card provider-details" type="button" data-provider="saffron">View profile <span aria-hidden="true">→</span></button>
            </div>
          </article>

          <article class="provider-card" data-category="beauty" data-reveal>
            <div class="provider-card__topline">
              <span class="available"><i></i> 3 slots remaining</span>
              <button class="favourite" type="button" aria-label="Save Noor Artistry" aria-pressed="false">
                <svg aria-hidden="true" viewBox="0 0 24 24"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1.1-1.1a5.5 5.5 0 0 0-7.8 7.8l1.1 1.1L12 21l7.7-7.5 1.1-1.1a5.5 5.5 0 0 0 0-7.8Z"/></svg>
              </button>
            </div>
            <div class="provider-card__identity">
              <img src="{{ asset('web/assets/profile-riya.jpg') }}" alt="Riya Bansal of Noor Artistry" width="600" height="600" loading="lazy">
              <div>
                <p class="provider-card__category">Makeup &amp; Beauty</p>
                <h3>Noor Artistry <span class="verified" role="img" title="Verified professional" aria-label="Verified professional">✓</span></h3>
                <p class="location"><svg aria-hidden="true" viewBox="0 0 20 20"><path d="M10 18s6-5.2 6-10a6 6 0 1 0-12 0c0 4.8 6 10 6 10Z"/><circle cx="10" cy="8" r="2"/></svg> Lucknow · Delhi</p>
              </div>
            </div>
            <div class="provider-card__rating"><span class="rating-score">4.9</span><span class="stars">★★★★★</span><span>(127 reviews)</span></div>
            <p class="provider-card__bio">Skin-first bridal artistry that looks radiant in person, timeless in photographs, and feels like you.</p>
            <div class="tag-list"><span>Bridal</span><span>HD makeup</span><span>Hair</span></div>
            <div class="provider-card__footer">
              <p><small>Starting from</small><strong>₹18,000</strong></p>
              <button class="button button--card provider-details" type="button" data-provider="noor">View profile <span aria-hidden="true">→</span></button>
            </div>
          </article>

          <article class="provider-card" data-category="fashion" data-reveal>
            <div class="provider-card__topline">
              <span class="available"><i></i> New collection live</span>
              <button class="favourite" type="button" aria-label="Save Vastram Atelier" aria-pressed="false">
                <svg aria-hidden="true" viewBox="0 0 24 24"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1.1-1.1a5.5 5.5 0 0 0-7.8 7.8l1.1 1.1L12 21l7.7-7.5 1.1-1.1a5.5 5.5 0 0 0 0-7.8Z"/></svg>
              </button>
            </div>
            <div class="provider-card__identity">
              <img src="{{ asset('web/assets/profile-meera.jpg') }}" alt="Meera Iyer of Vastram Atelier" width="600" height="600" loading="lazy">
              <div>
                <p class="provider-card__category">Bridal &amp; Groom Wear</p>
                <h3>Vastram Atelier <span class="verified" role="img" title="Verified professional" aria-label="Verified professional">✓</span></h3>
                <p class="location"><svg aria-hidden="true" viewBox="0 0 20 20"><path d="M10 18s6-5.2 6-10a6 6 0 1 0-12 0c0 4.8 6 10 6 10Z"/><circle cx="10" cy="8" r="2"/></svg> Bengaluru · Online</p>
              </div>
            </div>
            <div class="provider-card__rating"><span class="rating-score">4.7</span><span class="stars">★★★★★</span><span>(98 reviews)</span></div>
            <p class="provider-card__bio">Contemporary occasion wear crafted with heirloom techniques for brides, grooms, and families.</p>
            <div class="tag-list"><span>Custom fit</span><span>Lehengas</span><span>Sherwanis</span></div>
            <div class="provider-card__footer">
              <p><small>Starting from</small><strong>₹28,000</strong></p>
              <button class="button button--card provider-details" type="button" data-provider="vastram">View profile <span aria-hidden="true">→</span></button>
            </div>
          </article>
        </div>
        <p class="provider-empty" id="providerEmpty" hidden>No professionals found for that selection just yet.</p>
      </div>
    </section>

    <section class="section planner-list" id="planners" aria-labelledby="plannersTitle">
      <div class="planner-list__shape planner-list__shape--one" aria-hidden="true"></div>
      <div class="planner-list__shape planner-list__shape--two" aria-hidden="true"></div>
      <div class="container">
        <div class="section-heading section-heading--split" data-reveal>
          <div>
            <p class="eyebrow"><span></span> Planners List</p>
            <h2 id="plannersTitle">Meet planners who make every detail feel <em>effortless.</em></h2>
          </div>
          <p>From intimate gatherings to destination weekends, explore experienced planners ready to shape your celebration.</p>
        </div>

        <div class="planner-toolbar" data-reveal>
          <p id="plannerResultCount" aria-live="polite"><strong>12</strong> verified planners</p>
          <label class="planner-search">
            <svg aria-hidden="true" viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m20 20-4-4"/></svg>
            <input id="plannerSearch" type="search" placeholder="Search by planner, city, or style" aria-label="Search planners by name, city, or style">
          </label>
        </div>

        <div class="planner-grid" id="plannerGrid">
          <article class="planner-card" data-search="aanya kapoor gulmohar events delhi ncr floral luxury wedding" data-reveal>
            <div class="planner-card__cover">
              <img src="{{ asset('web/assets/service-decoration.jpg') }}" alt="Elegant event décor by Gulmohar Events" width="1000" height="667" loading="lazy">
              <span>Luxury Weddings</span>
            </div>
            <div class="planner-card__content">
              <div class="planner-card__identity">
                <img src="{{ asset('web/assets/profile-aanya.jpg') }}" alt="Aanya Kapoor" width="600" height="600" loading="lazy">
                <div><h3>Aanya Kapoor</h3><p>Gulmohar Events · Delhi NCR</p></div>
              </div>
              <div class="planner-card__rating"><span role="img" aria-label="4.9 out of 5 stars">★★★★★</span><strong>4.9</strong><small>186 reviews</small></div>
              <p class="planner-card__bio">Story-led weddings filled with expressive florals, thoughtful rituals, and warm guest experiences.</p>
              <div class="planner-card__tags"><span>Floral design</span><span>Full planning</span></div>
              <div class="planner-card__footer"><span>8 years experience</span><a href="{{url('planner-details')}}">More Details <b aria-hidden="true">→</b></a></div>
            </div>
          </article>

          <article class="planner-card" data-search="arjun mehta aakriti celebrations jaipur destination palace wedding" data-reveal>
            <div class="planner-card__cover">
              <img src="{{ asset('web/assets/story-engagement.jpg') }}" alt="Garden wedding planned by Aakriti Celebrations" width="1400" height="933" loading="lazy">
              <span>Destination Weddings</span>
            </div>
            <div class="planner-card__content">
              <div class="planner-card__identity">
                <img src="{{ asset('web/assets/profile-arjun.jpg') }}" alt="Arjun Mehta" width="600" height="600" loading="lazy">
                <div><h3>Arjun Mehta</h3><p>Aakriti Celebrations · Jaipur</p></div>
              </div>
              <div class="planner-card__rating"><span role="img" aria-label="4.9 out of 5 stars">★★★★★</span><strong>4.9</strong><small>172 reviews</small></div>
              <p class="planner-card__bio">Seamless destination weekends that balance royal settings with relaxed, personal hospitality.</p>
              <div class="planner-card__tags"><span>Palace venues</span><span>Guest logistics</span></div>
              <div class="planner-card__footer"><span>10 years experience</span><a href="planner-details.html?planner=arjun-mehta">More Details <b aria-hidden="true">→</b></a></div>
            </div>
          </article>

          <article class="planner-card" data-search="meera iyer vastram vows bengaluru south indian cultural wedding" data-reveal>
            <div class="planner-card__cover">
              <img src="{{ asset('web/assets/hero-wedding.jpg') }}" alt="Wedding celebration arranged by Vastram and Vows" width="1920" height="1280" loading="lazy">
              <span>Cultural Celebrations</span>
            </div>
            <div class="planner-card__content">
              <div class="planner-card__identity">
                <img src="{{ asset('web/assets/profile-meera.jpg') }}" alt="Meera Iyer" width="600" height="600" loading="lazy">
                <div><h3>Meera Iyer</h3><p>Vastram &amp; Vows · Bengaluru</p></div>
              </div>
              <div class="planner-card__rating"><span role="img" aria-label="4.8 out of 5 stars">★★★★★</span><strong>4.8</strong><small>139 reviews</small></div>
              <p class="planner-card__bio">Tradition-rich celebrations designed with modern ease, careful timelines, and family at the centre.</p>
              <div class="planner-card__tags"><span>Traditions</span><span>Family events</span></div>
              <div class="planner-card__footer"><span>7 years experience</span><a href="planner-details.html?planner=meera-iyer">More Details <b aria-hidden="true">→</b></a></div>
            </div>
          </article>

          <article class="planner-card" data-search="kabir khanna saffron soirees mumbai food luxury social event" data-reveal>
            <div class="planner-card__cover">
            <img src="{{ asset('web/assets/service-catering.jpg') }}" alt="Curated celebration dining by Saffron Soirées" width="1000" height="667" loading="lazy">
              <span>Food-led Events</span>
            </div>
            <div class="planner-card__content">
              <div class="planner-card__identity">
                <img src="{{ asset('web/assets/profile-kabir.jpg') }}" alt="Kabir Khanna" width="600" height="600" loading="lazy">
                <div><h3>Kabir Khanna</h3><p>Saffron Soirées · Mumbai</p></div>
              </div>
              <div class="planner-card__rating"><span role="img" aria-label="4.9 out of 5 stars">★★★★★</span><strong>4.9</strong><small>204 reviews</small></div>
              <p class="planner-card__bio">Vibrant celebrations built around memorable menus, impeccable hosting, and effortless flow.</p>
              <div class="planner-card__tags"><span>Menu curation</span><span>Luxury socials</span></div>
              <div class="planner-card__footer"><span>12 years experience</span><a href="planner-details.html?planner=kabir-khanna">More Details <b aria-hidden="true">→</b></a></div>
            </div>
          </article>

          <article class="planner-card" data-search="riya bansal noor weddings lucknow heritage intimate wedding" data-reveal>
            <div class="planner-card__cover">
              <img src="{{ asset('web/assets/service-fashion.jpg') }}" alt="Elegant heritage wedding styling by Noor Weddings" width="1000" height="1500" loading="lazy">
              <span>Heritage Weddings</span>
            </div>
            <div class="planner-card__content">
              <div class="planner-card__identity">
              <img src="{{ asset('web/assets/profile-riya.jpg') }}" alt="Riya Bansal" width="600" height="600" loading="lazy">
                <div><h3>Riya Bansal</h3><p>Noor Weddings · Lucknow</p></div>
              </div>
              <div class="planner-card__rating"><span role="img" aria-label="4.9 out of 5 stars">★★★★★</span><strong>4.9</strong><small>126 reviews</small></div>
              <p class="planner-card__bio">Graceful, intimate weddings inspired by heritage spaces, old-world details, and personal stories.</p>
              <div class="planner-card__tags"><span>Heritage venues</span><span>Intimate events</span></div>
              <div class="planner-card__footer"><span>8 years experience</span><a href="planner-details.html?planner=riya-bansal">More Details <b aria-hidden="true">→</b></a></div>
            </div>
          </article>

          <article class="planner-card" data-search="dev malhotra celebration company chandigarh large wedding production" data-reveal>
            <div class="planner-card__cover">
             <img src="{{ asset('web/assets/story-garden.jpg') }}" alt="Large celebration styled by The Celebration Company" width="1400" height="933" loading="lazy">
              <span>Large Celebrations</span>
            </div>
            <div class="planner-card__content">
              <div class="planner-card__identity">
                <img src="{{ asset('web/assets/planner-dev.jpg') }}" alt="Dev Malhotra" width="700" height="700" loading="lazy">
                <div><h3>Dev Malhotra</h3><p>The Celebration Co. · Chandigarh</p></div>
              </div>
              <div class="planner-card__rating"><span role="img" aria-label="4.7 out of 5 stars">★★★★★</span><strong>4.7</strong><small>114 reviews</small></div>
              <p class="planner-card__bio">Confident large-format planning with crisp production, spirited entertainment, and guest-first service.</p>
              <div class="planner-card__tags"><span>Production</span><span>Entertainment</span></div>
              <div class="planner-card__footer"><span>9 years experience</span><a href="planner-details.html?planner=dev-malhotra">More Details <b aria-hidden="true">→</b></a></div>
            </div>
          </article>

          <article class="planner-card" data-search="ishita rao mango leaf events hyderabad multicultural sustainable wedding" data-reveal>
            <div class="planner-card__cover">
             <img src="{{ asset('web/assets/service-makeup.jpg') }}" alt="Colour-led celebration details by Mango Leaf Events" width="1000" height="667" loading="lazy">
              <span>Multicultural Events</span>
            </div>
            <div class="planner-card__content">
              <div class="planner-card__identity">
                <img src="{{ asset('web/assets/planner-ishita.jpg') }}" alt="Ishita Rao" width="700" height="700" loading="lazy">
                <div><h3>Ishita Rao</h3><p>Mango Leaf Events · Hyderabad</p></div>
              </div>
              <div class="planner-card__rating"><span role="img" aria-label="4.8 out of 5 stars">★★★★★</span><strong>4.8</strong><small>102 reviews</small></div>
              <p class="planner-card__bio">Colourful multicultural events where every custom is understood and every guest feels included.</p>
              <div class="planner-card__tags"><span>Fusion weddings</span><span>Eco-conscious</span></div>
              <div class="planner-card__footer"><span>6 years experience</span><a href="planner-details.html?planner=ishita-rao">More Details <b aria-hidden="true">→</b></a></div>
            </div>
          </article>

          <article class="planner-card" data-search="neel verma white lotus planners udaipur destination palace luxury wedding" data-reveal>
            <div class="planner-card__cover">
              <img src="{{ asset('web/assets/story-palace.jpg') }}" alt="Wedding rings from a White Lotus Planners celebration" width="1400" height="933" loading="lazy">
              <span>Palace Weddings</span>
            </div>
            <div class="planner-card__content">
              <div class="planner-card__identity">
                <img src="{{ asset('web/assets/planner-neel.jpg') }}" alt="Neel Verma" width="700" height="700" loading="lazy">
                <div><h3>Neel Verma</h3><p>White Lotus Planners · Udaipur</p></div>
              </div>
              <div class="planner-card__rating"><span role="img" aria-label="4.8 out of 5 stars">★★★★★</span><strong>4.8</strong><small>157 reviews</small></div>
              <p class="planner-card__bio">Refined palace weddings with strong local relationships, elegant design, and precise guest logistics.</p>
              <div class="planner-card__tags"><span>Venue sourcing</span><span>Hospitality</span></div>
              <div class="planner-card__footer"><span>11 years experience</span><a href="planner-details.html?planner=neel-verma">More Details <b aria-hidden="true">→</b></a></div>
            </div>
          </article>

          <article class="planner-card" data-search="tara sen paperboat celebrations kolkata intimate art creative wedding" data-reveal>
            <div class="planner-card__cover">
              <img src="{{ asset('web/assets/service-photography.jpg') }}" alt="Creative celebration production by Paperboat Celebrations" width="1000" height="1250" loading="lazy">
              <span>Intimate Weddings</span>
            </div>
            <div class="planner-card__content">
              <div class="planner-card__identity">
                <img src="{{ asset('web/assets/planner-tara.jpg') }}" alt="Tara Sen" width="700" height="700" loading="lazy">
                <div><h3>Tara Sen</h3><p>Paperboat Celebrations · Kolkata</p></div>
              </div>
              <div class="planner-card__rating"><span role="img" aria-label="4.7 out of 5 stars">★★★★★</span><strong>4.7</strong><small>91 reviews</small></div>
              <p class="planner-card__bio">Artful small weddings with handmade details, relaxed timelines, and plenty of personality.</p>
              <div class="planner-card__tags"><span>Creative concept</span><span>Small weddings</span></div>
              <div class="planner-card__footer"><span>5 years experience</span><a href="planner-details.html?planner=tara-sen">More Details <b aria-hidden="true">→</b></a></div>
            </div>
          </article>

          <article class="planner-card" data-search="aarav joshi marigold project pune sustainable outdoor modern wedding" data-reveal>
            <div class="planner-card__cover">
              <img src="{{ asset('web/assets/service-decoration.jpg') }}" alt="Sustainable floral décor by The Marigold Project" width="1000" height="667" loading="lazy">
              <span>Sustainable Events</span>
            </div>
            <div class="planner-card__content">
              <div class="planner-card__identity">
                <img src="{{ asset('web/assets/planner-aarav.jpg') }}" alt="Aarav Joshi" width="700" height="700" loading="lazy">
                <div><h3>Aarav Joshi</h3><p>The Marigold Project · Pune</p></div>
              </div>
              <div class="planner-card__rating"><span role="img" aria-label="4.9 out of 5 stars">★★★★★</span><strong>4.9</strong><small>118 reviews</small></div>
              <p class="planner-card__bio">Low-waste celebrations that use local craft, seasonal materials, and modern, joyful design.</p>
              <div class="planner-card__tags"><span>Sustainable décor</span><span>Outdoor events</span></div>
              <div class="planner-card__footer"><span>7 years experience</span><a href="planner-details.html?planner=aarav-joshi">More Details <b aria-hidden="true">→</b></a></div>
            </div>
          </article>

          <article class="planner-card" data-search="zoya mirza mehfil more delhi hyderabad mehendi sangeet entertainment" data-reveal>
            <div class="planner-card__cover">
              <img src="{{ asset('web/assets/hero-wedding.jpg') }}" alt="Evening celebration planned by Mehfil and More" width="1920" height="1280" loading="lazy">
              <span>Mehendi &amp; Sangeet</span>
            </div>
            <div class="planner-card__content">
              <div class="planner-card__identity">
                <img src="{{ asset('web/assets/planner-zoya.jpg') }}" alt="Zoya Mirza" width="700" height="700" loading="lazy">
                <div><h3>Zoya Mirza</h3><p>Mehfil &amp; More · Delhi / Hyderabad</p></div>
              </div>
              <div class="planner-card__rating"><span role="img" aria-label="4.8 out of 5 stars">★★★★★</span><strong>4.8</strong><small>145 reviews</small></div>
              <p class="planner-card__bio">High-energy pre-wedding celebrations with standout performances, bright styling, and smooth production.</p>
              <div class="planner-card__tags"><span>Choreography</span><span>Artist booking</span></div>
              <div class="planner-card__footer"><span>8 years experience</span><a href="planner-details.html?planner=zoya-mirza">More Details <b aria-hidden="true">→</b></a></div>
            </div>
          </article>

          <article class="planner-card" data-search="vikram sethi gather glow goa beach wedding corporate celebration" data-reveal>
            <div class="planner-card__cover">
              <img src="{{ asset('web/assets/story-garden.jpg') }}" alt="Sunlit gathering planned by Gather and Glow" width="1400" height="933" loading="lazy">
              <span>Beach Celebrations</span>
            </div>
            <div class="planner-card__content">
              <div class="planner-card__identity">
                <img src="{{ asset('web/assets/planner-vikram.jpg') }}" alt="Vikram Sethi" width="700" height="700" loading="lazy">
                <div><h3>Vikram Sethi</h3><p>Gather &amp; Glow · Goa</p></div>
              </div>
              <div class="planner-card__rating"><span role="img" aria-label="4.8 out of 5 stars">★★★★★</span><strong>4.8</strong><small>132 reviews</small></div>
              <p class="planner-card__bio">Breezy beach weddings and social events designed for golden hours, good music, and happy guests.</p>
              <div class="planner-card__tags"><span>Beach venues</span><span>Weekend events</span></div>
              <div class="planner-card__footer"><span>9 years experience</span><a href="{{url('planner-details')}}">More Details <b aria-hidden="true">→</b></a></div>
            </div>
          </article>
        </div>

        <div class="planner-empty" id="plannerEmpty" hidden>
          <span aria-hidden="true">✦</span>
          <h3>No planners found</h3>
          <p>Try another name, city, or celebration style.</p>
          <button id="clearPlannerSearch" type="button">Clear search</button>
        </div>
      </div>
    </section>

    <section class="section stories" id="stories" aria-labelledby="storiesTitle">
      <div class="stories__ornament stories__ornament--one" aria-hidden="true"></div>
      <div class="stories__ornament stories__ornament--two" aria-hidden="true"></div>
      <div class="container">
        <div class="section-heading section-heading--split section-heading--light" data-reveal>
          <div>
            <p class="eyebrow eyebrow--light"><span></span> Success stories</p>
            <h2 id="storiesTitle">Celebrations that became <em>forever memories.</em></h2>
          </div>
          <div class="story-controls" role="group" aria-label="Success story carousel controls">
            <button id="storyPrev" type="button" aria-label="Previous story">←</button>
            <button id="storyNext" type="button" aria-label="Next story">→</button>
          </div>
        </div>

        <div class="story-track" id="storyTrack">
          <article class="story-card" data-reveal>
            <div class="story-card__image">
              <img src="{{ asset('web/assets/story-engagement.jpg') }}" alt="Bride and groom holding hands at their garden wedding" width="1400" height="933" loading="lazy">
              <span>Wedding</span>
            </div>
            <div class="story-card__body">
              <p class="story-card__meta">Chandigarh · 120 guests</p>
              <h3>Rhea &amp; Vivaan’s garden vows</h3>
              <blockquote>“Every professional understood the quiet, intimate feeling we wanted. The whole day felt completely like us.”</blockquote>
              <div class="story-card__footer"><span>5 professionals booked</span><span class="stars" role="img" aria-label="5 out of 5 stars">★★★★★</span></div>
            </div>
          </article>

          <article class="story-card" data-reveal>
            <div class="story-card__image">
              <img src="{{ asset('web/assets/story-garden.jpg') }}" alt="Long celebration table with flowers and place settings" width="1400" height="933" loading="lazy">
              <span>Anniversary</span>
            </div>
            <div class="story-card__body">
              <p class="story-card__meta">Pune · 180 guests</p>
              <h3>The Mehtas’ silver celebration</h3>
              <blockquote>“We found our caterer and decorator in one evening. Thyohar made 25 years feel effortless to celebrate.”</blockquote>
              <div class="story-card__footer"><span>4 professionals booked</span><span class="stars" role="img" aria-label="5 out of 5 stars">★★★★★</span></div>
            </div>
          </article>

          <article class="story-card" data-reveal>
            <div class="story-card__image">
              <img src="{{ asset('web/assets/story-palace.jpg') }}" alt="Two gold wedding rings" width="1400" height="933" loading="lazy">
              <span>Destination wedding</span>
            </div>
            <div class="story-card__body">
              <p class="story-card__meta">Udaipur · 320 guests</p>
              <h3>Aarohi &amp; Neil’s palace weekend</h3>
              <blockquote>“Three cities, two families, one wonderful team. Every detail was calm, considered, and genuinely magical.”</blockquote>
              <div class="story-card__footer"><span>7 professionals booked</span><span class="stars" role="img" aria-label="5 out of 5 stars">★★★★★</span></div>
            </div>
          </article>
        </div>
      </div>
    </section>

    <section class="section process" aria-labelledby="processTitle">
      <div class="container">
        <div class="section-heading section-heading--center" data-reveal>
          <p class="eyebrow"><span></span> Simple from the start <span></span></p>
          <h2 id="processTitle">Your celebration team in <em>three easy steps.</em></h2>
        </div>
        <ol class="process-grid">
          <li data-reveal>
            <span class="process__number">01</span>
            <div class="process__icon" aria-hidden="true">
              <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m20 20-4-4"/></svg>
            </div>
            <h3>Discover</h3>
            <p>Explore services and filter professionals by style, city, rating, and budget.</p>
          </li>
          <li data-reveal>
            <span class="process__number">02</span>
            <div class="process__icon" aria-hidden="true">
              <svg viewBox="0 0 24 24"><path d="M4 5h16v12H8l-4 4V5Z"/><path d="M8 9h8M8 13h5"/></svg>
            </div>
            <h3>Connect</h3>
            <p>Share your vision, compare thoughtful proposals, and ask every question.</p>
          </li>
          <li data-reveal>
            <span class="process__number">03</span>
            <div class="process__icon" aria-hidden="true">
              <svg viewBox="0 0 24 24"><path d="m12 3 2 5 5 .7-3.8 3.7.9 5.2L12 15.2 7.9 17.6l.9-5.2L5 8.7 10 8l2-5Z"/></svg>
            </div>
            <h3>Celebrate</h3>
            <p>Book with confidence and enjoy a day that feels beautifully, unmistakably yours.</p>
          </li>
        </ol>
      </div>
    </section>

    <section class="section contact" id="contact" aria-labelledby="contactTitle">
      <div class="container contact__shell">
        <div class="contact__intro" data-reveal>
          <p class="eyebrow eyebrow--light"><span></span> Let’s make it memorable</p>
          <h2 id="contactTitle">Tell us what you’re <em>celebrating.</em></h2>
          <p>Share a few details and our celebration concierge will help you find the right professionals.</p>
          <div class="contact__details">
            <a href="tel:+919876543210">
              <span aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M8 4H5a1 1 0 0 0-1 1c0 8.3 6.7 15 15 15a1 1 0 0 0 1-1v-3l-4-1-1 2c-3.5-1.5-6-4-7.5-7.5l2-1L8 4Z"/></svg></span>
              <div><small>Call&nbsp;us</small><strong>+91&nbsp;98765&nbsp;43210</strong></div>
            </a>
            <a href="mailto:hello@thyohar.in">
              <span aria-hidden="true"><svg viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m4 7 8 6 8-6"/></svg></span>
              <div><small>Write to us</small><strong>hello@thyohar.in</strong></div>
            </a>
          </div>
          <p class="contact__hours"><span></span> Celebration concierge available Mon–Sat, 9am–7pm</p>
        </div>

        <form class="contact-form" id="contactForm" data-reveal>
          <div class="contact-form__heading">
            <h3>Start planning with us</h3>
            <p>We usually respond within one business day.</p>
          </div>
          <div class="form-row">
            <label>
              <span>Your name</span>
              <input type="text" name="name" placeholder="e.g. Ananya Sharma" autocomplete="name" required>
            </label>
            <label>
              <span>Phone number</span>
              <input type="tel" name="phone" placeholder="+91 98765 43210" autocomplete="tel" pattern="[0-9+() -]{8,18}" required>
            </label>
          </div>
          <div class="form-row">
            <label>
              <span>Email address</span>
              <input type="email" name="email" placeholder="you@example.com" autocomplete="email" required>
            </label>
            <label>
              <span>What are you planning?</span>
              <select name="event" id="contactEvent" required>
                <option value="" selected disabled>Select an event</option>
                <option>Wedding</option>
                <option>Engagement</option>
                <option>Birthday</option>
                <option>Anniversary</option>
                <option>Corporate event</option>
                <option>Other celebration</option>
              </select>
            </label>
          </div>
          <label>
            <span>Tell us about your celebration</span>
            <textarea name="message" rows="4" placeholder="City, date, guest count, style, or anything already on your mind..."></textarea>
          </label>
          <button class="button button--primary button--full" type="submit">
            Send my enquiry
            <svg aria-hidden="true" viewBox="0 0 20 20"><path d="M4 10h11M11 5l5 5-5 5"/></svg>
          </button>
          <p class="form-privacy">By submitting, you agree to be contacted about your enquiry. No spam, only celebration help.</p>
        </form>
      </div>
    </section>
  </main>

  @endsection

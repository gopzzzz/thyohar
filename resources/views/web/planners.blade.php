@extends('layouts.weblayout')

@section('content')

  <main>
    <section class="inner-hero inner-hero--planners" aria-labelledby="pageTitle">
     <img src="{{ asset('web/assets/story-palace.jpg') }}" alt="" aria-hidden="true" width="1400" height="933">
      <div class="inner-hero__overlay" aria-hidden="true"></div>
      <div class="container inner-hero__content">
        <nav class="inner-breadcrumbs" aria-label="Breadcrumb">
          <a href="{{ url('') }}">Home</a><span aria-hidden="true">/</span><span>Planners List</span>
        </nav>
        <p class="eyebrow eyebrow--light"><span></span> Thyohar verified professionals</p>
        <h1 id="pageTitle">Find the planner who feels <em>just right.</em></h1>
        <p>Compare styles, experience, and specialties from a handpicked community of celebration experts across India.</p>
        <div class="inner-hero__stats" aria-label="Planner community highlights">
          <span><strong>12</strong> featured planners</span>
          <span><strong>4.8</strong> average rating</span>
          <span><strong>100%</strong> verified profiles</span>
        </div>
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
              <img src="assets/hero-wedding.jpg" alt="Wedding celebration arranged by Vastram and Vows" width="1920" height="1280" loading="lazy">
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
                 alt="Kabir Khanna" width="600" height="600" loading="lazy">
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
              <div class="planner-card__footer"><span>8 years experience</span><a href="{{url('planner-details')}}">More Details <b aria-hidden="true">→</b></a></div>
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

    <section class="list-cta" data-auth-guest>
      <div class="container list-cta__inner">
        <div><p>New to Thyohar?</p><h2>Save your favourites and plan in one place.</h2></div>
        <a class="button button--primary" href="register.html">Create your account <span aria-hidden="true">→</span></a>
      </div>
    </section>
  </main>

  

@endsection

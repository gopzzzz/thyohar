(() => {
  "use strict";

  document.body.classList.add("detail-loading");

  const planners = {
    "aanya-kapoor": {
      name: "Aanya Kapoor",
      studio: "Founder, Gulmohar Events",
      category: "Luxury Wedding Planner",
      location: "Delhi NCR · Available nationwide",
      rating: "4.9",
      reviewCount: 186,
      profile: "assets/profile-aanya.jpg",
      banner: "assets/service-decoration.jpg",
      bannerAlt: "An elegant floral celebration designed by Gulmohar Events",
      experience: "8 years",
      events: "185+",
      budget: "₹3.5 lakh",
      languages: "English, Hindi, Punjabi",
      response: "Within 2 hours",
      bio: [
        "Aanya Kapoor founded Gulmohar Events to create weddings that feel elevated without losing their warmth. Her work is recognised for expressive florals, beautifully paced guest journeys, and design choices that always begin with the couple’s story.",
        "From the first family meeting to the last farewell, Aanya leads a close-knit team across design, hospitality, vendor coordination, and production. She is especially loved for translating many opinions into one clear, joyful celebration plan."
      ],
      services: [
        ["Full-service planning", "Concept, budget, vendors, schedules, and event-day leadership."],
        ["Décor direction", "Moodboards, florals, lighting, table styling, and visual details."],
        ["Venue sourcing", "Shortlists, visits, negotiations, and practical venue planning."],
        ["Guest hospitality", "Invites, RSVPs, welcome desks, gifting, and guest assistance."],
        ["Vendor management", "Curated partners, contracts, communication, and deliverables."],
        ["Wedding production", "Timelines, rehearsals, technical teams, and on-site execution."]
      ],
      breakdown: [91, 7, 1, 1, 0],
      reviews: [
        ["Naina & Raghav", "Wedding · New Delhi", "February 2026", 5, "Aanya understood that we wanted grandeur without anything feeling impersonal. Every space was beautiful, but the way her team cared for our families is what we remember most."],
        ["Ira Malhotra", "Engagement · Gurugram", "November 2025", 5, "She gave our many scattered references one strong direction and kept every vendor on time. We were guests at our own celebration—in the best possible way."]
      ]
    },
    "arjun-mehta": {
      name: "Arjun Mehta",
      studio: "Creative Director, Aakriti Celebrations",
      category: "Destination Wedding Planner",
      location: "Jaipur · Destination weddings across India",
      rating: "4.9",
      reviewCount: 172,
      profile: "assets/profile-arjun.jpg",
      banner: "assets/story-engagement.jpg",
      bannerAlt: "A garden wedding coordinated by Aakriti Celebrations",
      experience: "10 years",
      events: "210+",
      budget: "₹5 lakh",
      languages: "English, Hindi, Rajasthani",
      response: "Within 3 hours",
      bio: [
        "Arjun Mehta specialises in destination celebrations that feel immersive, unhurried, and rooted in place. His Jaipur-based studio pairs strong local venue relationships with calm, detailed planning for families arriving from around the world.",
        "His approach combines practical guest logistics with cinematic event design. Arjun personally oversees venue selection, hospitality plans, and the master production schedule so that a multi-day wedding still feels effortless."
      ],
      services: [
        ["Destination planning", "Complete multi-day planning across palaces, resorts, and estates."],
        ["Venue & stay", "Venue contracting, room blocks, allocations, and check-in planning."],
        ["Travel logistics", "Airport desks, transport routes, guest manifests, and assistance."],
        ["Experience design", "Welcome moments, local excursions, gifting, and cultural details."],
        ["Event production", "Stages, sound, lighting, entertainment, permits, and timelines."],
        ["Family concierge", "Dedicated support for hosts, elders, speakers, and key guests."]
      ],
      breakdown: [92, 6, 1, 1, 0],
      reviews: [
        ["Maya & Dhruv", "Wedding · Jaipur", "January 2026", 5, "Two hundred guests reached three venues without one frantic phone call to us. Arjun’s calm planning let us actually enjoy the entire weekend."],
        ["Sonia Patel", "Wedding · Jodhpur", "October 2025", 5, "His local knowledge saved us time and money, while the guest experience still felt incredibly considered. Our overseas family felt looked after from the airport onward."]
      ]
    },
    "meera-iyer": {
      name: "Meera Iyer",
      studio: "Founder, Vastram & Vows",
      category: "Cultural Celebration Planner",
      location: "Bengaluru · South India",
      rating: "4.8",
      reviewCount: 139,
      profile: "assets/profile-meera.jpg",
      banner: "assets/hero-wedding.jpg",
      bannerAlt: "A warm wedding moment planned by Vastram and Vows",
      experience: "7 years",
      events: "160+",
      budget: "₹3 lakh",
      languages: "English, Hindi, Tamil, Kannada",
      response: "Within 4 hours",
      bio: [
        "Meera Iyer created Vastram & Vows for families who want every tradition honoured and every generation comfortable. She brings cultural fluency, gentle communication, and exacting timeline management to South Indian and multicultural weddings.",
        "Meera works closely with priests, elders, caterers, and creative partners to ensure ceremonies remain meaningful while the wider celebration feels fresh. Her planning style is organised, inclusive, and reassuringly warm."
      ],
      services: [
        ["Ceremony planning", "Ritual research, priest coordination, requirements, and timelines."],
        ["Family coordination", "Clear communication across families, elders, and wedding parties."],
        ["Vendor curation", "Regional specialists for décor, food, music, attire, and beauty."],
        ["Guest hospitality", "Stay, transport, welcome support, gifting, and accessibility."],
        ["Design planning", "A cohesive visual story that respects ceremony and venue."],
        ["On-day management", "Rehearsals, cue sheets, vendor supervision, and guest flow."]
      ],
      breakdown: [87, 10, 2, 1, 0],
      reviews: [
        ["Anusha & Karthik", "Wedding · Mysuru", "December 2025", 5, "Meera knew the meaning behind every ceremony and still found small modern touches that felt like us. Both families trusted her completely."],
        ["Leena Rao", "Wedding · Bengaluru", "August 2025", 5, "Our Tamil–Kannada wedding had a complicated morning schedule. Her cue sheets and kindness kept everything moving without making the rituals feel rushed."]
      ]
    },
    "kabir-khanna": {
      name: "Kabir Khanna",
      studio: "Founder, Saffron Soirées",
      category: "Food-led Event Planner",
      location: "Mumbai · Pune",
      rating: "4.9",
      reviewCount: 204,
      profile: "assets/profile-kabir.jpg",
      banner: "assets/service-catering.jpg",
      bannerAlt: "A generous celebration menu curated by Saffron Soirées",
      experience: "12 years",
      events: "340+",
      budget: "₹4 lakh",
      languages: "English, Hindi, Marathi",
      response: "Within 4 hours",
      bio: [
        "Kabir Khanna plans celebrations around the moments people share at the table. With a background in hospitality, he brings restaurant-level attention to menu design, service choreography, and the rhythm of an event from welcome drinks to the last dessert.",
        "Saffron Soirées is a natural fit for hosts who care deeply about food and guest comfort. Kabir’s team manages the full celebration while giving tastings, kitchen logistics, dietary needs, and service staffing unusual care."
      ],
      services: [
        ["Full event planning", "End-to-end creative, commercial, vendor, and schedule management."],
        ["Menu curation", "Tastings, regional menus, dietary planning, and presentation."],
        ["Hospitality design", "Guest touchpoints, service style, seating, and comfort planning."],
        ["Venue operations", "Kitchen audits, service routes, rentals, staffing, and permissions."],
        ["Bar & beverage", "Beverage menus, licensing support, bar design, and service teams."],
        ["Celebration styling", "Tablescapes, florals, stationery, lighting, and atmosphere."]
      ],
      breakdown: [93, 5, 1, 1, 0],
      reviews: [
        ["The Shah Family", "Anniversary · Mumbai", "March 2026", 5, "Kabir created a menu that travelled through our parents’ favourite cities. It was personal, beautifully served, and talked about for weeks."],
        ["Ritu & Sameer", "Wedding · Alibaug", "December 2025", 5, "The rain changed our dinner plan an hour before service. His team reset everything indoors and not one guest knew it was Plan B."]
      ]
    },
    "riya-bansal": {
      name: "Riya Bansal",
      studio: "Founder, Noor Weddings",
      category: "Heritage Wedding Planner",
      location: "Lucknow · Delhi",
      rating: "4.9",
      reviewCount: 126,
      profile: "assets/profile-riya.jpg",
      banner: "assets/service-fashion.jpg",
      bannerAlt: "Elegant wedding styling created by Noor Weddings",
      experience: "8 years",
      events: "190+",
      budget: "₹2.5 lakh",
      languages: "English, Hindi, Urdu",
      response: "Within 2 hours",
      bio: [
        "Riya Bansal’s weddings are known for grace, intimacy, and a sense of place. Through Noor Weddings, she works with heritage venues, craftspeople, and family traditions to create celebrations that feel timeless rather than themed.",
        "Riya is a thoughtful listener and a meticulous producer. She favours meaningful detail—handwritten notes, local textiles, heirloom-inspired florals—and keeps the planning process clear for busy couples and their families."
      ],
      services: [
        ["Heritage venue planning", "Venue discovery, conservation rules, layouts, and logistics."],
        ["Creative direction", "Narrative, palettes, florals, stationery, and artisan details."],
        ["Intimate wedding planning", "Thoughtful formats for close-knit, guest-focused events."],
        ["Vendor management", "Regional craftspeople, artists, caterers, and production teams."],
        ["Family hospitality", "Travel, accommodation, gifting, special needs, and concierge."],
        ["Event-day direction", "Detailed schedules, rehearsals, cues, and discreet supervision."]
      ],
      breakdown: [91, 7, 2, 0, 0],
      reviews: [
        ["Aaliya & Vir", "Wedding · Lucknow", "February 2026", 5, "Riya made our haveli feel alive without covering its character. Every detail had meaning, and the whole celebration felt deeply personal."],
        ["Pooja B.", "Engagement · Delhi", "September 2025", 5, "She was transparent about budgets and never pushed us toward more. The result was intimate, elegant, and exactly right for our family."]
      ]
    },
    "dev-malhotra": {
      name: "Dev Malhotra",
      studio: "Lead Planner, The Celebration Co.",
      category: "Large-format Event Planner",
      location: "Chandigarh · North India",
      rating: "4.7",
      reviewCount: 114,
      profile: "assets/planner-dev.jpg",
      banner: "assets/story-garden.jpg",
      bannerAlt: "A large guest celebration managed by The Celebration Company",
      experience: "9 years",
      events: "240+",
      budget: "₹4.5 lakh",
      languages: "English, Hindi, Punjabi",
      response: "Within 3 hours",
      bio: [
        "Dev Malhotra thrives on celebrations with moving parts: large guest lists, major entertainment, multiple venues, and tight production windows. His practical, unflappable style gives families clarity without flattening the fun.",
        "The Celebration Co. combines a strong operations desk with bold creative partners. Dev remains the single point of contact for clients while department leads manage hospitality, technical production, artists, and venue operations."
      ],
      services: [
        ["Large wedding planning", "Structured planning for high guest counts and multiple events."],
        ["Technical production", "Stage, audio, lighting, power, rigging, screens, and show calls."],
        ["Entertainment", "Artist sourcing, contracts, hospitality, rehearsals, and performances."],
        ["Guest movement", "Transport fleets, route planning, check-ins, desks, and volunteers."],
        ["Vendor operations", "Access plans, credentials, schedules, loading, and supervision."],
        ["Safety & contingency", "Weather plans, permissions, medical support, and backups."]
      ],
      breakdown: [82, 13, 4, 1, 0],
      reviews: [
        ["Simran & Kunal", "Wedding · Chandigarh", "January 2026", 5, "Dev handled 480 guests and two venues with remarkable control. The concerts ran on time, and our parents never had to chase anyone."],
        ["Rakesh Arora", "50th Birthday · Ludhiana", "July 2025", 5, "His production planning was excellent. Even when an artist’s flight changed, the evening schedule stayed smooth and the crowd noticed nothing."]
      ]
    },
    "ishita-rao": {
      name: "Ishita Rao",
      studio: "Founder, Mango Leaf Events",
      category: "Multicultural Event Planner",
      location: "Hyderabad · Bengaluru",
      rating: "4.8",
      reviewCount: 102,
      profile: "assets/planner-ishita.jpg",
      banner: "assets/service-makeup.jpg",
      bannerAlt: "Colourful celebration details planned by Mango Leaf Events",
      experience: "6 years",
      events: "135+",
      budget: "₹2.8 lakh",
      languages: "English, Hindi, Telugu",
      response: "Within 5 hours",
      bio: [
        "Ishita Rao helps couples bring different cultures, faiths, and family customs into one celebration with respect and genuine curiosity. Her plans make space for every tradition while finding a visual and emotional thread that connects them.",
        "Mango Leaf Events also prioritises practical sustainability through local sourcing, reusable structures, considered gifting, and honest waste conversations. Ishita’s collaborative process is energetic, inclusive, and highly organised."
      ],
      services: [
        ["Multicultural planning", "Research, ceremony sequencing, family alignment, and guidance."],
        ["Sustainable sourcing", "Local materials, rental-first design, waste plans, and donations."],
        ["Creative concept", "A shared visual story across cultures, events, and stationery."],
        ["Vendor curation", "Inclusive, culturally fluent creative and operational partners."],
        ["Guest communication", "Helpful itineraries, context notes, RSVPs, and accessibility."],
        ["On-site management", "Ceremony cues, vendor teams, family support, and contingencies."]
      ],
      breakdown: [86, 11, 2, 1, 0],
      reviews: [
        ["Maya & Joseph", "Wedding · Hyderabad", "December 2025", 5, "Ishita gave both our ceremonies equal care and helped every guest understand what was happening. Nothing felt like an add-on."],
        ["Nikhil Rao", "Wedding · Bengaluru", "May 2025", 5, "Her waste plan was practical, never preachy. We used local flowers, donated surplus food, and still had the colourful celebration we imagined."]
      ]
    },
    "neel-verma": {
      name: "Neel Verma",
      studio: "Director, White Lotus Planners",
      category: "Palace Wedding Planner",
      location: "Udaipur · Rajasthan",
      rating: "4.8",
      reviewCount: 157,
      profile: "assets/planner-neel.jpg",
      banner: "assets/story-palace.jpg",
      bannerAlt: "Wedding rings from a White Lotus Planners palace celebration",
      experience: "11 years",
      events: "290+",
      budget: "₹6 lakh",
      languages: "English, Hindi, Gujarati",
      response: "Within 3 hours",
      bio: [
        "Neel Verma brings polished production and deep regional knowledge to palace and lakeside weddings across Rajasthan. White Lotus Planners is known for elegant restraint, strong hospitality systems, and reliable relationships with landmark venues.",
        "Neel guides clients through the realities of heritage properties—from access and sound rules to room allocations and weather plans—while protecting the sense of wonder that drew them to a destination wedding."
      ],
      services: [
        ["Palace venue sourcing", "Property comparisons, contracting, permissions, and layouts."],
        ["Destination logistics", "Travel, rooming, transport, guest desks, and itineraries."],
        ["Luxury hospitality", "Concierge teams, welcome experiences, gifting, and VIP care."],
        ["Design & production", "Décor direction, lighting, staging, entertainment, and builds."],
        ["Food experiences", "Regional menus, tastings, service formats, and special dining."],
        ["Event command", "Master schedules, department leads, rehearsals, and contingencies."]
      ],
      breakdown: [88, 9, 2, 1, 0],
      reviews: [
        ["Aarohi & Neil", "Wedding · Udaipur", "November 2025", 5, "White Lotus made a complicated palace weekend feel intimate. Neel was honest about every constraint and always arrived with a beautiful solution."],
        ["Mitali Desai", "Wedding · Jaipur", "March 2025", 5, "The hospitality desk remembered our grandparents, children, and dietary needs. That level of care mattered as much as the stunning décor."]
      ]
    },
    "tara-sen": {
      name: "Tara Sen",
      studio: "Founder, Paperboat Celebrations",
      category: "Intimate Wedding Planner",
      location: "Kolkata · Eastern India",
      rating: "4.7",
      reviewCount: 91,
      profile: "assets/planner-tara.jpg",
      banner: "assets/service-photography.jpg",
      bannerAlt: "Creative wedding storytelling by Paperboat Celebrations",
      experience: "5 years",
      events: "105+",
      budget: "₹2 lakh",
      languages: "English, Hindi, Bengali",
      response: "Within 6 hours",
      bio: [
        "Tara Sen plans intimate weddings for people who value personality over spectacle. A former set designer, she has an eye for handmade details, unexpected spaces, and guest experiences that feel generous rather than programmed.",
        "Paperboat Celebrations works best with curious, collaborative hosts. Tara keeps the planning process light but structured, helping clients make purposeful choices and invest in the moments their guests will actually feel."
      ],
      services: [
        ["Intimate event planning", "Complete planning for celebrations of up to 150 guests."],
        ["Creative direction", "Story, styling, handmade installations, and table details."],
        ["Unusual venue sourcing", "Studios, homes, gardens, galleries, and character spaces."],
        ["Guest experience", "Personal invitations, shared moments, seating, and gifting."],
        ["Local vendor curation", "Independent artists, makers, cooks, musicians, and florists."],
        ["Event-day coordination", "Schedules, setup, cues, vendor direction, and wrap-up."]
      ],
      breakdown: [81, 14, 4, 1, 0],
      reviews: [
        ["Roshni & Abeer", "Wedding · Kolkata", "February 2026", 5, "Tara made our 70-person wedding feel like the loveliest dinner party. Every handmade detail had a story and none of it felt staged."],
        ["Madhurima Sen", "Anniversary · Shantiniketan", "October 2025", 5, "She found local musicians, potters, and a wonderful home cook. The entire weekend felt connected to the place and to our family."]
      ]
    },
    "aarav-joshi": {
      name: "Aarav Joshi",
      studio: "Founder, The Marigold Project",
      category: "Sustainable Event Planner",
      location: "Pune · Western India",
      rating: "4.9",
      reviewCount: 118,
      profile: "assets/planner-aarav.jpg",
      banner: "assets/service-decoration.jpg",
      bannerAlt: "Seasonal floral styling by The Marigold Project",
      experience: "7 years",
      events: "150+",
      budget: "₹3 lakh",
      languages: "English, Hindi, Marathi",
      response: "Within 4 hours",
      bio: [
        "Aarav Joshi believes beautiful celebrations can be lighter on the planet and easier on the people planning them. The Marigold Project combines modern design with seasonal flowers, reusable structures, local craft, and careful material planning.",
        "His team measures success beyond aesthetics: less waste, fair partnerships, comfortable guests, and a day that runs calmly. Aarav gives clients clear options and impact notes without sacrificing colour, abundance, or joy."
      ],
      services: [
        ["Sustainable planning", "Practical impact choices across venue, vendors, food, and décor."],
        ["Eco-conscious design", "Seasonal botanicals, rentals, reusable builds, and local craft."],
        ["Outdoor event planning", "Site plans, weather cover, power, access, and guest comfort."],
        ["Waste management", "Segregation, surplus food, flower reuse, and responsible disposal."],
        ["Vendor coordination", "Transparent scopes, fair local partners, and shared timelines."],
        ["Event operations", "Setup, show flow, guest assistance, contingencies, and breakdown."]
      ],
      breakdown: [92, 6, 2, 0, 0],
      reviews: [
        ["Tanvi & Mihir", "Wedding · Pune", "January 2026", 5, "Aarav proved sustainable did not mean sparse. Our décor felt abundant and joyful, and nearly everything was reused, rented, or composted."],
        ["Devika Shah", "Engagement · Nashik", "June 2025", 5, "His budget and impact sheets made every decision easy to understand. The rain plan worked perfectly and the outdoor dinner still felt magical."]
      ]
    },
    "zoya-mirza": {
      name: "Zoya Mirza",
      studio: "Creative Head, Mehfil & More",
      category: "Entertainment Event Planner",
      location: "Delhi · Hyderabad",
      rating: "4.8",
      reviewCount: 145,
      profile: "assets/planner-zoya.jpg",
      banner: "assets/hero-wedding.jpg",
      bannerAlt: "An evening wedding celebration produced by Mehfil and More",
      experience: "8 years",
      events: "220+",
      budget: "₹3.5 lakh",
      languages: "English, Hindi, Urdu",
      response: "Within 3 hours",
      bio: [
        "Zoya Mirza turns mehendis, sangeets, and welcome nights into confident live experiences. Her background in performance production gives her an instinct for pacing, artist care, choreography, and the technical details behind a seamless show.",
        "Mehfil & More balances high energy with disciplined preparation. Zoya’s rehearsals are friendly and efficient, her run-of-show documents are precise, and her creative ideas always leave room for the family to be the real stars."
      ],
      services: [
        ["Sangeet production", "Concept, acts, scripts, choreography, staging, and show calling."],
        ["Artist booking", "Performers, musicians, hosts, contracts, travel, and hospitality."],
        ["Choreography", "Family-friendly rehearsals, edits, mixes, formations, and coaching."],
        ["Technical production", "Audio, lights, screens, special effects, and rehearsal schedules."],
        ["Mehendi planning", "Décor, music, artists, guest activities, food, and flow."],
        ["Full event coordination", "Vendors, timelines, family cues, backstage, and contingencies."]
      ],
      breakdown: [87, 10, 2, 1, 0],
      reviews: [
        ["Zara & Kabeer", "Sangeet · Hyderabad", "December 2025", 5, "Zoya made reluctant uncles rehearse and somehow enjoy it. The final show was energetic, emotional, and ran exactly on time."],
        ["Aditi Sharma", "Mehendi · Delhi", "April 2025", 5, "Her team handled artists, family performances, and a surprise act without letting the afternoon feel over-planned. Guests had the best time."]
      ]
    },
    "vikram-sethi": {
      name: "Vikram Sethi",
      studio: "Founder, Gather & Glow",
      category: "Beach Celebration Planner",
      location: "Goa · Konkan coast",
      rating: "4.8",
      reviewCount: 132,
      profile: "assets/planner-vikram.jpg",
      banner: "assets/story-garden.jpg",
      bannerAlt: "A sunlit destination gathering planned by Gather and Glow",
      experience: "9 years",
      events: "205+",
      budget: "₹4 lakh",
      languages: "English, Hindi, Konkani",
      response: "Within 3 hours",
      bio: [
        "Vikram Sethi plans beach weddings and relaxed destination gatherings around great light, good music, and an easy guest rhythm. His Goa-based network covers boutique stays, seaside venues, local food, artists, and weather-smart production.",
        "Gather & Glow is known for events that look effortless because the operations are anything but casual. Vikram plans tides, sound permissions, transport, humidity, rain cover, and power well before anyone steps onto the sand."
      ],
      services: [
        ["Beach wedding planning", "Venue, tides, permits, layouts, weather, and guest comfort."],
        ["Weekend itineraries", "Welcome parties, excursions, ceremonies, brunches, and downtime."],
        ["Stay & transport", "Boutique room blocks, airport transfers, shuttles, and help desks."],
        ["Coastal design", "Weather-ready florals, lighting, structures, tables, and signage."],
        ["Music & entertainment", "DJs, bands, local acts, licenses, audio, and performance flow."],
        ["On-ground production", "Local vendors, technical teams, schedules, and backup plans."]
      ],
      breakdown: [88, 9, 2, 1, 0],
      reviews: [
        ["Aisha & Rohan", "Wedding · Goa", "February 2026", 5, "Our ceremony moved by forty minutes for better light, and Vikram adjusted every vendor quietly. The sunset was perfect and the evening never felt delayed."],
        ["Nakul Sethi", "Birthday weekend · Morjim", "September 2025", 5, "Transfers, villas, a boat afternoon, and two parties all worked without a hitch. His local team was responsive and genuinely welcoming."]
      ]
    }
  };

  const params = new URLSearchParams(window.location.search);
  const slug = params.get("planner");
  const activeSlug = planners[slug] ? slug : "aanya-kapoor";
  const planner = planners[activeSlug];

  const setText = (id, value) => {
    const element = document.getElementById(id);
    if (element) element.textContent = value;
  };

  const studioName = planner.studio.replace(/^(Creative Director|Creative Head|Lead Planner|Founder|Director),\s*/, "");
  document.title = `${planner.name} — ${studioName} | Thyohar`;
  document.querySelector('meta[name="description"]').content = `View ${planner.name}'s event planning services, rating, and verified customer reviews on Thyohar.`;

  setText("breadcrumbName", planner.name);
  setText("plannerCategory", planner.category);
  setText("plannerName", planner.name);
  setText("plannerStudio", planner.studio);
  setText("plannerLocation", planner.location);
  setText("plannerRating", planner.rating);
  setText("plannerReviewCount", `${planner.reviewCount} reviews`);
  setText("largeRating", planner.rating);
  setText("largeReviewCount", `Based on ${planner.reviewCount} verified reviews`);
  setText("reviewsSummary", `${planner.reviewCount} verified reviews`);
  setText("plannerExperience", planner.experience);
  setText("plannerEvents", planner.events);
  setText("plannerBudget", planner.budget);
  setText("plannerLanguages", planner.languages);
  setText("plannerResponse", planner.response);
  setText("serviceCount", `${planner.services.length} services`);
  setText("detailYear", new Date().getFullYear());

  const banner = document.getElementById("plannerBanner");
  banner.src = planner.banner;
  banner.alt = planner.bannerAlt;

  const portrait = document.getElementById("plannerPortrait");
  portrait.src = planner.profile;
  portrait.alt = `${planner.name}, ${planner.category}`;

  const bio = document.getElementById("plannerBio");
  bio.replaceChildren(...planner.bio.map((paragraph) => {
    const element = document.createElement("p");
    element.textContent = paragraph;
    return element;
  }));

  const services = document.getElementById("plannerServices");
  services.replaceChildren(...planner.services.map(([title, description], index) => {
    const card = document.createElement("div");
    card.className = "detail-service";

    const number = document.createElement("span");
    number.className = "detail-service__number";
    number.textContent = String(index + 1).padStart(2, "0");

    const content = document.createElement("div");
    const heading = document.createElement("h3");
    heading.textContent = title;
    const copy = document.createElement("p");
    copy.textContent = description;
    content.append(heading, copy);
    card.append(number, content);
    return card;
  }));

  const catalog = window.ThyoharCatalog;
  const catalogPlanner = catalog?.getPlanner(activeSlug);
  const packageOptions = catalog?.getPackages(catalogPlanner) || [];
  const packageContainer = document.getElementById("plannerPackages");
  const selectedPackagePreview = document.getElementById("selectedPackagePreview");
  const formatCurrency = catalog?.formatCurrency || ((value) => `₹${value.toLocaleString("en-IN")}`);

  const savePackageSelection = (selectedPackage) => {
    const selection = {
      planner: {
        slug: activeSlug,
        name: planner.name,
        studio: studioName,
        category: planner.category,
        location: planner.location,
        profile: planner.profile
      },
      package: {
        id: selectedPackage.id,
        name: selectedPackage.name,
        label: selectedPackage.label,
        features: selectedPackage.features,
        originalPrice: selectedPackage.originalPrice,
        offerPrice: selectedPackage.offerPrice
      },
      selectedAt: new Date().toISOString()
    };

    try {
      sessionStorage.setItem("thyoharSelectedPackage", JSON.stringify(selection));
    } catch (error) {
      // The booking link still carries enough information to rebuild the selection.
    }
  };

  const showSelectedPackage = (selectedPackage, shouldSave = true) => {
    packageContainer.querySelectorAll(".package-card").forEach((card) => {
      const selected = card.dataset.packageId === selectedPackage.id;
      card.classList.toggle("is-selected", selected);
      const button = card.querySelector(".package-select");
      button.setAttribute("aria-pressed", String(selected));
      button.innerHTML = selected ? "Selected <span aria-hidden=\"true\">✓</span>" : "Select Package <span aria-hidden=\"true\">→</span>";
    });

    selectedPackagePreview.classList.add("has-selection");
    selectedPackagePreview.innerHTML = `
      <p class="selected-package-preview__eyebrow"><span aria-hidden="true">✓</span> Selected Package</p>
      <div class="selected-planner">
        <img src="${planner.profile}" alt="${planner.name}" width="120" height="120">
        <div><strong>${planner.name}</strong><span>${studioName}</span></div>
      </div>
      <div class="selected-package-preview__details">
        <small>Package</small>
        <h3>${selectedPackage.name}</h3>
        <p>${selectedPackage.label}</p>
        <ul>${selectedPackage.features.slice(0, 4).map((feature) => `<li><span aria-hidden="true">✓</span>${feature}</li>`).join("")}</ul>
        <div class="selected-package-preview__price"><span>Offer Price</span><strong>${formatCurrency(selectedPackage.offerPrice)}</strong><del>${formatCurrency(selectedPackage.originalPrice)}</del></div>
      </div>
      <a class="button button--primary button--full" href="book-package.html?planner=${encodeURIComponent(activeSlug)}&package=${encodeURIComponent(selectedPackage.id)}">Book Selected Package <span aria-hidden="true">→</span></a>
      <p class="selected-package-preview__note">No payment is taken at this step.</p>`;

    if (shouldSave) savePackageSelection(selectedPackage);
  };

  const packageCards = packageOptions.map((packageItem) => {
    const card = document.createElement("article");
    card.className = `package-card${packageItem.featured ? " package-card--featured" : ""}`;
    card.dataset.packageId = packageItem.id;
    card.innerHTML = `
      ${packageItem.featured ? '<span class="package-card__badge">Most popular</span>' : ""}
      <p class="package-card__name-label">Package Name</p>
      <h3>${packageItem.name}</h3>
      <p class="package-card__summary">${packageItem.label}</p>
      <div class="package-card__features">
        <p>Features</p>
        <ul>${packageItem.features.map((feature) => `<li><span aria-hidden="true">✓</span>${feature}</li>`).join("")}</ul>
      </div>
      <div class="package-card__pricing">
        <p><small>Original Price</small><del>${formatCurrency(packageItem.originalPrice)}</del></p>
        <p><small>Offer Price</small><strong>${formatCurrency(packageItem.offerPrice)}</strong></p>
      </div>
      <button class="button button--outline button--full package-select" type="button" aria-pressed="false">Select Package <span aria-hidden="true">→</span></button>`;
    card.querySelector(".package-select").addEventListener("click", () => showSelectedPackage(packageItem));
    return card;
  });
  packageContainer.replaceChildren(...packageCards);

  try {
    const storedSelection = JSON.parse(sessionStorage.getItem("thyoharSelectedPackage") || "null");
    if (storedSelection?.planner?.slug === activeSlug) {
      const previousPackage = packageOptions.find((packageItem) => packageItem.id === storedSelection.package?.id);
      if (previousPackage) showSelectedPackage(previousPackage, false);
    }
  } catch (error) {
    // A fresh package can still be selected if stored data is unavailable or malformed.
  }

  const gallerySources = [
    [planner.banner, `${studioName} signature celebration`],
    ["assets/story-garden.jpg", "Thoughtfully styled guest tables"],
    ["assets/story-engagement.jpg", "A joyful ceremony moment"],
    ["assets/service-decoration.jpg", "Floral and décor details"],
    ["assets/hero-wedding.jpg", "A celebration filled with colour"],
    ["assets/service-catering.jpg", "Guest-ready food experiences"]
  ];
  const uniqueGallery = gallerySources.filter(([source], index, items) => items.findIndex(([candidate]) => candidate === source) === index).slice(0, 5);
  const gallery = document.getElementById("plannerGallery");
  const galleryLightbox = document.getElementById("galleryLightbox");
  const galleryLightboxImage = document.getElementById("galleryLightboxImage");
  const galleryLightboxCaption = document.getElementById("galleryLightboxCaption");
  const galleryLightboxClose = document.getElementById("galleryLightboxClose");

  const closeGalleryLightbox = () => {
    if (typeof galleryLightbox.close === "function") galleryLightbox.close();
    else galleryLightbox.removeAttribute("open");
    document.body.style.overflow = "";
  };

  const galleryItems = uniqueGallery.map(([source, caption], index) => {
    const figure = document.createElement("figure");
    figure.className = `gallery-item gallery-item--${index + 1}`;
    const button = document.createElement("button");
    button.type = "button";
    button.setAttribute("aria-label", `Open image: ${caption}`);
    button.innerHTML = `<img src="${source}" alt="${caption}" width="1000" height="667" loading="lazy"><span>${caption}</span>`;
    button.addEventListener("click", () => {
      galleryLightboxImage.src = source;
      galleryLightboxImage.alt = caption;
      galleryLightboxCaption.textContent = caption;
      if (typeof galleryLightbox.showModal === "function") galleryLightbox.showModal();
      else galleryLightbox.setAttribute("open", "");
      document.body.style.overflow = "hidden";
    });
    figure.append(button);
    return figure;
  });
  gallery.replaceChildren(...galleryItems);

  galleryLightboxClose.addEventListener("click", closeGalleryLightbox);
  galleryLightbox.addEventListener("cancel", () => {
    document.body.style.overflow = "";
  });
  galleryLightbox.addEventListener("click", (event) => {
    if (event.target === galleryLightbox) closeGalleryLightbox();
  });

  const ratingBars = document.getElementById("ratingBars");
  ratingBars.replaceChildren(...planner.breakdown.map((percentage, index) => {
    const row = document.createElement("div");
    row.className = "rating-bar";
    row.setAttribute("aria-label", `${5 - index} stars: ${percentage} percent`);

    const label = document.createElement("span");
    label.textContent = `${5 - index} star`;
    const track = document.createElement("span");
    track.className = "rating-bar__track";
    const fill = document.createElement("span");
    fill.className = "rating-bar__fill";
    fill.style.width = `${percentage}%`;
    track.append(fill);
    const value = document.createElement("b");
    value.textContent = `${percentage}%`;
    row.append(label, track, value);
    return row;
  }));

  const reviewList = document.getElementById("plannerReviews");
  reviewList.replaceChildren(...planner.reviews.map(([name, event, date, rating, review]) => {
    const card = document.createElement("article");
    card.className = "review-card";

    const top = document.createElement("div");
    top.className = "review-card__top";
    const reviewer = document.createElement("div");
    reviewer.className = "reviewer";
    const avatar = document.createElement("span");
    avatar.className = "reviewer__avatar";
    avatar.setAttribute("aria-hidden", "true");
    avatar.textContent = name.split(/[ &]/).filter(Boolean).slice(0, 2).map((part) => part[0]).join("");
    const reviewerDetails = document.createElement("div");
    const reviewerName = document.createElement("strong");
    reviewerName.textContent = name;
    const reviewerMeta = document.createElement("small");
    reviewerMeta.textContent = `${event} · ${date}`;
    reviewerDetails.append(reviewerName, reviewerMeta);
    reviewer.append(avatar, reviewerDetails);

    const stars = document.createElement("span");
    stars.className = "review-card__rating";
    stars.setAttribute("role", "img");
    stars.setAttribute("aria-label", `${rating} out of 5 stars`);
    stars.textContent = "★".repeat(rating);
    top.append(reviewer, stars);

    const copy = document.createElement("p");
    copy.textContent = `“${review}”`;
    card.append(top, copy);
    return card;
  }));

  const availabilityButton = document.getElementById("availabilityButton");
  availabilityButton.setAttribute("aria-label", `Check ${planner.name}'s availability`);
  availabilityButton.addEventListener("click", () => {
    try {
      sessionStorage.setItem("thyoharPlannerInquiry", planner.name);
    } catch (error) {
      // The link still works when browser privacy settings disable storage.
    }
  });

  requestAnimationFrame(() => {
    document.body.classList.remove("detail-loading");
    document.body.classList.add("detail-ready");
  });
})();

(() => {
  "use strict";

  const planners = [
    {
      slug: "aanya-kapoor",
      name: "Aanya Kapoor",
      studio: "Gulmohar Events",
      category: "Luxury Weddings",
      type: "luxury",
      location: "Delhi NCR",
      rating: "4.9",
      reviews: 186,
      experience: "8 years experience",
      startingPrice: 350000,
      profile: "assets/profile-aanya.jpg",
      banner: "assets/service-decoration.jpg",
      bannerAlt: "Elegant event décor by Gulmohar Events",
      bio: "Story-led weddings filled with expressive florals, thoughtful rituals, and warm guest experiences.",
      tags: ["Floral design", "Full planning"],
      serviceHighlights: ["Full-service planning", "Décor direction", "Venue sourcing", "Guest hospitality", "Vendor management", "Wedding production"]
    },
    {
      slug: "arjun-mehta",
      name: "Arjun Mehta",
      studio: "Aakriti Celebrations",
      category: "Destination Weddings",
      type: "destination",
      location: "Jaipur",
      rating: "4.9",
      reviews: 172,
      experience: "10 years experience",
      startingPrice: 500000,
      profile: "assets/profile-arjun.jpg",
      banner: "assets/story-engagement.jpg",
      bannerAlt: "Garden wedding planned by Aakriti Celebrations",
      bio: "Seamless destination weekends that balance royal settings with relaxed, personal hospitality.",
      tags: ["Palace venues", "Guest logistics"],
      serviceHighlights: ["Destination planning", "Venue and stay", "Travel logistics", "Experience design", "Event production", "Family concierge"]
    },
    {
      slug: "meera-iyer",
      name: "Meera Iyer",
      studio: "Vastram & Vows",
      category: "Cultural Celebrations",
      type: "cultural",
      location: "Bengaluru",
      rating: "4.8",
      reviews: 139,
      experience: "7 years experience",
      startingPrice: 300000,
      profile: "assets/profile-meera.jpg",
      banner: "assets/hero-wedding.jpg",
      bannerAlt: "Wedding celebration arranged by Vastram and Vows",
      bio: "Tradition-rich celebrations designed with modern ease, careful timelines, and family at the centre.",
      tags: ["Traditions", "Family events"],
      serviceHighlights: ["Ceremony planning", "Family coordination", "Vendor curation", "Guest hospitality", "Design planning", "On-day management"]
    },
    {
      slug: "kabir-khanna",
      name: "Kabir Khanna",
      studio: "Saffron Soirées",
      category: "Food-led Events",
      type: "luxury",
      location: "Mumbai",
      rating: "4.9",
      reviews: 204,
      experience: "12 years experience",
      startingPrice: 400000,
      profile: "assets/profile-kabir.jpg",
      banner: "assets/service-catering.jpg",
      bannerAlt: "Celebration menu curated by Saffron Soirées",
      bio: "Vibrant celebrations built around memorable menus, impeccable hosting, and effortless flow.",
      tags: ["Menu curation", "Luxury socials"],
      serviceHighlights: ["Full event planning", "Menu curation", "Hospitality design", "Venue operations", "Bar and beverage", "Celebration styling"]
    },
    {
      slug: "riya-bansal",
      name: "Riya Bansal",
      studio: "Noor Weddings",
      category: "Heritage Weddings",
      type: "intimate",
      location: "Lucknow",
      rating: "4.9",
      reviews: 126,
      experience: "8 years experience",
      startingPrice: 250000,
      profile: "assets/profile-riya.jpg",
      banner: "assets/service-fashion.jpg",
      bannerAlt: "Heritage celebration styled by Noor Weddings",
      bio: "Graceful, intimate weddings inspired by heritage spaces, old-world details, and personal stories.",
      tags: ["Heritage venues", "Intimate events"],
      serviceHighlights: ["Heritage venue planning", "Creative direction", "Intimate wedding planning", "Vendor management", "Family hospitality", "Event-day direction"]
    },
    {
      slug: "dev-malhotra",
      name: "Dev Malhotra",
      studio: "The Celebration Co.",
      category: "Large-format Events",
      type: "large",
      location: "Chandigarh",
      rating: "4.7",
      reviews: 114,
      experience: "9 years experience",
      startingPrice: 450000,
      profile: "assets/planner-dev.jpg",
      banner: "assets/story-garden.jpg",
      bannerAlt: "Large guest celebration managed by The Celebration Company",
      bio: "Confident large-format planning with crisp production, spirited entertainment, and guest-first service.",
      tags: ["Production", "Entertainment"],
      serviceHighlights: ["Large wedding planning", "Technical production", "Entertainment", "Guest movement", "Vendor operations", "Safety and contingency"]
    },
    {
      slug: "ishita-rao",
      name: "Ishita Rao",
      studio: "Mango Leaf Events",
      category: "Multicultural Events",
      type: "cultural",
      location: "Hyderabad",
      rating: "4.8",
      reviews: 102,
      experience: "6 years experience",
      startingPrice: 280000,
      profile: "assets/planner-ishita.jpg",
      banner: "assets/service-makeup.jpg",
      bannerAlt: "Colourful celebration planned by Mango Leaf Events",
      bio: "Colourful multicultural events where every custom is understood and every guest feels included.",
      tags: ["Fusion weddings", "Eco-conscious"],
      serviceHighlights: ["Multicultural planning", "Sustainable sourcing", "Creative concept", "Vendor curation", "Guest communication", "On-site management"]
    },
    {
      slug: "neel-verma",
      name: "Neel Verma",
      studio: "White Lotus Planners",
      category: "Palace Weddings",
      type: "destination",
      location: "Udaipur",
      rating: "4.8",
      reviews: 157,
      experience: "11 years experience",
      startingPrice: 600000,
      profile: "assets/planner-neel.jpg",
      banner: "assets/story-palace.jpg",
      bannerAlt: "Palace wedding planned by White Lotus Planners",
      bio: "Refined palace weddings with strong local relationships, elegant design, and precise guest logistics.",
      tags: ["Venue sourcing", "Hospitality"],
      serviceHighlights: ["Palace venue sourcing", "Destination logistics", "Luxury hospitality", "Design and production", "Food experiences", "Event command"]
    },
    {
      slug: "tara-sen",
      name: "Tara Sen",
      studio: "Paperboat Celebrations",
      category: "Intimate Weddings",
      type: "intimate",
      location: "Kolkata",
      rating: "4.7",
      reviews: 91,
      experience: "5 years experience",
      startingPrice: 200000,
      profile: "assets/planner-tara.jpg",
      banner: "assets/service-photography.jpg",
      bannerAlt: "Creative wedding by Paperboat Celebrations",
      bio: "Artful small weddings with handmade details, relaxed timelines, and plenty of personality.",
      tags: ["Creative concept", "Small weddings"],
      serviceHighlights: ["Intimate event planning", "Creative direction", "Unusual venue sourcing", "Guest experience", "Local vendor curation", "Event-day coordination"]
    },
    {
      slug: "aarav-joshi",
      name: "Aarav Joshi",
      studio: "The Marigold Project",
      category: "Sustainable Events",
      type: "sustainable",
      location: "Pune",
      rating: "4.9",
      reviews: 118,
      experience: "7 years experience",
      startingPrice: 300000,
      profile: "assets/planner-aarav.jpg",
      banner: "assets/service-decoration.jpg",
      bannerAlt: "Sustainable floral event by The Marigold Project",
      bio: "Low-waste celebrations that use local craft, seasonal materials, and modern, joyful design.",
      tags: ["Sustainable décor", "Outdoor events"],
      serviceHighlights: ["Sustainable planning", "Eco-conscious design", "Outdoor event planning", "Waste management", "Vendor coordination", "Event operations"]
    },
    {
      slug: "zoya-mirza",
      name: "Zoya Mirza",
      studio: "Mehfil & More",
      category: "Entertainment Events",
      type: "large",
      location: "Delhi & Hyderabad",
      rating: "4.8",
      reviews: 145,
      experience: "8 years experience",
      startingPrice: 350000,
      profile: "assets/planner-zoya.jpg",
      banner: "assets/hero-wedding.jpg",
      bannerAlt: "Sangeet produced by Mehfil and More",
      bio: "High-energy pre-wedding celebrations with standout performances, bright styling, and smooth production.",
      tags: ["Choreography", "Artist booking"],
      serviceHighlights: ["Sangeet production", "Artist booking", "Choreography", "Technical production", "Mehendi planning", "Full event coordination"]
    },
    {
      slug: "vikram-sethi",
      name: "Vikram Sethi",
      studio: "Gather & Glow",
      category: "Beach Celebrations",
      type: "destination",
      location: "Goa",
      rating: "4.8",
      reviews: 132,
      experience: "9 years experience",
      startingPrice: 400000,
      profile: "assets/planner-vikram.jpg",
      banner: "assets/story-garden.jpg",
      bannerAlt: "Beach celebration planned by Gather and Glow",
      bio: "Breezy beach weddings and social events designed for golden hours, good music, and happy guests.",
      tags: ["Beach venues", "Weekend events"],
      serviceHighlights: ["Beach wedding planning", "Weekend itineraries", "Stay and transport", "Coastal design", "Music and entertainment", "On-ground production"]
    }
  ];

  const roundToFiveThousand = (value) => Math.round(value / 5000) * 5000;
  const formatCurrency = (value) => new Intl.NumberFormat("en-IN", {
    style: "currency",
    currency: "INR",
    maximumFractionDigits: 0
  }).format(value);

  const getPlanner = (slug) => planners.find((planner) => planner.slug === slug);

  const getPackages = (plannerOrSlug) => {
    const planner = typeof plannerOrSlug === "string" ? getPlanner(plannerOrSlug) : plannerOrSlug;
    if (!planner) return [];

    const services = planner.serviceHighlights || [];
    const packageDetails = [
      {
        id: "essential",
        name: "Essential Planning",
        label: "For one beautifully managed event",
        multiplier: 1,
        originalMultiplier: 1.16,
        features: [...services.slice(0, 3), "Planning timeline and consultation"]
      },
      {
        id: "signature",
        name: "Signature Celebration",
        label: "Our most-loved end-to-end experience",
        multiplier: 1.65,
        originalMultiplier: 1.15,
        featured: true,
        features: [...services.slice(0, 5), "Lead planner on event day"]
      },
      {
        id: "grand",
        name: "Grand Celebration",
        label: "For multi-event celebrations with full support",
        multiplier: 2.4,
        originalMultiplier: 1.13,
        features: [...services, "Dedicated guest concierge team", "Priority planning support"]
      }
    ];

    return packageDetails.map((item) => {
      const offerPrice = roundToFiveThousand(planner.startingPrice * item.multiplier);
      const originalPrice = roundToFiveThousand(offerPrice * item.originalMultiplier);
      return { ...item, offerPrice, originalPrice };
    });
  };

  window.ThyoharCatalog = {
    planners,
    getPlanner,
    getPackages,
    formatCurrency
  };
})();

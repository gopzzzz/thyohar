  <header class="site-header account-site-header" id="siteHeader">
    <div class="container nav-shell">
      <a class="brand" href="{{url('index')}}" aria-label="Thyohar home">
        <img src="{{asset('web/assets/thyohar-logo.jpg')}}" alt="Thyohar" width="998" height="375">
      </a>
      <button class="menu-toggle" id="menuToggle" type="button" aria-expanded="false" aria-controls="primaryNav" aria-label="Open navigation menu"><span></span><span></span><span></span></button>
      <nav class="primary-nav" id="primaryNav" aria-label="Main navigation">
        <a class="nav-link" href="{{url('index')}}">Home</a>
        <a class="nav-link" href="{{url('index')}}#about">About Us</a>
        <a class="nav-link" href="{{url('planners')}}">Planners</a>
        <a class="nav-link" href="{{url('userlogin')}}" data-auth-link>Login</a>
      </nav>
      <a class="button button--small nav-cta" href="{{url('user-registration')}}" aria-current="page" data-auth-guest>Create account</a>
    </div>
  </header>
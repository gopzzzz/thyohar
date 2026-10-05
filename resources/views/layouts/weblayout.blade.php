<!DOCTYPE html>
<html lang="en">

@include('layouts.webpartials.head')

<body>
     <a class="skip-link" href="#main-content">Skip to main content</a>

  
        @include('layouts.webpartials.header')
    

    @yield('content')

    @include('layouts.webpartials.footer')
    @include('layouts.webpartials.footerscript')

</body>
</html>

<!doctype html>
<html lang="en">

@include('public.includes.head')

@stack('classType')

<main>

  @yield('content')

</main>

@include('public.includes.footer')

@include('public.includes.footerJs')

</body>

</html>
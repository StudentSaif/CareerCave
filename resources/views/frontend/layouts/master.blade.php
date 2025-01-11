<!DOCTYPE html>
<html class="no-js" lang="en_AU" />

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Career Cave</title>
    <meta name="description" content="" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no" />
    <meta name="HandheldFriendly" content="True" />
    <meta name="pinterest" content="nopin" />
    @include('frontend.layouts.style')
</head>

<body data-instant-intensity="mousedown">

    {{-- header starts here --}}
    @include('frontend.layouts.header')
    {{-- header ends here --}}

    {{-- content starts here --}}
    @yield('content')
    {{-- content ends here --}}

    {{-- footer section starts --}}
    @include('frontend.layouts.footer')
    {{-- footer section ends --}}

    {{-- script starts --}}
    @include('frontend.layouts.script')
    {{-- script ends --}}

</body>

</html>

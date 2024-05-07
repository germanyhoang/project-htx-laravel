<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('frontend.style.link')
</head>

<body>
    {{--  HEADER  --}}

    @include('frontend.style.header')
    {{--  CONTENT   --}}
    @yield('content-layout')
    {{--  FOOTER  --}}
    @include('frontend.style.footer')
    {{--  LINK   --}}
    @include('frontend.style.script')


</body>

</html>

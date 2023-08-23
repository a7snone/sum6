<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.partials.meta')
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" /> -->
</head>

<body style='direction:rtl'>

    @include('layouts.partials.header')

    <div class="mainContainer">
        @yield('content')
    </div>

    @include('layouts.partials.footer')

    @yield('scripts')
</body>

</html>

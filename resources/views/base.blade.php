<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />

   <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
-->
<link rel="stylesheet" href="{{ asset('css/all.min.css') }}" />
@yield('head_content')
</head>
<body>
@yield('content')

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/all.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>

</body>
</html>
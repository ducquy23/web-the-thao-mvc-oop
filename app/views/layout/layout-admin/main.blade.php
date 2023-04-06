<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layout.layout-admin.style')
    <title>Admin</title>
</head>

<body>
<div class="wapper">
    {{--    side-bar  --}}
    @include('layout.layout-admin.side-bar')
    <div class="main-content">
        @include('layout.layout-admin.header')
        @yield('content')
    </div>

</div>

</body>
<script>
    // Replace the <textarea id="editor1"> with a CKEditor 4
    // instance, using default configuration.
    CKEDITOR.replace( 'editor' );
</script>

</html>
<!DOCTYPE html>
<html lang="<?=str_replace('_', '-', app()->getLocale());?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?=csrf_token();?>">

    <title><?=config('app.name', 'Laravel');?></title>

    <!-- Scripts -->
    <script src="<?=asset('js/register.js');?>"></script>
    <script src="worker.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com" media="false" onload="if(media!='all')media='all'">
    <link rel="shortcut icon" type="image/x-icon" href="<?=ENV('APP_URL');?>/favicon.ico" media="false" onload="if(media!='all')media='all'">

    <!-- Styles -->
    <link href="<?=asset('css/app.css');?>" rel="stylesheet">

    <!-- Manifests -->
    <link rel="manifest" href="manifest.json" media="false" onload="if(media!='all')media='all'">
</head>
<body>
    <div id="app">
        @include('includes.navbar')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

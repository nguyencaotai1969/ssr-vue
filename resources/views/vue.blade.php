<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel + Vue server side rendering example</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script defer src="{{ mix('js/vue/entry-client.js') }}"></script>
    </head>
    <body class="bg-paper font-sans leading-normal text-grey-darkest border-t-4 border-orange-light">
        {!! ssr('js/vue/entry-server.js')
            // Share the packages with the server script through context
            ->context('packages', $packages)
            // If ssr fails, we need a container to render the app client-side
            ->fallback('<div id="app"></div>')
            ->render() !!}

        <script>
            // Share the packages with the client script through a JS variable
            window.packages = @json($packages)
        </script>

    </body>
</html>

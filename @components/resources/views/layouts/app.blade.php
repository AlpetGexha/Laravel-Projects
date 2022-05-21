<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- fontawesome link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
    </script>
    @stack('styles')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <livewire:styles />
    <style>
        html {
            scroll-behavior: smooth
        }

        body {
            font-family: 'Nunito', sans-serif;
            background: #f7fafc;
            margin: 5rem 0px 5rem 0px;
            background: var(--bs-light);
        }

        h3 {
            font-size: 2.25rem;
            margin-top: 3rem;
            color: #2d3342;
            scroll-margin-top: 4rem;
            font-weight: 800;
            letter-spacing: -.025em;
            border-bottom-width: 1px;
            border-color: #edf2f7;
            font-family: 'Karla', system-ui, -apple-system,
                'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji';
        }

        .red {
            color: brown;
        }

        .blue {
            color: blue;
        }

        .inline-edit:hover {
            display: block;
            width: 100%;
            min-height: calc(1.5em + 0.75rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0.25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

    </style>
</head>

<body>
    <div class="container mt-3">
        {{ $slot }}
    </div>
    @stack('scripts')
    <livewire:scripts />
</body>

</html>

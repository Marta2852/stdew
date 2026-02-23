<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Warm Farm dark theme (site-wide overrides) -->
        <style>
            :root{
                --wf-bg: #0B1220;
                --wf-surface: #121826;
                --wf-text: #F8FAFC;
                --wf-muted: #B7C0C8;
                --wf-primary: #B58E1A;
                --wf-secondary: #34D399;
                --wf-border: rgba(255,255,255,0.04);
            }

            body.warm-farm { background-color: var(--wf-bg); color: var(--wf-text); }

            /* Surface / card replacement for bg-white */
            body.warm-farm .bg-white { background-color: var(--wf-surface) !important; color: var(--wf-text) !important; border: 1px solid var(--wf-border); }

            /* Muted / gray text */
            body.warm-farm .text-gray-500,
            body.warm-farm .text-gray-600,
            body.warm-farm .text-gray-400 { color: var(--wf-muted) !important; }

            /* Adjust common bg utilities used in views */
            /* Normalize most background utilities to the same surface used by recent achievements */
            body.warm-farm .bg-white,
            body.warm-farm .bg-green-50,
            body.warm-farm .bg-green-100,
            body.warm-farm .bg-green-200,
            body.warm-farm .bg-gray-200,
            body.warm-farm .bg-green-50,
            body.warm-farm .bg-purple-100 { background-color: var(--wf-surface) !important; color: var(--wf-text) !important; border: 1px solid var(--wf-border) !important; }

            /* Accent colors */
            body.warm-farm .bg-green-600 { background-color: var(--wf-secondary) !important; }
            body.warm-farm .bg-green-500 { background-color: var(--wf-secondary) !important; }
            body.warm-farm .bg-purple-600 { background-color: var(--wf-primary) !important; }

            /* Replace blue utilities with primary (achievement) color */
            body.warm-farm .bg-blue-500,
            body.warm-farm .bg-blue-600,
            body.warm-farm .bg-blue-700 { background-color: var(--wf-primary) !important; }

            body.warm-farm .text-blue-600,
            body.warm-farm a.text-blue-600 { color: var(--wf-primary) !important; }

            /* Navbar and buttons */
            body.warm-farm nav { background-color: var(--wf-surface) !important; border-bottom: 1px solid var(--wf-border); }
            body.warm-farm nav a { color: var(--wf-text) !important; }
            body.warm-farm .bg-green-700 { background-color: #166534 !important; }
            body.warm-farm .bg-green-900 { background-color: #064e3b !important; }

            /* Make navbar links visually uniform */
            body.warm-farm nav a { background-color: transparent !important; padding: 0.25rem 0.5rem; border-radius: 0.375rem; }
            body.warm-farm nav a:hover { background-color: rgba(255,255,255,0.02) !important; }
            body.warm-farm nav a.underline { text-decoration-color: var(--wf-primary) !important; font-weight: 600 !important; }

            /* Achievement accent */
            .achievement-card.unlocked { box-shadow: 0 8px 24px rgba(181,142,26,0.06); border: 1px solid rgba(181,142,26,0.10); }

            /* Progress bar visibility */
            .progress-track { background-color: rgba(255,255,255,0.03) !important; height: 10px !important; border-radius: 9999px !important; overflow: hidden; border: 1px solid rgba(255,255,255,0.03); }
            .progress-fill { background-color: var(--wf-secondary) !important; height: 100% !important; display: block; }

            /* Form controls (inputs, textareas, selects) dark theme */
            body.warm-farm input,
            body.warm-farm textarea,
            body.warm-farm select,
            body.warm-farm .form-input {
                background-color: var(--wf-surface) !important;
                color: var(--wf-text) !important;
                border: 1px solid rgba(255,255,255,0.06) !important;
                caret-color: var(--wf-text) !important;
            }

            body.warm-farm input::placeholder,
            body.warm-farm textarea::placeholder {
                color: var(--wf-muted) !important;
                opacity: 1 !important;
            }
        </style>
    </head>
    <body class="font-sans antialiased warm-farm">
        @include('layouts.navigation')

        <main>
            {{ $slot }}
        </main>
    </body>
</html>

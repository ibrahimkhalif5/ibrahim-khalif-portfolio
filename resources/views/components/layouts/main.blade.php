<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @php
        $seo = config('portfolio.seo');
        $pageTitle = $seo['title'] ?? config('portfolio.personal.name');
        $pageDescription = $seo['description'] ?? '';
        $canonicalUrl = rtrim($seo['canonical'] ?? url('/'), '/');
        $ogImage = asset($seo['og_image'] ?? '');
    @endphp

    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $pageDescription }}">

    <link rel="canonical" href="{{ $canonicalUrl }}">

    {{-- Open Graph --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $canonicalUrl }}">
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $pageDescription }}">
    <meta property="og:site_name" content="{{ $seo['site_name'] ?? '' }}">
    <meta property="og:image" content="{{ $ogImage }}">
    <meta property="og:image:alt" content="Portfolio of Ibrahim Khalif, Software Engineer and AI Student">

    {{-- Twitter / X --}}
    <meta name="twitter:card" content="summary_large_image">
    @if(!empty($seo['twitter_handle']))
        <meta name="twitter:site" content="{{ $seo['twitter_handle'] }}">
    @endif
    <meta name="twitter:title" content="{{ $pageTitle }}">
    <meta name="twitter:description" content="{{ $pageDescription }}">
    <meta name="twitter:image" content="{{ $ogImage }}">
    <meta name="twitter:image:alt" content="Portfolio of Ibrahim Khalif, Software Engineer and AI Student">

    {{-- Favicon --}}
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net" crossorigin>
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700|jetbrains-mono:400,500" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-navy-dark text-text-primary antialiased overflow-x-hidden">

    {{-- Mobile overlay --}}
    <div id="mobile-overlay" class="mobile-menu-overlay lg:hidden"></div>

    {{-- Mobile sidebar menu --}}
    <div id="mobile-menu" class="fixed top-0 right-0 z-50 h-full w-72 bg-navy-dark transform translate-x-full transition-transform duration-300 ease-in-out lg:hidden shadow-2xl">
        <div class="flex justify-end p-6">
            <button id="mobile-menu-close" class="text-text-secondary hover:text-accent transition-colors" aria-label="Close menu">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </button>
        </div>
        <nav class="px-8">
            <ol class="list-none space-y-4">
                @foreach(config('portfolio.nav') as $item)
                    <li>
                        <a href="#{{ $item['id'] }}" class="mobile-nav-link font-mono text-sm text-text-secondary hover:text-accent transition-colors">
                            <span class="text-accent">{{ str_pad($loop->index + 1, 2, '0', STR_PAD_LEFT) }}.</span>
                            {{ $item['label'] }}
                        </a>
                    </li>
                @endforeach
            </ol>
            <div class="mt-8">
                <a href="{{ asset(config('portfolio.personal.resume_url')) }}" download target="_blank" rel="noopener noreferrer" class="cta-button-primary cta-button font-mono text-sm">
                    {{ config('portfolio.personal.resume_label') }}
                </a>
                <div class="mt-4">
                    <a href="mailto:{{ config('portfolio.personal.email') }}" class="cta-button-primary cta-button font-mono text-sm">
                        Say Hello
                    </a>
                </div>
            </div>
        </nav>
        <div class="absolute bottom-8 left-0 right-0 flex justify-center gap-6">
            @include('components.social-links', ['compact' => true])
        </div>
    </div>

    {{-- Desktop layout --}}
    <div class="lg:flex lg:min-h-screen">

        {{-- Fixed sidebar (desktop) --}}
        <aside class="hidden lg:flex lg:fixed lg:top-0 lg:left-0 lg:h-screen lg:w-[280px] lg:xl:w-[320px] lg:flex-col lg:justify-between lg:p-6 lg:xl:p-10">
            <div>
                <a href="/" class="block group">
                    <p class="text-xl font-bold text-text-primary group-hover:text-accent transition-colors" aria-label="{{ config('portfolio.personal.name') }}">
                        {{ config('portfolio.personal.name') }}
                    </p>
                </a>
                <p class="mt-2 text-sm text-text-secondary">
                    {{ config('portfolio.personal.role_line') }}
                </p>

                <nav class="mt-12">
                    <ol class="list-none space-y-3">
                        @foreach(config('portfolio.nav') as $item)
                            <li>
                                <a href="#{{ $item['id'] }}" class="sidebar-nav-link" data-section="{{ $item['id'] }}">
                                    <span class="font-mono text-accent">{{ str_pad($loop->index + 1, 2, '0', STR_PAD_LEFT) }}.</span>
                                    {{ $item['label'] }}
                                </a>
                            </li>
                        @endforeach
                    </ol>
                </nav>
            </div>

            <div class="flex flex-col gap-4">
                <a href="{{ asset(config('portfolio.personal.resume_url')) }}" download class="cta-button cta-button-primary font-mono text-sm text-center mb-4">
                    {{ config('portfolio.personal.resume_label') }}
                </a>
                @include('components.social-links', ['compact' => false])
            </div>
        </aside>

        {{-- Mobile top bar --}}
        <header class="fixed top-0 left-0 right-0 z-30 flex items-center justify-between p-4 lg:hidden bg-navy-dark/90 backdrop-blur-sm">
            <a href="/" class="text-base font-bold text-text-primary">{{ config('portfolio.personal.short_name') }}</a>
            <button id="mobile-menu-button" class="text-text-secondary hover:text-accent transition-colors" aria-label="Open menu">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
            </button>
        </header>

        {{-- Main content --}}
        <main class="w-full lg:ml-[280px] xl:ml-[320px]">
            <div class="max-w-[900px] px-6 sm:px-8 md:px-12 py-16 lg:py-24">

                {{ $slot }}

                {{-- Footer --}}
                <footer class="pt-24 pb-8 border-t border-navy-lightest/30 mt-24">
                    <p class="text-center text-xs text-text-tertiary font-mono">
                        Designed & Built by Ibrahim Khalif
                    </p>
                </footer>
            </div>
        </main>
    </div>

</body>
</html>

<x-section-heading id="exploring" number="06" title="What I'm Exploring">
    <div class="space-y-10">

        {{-- Intro --}}
        <p class="text-text-secondary text-base leading-relaxed max-w-2xl reveal">
            {{ config('portfolio.exploring.intro') }}
        </p>

        {{-- Focus areas --}}
        <div class="grid md:grid-cols-3 gap-5">
            @foreach(config('portfolio.exploring.areas') as $area)
                <div class="focus-card reveal">
                    {{-- Icon --}}
                    <div class="focus-icon mb-5">
                        @if($area['icon'] === 'brain')
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 5a3 3 0 1 0-5.997.125 4 4 0 0 0-2.526 5.77 4 4 0 0 0 .556 6.588A4 4 0 1 0 12 18Z"/>
                                <path d="M12 5a3 3 0 1 1 5.997.125 4 4 0 0 1 2.526 5.77 4 4 0 0 1-.556 6.588A4 4 0 1 1 12 18Z"/>
                                <path d="M15 13a4.5 4.5 0 0 1-3-4 4.5 4.5 0 0 1-3 4"/>
                                <path d="M17.599 6.5a3 3 0 0 0 .399-1.375"/>
                                <path d="M6.003 5.125A3 3 0 0 0 6.401 6.5"/>
                                <path d="M3.477 10.896a4 4 0 0 1 .585-.396"/>
                                <path d="M19.938 10.5a4 4 0 0 1 .585.396"/>
                                <path d="M6 18a4 4 0 0 1-1.967-.516"/>
                                <path d="M19.967 17.484A4 4 0 0 1 18 18"/>
                            </svg>
                        @elseif($area['icon'] === 'code')
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="16 18 22 12 16 6"></polyline>
                                <polyline points="8 6 2 12 8 18"></polyline>
                                <line x1="14" y1="4" x2="10" y2="20"></line>
                            </svg>
                        @elseif($area['icon'] === 'server')
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="20" height="8" x="2" y="2" rx="2" ry="2"></rect>
                                <rect width="20" height="8" x="2" y="14" rx="2" ry="2"></rect>
                                <line x1="6" y1="6" x2="6.01" y2="6"></line>
                                <line x1="6" y1="18" x2="6.01" y2="18"></line>
                            </svg>
                        @endif
                    </div>

                    {{-- Title --}}
                    <h3 class="text-lg font-bold text-text-primary mb-2">{{ $area['title'] }}</h3>

                    {{-- Description --}}
                    <p class="text-text-secondary text-sm leading-relaxed mb-5">{{ $area['description'] }}</p>

                    {{-- Items --}}
                    <ul class="space-y-2 mt-auto">
                        @foreach($area['items'] as $item)
                            <li class="flex items-center gap-2.5 text-sm text-text-secondary">
                                <span class="focus-check shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="20 6 9 17 4 12"></polyline>
                                    </svg>
                                </span>
                                {{ $item }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</x-section-heading>

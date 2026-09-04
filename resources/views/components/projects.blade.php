<x-section-heading id="projects" number="05" title="Projects">
    <div class="space-y-6">

        <p class="text-text-secondary text-base leading-relaxed max-w-2xl mb-6">
            {{ config('portfolio.projects.lead') }}
        </p>

        {{-- Featured projects --}}
        @foreach(config('portfolio.projects.items') as $project)
            @if($project['featured'])
                <div class="project-featured reveal">
                    <div class="grid md:grid-cols-5 gap-0">

                        {{-- Screenshot area --}}
                        <div class="md:col-span-3 project-screenshot-area">
                            @if($project['screenshot'])
                                <img
                                    src="{{ asset($project['screenshot']) }}"
                                    alt="{{ $project['title'] }} screenshot"
                                    class="w-full h-full object-cover"
                                    loading="lazy"
                                />
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <div class="text-center project-screenshot-hint">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="text-navy-lightest mx-auto mb-3">
                                            <rect width="18" height="18" x="3" y="3" rx="2" ry="2"></rect>
                                            <circle cx="9" cy="9" r="2"></circle>
                                            <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"></path>
                                        </svg>
                                        <span class="text-text-tertiary text-xs font-mono uppercase tracking-wider">Production System</span>
                                    </div>
                                </div>
                            @endif
                        </div>

                        {{-- Content --}}
                        <div class="md:col-span-2 project-featured-content">
                            <div class="p-6 md:p-8 flex flex-col h-full">
                                @if($project['url'])
                                    <a href="{{ $project['url'] }}" target="_blank" rel="noopener noreferrer" class="mb-3 self-start">
                                        <span class="visit-link-badge">
                                            <span class="visit-link-dot"></span>
                                            Live System
                                        </span>
                                    </a>
                                @endif

                                <span class="project-category-label mb-3">{{ $project['category'] }}</span>

                                <h3 class="text-xl font-bold text-text-primary mb-3">
                                    @if($project['url'])
                                        <a href="{{ $project['url'] }}" target="_blank" rel="noopener noreferrer" class="hover:text-accent transition-colors">
                                            {{ $project['title'] }}
                                        </a>
                                    @else
                                        {{ $project['title'] }}
                                    @endif
                                </h3>

                                <p class="text-text-secondary text-sm leading-relaxed mb-5 flex-grow">
                                    {{ $project['description'] }}
                                </p>

                                <div class="flex flex-wrap gap-2 mb-5">
                                    @foreach($project['technologies'] as $tech)
                                        <span class="tag">{{ $tech }}</span>
                                    @endforeach
                                </div>

                                <div class="flex items-center gap-4 mt-auto">
                                    @if($project['url'])
                                        <a href="{{ $project['url'] }}" target="_blank" rel="noopener noreferrer" class="animated-link">
                                            View Project
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="link-arrow"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                                        </a>
                                    @endif
                                    @if($project['github'])
                                        <a href="{{ $project['github'] }}" target="_blank" rel="noopener noreferrer" class="animated-link text-text-secondary">
                                            GitHub
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

        {{-- Other projects grid --}}
        <div class="grid md:grid-cols-2 gap-4">
            @foreach(config('portfolio.projects.items') as $project)
                @if(!$project['featured'])
                    <div class="project-card reveal">
                        <div>
                            <span class="project-category-label mb-3">{{ $project['category'] }}</span>

                            <h3 class="text-lg font-bold text-text-primary mt-3 mb-2">
                                @if($project['url'])
                                    <a href="{{ $project['url'] }}" target="_blank" rel="noopener noreferrer" class="hover:text-accent transition-colors">
                                        {{ $project['title'] }}
                                    </a>
                                @else
                                    {{ $project['title'] }}
                                @endif
                            </h3>

                            <p class="text-text-secondary text-sm leading-relaxed mb-4">
                                {{ $project['description'] }}
                            </p>
                        </div>

                        <div class="flex flex-wrap gap-2 mb-4 mt-auto">
                            @foreach($project['technologies'] as $tech)
                                <span class="tag">{{ $tech }}</span>
                            @endforeach
                        </div>

                        <div class="flex items-center gap-4">
                            @if($project['url'])
                                <a href="{{ $project['url'] }}" target="_blank" rel="noopener noreferrer" class="animated-link">
                                    View Project
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="link-arrow"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
                                </a>
                            @endif
                            @if($project['github'])
                                <a href="{{ $project['github'] }}" target="_blank" rel="noopener noreferrer" class="animated-link text-text-secondary">
                                    GitHub
                                </a>
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</x-section-heading>

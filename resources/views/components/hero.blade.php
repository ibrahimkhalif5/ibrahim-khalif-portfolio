<div class="flex flex-col justify-center min-h-[85vh] md:min-h-screen pt-16 lg:pt-0">
    <div>
        <p class="font-mono text-sm text-accent mb-5 animate-fade-in-up animate-delay-100">
            Hi, my name is
        </p>

        <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold text-text-primary leading-tight animate-fade-in-up animate-delay-200">
            {{ config('portfolio.personal.name') }}.
        </h1>

        <h2 class="mt-4 text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-text-secondary leading-tight animate-fade-in-up animate-delay-300">
            {{ config('portfolio.personal.tagline') }}
        </h2>

        <p class="mt-4 font-mono text-sm md:text-base text-accent animate-fade-in-up animate-delay-350">
            {{ config('portfolio.personal.role_line') }}
        </p>

        <p class="mt-6 max-w-xl text-base md:text-lg text-text-secondary leading-relaxed animate-fade-in-up animate-delay-400">
            {{ config('portfolio.personal.summary') }}
        </p>

        <div class="mt-9 grid grid-cols-1 sm:grid-cols-3 gap-4 animate-fade-in-up animate-delay-450">
            @foreach(config('portfolio.personal.hero_focus') as $focus)
                <div class="border border-navy-lightest/60 bg-navy-secondary/40 rounded-md p-4">
                    <div class="flex items-center gap-2 mb-1.5">
                        @if($focus['icon'] === 'code')
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-accent"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline><line x1="14" y1="4" x2="10" y2="20"></line></svg>
                        @elseif($focus['icon'] === 'graduation')
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-accent"><path d="M22 10v6M2 10l10-5 10 5-10 5z"></path><path d="M6 12v5c3 3 9 3 12 0v-5"></path></svg>
                        @elseif($focus['icon'] === 'map')
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-accent"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        @endif
                        <span class="font-mono text-xs text-accent uppercase tracking-wider">{{ $focus['label'] }}</span>
                    </div>
                    <p class="text-xs text-text-secondary leading-snug">{{ $focus['detail'] }}</p>
                </div>
            @endforeach
        </div>

        <div class="mt-10 flex flex-wrap gap-4 animate-fade-in-up animate-delay-500">
            <a href="#projects" class="cta-button cta-button-primary">
                View My Work
            </a>
            <a href="{{ asset(config('portfolio.personal.resume_url')) }}" download class="cta-button cta-button-secondary">
                Download {{ config('portfolio.personal.resume_label') }}
            </a>
        </div>
    </div>
</div>

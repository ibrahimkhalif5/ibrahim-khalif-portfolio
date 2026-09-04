<x-section-heading id="about" number="01" title="About Me">
    <div class="grid md:grid-cols-3 gap-8 md:gap-12">
        <div class="md:col-span-2 space-y-4">
            <p class="text-text-secondary leading-relaxed">
                {{ config('portfolio.personal.about_intro') }}
            </p>
            <p class="text-text-secondary leading-relaxed">
                {{ config('portfolio.personal.about_detail') }}
            </p>
            <p class="text-text-secondary leading-relaxed">
                {{ config('portfolio.personal.about_paragraph3') }}
            </p>
            <p class="text-text-secondary leading-relaxed">
                {{ config('portfolio.personal.about_paragraph4') }}
            </p>

            <div class="bg-navy rounded p-5 border border-navy-lightest/40 mt-6">
                <h3 class="font-mono text-accent text-sm mb-3 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M12 6v6l4 2"></path></svg>
                    Open To
                </h3>
                <div class="flex flex-wrap gap-2">
                    @foreach(config('portfolio.personal.open_to') as $role)
                        <span class="tag">{{ $role }}</span>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="space-y-4">
            <div class="bg-navy rounded p-5">
                <h3 class="font-mono text-accent text-sm mb-3">Currently</h3>
                <div class="space-y-4 text-sm">
                    <div>
                        <p class="text-text-tertiary text-xs font-mono uppercase tracking-wider mb-1">Studying</p>
                        <p class="text-text-primary font-medium leading-snug">Software Engineering with AI</p>
                        <p class="text-text-secondary">Centennial College, Canada</p>
                    </div>
                    <div class="border-t border-navy-lightest/50 pt-3">
                        <p class="text-text-tertiary text-xs font-mono uppercase tracking-wider mb-1">Also completing</p>
                        <p class="text-text-primary font-medium leading-snug">Master of Information Technology</p>
                        <p class="text-text-secondary">INTI International University, Malaysia</p>
                    </div>
                </div>
            </div>

            <div class="bg-navy rounded p-5">
                <h3 class="font-mono text-accent text-sm mb-3">Technical Interests</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach(config('portfolio.personal.interests') as $interest)
                        <span class="tag">{{ $interest }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-section-heading>

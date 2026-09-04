<x-section-heading id="skills" number="04" title="Skills & Technologies">
    <div class="space-y-8">
        @foreach(config('portfolio.skills.categories') as $category)
            <div class="reveal">
                <h3 class="font-mono text-xs text-text-tertiary uppercase tracking-widest mb-4">
                    {{ $category['name'] }}
                </h3>
                <div class="flex flex-wrap gap-2">
                    @foreach($category['skills'] as $skill)
                        @if($skill['url'])
                            <a
                                href="{{ $skill['url'] }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="skill-pill"
                            >
                                {{ $skill['name'] }}
                            </a>
                        @else
                            <span class="skill-pill">
                                {{ $skill['name'] }}
                            </span>
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</x-section-heading>

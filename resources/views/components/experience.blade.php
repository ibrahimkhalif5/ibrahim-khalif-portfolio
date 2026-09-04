<x-section-heading id="experience" number="02" title="Experience">
    <div class="space-y-4">

        <p class="text-text-secondary text-base leading-relaxed max-w-2xl mb-6">
            {{ config('portfolio.experience.lead') }}
        </p>

        @foreach(config('portfolio.experience.items') as $item)
            <div class="experience-card reveal">
                <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-1 mb-4">
                    <div>
                        <h3 class="text-lg font-bold text-text-primary">
                            {{ $item['role'] }}
                        </h3>
                        <p class="text-accent font-mono text-sm">
                            {{ $item['company'] }}
                            @if(isset($item['department']))
                                <span class="text-text-tertiary"> — {{ $item['department'] }}</span>
                            @endif
                        </p>
                    </div>
                    @if(!empty($item['period']))
                        <span class="text-sm font-mono text-text-tertiary whitespace-nowrap">
                            {{ $item['period'] }}
                        </span>
                    @endif
                </div>

                @if(!empty($item['bullets']))
                    <ul class="space-y-2 mb-5">
                        @foreach($item['bullets'] as $bullet)
                            <li class="flex items-start gap-3 text-sm text-text-secondary leading-relaxed">
                                <span class="text-accent mt-1.5 shrink-0">
                                    <svg width="6" height="6" viewBox="0 0 6 6" fill="currentColor">
                                        <circle cx="3" cy="3" r="3"/>
                                    </svg>
                                </span>
                                {{ $bullet }}
                            </li>
                        @endforeach
                    </ul>
                @endif

                @if(!empty($item['technologies']))
                    <div class="flex flex-wrap gap-2">
                        @foreach($item['technologies'] as $tech)
                            <span class="tag">{{ $tech }}</span>
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</x-section-heading>

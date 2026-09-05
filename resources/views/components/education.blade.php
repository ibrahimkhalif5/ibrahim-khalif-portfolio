<x-section-heading id="education" number="03" title="Education">
    <div class="space-y-4">
        @foreach(config('portfolio.education') as $item)
            <div class="experience-card reveal">
                <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-1 mb-2">
                    <div>
                        <h3 class="text-lg font-bold text-text-primary">
                            {{ $item['program'] }}
                        </h3>
                        <p class="text-accent font-mono text-sm">
                            {{ $item['institution'] }}
                            <span class="text-text-tertiary">, {{ $item['location'] }}</span>
                        </p>
                    </div>
                    <div class="flex flex-col items-start sm:items-end gap-1 shrink-0">
                        @if(!empty($item['status']))
                            <span class="inline-block px-2.5 py-0.5 text-xs font-mono rounded bg-accent/10 text-accent border border-accent/20">
                                {{ $item['status'] }}
                            </span>
                        @endif
                        @if(!empty($item['period']))
                            <span class="text-sm font-mono text-text-tertiary">
                                {{ $item['period'] }}
                            </span>
                        @endif
                    </div>
                </div>

                @if(!empty($item['description']))
                    <p class="text-text-secondary text-sm leading-relaxed mt-2">
                        {{ $item['description'] }}
                    </p>
                @endif
            </div>
        @endforeach
    </div>
</x-section-heading>

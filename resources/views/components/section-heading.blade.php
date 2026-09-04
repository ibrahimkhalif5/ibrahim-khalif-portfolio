@props(['id', 'number', 'title'])

<section id="{{ $id }}" class="pt-24 lg:pt-32 min-h-[50vh]">
    <div class="reveal">
        <h2 class="text-2xl md:text-3xl font-bold text-text-primary mb-12">
            <span class="section-number font-mono text-sm">{{ $number }}</span>
            {{ $title }}
            <span class="inline-block ml-3 h-[1px] w-16 bg-text-tertiary align-middle"></span>
        </h2>
        {{ $slot }}
    </div>
</section>

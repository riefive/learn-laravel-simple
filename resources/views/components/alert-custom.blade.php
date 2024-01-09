@props([
    'title',
    'footer',
])

<span class="font-medium">{{ $title }}</span>

<div {{ $attributes->merge(['class' => "text-black"]) }}>
    {{ $slot }}
</div>

<footer {{ $footer->attributes->class(['text-gray-700']) }}>
    {{ $footer }}
</footer>
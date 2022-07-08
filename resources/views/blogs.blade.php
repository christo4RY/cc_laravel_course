<x-layout>
    <x-hero-section />
    <x-blog-section :blogs="$blogs" :categories="$categories" :currentCategory="$currentCategory ?? null" />
    <x-subscribe-section />
</x-layout>

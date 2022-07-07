<x-layout>
    @foreach ($blogs as $blog)
        <h1><a href="/blog/{{ $blog->slug }}">{{ $blog->title }}</a></h1>
        <div>
            <p>published at {{ $blog->date }}</p>
        </div>
        <div>
            <p>{{ $blog->intro }}</p>
        </div>
    @endforeach
</x-layout>

<x-layout>
    @foreach ($blogs as $blog)
        <h1><a href="/blog/{{ $blog->slug }}">{{ $blog->title }}</a></h1>
        <h4>Author - <a href="/users/{{$blog->user->username}}">{{$blog->user->name}}</a></h4>
        <p><a href="/categories/{{ $blog->category->slug }}">{{ $blog->category->name }}</a></p>
        <div>
            <p>published at {{ $blog->created_at->diffForHumans() }}</p>
        </div>
        <div>
            <p>{{ $blog->intro }}</p>
        </div>
    @endforeach
</x-layout>

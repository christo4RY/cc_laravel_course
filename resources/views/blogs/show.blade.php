<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <img src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
                    class="card-img-top" alt="..." />
                <h3 class="my-3">{{ $blog->title }}</h3>
                <div class="my-2">
                    <div>Author - <a href="/?users={{ $blog->author->username }}">{{ $blog->author->name }}</a></div>
                    <div><a href="/?category={{ $blog->category->slug }}">
                            <span class="badge bg-primary">{{ $blog->category->name }}</span></a></div>
                    <div class="my-2">
                        <form action="/blog/{{ $blog->slug }}/subscribesHandler" method="POST">
                            @csrf
                            @auth
                                @if (auth()->user()->isSubscribed($blog))
                                    <button class="btn btn-danger" type="submit">UnSubscribe</button>
                                @else
                                    <button class="btn btn-warning" type="submit">Subscribe</button>
                                @endif
                            @endauth
                        </form>
                    </div>
                    <div>Published at - {{ $blog->created_at->diffForHumans() }}</div>
                </div>
                <p class="lh-md">
                    {{ $blog->body }}
                </p>
            </div>
        </div>
    </div>
    @auth
        <section class="container">
            <div class="col-md-8 mx-auto">
                <x-card-warraper>
                    <form action="/blog/{{ $blog->slug }}/comment" method="POST">
                        @csrf
                        <textarea name="body" id="" required cols="10" rows="5" placeholder="say something.."
                            class="form-control border border-0"></textarea>
                        <x-error name="body" />
                        <div class="d-flex justify-content-end mt-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </x-card-warraper>
            </div>
        </section>
    @else
        <p class="text-center my-2">Please <a href="/login">Login</a> fill your account.</p>
    @endauth

    @if ($blog->comment->count())
        <x-comment :comments="$blog
            ->comment()
            ->latest()
            ->paginate(3)" />
    @endif
    <x-blogs-you-may-like :blog="$blog" :randomBlogs="$randomBlogs" />
</x-layout>

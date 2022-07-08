@props(['blogs'])
<section class="container text-center" id="blogs">
    <h1 class="display-5 fw-bold mb-4">Blogs</h1>
    <div class="">
        <x-drop-down />
    </div>
    <form action="" class="my-3">
        <div class="input-group mb-3">
            @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}" />
            @endif
            @if (request('users'))
                <input type="hidden" name="users" value="{{ request('users') }}" />
            @endif
            <input type="text" name="search" value="{{ request('search') }}" autocomplete="false"
                class="form-control" placeholder="Search Blogs..." />
            <button type="submit" class="input-group-text bg-primary text-light" id="basic-addon2" type="submit">
                Search
            </button>
        </div>
    </form>
    <div class="row">
        @forelse ($blogs as $blog)
            <div class="col-md-4 mb-4">
                <x-blog-card :blog="$blog" />
            </div>
        @empty
            <p class="alert alert-danger text-center">No Blogs Found.</p>
        @endforelse
        {{$blogs->links()}}
    </div>
</section>

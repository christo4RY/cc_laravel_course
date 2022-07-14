<x-layout>
    <div class="container">
        <div class="row">
                <div class="col-md-3 mt-3">
                    <ul class="list-group mt-5">
                        <li class="list-group-item"><a href="/admin/blogs">Dashboard</a></li>
                        <li class="list-group-item"><a href="/admin/blogs/create">Blogs create</a></li>
                      </ul>
                </div>
                <div class="col-md-9">
                    {{ $slot }}
                </div>
        </div>
    </div>
</x-layout>

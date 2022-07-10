<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Creative Coder</a>
        <div class="d-flex">
            <a href="/#blogs" class="nav-link">Blogs</a>
            @guest
                <a href="/register" class="nav-link">Register</a>
                <a href="/login" class="nav-link">Login</a>
            @else
                <img src="{{auth()->user()->avator}}" width="50" height="50" class="rounded-circle" alt="">
                <a href="" class="nav-link">
                    Welcome to {{ auth()->user()->name }}
                </a>
            @endguest
            @auth
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="btn btn-link nav-link">Logout</button>
            </form>
            @endauth
            <a href="#subscribe" class="nav-link">Subscribe</a>
        </div>
    </div>
</nav>

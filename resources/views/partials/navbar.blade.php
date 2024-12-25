<nav>
    <ul>
        <li><a href="{{ route('posts.index') }}">Home</a></li>
        @auth
            <li><a href="{{ route('posts.create') }}">Create Post</a></li>
            <li><a href="{{ route('logout') }}">Logout</a></li>
        @else
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        @endauth
    </ul>
</nav>

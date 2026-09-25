<nav>
    <a href="/tasks">Tasks</a>

    @if (Auth::user()->isAdmin())
        <a href="/users">Users</a>
        <a href="/categories">Categories</a>
    @endif

    <a href="/tasks/deleted">Deleted Tasks</a>
    <a href="/profile">Profile</a>

    <form method="POST" action="/logout" style="display: inline;">
        @csrf
        <button type="submit">Logout</button>
    </form>
</nav>

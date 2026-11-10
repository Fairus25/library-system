<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Library System')</title>
</head>
<body>
    <header>
        <h1>Library System</h1>
        <nav>
            <a href="/dashboard">Dashboard</a> | 
            <a href="/books">Books</a> | 
            <a href="/categories">Categories</a> | 
            <a href="/members">Members</a> | 
            
            {{-- Menu Users HANYA muncul jika role pengguna adalah Admin --}}
            @can('manage-users')
                <a href="/users">Users</a> | 
            @endcan

            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </nav>
        <hr>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <hr>
    </footer>
</body>
</html>
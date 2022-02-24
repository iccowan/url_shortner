<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/">URL Shortner</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/"><i class="fa-solid fa-house"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about"><i class="fa-solid fa-question"></i> About</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="/user/links"><i class="fa-solid fa-link"></i> My Links</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user"><i class="fa-solid fa-user"></i> Welcome, {{ Auth::user()->getName() }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/login"><i class="fa-solid fa-right-to-bracket"></i> Get Started</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
<br />

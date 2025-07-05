<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">

        {{-- Kiri: Role --}}
        <a class="navbar-brand" href="#">
            {{ auth()->user()->role === 'admin' ? 'Admin' : 'Approver' }}
        </a>

        {{-- Toggle (untuk mobile) --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Navbar content --}}
        <div class="collapse navbar-collapse" id="navbarNav">

            {{-- Tengah: Dashboard --}}
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    @if (auth()->user()->role === 'admin')
                        <a class="nav-link text-white" href="{{ route('admin.dashboard') }}">
                            Dashboard Admin
                        </a>
                    @elseif (auth()->user()->role === 'approver')
                        <a class="nav-link text-white" href="{{ route('approver.dashboard') }}">
                            Dashboard Approver
                        </a>
                    @endif
                </li>
            </ul>

            {{-- Kanan: Logout --}}
            <ul class="navbar-nav">
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-light">
                            Logout
                        </button>
                    </form>
                </li>
            </ul>

        </div>
    </div>
</nav>

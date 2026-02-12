<div id="sidebar">
    <nav>
        <a href="{{ route('user.dashboard') }}"
            class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
            Dashboard
        </a>
        <a href="{{ route('user.profile') }}"
            class="{{ request()->routeIs('user.profile') ? 'active' : '' }}">
            Profil
        </a>
        <a href="{{ route('user.rekomendasi') }}"
            class="{{ request()->routeIs('user.rekomendasi') ? 'active' : '' }}">
            Rekomendasi
        </a>
    </nav>

    <div class="sidebar-footer">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-sm btn-glass btn-logout w-100 mb-2">Logout</button>
        </form>
        <small class="text-glass">Versi 1.0.0</small>
    </div>
</div>
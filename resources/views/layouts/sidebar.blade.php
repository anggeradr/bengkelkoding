<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    @if (Auth::user()->role == 'dokter')
        <li class="nav-item">
            <a href="/dashboard" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
    <a href="{{ route('dokter.memeriksa') }}" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>Memeriksa</p>
    </a>
</li>
        <li class="nav-item">
            <a href="/obat" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>Obat</p>
            </a>
        </li>
    @elseif (Auth::user()->role == 'pasien')
        <li class="nav-item">
            <a href="/dashboard" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/periksa" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>Periksa</p>
            </a>
        </li>
    @endif

    <li class="nav-item">
    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="nav-icon fas fa-sign-out-alt"></i>
        <p>Logout</p>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</li>

</ul>

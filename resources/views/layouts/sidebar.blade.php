<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
  @if (Auth::user()->role == 'dokter')
      <li class="nav-item">
        <a href="/dashboard" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/periksa" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>Pemeriksaan</p>
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
        <a href="/periksa" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>Pemeriksaan</p>
        </a>
      </li>
  @endif

  <form action="{{ route('logout') }}" method="POST" style="display: inline;">
      @csrf
      <button type="submit" class="btn btn-danger btn-sm">Logout</button>
  </form>
</ul>

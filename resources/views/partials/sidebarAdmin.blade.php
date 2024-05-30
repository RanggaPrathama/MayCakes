 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      {{-- <li class="nav-item">
        <a class="nav-link " href="{{ route('homeAdmin') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav --> --}}

      <li class="nav-item">
        <a class="nav-link {{ request()->is('cake*') ? '' : 'collapsed' }}" href="{{ route('cake.index') }}">
          <i class="bi bi-card-list"></i>
          <span>Cake</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link {{ request()->is('kategori*') ? '' : 'collapsed' }}" href="{{ route('kategori.index') }}">
          <i class="bi bi-card-list"></i>
          <span>Kategori</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link {{ request()->is('payment*') ? '' : 'collapsed' }}" href="{{ route('payment.index') }}">
          <i class="bi bi-card-list"></i>
          <span>Payment</span>
        </a>
      </li><!-- End Register Page Nav -->
      <li class="nav-item">
        <a class="nav-link {{ request()->is('laporanTransaksi*') ? '' : 'collapsed' }}" href="{{ route('laporanTransaksi') }}">
          <i class="bi bi-card-list"></i>
          <span>Laporan Transaksi</span>
        </a>
      </li><!-- End Register Page Nav -->







    </ul>

  </aside><!-- End Sidebar-->

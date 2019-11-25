<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/assets/dist/img/akun.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p> {{ Auth::user()->name }} </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/home"><i class="fa fa-circle" aria-hidden="true"></i>
</i>Dashboard 1</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i>
            <span>Master</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">5</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/karyawan"><i class="fa fa-user"></i>Karyawan</a></li>
            <li><a href="/legalitas"><i class="fa fa-file"></i>Legalitas</a></li>
            <li><a href="/inventaris_it"><i class="fa fa-laptop"></i>Inventaris IT</a></li>
             <li><a href="/lelang_inventaris_it"><i class="fa fa-paper-plane-o" aria-hidden="true"></i>Lelang Inventaris IT</a></li>
            <li><a href="/peminjaman"><i class="fa fa-bitbucket"></i>Peminjaman IT</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-print"></i>
            <span>Cetak Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/legalitas/cetak/report" target="blank"><i class="fa fa-file"></i>Legalitas</a></li>
            <li><a href="/karyawan/cetak/report" target="blank"><i class="fa fa-file"></i>karyawan</a></li>
          <li><a href="/inventaris_it/cetak/report" target="blank"><i class="fa fa-file"></i>Inventaris IT</a></li>
          </ul>
        </li>
        <li><a href="#"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
                <li><a href="#"><i class="fa fa-users"></i> <span>User</span></a></li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

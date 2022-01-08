<?= $this->extend('Admin/Overview') ?>
<?= $this->section('content') ?>
<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
    <li class="nav-header">MAIN NAVIGATION</li>
    <li class="nav-item ">
      <a href="<?= base_url('/Admin'); ?>" class="nav-link ">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
        </p>
      </a>
    </li>
    <li class="nav-item menu-open">
      <a href="#" class="nav-link active">
        <i class="nav-icon fas fa-edit"></i>
        <p>
          Forms
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="<?= base_url('/input_barang') ?>" class="nav-link active">
            <i class="far fa-circle nav-icon"></i>
            <span>Tambah Data Barang Masuk</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/forms/advanced.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <span>Tambah Data Barang Keluar</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/forms/editors.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <span>Tambah Data Satuan</span>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-table"></i>
        <p>
          Tables
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="pages/tables/simple.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <span>Tabel Data Barang Masuk</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/tables/data.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <span>Tabel Data Barang Keluar</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/tables/jsgrid.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <span>Tabel Data Satuan</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/tables/jsgrid.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <span>Tabel Transaksi</span>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-header">ACCOUNT</li>
    <li class="nav-item">
      <a href="pages/calendar.html" class="nav-link">
        <i class="nav-icon fas fa-users-cog"></i>
        <p>
          Manage User
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="pages/calendar.html" class="nav-link">
        <i class="nav-icon fas fa-cogs"></i>
        <p>
          Profile
        </p>
      </a>
    </li>
    <li class="nav-item btn-danger">
      <a href="pages/calendar.html" class="nav-link">
        <i class="nav-icon fas fa-sign-out-alt"></i>
        <p>
          Log Out
        </p>
      </a>
    </li>
  </ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Input Barang</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Form Input Barang</h3>
            </div>

            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?= base_url('/input_barang/process') ?>" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label>Kode Barang</label>
                  <input type="text" class="form-control" id="kodebarang" name="kodebarang" placeholder="Kode Barang" autofocus>
                </div>
                <div class="form-group">
                  <label>Nama Barang</label>
                  <input type="text" class="form-control" id="namabarang" name="namabarang" placeholder="Nama Barang" autofocus>
                </div>
                <div class="form-group">
                  <label>Jumlah</label>
                  <input type="number" name="jumlah" id="jumlah" class="form-control" placeholder="Jumlah">
                </div>
                <div class="form-group">
                  <label>Lokasi</label>
                  <input type="text" name="lokasi" id="lokasi" class="form-control" placeholder="Lokasi">
                </div>
                <!-- /.card-body -->
                <?php
                if (session()->getFlashdata('error')) { ?>
                  <div class=" alert alert-danger" style="list-style: none;">
                    <?= session()->getFlashdata('error'); ?>
                  </div>
                <?php } elseif (session()->getFlashdata('msg')) { ?>
                  <div class=" alert alert-success" style="list-style: none;">
                    <?= session()->getFlashdata('msg'); ?>
                  </div>
                <?php } ?>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
          </div>

        </div>
        <!-- /.card -->
      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.card -->
</div>
<?= $this->endSection() ?>
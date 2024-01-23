<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>


    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4" id="anggota">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Anggota
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlanggota ?> Orang</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4" id="mobil">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pengguna
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlmobil ?> Buah</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4" id="mobil">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Data Keluar
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlkeluar ?> Buah</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4" id="pinjam">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Peminjaman
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jmlpinjam ?> Data</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book-reader fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

    <div class="col-xl-6 col-md-6 mb-4" id="top3">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-danger">
                <h6 class="m-0 font-weight-bold border-0 text-white">mobil yang sering dipinjam</h6>
            </div>
            <div class="card-body">
                <div class="row">

                    <?php foreach($top3mobil as $tp): ?>
                        
                    <div class="col-lg-2 mb-2">
                        <img src="<?= base_url() ?>assets/upload/buku/<?= $tp->foto ?>" alt="" width="100%" style="border-radius: 5px;">
                    </div>
                    <div class="col-lg-10">
                        <h5 class="h5 mb-0 text-gray-800"><b><?= $tp->merk ?></b></h5>
                        <h6 class="h6 mb-0 text-gray-800"><?= $tp->nama_kategori ?></h6>
                    </div>

                    <div class="col-lg-12">
                        <!-- Divider -->
                        <hr class="sidebar-divider">
                    </div>

                    <?php endforeach; ?>

                </div>
                
                <?php if($this->session->userdata('level') == 'Administrasi' || $this->session->userdata('level') == 'Petugas'): ?>
                <div class="row">
                    <div class="col-lg-12">
                        <center>
                            <a href="<?= base_url() ?>mobil" class="btn btn-danger btn-md">
                                <i class="fa fa-eye"></i>
                                Lihat semua mobil
                            </a>
                        </center>
                    </div>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </div>


    <div class="col-xl-6 col-md-6 mb-4" id="top3anggota">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-success">
                <h6 class="m-0 font-weight-bold border-0 text-white">Anggota yang sering pinjam mobil</h6>
            </div>
            <div class="card-body">
                <div class="row">

                    <?php foreach($top3anggota as $ta): ?>
                        
                    <div class="col-lg-2 mb-2">
                        <img src="<?= base_url() ?>assets/upload/anggota/<?= $ta->foto ?>" alt="" width="100%" style="border-radius: 5px;">
                    </div>
                    <div class="col-lg-10">
                        <h5 class="h5 mb-0 text-gray-800"><b><?= $ta->nama_lengkap ?></b></h5>
                        <h6 class="h6 mb-0 text-gray-800"><?= $ta->total ?> x</h6>
                    </div>

                    <div class="col-lg-12">
                        <!-- Divider -->
                        <hr class="sidebar-divider">
                    </div>

                    <?php endforeach; ?>

                </div>
                
                <?php if($this->session->userdata('level') == 'Administrasi' || $this->session->userdata('level') == 'Petugas'): ?>
                <div class="row">
                    <div class="col-lg-12">
                        <center>
                            <a href="<?= base_url() ?>peminjaman" class="btn btn-success btn-md">
                                <i class="fa fa-eye"></i>
                                Lihat semua peminjaman
                            </a>
                        </center>
                    </div>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </div>

    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Page level plugins -->
<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/sbadmin/vendor/chart.js/Chart.min.js"></script>
<!-- Page level custom scripts -->
<script src="<?= base_url(); ?>assets/js/chart/chart-area.js"></script>

<script src="<?= base_url(); ?>assets/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>assets/js/dashboard.js"></script>

<?php if($this->session->flashdata('Pesan')): ?>

<?php else: ?>
<script>
$(document).ready(function() {
    let timerInterval
    Swal.fire({
        title: 'Memuat...',
        timer: 1000,
        onBeforeOpen: () => {
            Swal.showLoading()
        },
        onClose: () => {
            clearInterval(timerInterval)
        }
    }).then((result) => {
        $("#anggota").addClass("bounceIn");
        $("#mobil").addClass("bounceIn");
        $("#pengadaan").addClass("bounceIn");
        $("#pinjam").addClass("bounceIn");
        $("#grafik").addClass("bounceIn");
        $("#top3").addClass("bounceIn");
        $("#top3anggota").addClass("bounceIn");
    })
});
</script>
<?php endif; ?>
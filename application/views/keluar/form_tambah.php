<!-- Begin Page Content -->
<div class="container-fluid">

    <form action="<?= base_url() ?>keluar/proses_tambah" name="myForm" method="POST" enctype="multipart/form-data"
        onsubmit="return validateForm()">


        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="d-sm-flex">
                <a href="<?= base_url() ?>keluar" class="btn btn-md btn-circle btn-primary">
                    <i class="fas fa-arrow-left"></i>
                </a>
                &nbsp;
                <h1 class="h2 mb-0 text-gray-800">Tambah Keluar/Rusak</h1>
            </div>

            <button type="submit" class="btn btn-primary btn-md btn-icon-split">
                <span class="text text-white">Simpan Data</span>
                <span class="icon text-white-50">
                    <i class="fas fa-save"></i>
                </span>
            </button>

        </div>

        <div class="d-sm-flex  justify-content-between mb-0">
            <div class="col-lg-8 mb-4">
                <!-- form -->
                <div class="card border-bottom-primary shadow mb-4">
                    <div class="card-header py-3 bg-primary">
                        <h6 class="m-0 font-weight-bold text-white">Form Keluar/Rusak</h6>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">

                        <!-- ID User -->
<div class="form-group">
    <label>Id User</label>
    <select name="id_user" class="form-control chosen">
        <option value="">--Pilih--</option>
        <?php foreach ($user as $u): ?>
            <option value="<?= $u->id_user ?>"><?= $u->nama ?></option>
        <?php endforeach; ?>
    </select>
</div>

                            <!-- Judul mobil -->
                            <?php if($jmlmobil > 0): ?>
                            <div class="form-group"><label>Mobil</label>
                                <select name="mobil" class="form-control chosen" onchange="ambilmobil()">
                                    <option value="">--Pilih--</option>
                                    <?php foreach($mobil as $b): ?>
                                    <option value="<?= $b->id_mobil ?>"><?= $b->merk ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <?php else: ?>
                            <div class="form-group"><label>Mobil</label>
                                <input type="hidden" name="mobil">
                                <div class="d-sm-flex justify-content-between">
                                    <span class="text-danger"><i>(Belum Ada Data mobil!)</i></span>
                                    <a href="<?= base_url() ?>mobil" class="btn btn-sm btn-primary btn-icon-split">
                                        <span class="icon text-white">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <?php endif; ?>

                            <!-- No. Polisi -->
<div class="form-group">
    <label>No. Polisi</label>
    <select name="nopol" class="form-control chosen">
    <option value="">--Pilih--</option>
    <?php foreach ($mobil as $item): ?>
        <option value="<?= $item->nopol ?>"><?= $item->nopol ?></option>
    <?php endforeach; ?>
</select>
</div>


                    <!-- Tujuan -->
                    <div class="form-group">
                        <label>Tujuan</label>
                        <input class="form-control" name="tujuan" type="text" placeholder="">
                    </div>

                    <!-- Tanggal Keluar -->
                    <div class="form-group">
                        <label>Tanggal Keluar</label>
                        <input class="form-control" name="tanggal_keluar" id="datepicker" value="<?= $tglnow ?>" type="text" placeholder="" autocomplete="off">

                    </div>

                        </div>


                        <br>
                    </div>
                </div>

            </div>

            <div class="col-lg-4 mb-4">
                <!-- file -->
                <div class="card border-bottom-primary shadow mb-4">
                    <div class="card-header py-3 bg-primary">
                        <h6 class="m-0 font-weight-bold text-white">Preview</h6>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">

                            <center>
                                <img id="preview" width="200px" src="<?= base_url() ?>assets/upload/buku/book.png"
                                    alt="">
                            </center>

                            <br>

                            <label><b>Judul mobil</b></label>
                            <br>
                            <h6 class="h6 text-gray-800" id="judul">-</h6>
                            <!-- Divider -->
                            <hr class="sidebar-divider">



                        </div>
                    </div>
                </div>

            </div>
        </div>


    </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/keluar.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formkeluar.js"></script>
<script src="<?= base_url(); ?>assets/plugin/datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url(); ?>assets/plugin/chosen/chosen.jquery.min.js"></script>


<script>
$('.chosen').chosen({
    width: '100%',

});

$('#datepicker').datepicker({
    autoclose: true
});
</script>

<?php if($this->session->flashdata('Pesan')): ?>

<?php else: ?>
<script>
$(document).ready(function() {

    $('#pdf').hide();

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

    })
});
</script>
<?php endif; ?>
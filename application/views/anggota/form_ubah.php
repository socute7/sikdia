<!-- Begin Page Content -->
<div class="container-fluid">

    <?php foreach ($data as $d): ?>
    <form action="<?= base_url() ?>anggota/proses_ubah" name="myForm" method="POST" enctype="multipart/form-data"
        onsubmit="return validateForm()">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="d-sm-flex">
                <a href="<?= base_url() ?>anggota" class="btn btn-md btn-circle btn-primary">
                    <i class="fas fa-arrow-left"></i>
                </a>
                &nbsp;
                <h1 class="h2 mb-0 text-gray-800">Ubah Anggota</h1>
            </div>

            <button type="submit" class="btn btn-success btn-md btn-icon-split">
                <span class="text text-white">Simpan Perubahan</span>
                <span class="icon text-white-50">
                    <i class="fas fa-save"></i>
                </span>
            </button>

        </div>

        <div class="d-sm-flex justify-content-between mb-0">
            <div class="col-lg-8 mb-4">
                <!-- form -->
                <div class="card border-bottom-primary shadow mb-4">
                    <div class="card-header py-3 bg-primary">
                        <h6 class="m-0 font-weight-bold text-white">Form Anggota</h6>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">

                            <!-- Id -->
                            <div class="form-group"><label>ID Anggota</label>
                                <input class="form-control" name="id" type="text"
                                    value="<?= $d->id_anggota ?>" readonly>
                            </div>

                            <!-- Nama Lengkap -->
                            <div class="form-group"><label>Nama Lengkap</label>
                                <input class="form-control" name="nmlengkap" type="text"
                                    value="<?= $d->nama_lengkap ?>">
                            </div>
                            <!-- Nama Lengkap -->
                            <div class="form-group"><label>Jabatan</label>
                                <input class="form-control" name="jabatan" type="text"
                                    value="<?= $d->jabatan ?>">
                            </div>
                            <!-- Nama Lengkap -->
                            <div class="form-group"><label>Tanggal/Penggunaan</label>
                                <input class="form-control" name="penggunaan" type="text"
                                    value="<?= $d->penggunaan ?>">
                            </div>
                            <!-- Nama Lengkap -->
                            <div class="form-group"><label>Jenis Mobil</label>
                                <input class="form-control" name="jenis" type="text"
                                    value="<?= $d->jenis ?>">
                            </div>
                            <!-- Nama Lengkap -->
                            <div class="form-group"><label>Tujuan</label>
                                <input class="form-control" name="tujuan" type="text"
                                    value="<?= $d->tujuan ?>">
                            </div>

                            <!-- NO Telepon -->
                            <div class="form-group"><label>Nomor Telepon</label>
                                <input class="form-control" name="notelp" type="number" value="<?= $d->notelp ?>">
                            </div>

                        <!-- Nama Lengkap -->
                        <div class="form-group"><label>Divisi</label>
                                <input class="form-control" name="tujuan" type="text"
                                    value="<?= $d->divisi ?>">
                            </div>
                                <!-- Alamat -->
                            <div class="form-group"><label>Alamat</label>
                                <textarea class="form-control" name="alamat"><?= $d->alamat ?></textarea>
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
                        <h6 class="m-0 font-weight-bold text-white">Foto</h6>
                    </div>
                    <div class="card-body">
                        <div class="card bg-warning text-white shadow">
                            <div class="card-body">
                                Format
                                <div class="text-white-45 small">.png .jpeg .jpg .tiff .gif .tif</div>
                            </div>
                        </div>
                        <br>
                        <center>
                            <div id="img">
                                <img src="<?= base_url() ?>assets/upload/anggota/<?= $d->foto ?>" id="outputImg"
                                    width="200" maxheight="300">
                            </div>
                            
                        </center>
                        <br>
                        <span class="text-danger">*kosongkan jika tidak ingin merubah</span>
                        <!-- foto -->
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="hidden" name="fotoLama" value="<?= $d->foto ?>">
                                <input class="custom-file-input" type="file" id="GetFile" name="photo"
                                    onchange="VerifyFileNameAndFileSize()" accept=".png,.gif,.jpeg,.tiff,.jpg">
                                <label class="custom-file-label" for="customFile">Pilih File</label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </form>
    <?php endforeach; ?>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/anggota.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formanggota.js"></script>
<script src="<?= base_url(); ?>assets/plugin/datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script>
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
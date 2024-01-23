<?php foreach ($data as $d) { ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <form action="<?= base_url() ?>mobil/proses_ubah" name="myForm" method="POST" enctype="multipart/form-data"
        onsubmit="return validateForm()">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="d-sm-flex">
                <a href="<?= base_url() ?>mobil" class="btn btn-md btn-circle btn-primary">
                    <i class="fas fa-arrow-left"></i>
                </a>
                &nbsp;
                <h1 class="h2 mb-0 text-gray-800">Ubah Mobil</h1>
            </div>
            <button type="submit" class="btn btn-success btn-md btn-icon-split">
                <span class="text text-white">Simpan Perubahan</span>
                <span class="icon text-white-50">
                    <i class="fas fa-save"></i>
                </span>
            </button>

        </div>

        <div class="d-sm-flex  justify-content-between mb-0">
            <div class="col-lg-8 mb-4">
                <!-- Illustrations -->
                <div class="card border-bottom-primary shadow mb-4">
                    <div class="card-header bg-primary py-3">
                        <h6 class="m-0 font-weight-bold text-white">Form Mobil</h6>
                    </div>
                    <div class="card-body">
                        <div class="col-lg-12">
                            <!-- Id Mobil -->
                            <div class="form-group"><label>ID Mobil</label>
                                <input class="form-control" name="id" type="text" readonly value="<?= $d->id_mobil ?>">
                            </div>

                            <!-- Kategori -->
                            <?php if($jmlKategori > 0): ?>
                            <div class="form-group"><label>Jenis Mobil</label>
                                <select name="kategori" class="form-control chosen">
                                    <?php foreach($kategori as $k): ?>

                                    <?php if($d->id_kategori == $k->id_kategori): ?>
                                    <option value="<?= $k->id_kategori ?>" selected><?= $k->kategori ?></option>
                                    <?php else: ?>
                                    <option value="<?= $k->id_kategori ?>"><?= $k->kategori ?></option>
                                    <?php endif; ?>

                                    <?php endforeach ?>
                                </select>
                            </div>
                            <?php else: ?>
                            <div class="form-group"><label>Jenis Mobil</label>
                                <input type="hidden" name="kategori">
                                <div class="d-sm-flex justify-content-between">
                                    <span class="text-danger"><i>(Belum Ada Data Kategori!)</i></span>
                                    <a href="<?= base_url() ?>kategori" class="btn btn-sm btn-primary btn-icon-split">
                                        <span class="icon text-white">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <?php endif; ?>
                            <!-- merk mobil -->
                            <div class="form-group"><label>Reg</label>
                                <input class="form-control" name="reg" type="text" value="<?= $d->reg ?>">
                            </div>

                            <!-- merk mobil -->
                            <div class="form-group"><label>Merk Mobil</label>
                                <input class="" name="id" type="hidden" value="<?= $d->id_mobil ?>">
                                <input class="form-control" name="mobil" type="text" value="<?= $d->merk ?>">
                            </div>
                            <!-- merk mobil -->
                            <div class="form-group"><label>Ukuran</label>
                                <input class="form-control" name="ukuran" type="text" value="<?= $d->ukuran ?>">
                            </div>
                            <!-- merk mobil -->
                            <div class="form-group"><label>Bahan</label>
                                <input class="form-control" name="bahan" type="text" value="<?= $d->bahan ?>">
                            </div>
                            <!-- thnTerbit -->
                            <div class="form-group"><label>Tahun</label>
                                    <input class="form-control" name="thn" type="number" value="<?= $d->tahun ?>">
                                </div>
                                <!-- thnTerbit -->
                            <div class="form-group"><label>Rangka</label>
                                    <input class="form-control" name="rangka" type="text" value="<?= $d->rangka ?>">
                                </div>
                                <!-- thnTerbit -->
                            <div class="form-group"><label>Mesin</label>
                                    <input class="form-control" name="mesin" type="text" value="<?= $d->mesin ?>">
                                </div>
                            <!-- nopol -->
                            <div class="form-group"><label>No Pol</label>
                                <input class="form-control" name="nopol" type="text" value="<?= $d->nopol ?>">
                            </div>
                             <!-- nopol -->
                             <div class="form-group"><label>BPKB</label>
                                <input class="form-control" name="bpkb" type="text" value="<?= $d->bpkb ?>">
                            </div>
                             <!-- nopol -->
                             <div class="form-group"><label>Asal</label>
                                <input class="form-control" name="asal" type="text" value="<?= $d->asal ?>">
                            </div>
                             <!-- nopol -->
                             <div class="form-group"><label>Harga</label>
                                <input class="form-control" name="harga" type="text" value="<?= $d->harga ?>">
                            </div>
                            
                        </div>
                       
                            </div>
                           

                        <div class="col-lg-12">

                            <!-- Sinopsis -->
                            <div class="form-group"><label>Keterangn</label>
                                <textarea class="form-control" name="keterangan"
                                    type="text"><?= $d->keterangan ?></textarea>
                            </div>

                        </div>


                        <br>
                    </div>
                </div>

            </div>

            <div class="col-lg-4 mb-4">
                <!-- Illustrations -->
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
                                <img src="<?= base_url() ?>assets/upload/buku/<?= $d->foto ?>" id="outputImg"
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



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/buku.js"></script>
<script src="<?= base_url(); ?>assets/js/validasi/formbuku.js"></script>
<script src="<?= base_url(); ?>assets/plugin/chosen/chosen.jquery.min.js"></script>

<script>
$('.chosen').chosen({
    width: '100%',

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

<?php } ?>